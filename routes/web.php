<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HalamanDepan@index')->name('hal.depan');
Route::get('/mhs/daftar', 'RegistrasiMhsController@daftar')->name('mhs.daftar');
Route::get('/mhs', 'RegistrasiMhsController@tambah')->name('mhs.add');
Route::get('/ukm/daftar', 'RegistrasiUKMController@regis')->name('ukm.daftar');
Route::post('/ukm', 'RegistrasiUKMController@tambah')->name('ukm.tambah');
Route::get('/HalamanLogin', 'authController@halamanlogin')->name('login');
Route::post('/login', 'authController@postlogin')->name('login.post');
Route::get('/logout', 'authController@logout')->name('user.logout');
Route::get('/ResetPassword', 'authController@resetpassword')->name('reset.password');
Route::post('/Mereset', 'authController@GetReset')->name('get.reset');

Route::group(['prefix' => 'kampus','middleware' => 'CekLogin'], function () {
    Route::get('/dashboard', 'BackendKampusController@dashboard')->name('kampus.dashboard');
    Route::get('/PermintaanAkunMahasiswa', 'BackendKampusController@PermintaanMahasiswa')->name('permintaan_akun');
    Route::get('/PermintaanAkunUKM', 'BackendKampusController@PermintaanUKM')->name('permintaan_akun.UKM');
    Route::get('/ListUKM', 'BackendKampusController@ListUKM')->name('list.ukm');
    Route::post('/mahasiswa/action/{EMAIL_MHS}', 'BackendKampusController@MahasiswaAction')->name('mahasiswa.action');
    Route::post('/mahasiswa/action2/{EMAIL_MHS}', 'BackendKampusController@MahasiswaAction2')->name('mahasiswa.action2');
    Route::post('/ukm/action/{EMAIL_UKM}', 'BackendKampusController@UKMAction')->name('ukm.action');
    Route::post('/ukm/action2/{EMAIL_UKM}', 'BackendKampusController@UKMAction2')->name('ukm.action2');
    Route::get('/ukm/DetailAnggota/{ID_UKM}', 'BackendKampusController@DetailAnggota')->name('detail.anggota');
    Route::get('/PengaturanAkun', 'BackendKampusController@PengaturanAkun')->name('Pengaturan.Kampus');
    Route::post('/EditAkun', 'BackendKampusController@EditAkun')->name('Edit.Kampus');
    Route::get('/GantiPassword', 'BackendKampusController@GantiPassword')->name('ganti.password_kampus');
    Route::post('/GetPassword', 'BackendKampusController@GetPassword')->name('get.password_kampus');
});

Route::group(['prefix' => 'ukm','middleware' => 'CekLogin'], function () {
    Route::get('/dashboard', 'BackendUKMController@dashboard')->name('ukm.dashboard');
    Route::get('/PermintaanMasuk', 'BackendUKMController@permintaanmasuk')->name('permintaan.masuk');
    Route::get('/ListAnggotaUKM/{NAMA_UKM}', 'BackendUKMController@listanggotaukm')->name('list.anggota');
    Route::post('/PermintaanAnggota/action/{ID_ANGGOTA}', 'BackendUKMController@AnggotaAction')->name('anggota.action');
    Route::post('/PermintaanAnggota/action2/{ID_ANGGOTA}', 'BackendUKMController@AnggotaAction2')->name('anggota.action2');
    Route::get('/DetailAnggota/{ID_ANGGOTA}', 'BackendUKMController@DetailAnggota')->name('list.action');
    Route::post('/ListAnggotaUKM/action2/{ID_ANGGOTA}', 'BackendUKMController@ListAction2')->name('list.action2');
    Route::get('/PengaturanAkun', 'BackendUKMController@PengaturanAkun')->name('Pengaturan.UKM');
    Route::post('/EditAkun', 'BackendUKMController@EditAkun')->name('Edit.UKM');
    Route::get('/GantiPassword', 'BackendUKMController@GantiPassword')->name('ganti.password_ukm');
    Route::post('/GetPassword', 'BackendUKMController@GetPassword')->name('get.password_ukm');

});

Route::group(['prefix' => 'mahasiswa','middleware' => 'CekLogin'], function () {
    Route::get('/dashboard', 'BackendMhsController@dashboard')->name('mhs.dashboard');
    Route::get('/JoinUKM', 'BackendMhsController@joinukm')->name('mhs.join');
    Route::post('/JoinUKM/{ID_UKM}', 'BackendMhsController@getUKM')->name('mhs.ukm');
    Route::get('/StatusPendaftaran', 'BackendMhsController@StatusPendaftaran')->name('status.pendaftaran');
    Route::get('/DetailUKM/{ID_UKM}', 'BackendMhsController@detailukm')->name('detail.ukm');
    Route::get('/DetailUKM2/{ID_UKM}', 'BackendMhsController@detailukm2')->name('detail.ukm2');
    Route::get('/ListUKMYangDiikuti/{NIM}', 'BackendMhsController@ListYangDiikuti')->name('list.diikuti');
    Route::get('/PengaturanAkun', 'BackendMhsController@PengaturanAkun')->name('Pengaturan.Mhs');
    Route::post('/EditAkun', 'BackendMhsController@EditAkun')->name('Edit.Mhs');
    Route::get('/GantiPassword', 'BackendMhsController@GantiPassword')->name('ganti.password_mhs');
    Route::post('/GetPassword', 'BackendMhsController@GetPassword')->name('get.password_mhs');
});

