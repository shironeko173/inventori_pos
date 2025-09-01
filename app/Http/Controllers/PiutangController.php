<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PiutangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notif1 = Pembayaran::where('pembayaran','piutang')->count();
        $active = 'piutang';
        $piutang = Pembayaran::where('pembayaran', 'piutang')->get();

        return view('pembayaran.piutang', compact('notif1','active','piutang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function data()
    {
        $piutang = Pembayaran::where('pembayaran','=', 'piutang')->orderBy('id', 'desc')->get();

        return datatables()
            ->of($piutang)
            ->addIndexColumn()
            ->addColumn('created_at', function ($piutang) {
                return tanggal_indonesia($piutang->created_at, false);
            })
            ->addColumn('total_harga', function ($piutang) {
                return 'Rp '.format_uang($piutang->total_harga);
            })
            ->addColumn('aksi', function ($piutang) {
                return '
                <div class="btn-group">
                    <button type="button" onclick="editForm(`'. route('piutang.update', $piutang->id) .'`)" class="btn btn-xs btn-success btn-flat"><i class="fa fa-check-square-o"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

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
        //
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $piutang = Pembayaran::find($id);

        return response()->json([
            'id_penjualan' => $piutang->id_penjualan,
            'nama_piutang' => $piutang->nama_piutang,
            'total_harga' => 'Rp '. format_uang($piutang->total_harga),
        ]);
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
       $piutang = Pembayaran::where('id_penjualan',$request->id_penjualan)->first();
       $piutang->pembayaran = 'cash';
       $piutang->update();

       return redirect('/piutang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
