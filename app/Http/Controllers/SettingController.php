<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index()
    {
        $notif1 = Pembayaran::where('pembayaran','piutang')->count();
        $active = 'setting';
        return view('setting.index', compact('notif1','active'));
    }

    public function show()
    {
        return Setting::first();
    }

    public function update(Request $request)
    {
        $setting = Setting::first();
        $setting->nama_perusahaan = $request->nama_perusahaan;
        $setting->telepon = $request->telepon;
        $setting->alamat = $request->alamat;
        $setting->diskon = $request->diskon;
        $setting->tipe_nota = $request->tipe_nota;

        $validator = Validator::make($request->all(), [
            'path_logo' => 'image|file|max:1000'
        ]);
        
        if ($validator->fails()) {
            return response()->json('Foto harus berupa image dan tidak lebih dari 1 Mb.', 422);
        } else {
            if ($request->hasFile('path_logo')) {
            $file = $request->file('path_logo');
            $nama = 'logo-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/img'), $nama);

            $setting->path_logo = "/img/$nama";
            }
            
            if ($request->hasFile('path_kartu_member')) {
            $file = $request->file('path_kartu_member');
            $nama = 'logo-' . date('Y-m-dHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/img'), $nama);

            $setting->path_kartu_member = "/img/$nama";
        }
    
    
            $setting->update();

            return response()->json('Data berhasil disimpan', 200);
    }

    }
}
