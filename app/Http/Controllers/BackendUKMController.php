<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ukm;
use App\AnggotaUKM;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Image;


class BackendUKMController extends Controller
{
    public function dashboard()
    {
        return view('backend.ukm.dashboard');
    }

    public function permintaanmasuk()
    {
        // $anggota = AnggotaUKM::where('STATUS_ANGGOTA', 'Tidak Aktif')->get();
        $NAMA_UKM= Session::get('NAMA_UKM');
        $anggota= DB::table('anggota_ukm')
                    ->join('mahasiswa', 'anggota_ukm.NIM', '=','mahasiswa.NIM')
                    ->join('ukm', 'anggota_ukm.ID_UKM', '=','ukm.ID_UKM')
                    ->select('mahasiswa.NIM','anggota_ukm.ID_ANGGOTA','ukm.NAMA_UKM','mahasiswa.NAMA_MHS','mahasiswa.TTL','mahasiswa.ALAMAT_MHS','mahasiswa.PRODI','mahasiswa.FAKULTAS','mahasiswa.ANGKATAN','anggota_ukm.STATUS_ANGGOTA')
                    ->where('NAMA_UKM',$NAMA_UKM)
                    ->where('anggota_ukm.STATUS_ANGGOTA','Tidak Aktif')
                    ->get();
        return view('backend.ukm.anggota_acc',compact('anggota'));
    }
    public function listanggotaukm($NAMA_UKM)
    {
        // $anggota = AnggotaUKM::where('STATUS_ANGGOTA', 'Tidak Aktif')->get();
        $anggota= DB::table('anggota_ukm')
                    ->join('mahasiswa', 'anggota_ukm.NIM', '=','mahasiswa.NIM')
                    ->join('ukm', 'anggota_ukm.ID_UKM', '=','ukm.ID_UKM')
                    ->select('mahasiswa.NIM','ukm.NAMA_UKM','anggota_ukm.ID_ANGGOTA','mahasiswa.NAMA_MHS','mahasiswa.TTL','mahasiswa.ALAMAT_MHS','mahasiswa.PRODI','mahasiswa.FAKULTAS','mahasiswa.ANGKATAN','anggota_ukm.STATUS_ANGGOTA')
                    ->where('ukm.NAMA_UKM',$NAMA_UKM)
                    ->where('anggota_ukm.STATUS_ANGGOTA','Aktif')
                    ->get();
        return view('backend.ukm.ListAnggota',compact('anggota'));
    }

    public function AnggotaAction($ID_ANGGOTA)
    {
        $tes=DB::table('anggota_ukm')->where('ID_ANGGOTA',$ID_ANGGOTA)->update([
            'STATUS_ANGGOTA' => 'Aktif'
        ]);
        $NAMA_UKM = Session::get('NAMA_UKM');
        return redirect()->route('permintaan.masuk',$NAMA_UKM);
    }
    public function AnggotaAction2($ID_ANGGOTA)
    {
        $NAMA_UKM = Session::get('NAMA_UKM');
        $tes=DB::table('anggota_ukm')->where('ID_ANGGOTA',$ID_ANGGOTA)->delete();
        return redirect()->route('permintaan.masuk',$NAMA_UKM);
    }
    public function DetailAnggota($ID_ANGGOTA)
    {
        $tes=DB::table('anggota_ukm')
        ->join('mahasiswa', 'anggota_ukm.NIM', '=','mahasiswa.NIM')
        ->join('ukm', 'anggota_ukm.ID_UKM', '=','ukm.ID_UKM')
        ->select('mahasiswa.NIM','ukm.NAMA_UKM','anggota_ukm.ID_ANGGOTA','mahasiswa.NAMA_MHS','mahasiswa.TTL','mahasiswa.ALAMAT_MHS','mahasiswa.PRODI','mahasiswa.FAKULTAS','mahasiswa.ANGKATAN','anggota_ukm.STATUS_ANGGOTA')
        ->where('anggota_ukm.ID_ANGGOTA',$ID_ANGGOTA)
        ->get();
        return view('backend.ukm.detail_anggota',compact('tes'));

    }
    public function ListAction2($ID_ANGGOTA)
    {
        $NAMA_UKM = Session::get('NAMA_UKM');
        $tes=DB::table('anggota_ukm')->where('ID_ANGGOTA',$ID_ANGGOTA)->delete();
        return redirect()->route('list.anggota',$NAMA_UKM);
    }

    public function PengaturanAkun()
    {
        $ID_UKM= Session::get('ID_UKM');

        $ukm= ukm::where('ID_UKM', $ID_UKM)->get();
        return view('backend.ukm.EditAkunUKM',compact('ukm'));

    }

    public function EditAkun(Request $request)
    {
        $ID_UKM= Session::get('ID_UKM');
        $logo=$request->file('logo');
        if($logo){
            $namafile = time().'.'.$logo->getClientOriginalExtension();
            $logo->move('images/', $namafile);
            $data= ukm::where('ID_UKM', $ID_UKM)->get();

            foreach($data as $dat){
                if($dat->LOGO){
                    $dihapus=$dat->LOGO;
                    File::delete('images/'.$dihapus);
                    $dat->LOGO=$namafile;
                }else{
                    $dat->LOGO=$namafile;

                }
                ukm::where('ID_UKM', $ID_UKM)->update([
                    'LOGO' => $namafile
                ]);
                return response()->json([
                'gambar' => asset('images/'.$namafile)
            ]);
            }
        }
        $ukm= ukm::where('ID_UKM', $ID_UKM)->update([
            'NAMA_UKM' => $request->nama_UKM,
            'NAMA_KETUA' => $request->nama_ketua,
            'TAHUN_BERDIRI' => $request->tahun_berdiri,
            'DESKRIPSI_UKM' => $request->deskripsi_ukm,
            'EMAIL_UKM' => $request->email_ukm,
            'USERNAME_UKM' => $request->username_UKM,
            'PENDAFTARAN' => $request->pendaftaran,
        ]);
            return response()->json([
                'sukses' => 'Data Berhasil Diganti'
            ]);

    }

    public function GantiPassword()
    {
        $ID_UKM= Session::get('ID_UKM');

        $ukm= ukm::where('ID_UKM', $ID_UKM)->get();
        return view('backend.ukm.GantiPasswordUKM',compact('ukm'));
    }
    public function GetPassword(Request $request)
    {
        $ID_UKM= Session::get('ID_UKM');
        $ukm= ukm::where('ID_UKM', $ID_UKM)->get();

        foreach ($ukm as $uk){

            if((Hash::check($request->password_lama, $uk->PASSWORD_UKM))){
                $kampus= ukm::where('ID_UKM', $ID_UKM)->update([
                    'PASSWORD_UKM' => bcrypt($request->password_baru)
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

}
