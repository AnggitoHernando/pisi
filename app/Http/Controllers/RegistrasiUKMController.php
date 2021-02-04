<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\ukm;
use File;

class RegistrasiUKMController extends Controller
{
    public function regis()
    {
        return view('halamandepan/registerukm');
    }

    public function tambah(Request $request)
    {
        $messages = [
            'numeric' => ':Attribute harus Diisi Dengan Angka',
            'email' => ':Attribute Format Salah',
        ];

        $this->validate($request,[
            'tahun' => 'numeric',
            'email' => 'email'
        ],$messages);

        $ukm = new ukm;
        $ukm->ID_KAMPUS ='1';
        $ukm->NAMA_UKM =$request->nama_ukm;
        $ukm->NAMA_KETUA =$request->nama_ketua;
        $ukm->TAHUN_BERDIRI =$request->tahun;
        $ukm->DESKRIPSI_UKM =$request->deskripsi;

        $gambar = $request->logo;
        $namafile = time().'.'.$gambar->getClientOriginalExtension();
        $gambar->move('images/', $namafile);

        $ukm->LOGO = $namafile;
        $ukm->EMAIL_UKM =$request->email;
        $ukm->USERNAME_UKM =$request->username;
        $ukm->PASSWORD_UKM =bcrypt($request->password);
        $ukm->PENDAFTARAN ='Dibuka';
        $ukm->STATUS_UKM ='Tidak Aktif';
        $ukm->save();
        return redirect('/')->with('pesan',"Registrasi Berhasil, Menunggu Persetujuan Kampus");
    }
}
