<?php

namespace App\Http\Controllers;

use App\Models\toko;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class StockTokoController extends Controller
{
    public function index()
    {
        $notif1 = Pembayaran::where('pembayaran','piutang')->count();
        $active = 'stock_toko';
        return view('toko.toko-kasir', compact('notif1','active'));
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
            
            ->rawColumns(['kode_produk',])
            ->make(true);
    }

}
