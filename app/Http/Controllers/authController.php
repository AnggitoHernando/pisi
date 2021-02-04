<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\kampus;
use App\mahasiswa;
use App\UKM;
use Illuminate\Http\Request;
use DB;

class authController extends Controller
{
    use AuthenticatesUsers;
    public function username()
    {
        return 'USERNAME_KAMPUS';
    }
    public function login()
    {
    	return view('auth.login2')->with('sukses','Anda Berhasil Login');
    }

    public function halamanlogin()
    {
    	return view('halamandepan.login');
    }

    public function postlogin(Request $request)
    {
        $data= kampus::where('USERNAME_KAMPUS',$request->username)->where('PASSWORD_KAMPUS',Hash::check($request->password, 'PASSWORD_KAMPUS'))->get();
        $data1= mahasiswa::where('USERNAME_MHS',$request->username)->where('PASSWORD_MHS',Hash::check($request->password, 'PASSWORD_MHS'))->where('STATUS_MHS','Aktif')->get();
        $data2= UKM::where('USERNAME_UKM',$request->username)->where('PASSWORD_UKM',Hash::check($request->password, 'PASSWORD_UKM'))->where('STATUS_UKM','Aktif')->get();

       if(count($data)>0){
           foreach ($data as $dat ) {
            if((Hash::check($request->password, $dat->PASSWORD_KAMPUS))){
                session(['berhasil_login' => true]);
                return redirect()->route('permintaan_akun');
            }else{
                return redirect('/HalamanLogin')->with('pesan','Password Salah');
            }
           }
        }else if(count($data1)>0){
            foreach ($data1 as $dat){
                if((Hash::check($request->password, $dat->PASSWORD_MHS))){
                    session([
                        'berhasil_login' => true,
                        'NAMA_MHS' => $dat->NAMA_MHS,
                        'NIM' => $dat->NIM,
                        'ALAMAT_MHS' => $dat->ALAMAT_MHS,
                        'EMAIL_MHS' => $dat->EMAIL_MHS,
                        'TTL' => $dat->TTL,
                        'FAKULTAS' => $dat->FAKULTAS,
                        'PRODI' => $dat->PRODI,
                        'NO_TELFON' => $dat->NO_TELFON,
                        'USERNAME_MHS' => $dat->USERNAME_MHS,
                        'PASSWORD_MHS' => $dat->PASSWORD_MHS
                    ]);

                    return redirect()->route('mhs.join');
                }else{
                    return redirect('/HalamanLogin')->with('pesan','Password Salah');
                }
            }
        }else if(count($data2)>0){

            foreach ($data2 as $ukm){
                if((Hash::check($request->password, $ukm->PASSWORD_UKM))){
                    session([
                        'berhasil_login' => true,
                        'ID_UKM' => $ukm->ID_UKM,
                        'NAMA_UKM' => $ukm->NAMA_UKM,
                        'NAMA_KETUA' => $ukm->NAMA_KETUA,
                        'TAHUN_BERDIRI' => $ukm->TAHUN_BERDIRI,
                        'DESKRIPSI_UKM' => $ukm->DESKRIPSI_UKM,
                        'LOGO' => $ukm->LOGO,
                        'EMAIL_UKM' => $ukm->EMAIL_UKM,
                        'USERNAME_UKM' => $ukm->USERNAME_UKM,
                        'PASSWORD_UKM' => $ukm->PASSWORD_UKM,
                        'PENDAFTARAN' => $ukm->PENDAFTARAN,
                    ]);
                    return redirect()->route('permintaan.masuk');
                }else{
                    return redirect('/HalamanLogin')->with('pesan','Password Salah');
                }
            }
        }
        return redirect('/HalamanLogin')->with('pesan','Maaf Username Belum Terdaftar');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/HalamanLogin');
    }

    public function resetpassword()
    {
        return view('halamandepan.resetpassword');
    }

    public function GetReset(Request $request)
    {
        $data1= mahasiswa::where('EMAIL_MHS',$request->email)->get();
        $data2= UKM::where('EMAIL_UKM',$request->email)->get();
        if(count($data1)>0){
            $kampus= mahasiswa::where('EMAIL_MHS', $request->email)->update([
                'PASSWORD_MHS' => bcrypt($request->password)
            ]);
            return response()->json([
               'sukses' => 'Password Berhasil Direset'
            ]);
        }else if(count($data2)>0){
            $kampus= ukm::where('EMAIL_UKM', $request->email)->update([
                'PASSWORD_UKM' => bcrypt($request->password)
            ]);
            return response()->json([
               'sukses' => 'Password Berhasil Direset'
            ]);
        }else{
            return response()->json([
                'gagal' => 'Email Tidak Terdaftar'
             ]);
        }
    }


}
