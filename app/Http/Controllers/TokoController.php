<?php

namespace App\Http\Controllers;

use App\Models\toko;
use App\Models\Produk;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notif1 = Pembayaran::where('pembayaran','piutang')->count();
        $active = 'toko';
        $produk = Produk::orderBy('nama_produk')->get();
        return view('toko.index', compact('notif1','active','produk'));
    }

    public function data()
    {
        $toko = toko::leftJoin('kategori', 'kategori.id_kategori', 'toko.id_kategori')
            ->select('toko.*', 'nama_kategori')
            // ->orderBy('kode_produk', 'asc')
            ->get();

        return datatables()
            ->of($toko)
            ->addIndexColumn()
            ->addColumn('kode_produk', function ($toko) {
                return '<span class="label label-success">'. $toko->kode_produk .'</span>';
            })
            ->addColumn('harga_jual', function ($toko) {
                return 'Rp '. format_uang($toko->harga_jual);
            })
            ->addColumn('stok', function ($toko) {
                return format_uang($toko->stok);
            })
            
            ->addColumn('aksi', function ($toko) {
                return '
                <div class="btn-group">
                    <button type="button" onclick="editForm(`'. route('toko.update', $toko->id_produk) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deleteData(`'. route('toko.destroy', $toko->id) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi', 'kode_produk',])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        //inisiasi variabel
        $data_produk = Produk::where('id_produk',$request->id_produk)->first();
        $get_produk = toko::where('id_produk',$request->id_produk)->first();

        if ($request->stok > $data_produk->stok) {
            return redirect('/toko')->with('error','Maaf Stok produk saat ini kurang dari jumlah stok yang diminta.');
        }
        $produk = Produk::where('id_produk',$request->id_produk)->first();
        $produk->stok -= $request->stok;
        $produk->update();

        if ($get_produk != null) {
            $get_produk->stok += $request->stok;
            $get_produk->update();
        } else {
            $data = $request->all();
            $data['id_produk'] = $request->id_produk;
            $data['id_kategori'] = $data_produk->id_kategori;
            $data['kode_produk'] = $data_produk->kode_produk;
            $data['nama_produk'] = $data_produk->nama_produk;
            $data['merk'] = $data_produk->merk;
            $data['harga_jual'] = $data_produk->harga_jual;
            $data['stok'] = $request->stok;
            toko::create($data);
        }

        return redirect('/toko');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $toko = toko::where('id_produk',$id)->first();

        return response()->json($toko);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // ambil data lama
        $produk = Produk::where('id_produk',$request->id_produk)->first();
        $toko = toko::where('id',$request->id_toko)->first();

        if ($request->stok > $produk->stok) {
            return redirect('/toko')->with('error','Maaf Stok produk saat ini kurang dari jumlah stok yang diminta.');
        }
        //cek data
        if ($toko->stok < $request->stok) {
            $selisih = $request->stok - $toko->stok;
            $produk->stok -= $selisih;
            $produk->update();

            $toko->stok = $request->stok;
            $toko->update();
        } else if($toko->stok > $request->stok){
            $selisih = $toko->stok - $request->stok;
            $produk->stok += $selisih;
            $produk->update();

            $toko->stok = $request->stok;
            $toko->update();
        } else{
            return redirect('/toko');
        }
    

        return redirect('/toko');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_toko = toko::where('id',$id)->first();
        $data_produk = $data_toko->id_produk;
        $jumlah_refund = $data_toko->stok;

        $produk = Produk::where('id_produk',$data_produk)->first();
        $produk->stok += $jumlah_refund;
        $produk->update();

        $toko = toko::find($id)->delete();

        return response(null, 204);
    }
}
