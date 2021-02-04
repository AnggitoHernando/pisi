@extends('layout.backend')



@section('namauser')
    @foreach ($kampus as $ka)
        <span style="color:lightgray"> Hai. {{ $ka->NAMA_KAMPUS }}</span>
    @endforeach
@endsection

@section('pengaturan')
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fas fa-cog"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">Pengaturan</span>
        <div class="dropdown-divider"></div>
            <a href="{{ route('ganti.password_kampus') }}" class="dropdown-item">
                <i class="fas fa-key mr-3"></i> Ganti Password
            </a>
        <div class="dropdown-divider"></div>
            <a href="{{ route('Pengaturan.Kampus') }}" class="dropdown-item">
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
        <a href="{{ route('kampus.dashboard') }}" class="nav-link {{ set_active('kampus.dashboard') }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Dashboard
        </p>
        </a>
    </li> --}}
    <li class="nav-item has-treeview">
        <a href="" class="nav-link ">
            <i class="nav-icon fas fa-user-plus"></i>
            <p>
            Permintaan Akun
            <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ route('permintaan_akun') }}" class="nav-link {{ set_active('permintaan_akun') }}">
                <i class="far fas fa-user nav-icon"></i>
                <p>Mahasiswa</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{ route('permintaan_akun.UKM') }}" class="nav-link {{ set_active('permintaan_akun.UKM') }}">
                <i class="far fas fa-users nav-icon"></i>
                <p>Unit Kegiatan Mahasiswa</p>
            </a>
        </ul>
        </li>
        <li class="nav-item ">
            <a href="{{ route('list.ukm') }}" class="nav-link {{ set_active('list.ukm') }}">
            <i class="far fas fa-users nav-icon"></i>
            <p>
                List Nama UKM
            </p>
            </a>
        </li>
@endsection


