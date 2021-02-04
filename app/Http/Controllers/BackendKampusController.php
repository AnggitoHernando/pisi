<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;
use App\Mail\MailNotify2;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use App\kampus;
use App\mahasiswa;
use App\ukm;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Echo_;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\PseudoTypes\True_;


class BackendKampusController extends Controller
{
    public function dashboard()
    {
        $kampus= kampus::where('ID_KAMPUS', 1)->get();
        return view('backend.kampus.dashboard',compact('kampus'));
    }

    public function PermintaanMahasiswa()
    {
        $kampus= kampus::where('ID_KAMPUS', 1)->get();
        $mahasiswa = mahasiswa::where('STATUS_MHS', 'Tidak Aktif')->get();
        return view('backend.kampus.mahasiswa_acc',compact('kampus','mahasiswa'));
    }
    public function PermintaanUKM()
    {
        $kampus= kampus::where('ID_KAMPUS', 1)->get();
        $ukm = ukm::where('STATUS_UKM', 'Tidak Aktif')->get();
        return view('backend.kampus.ukm_acc',compact('kampus','ukm'));
    }
    public function ListUKM()
    {
        $kampus= kampus::where('ID_KAMPUS', 1)->get();
        $ukm = ukm::where('STATUS_UKM', 'Aktif')->get();
        return view('backend.kampus.KampusListUKM',compact('kampus','ukm'));
    }

    public function MahasiswaAction($EMAIL_MHS)
    {
        $tes=DB::table('mahasiswa')->where('EMAIL_MHS',$EMAIL_MHS)->update([
            'STATUS_MHS' => 'Aktif'
        ]);
        $mhs=$EMAIL_MHS;
        Mail::to($mhs)->send(new MailNotify($mhs));
        return redirect()->to('kampus/PermintaanAkunMahasiswa');
        //echo "Berhasil Masuk Controller";

    }
    public function MahasiswaAction2($EMAIL_MHS)
    {
        $tes=DB::table('mahasiswa')->where('EMAIL_MHS',$EMAIL_MHS)->delete();
        $mhs=$EMAIL_MHS;
        Mail::to($mhs)->send(new MailNotify2($mhs));
        //echo "Berhasil Masuk Controller";
        return redirect()->to('kampus/PermintaanAkunMahasiswa');
    }
    public function UKMAction($EMAIL_UKM)
    {
        $tes=DB::table('ukm')->where('EMAIL_UKM',$EMAIL_UKM)->update([
            'STATUS_UKM' => 'Aktif'
        ]);
        $ukm=$EMAIL_UKM;
        Mail::to($ukm)->send(new MailNotify($ukm));
        return redirect()->to('kampus/PermintaanAkunUKM');
        //echo "Berhasil Masuk Controller";

    }
    public function UKMAction2($EMAIL_UKM)
    {
        $tes=DB::table('ukm')->where('EMAIL_UKM',$EMAIL_UKM)->delete();
        $ukm=$EMAIL_UKM;
        Mail::to($ukm)->send(new MailNotify2($ukm));
        //echo "Berhasil Masuk Controller";
        return redirect()->to('kampus/PermintaanAkunUKM');
    }

    public function DetailAnggota($ID_UKM)
    {
        $kampus= kampus::where('ID_KAMPUS', 1)->get();
        $anggota=DB::table('anggota_ukm')
                    ->join('mahasiswa','anggota_ukm.NIM','=','mahasiswa.NIM')
                    ->join('ukm','anggota_ukm.ID_UKM','=','ukm.ID_UKM')
                    ->select('mahasiswa.NIM','mahasiswa.NAMA_MHS','mahasiswa.TTL','mahasiswa.ALAMAT_MHS','mahasiswa.PRODI','mahasiswa.FAKULTAS','mahasiswa.ANGKATAN','mahasiswa.NO_TELFON','ukm.NAMA_UKM')
                    ->where('anggota_ukm.ID_UKM',$ID_UKM)
                    ->where('anggota_ukm.STATUS_ANGGOTA','Aktif')
                    ->get();

        return view('backend.kampus.DetailAnggota',compact('anggota','kampus'));

    }

    public function PengaturanAkun()
    {
        $kampus= kampus::where('ID_KAMPUS', 1)->get();
        return view('backend.kampus.EditAkunKampus',compact('kampus'));
    }

    public function EditAkun(Request $request)
    {
        $kampus= kampus::where('ID_KAMPUS', 1)->update([
            'NAMA_KAMPUS' => $request->nama_kampus,
            'ALAMAT_KAMPUS' => $request->alamat_kampus,
            'USERNAME_KAMPUS' => $request->username_kampus,
        ]);
    }

    public function GantiPassword()
    {
        $kampus= kampus::where('ID_KAMPUS', 1)->get();
        return view('backend.kampus.GantiPassword',compact('kampus'));
    }
    public function GetPassword(Request $request)
    {
        $kampus= kampus::where('ID_KAMPUS', 1)->get();

        foreach ($kampus as $kam){

            if((Hash::check($request->password_lama, $kam->PASSWORD_KAMPUS))){
                $kampus= kampus::where('ID_KAMPUS', 1)->update([
                    'PASSWORD_KAMPUS' => bcrypt($request->password_baru)
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
