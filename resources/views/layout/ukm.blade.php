@extends('layout.backend')



@section('namauser')
    <span style="color:lightgray"> Hai, Admin UKM {{ Session::get('NAMA_UKM') }}</span>

@endsection

@section('pengaturan')
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fas fa-cog"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">Pengaturan</span>
        <div class="dropdown-divider"></div>
            <a href="{{ route('ganti.password_ukm') }}" class="dropdown-item">
                <i class="fas fa-key mr-3"></i> Ganti Password
            </a>
        <div class="dropdown-divider"></div>
            <a href="{{ route('Pengaturan.UKM') }}" class="dropdown-item">
                <i class="fas fa-users mr-3"></i>Pengaturan Akun
            </a>
        <div class="dropdown-divider"></div>
            <a href="{{ route('user.logout') }}" class="dropdown-item">
                <i class="fas fa-sign-out-alt mr-3 "></i> Keluar
            </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">Sistem Informasi UKM</a>
    </div>
@endsection

@section('menu')
    {{-- <li class="nav-item  ">
        <a href="{{ route('ukm.dashboard') }}" class="nav-link {{ set_active('ukm.dashboard') }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Dashboard
        </p>
        </a>
    </li> --}}
    <li class="nav-item">
        <a href="{{ route('permintaan.masuk',$NAMA_UKM=Session::get('NAMA_UKM')) }}" class="nav-link {{ set_active('permintaan.masuk') }}">
            <i class="nav-icon fas fa-user-plus"></i>
            <p>
            Permintaan Masuk UKM
            </p>
        </a>
        <li class="nav-item ">
            <a href="{{ route('list.anggota',$NAMA_UKM=Session::get('NAMA_UKM'))}}" class="nav-link {{ set_active('list.anggota') }}">
            <i class="far fas fa-users nav-icon"></i>
            <p>
                List Anggota UKM
            </p>
            </a>
        </li>
@endsection


