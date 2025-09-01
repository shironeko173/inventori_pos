<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Satuan;
use App\Models\Supplier;
use App\Models\Pembelian;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Models\PembelianDetail;

class PembelianDetailController extends Controller
{
    public function index()
    {
        $notif1 = Pembayaran::where('pembayaran','piutang')->count();
        $active = 'pembelian';
        $id_pembelian = session('id_pembelian');
        $produk = Produk::orderBy('nama_produk')->get();
        $supplier = Supplier::find(session('id_supplier'));
        $diskon = Pembelian::find($id_pembelian)->diskon ?? 0;

        if (! $supplier) {
            abort(404);
        }

        return view('pembelian_detail.index', compact('notif1','active','id_pembelian', 'produk', 'supplier', 'diskon'));
    }

    public function data($id)
    {
        $detail = PembelianDetail::with('produk')
            ->where('id_pembelian', $id)
            ->get();
        $data = array();
        $total = 0;
        $total_item = 0;

        //function multiunits
        function fill_unit_select()
        {
            $output = '';
            $satuan = Satuan::all();

            foreach($satuan as $row)
            {
                $output .= '<option value="'.$row["id_satuan"].'">'.$row["nama_satuan"].'</option>';
            }

            return $output;
        }

        //for on change satuan
        $satuan_key = 1;
        $jmlh_key = 1;

        //for on input jmlh satuan
        $satuan_num = 1;
        $jmlh_num = 1;


        foreach ($detail as $item) {
            $row = array();
            $row['kode_produk'] = '<span class="label label-success">'. $item->produk['kode_produk'] .'</span';
            $row['nama_produk'] = $item->produk['nama_produk'];
            $row['harga_beli']  = 'Rp. '. format_uang($item->harga_beli);
            $row['satuan']      = '<select class="form-control input-sm satuan" 
                                    id="satuan'.$satuan_num++.'" 
                                    data-name="jumlah'.$satuan_key++.'" 
                                    data-id="'. $item->id_pembelian_detail .'">  

                                    <option style="background-color: #3c8dbc; color: white;" value="'.$item->id_satuan.'">'.$item->nama_satuan.'</option>
                                    '. fill_unit_select().'

                                    </select>';
            
            $row['jumlah_satuan']   = '<input type="number" class="form-control input-sm quantity" 
                                    id="jumlah'.$jmlh_key++.'" 
                                    data-name="satuan'.$jmlh_num++.'" 
                                    data-id="'. $item->id_pembelian_detail .'" value="'. $item->jumlah_satuan .'">';

            $row['jumlah']      = '<input type="text" class="form-control input-sm" value="'. format_uang($item->jumlah) .'" readonly>';
            $row['subtotal']    = 'Rp. '. format_uang($item->subtotal);
            $row['aksi']        = '<div class="btn-group">
                                    <button onclick="deleteData(`'. route('pembelian_detail.destroy', $item->id_pembelian_detail) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                                </div>';
            $data[] = $row;

            $total += $item->harga_beli * $item->jumlah;
            $total_item += $item->jumlah;
        }
        $data[] = [
            'kode_produk' => '
                <div class="total hide">'. $total .'</div>
                <div class="total_item hide">'. $total_item .'</div>',
            'nama_produk' => '',
            'harga_beli'  => '',
            'satuan'      => '',
            'jumlah_satuan'      => '',
            'jumlah'      => '',
            'subtotal'    => '',
            'aksi'        => '',
        ];

        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->rawColumns(['aksi', 'kode_produk', 'satuan','jumlah_satuan', 'jumlah'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $produk = Produk::where('id_produk', $request->id_produk)->first();
        if (! $produk) {
            return response()->json('Data gagal disimpan', 400);
        }

        $detail = new PembelianDetail();
        $detail->id_pembelian = $request->id_pembelian;
        $detail->id_produk = $produk->id_produk;
        $detail->harga_beli = $produk->harga_beli;
        $detail->jumlah = 1;
        $detail->id_satuan = 1;
        $detail->nama_satuan = 'pcs';
        $detail->jumlah_satuan = 1;
        $detail->subtotal = $produk->harga_beli;
        $detail->save();

        return response()->json('Data berhasil disimpan', 200);
    }

    public function update(Request $request, $id)
    {
        // $id_satuan = $request->id_satuan;
        $satuans = Satuan::where('id_satuan','=', $request->id_satuan)->first();
        $total = $satuans->jmlh_satuan * $request->jumlah;

        $detail = PembelianDetail::find($id);
        $detail->id_satuan = $request->id_satuan;
        $detail->nama_satuan = $satuans->nama_satuan;
        $detail->jumlah_satuan = $request->jumlah;
        $detail->jumlah = $total;
        $detail->subtotal = $detail->harga_beli * $total;
        $detail->update();
    }

    public function destroy($id)
    {
        $detail = PembelianDetail::find($id);
        $detail->delete();

        return response(null, 204);
    }

    public function loadForm($diskon, $total)
    {
        $bayar = $total - ($diskon / 100 * $total);
        $data  = [
            'totalrp' => format_uang($total),
            'bayar' => $bayar,
            'bayarrp' => format_uang($bayar),
            'terbilang' => ucwords(terbilang($bayar). ' Rupiah')
        ];

        return response()->json($data);
    }
}
