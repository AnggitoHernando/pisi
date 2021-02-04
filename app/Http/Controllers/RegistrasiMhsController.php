<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\mahasiswa;

class RegistrasiMhsController extends Controller
{
    public function daftar()
    {
        return view('halamandepan.registermhs');
    }

    public function tambah(Request $request)
    {
        $messages = [
            'unique' => ':ATTRIBUTE Sudah Terdaftar',
            'numeric' => ':Attribute harus Diisi Dengan Angka',
            'email' => ':Attribute Format Salah',
        ];

        $this->validate($request,[
            'NIM' => 'unique:mahasiswa',
            'Angkatan' => 'numeric',
            'Email' => 'email',
            'No. Telepon'=>'numeric'
        ],$messages);


        $mhs = new mahasiswa;
        $mhs->NIM =$request->NIM;
        $mhs->NAMA_MHS =$request->mahasiswa;
        $mhs->TTL =$request->ttl;
        $mhs->ALAMAT_MHS =$request->alamat;
        $mhs->PRODI =$request->prodi;
        $mhs->FAKULTAS =$request->fakultas;
        $mhs->ANGKATAN =$request->Angkatan;
        $mhs->NO_TELFON =$request->NO_TELFON;
        $mhs->EMAIL_MHS =$request->Email;
        $mhs->USERNAME_MHS =$request->username;
        $mhs->PASSWORD_MHS =bcrypt($request->pass);
        $mhs->STATUS_MHS ='Tidak Aktif';
        $mhs->save();
        return redirect('/')->with('pesan',"Registrasi Berhasil, Menunggu Persetujuan Kampus");
    }
}
