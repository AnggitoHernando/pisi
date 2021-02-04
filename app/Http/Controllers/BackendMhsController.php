<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AnggotaUKM;
use App\mahasiswa;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class BackendMhsController extends Controller
{
    public function dashboard()
    {
        return view('backend.mahasiswa.dashboard');
    }

    public function joinukm()
    {
        //$ukm=DB::table('ukm')->where('PENDAFTARAN','Dibuka')->get();
        // $anggota=DB::table('anggota_ukm')->get();
        $ukm=DB::table('ukm')
                ->where('ukm.PENDAFTARAN','Dibuka')
                ->get();

        return view('backend.mahasiswa.joinUKM',compact('ukm'));

    }

    public function detailukm2($ID_UKM)
    {
        $ukm=DB::table('ukm')
                ->where('ID_UKM',$ID_UKM)
                ->get();
        return view('backend.mahasiswa.detailukm2',compact('ukm'));
        // echo "BERHASIL MASUK CONTROLLER";
    }
    public function detailukm($ID_UKM)
    {
        $ukm=DB::table('ukm')
        ->where('ID_UKM',$ID_UKM)
        ->get();
        return view('backend.mahasiswa.detailukm',compact('ukm'));
        // echo "BERHASIL MASUK CONTROLLER";
    }

    public function getUKM(Request $request)
    {

        $cek =DB::table('anggota_ukm')->where('NIM',$request->NIM)
        ->where('ID_UKM',$request->id_ukm)
        ->where('STATUS_ANGGOTA','Aktif')->get();

        $cek2= DB::table('anggota_ukm')->where('NIM',$request->NIM)
        ->where('ID_UKM',$request->id_ukm)
        ->where('STATUS_ANGGOTA', $request->status_anggota)->get();


        if (count($cek)>0) {
            return response()->json([
            'bergabung' => 'Anda Sudah Bergabung Pada UKM Ini'
            ]);
        }else if(count($cek2)>0){
            return response()->json([
                'terdaftar' => 'Anda Sudah Mendaftar Pada UKM Ini'
            ]);
        }else{
            $anggota = new AnggotaUKM;
            $anggota->NIM =$request->NIM;
            $anggota->ID_UKM =$request->id_ukm;
            $anggota->STATUS_ANGGOTA ='Tidak Aktif';
            $anggota->save();

            return response()->json([
            'sukses' => 'Berhasil Mendaftar , Menunggu Persetujuan'
             ]);
        }
    }

    public function ListYangDiikuti($NIM)
    {
        $ukm=DB::table('ukm')
               ->leftJoin('anggota_ukm', 'ukm.ID_UKM', '=','anggota_ukm.ID_UKM')
                ->select('anggota_ukm.NIM','ukm.NAMA_UKM','ukm.ID_UKM','anggota_ukm.ID_ANGGOTA','ukm.LOGO','ukm.NAMA_UKM','anggota_ukm.STATUS_ANGGOTA')
                ->where('anggota_ukm.NIM',$NIM)
                ->where('anggota_ukm.STATUS_ANGGOTA','Aktif')
                ->get();
        return view('backend.mahasiswa.ListUKM',compact('ukm'));
    }

    public function PengaturanAkun()
    {
        $NIM= Session::get('NIM');

        $mhs= mahasiswa::where('NIM', $NIM)->get();
        return view('backend.mahasiswa.EditAkunMhs',compact('mhs'));

    }

    public function EditAkun(Request $request)
    {
        $NIM= Session::get('NIM');
        $ukm= mahasiswa::where('NIM', $NIM)->update([
            'NIM' => $request->NIM,
            'NAMA_MHS' => $request->NAMA_MHS,
            'TTL' => $request->ttl,
            'ALAMAT_MHS' => $request->alamat_mhs,
            'PRODI' => $request->prodi,
            'FAKULTAS' => $request->fakultas,
            'ANGKATAN' => $request->angkatan,
            'NO_TELFON' => $request->no_telepon,
            'EMAIL_MHS' => $request->email,
            'USERNAME_MHS' => $request->username,
        ]);
    }

    public function GantiPassword()
    {
        $NIM= Session::get('NIM');

        $mhs= mahasiswa::where('NIM', $NIM)->get();
        return view('backend.mahasiswa.GantiPasswordMhs',compact('mhs'));
    }
    public function GetPassword(Request $request)
    {
        $NIM= Session::get('NIM');
        $mhs= mahasiswa::where('NIM', $NIM)->get();

        foreach ($mhs as $m){

            if((Hash::check($request->password_lama, $m->PASSWORD_MHS))){
                $kampus= mahasiswa::where('NIM', $NIM)->update([
                    'PASSWORD_MHS' => bcrypt($request->password_baru)
                ]);
                $success=true;
                $message="Password Berhasil Diganti";
            }else{
                $success=false;
                $message="Password Lama Salah";
            }
        }
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public function StatusPendaftaran()
    {
        $NIM= Session::get('NIM');
        $ukm=DB::table('ukm')
               ->leftJoin('anggota_ukm', 'ukm.ID_UKM', '=','anggota_ukm.ID_UKM')
                ->select('anggota_ukm.NIM','ukm.NAMA_UKM','ukm.ID_UKM','anggota_ukm.ID_ANGGOTA','ukm.LOGO','ukm.NAMA_UKM','anggota_ukm.STATUS_ANGGOTA')
                ->where('anggota_ukm.NIM',$NIM)
                ->where('anggota_ukm.STATUS_ANGGOTA','Tidak Aktif')
                ->get();
        return view('backend.mahasiswa.StatusPendaftaran',compact('ukm'));
    }

}
