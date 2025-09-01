<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pembayaran;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index()
    {
        $notif1 = Pembayaran::where('pembayaran','piutang')->count();
        $active = 'pengeluaran';
        $produk = Produk::orderBy('nama_produk')->get();
        return view('pengeluaran.index', compact('notif1','active','produk'));
    }
  
    public function data()
    {
        $pengeluaran = Pengeluaran::orderBy('id_pengeluaran', 'desc')->get();

        return datatables()
            ->of($pengeluaran)
            ->addIndexColumn()
            ->addColumn('created_at', function ($pengeluaran) {
                return tanggal_indonesia($pengeluaran->created_at, false);
            })
            ->addColumn('nominal', function ($pengeluaran) {
                return 'Rp. '.format_uang($pengeluaran->nominal);
            })
            ->addColumn('aksi', function ($pengeluaran) {
                return '
                <div class="btn-group">
                    <button type="button" onclick="editForm(`'. route('pengeluaran.update', $pengeluaran->id_pengeluaran) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deleteData(`'. route('pengeluaran.destroy', $pengeluaran->id_pengeluaran) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi'])
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
        $produk = Produk::where('id_produk',$request->nama_produk)->first();
        $produk->stok -= $request->jumlah_produk;
        $produk->update();

        //inisiasi nominal
        $data_produk = Produk::where('id_produk',$request->nama_produk)->first();
        
        $data = $request->all();
        $data['id_produk'] = $request->nama_produk;
        $data['nama_produk'] = $data_produk->nama_produk;
        $data['jumlah_produk'] = $request->jumlah_produk;
        $data['nominal'] = $data_produk->harga_beli * $request->jumlah_produk;
        Pengeluaran::create($data);


        return redirect('/pengeluaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengeluaran = Pengeluaran::find($id);

        return response()->json($pengeluaran);
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
        $produk = Produk::findOrFail($request->id_produk);
        $pengeluaran = Pengeluaran::findOrFail($request->id_pengeluaran);

        //cek data
        if ($pengeluaran->jumlah_produk < $request->jumlah_produk) {
            $selisih = $request->jumlah_produk - $pengeluaran->jumlah_produk;
            $produk->stok -= $selisih;
            $produk->update();

            $pengeluaran->jumlah_produk = $request->jumlah_produk;
            $pengeluaran->nominal = $produk->harga_beli * $request->jumlah_produk;
            $pengeluaran->update();
        } else if($pengeluaran->jumlah_produk > $request->jumlah_produk){
            $selisih = $pengeluaran->jumlah_produk - $request->jumlah_produk;
            $produk->stok += $selisih;
            $produk->update();

            $pengeluaran->jumlah_produk = $request->jumlah_produk;
            $pengeluaran->nominal = $produk->harga_beli * $request->jumlah_produk;
            $pengeluaran->update();
        } else{
            return redirect('/pengeluaran');
        }
    

        return redirect('/pengeluaran');
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_pengeluaran = Pengeluaran::findOrFail($id);
        $data_produk = $data_pengeluaran->id_produk;
        $jumlah_refund = $data_pengeluaran->jumlah_produk;

        $produk = Produk::findOrFail($data_produk);
        $produk->stok += $jumlah_refund;
        $produk->update();

        $pengeluaran = Pengeluaran::find($id)->delete();

        return response(null, 204);
    }
}
