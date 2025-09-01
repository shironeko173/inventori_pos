<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        $notif1 = Pembayaran::where('pembayaran','piutang')->count();
        $active = 'satuan';
        return view('satuan.index', compact('notif1','active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function data()
    {
        $satuan = Satuan::orderBy('id_satuan', 'desc')->get();

        return datatables()
            ->of($satuan)
            ->addIndexColumn()
            ->addColumn('aksi', function ($satuan) {
                return '
                <div class="btn-group">
                    <button onclick="editForm(`'. route('satuan.update', $satuan->id_satuan) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button onclick="deleteData(`'. route('satuan.destroy', $satuan->id_satuan) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
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
        $satuan = new Satuan();
        $satuan->nama_satuan = $request->nama_satuan;
        $satuan->jmlh_satuan = $request->jmlh_satuan;
        $satuan->save();

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $satuan = Satuan::find($id);

        return response()->json($satuan);
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
        $satuan = Satuan::find($id);
        $satuan->nama_satuan = $request->nama_satuan;
        $satuan->jmlh_satuan = $request->jmlh_satuan;
        $satuan->update();

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $satuan = Satuan::find($id);
        $satuan->delete();

        return response(null, 204);
    }
}
