@extends('layout.backend')



@section('namauser')

    <span style="color:lightgray"> Hai, {{ Session::get('NAMA_MHS') }}</span>

@endsection

@section('pengaturan')
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fas fa-cog"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">Pengaturan</span>
        <div class="dropdown-divider"></div>
            <a href="{{ route('ganti.password_mhs') }}" class="dropdown-item">
                <i class="fas fa-key mr-3"></i> Ganti Password
            </a>
        <div class="dropdown-divider"></div>
            <a href="{{ route('Pengaturan.Mhs') }}" class="dropdown-item">
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
            <a href="{{ route('mhs.dashboard') }}" class="nav-link {{ set_active('mhs.dashboard') }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Dashboard
            </p>
            </a>
        </li> --}}
        <li class="nav-item">
            <a href="{{ route('mhs.join') }}" class="nav-link {{ set_active('mhs.join') }} {{ set_active('detail.ukm') }}">
            <i class="nav-icon fas fa-user-plus"></i>
             <p>
            Join UKM
            </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('status.pendaftaran') }}" class="nav-link {{ set_active('status.pendaftaran') }} ">
            <i class="nav-icon fas fa-clock"></i>
             <p>
            Status Pendaftaran UKM
            </p>
            </a>
        </li>
        <li class="nav-item ">
            <a href="{{ route('list.diikuti',$NIM=Session::get('NIM')) }}" class="nav-link {{ set_active('list.diikuti')  }} {{ set_active('detail.ukm2') }}">
            <i class="far fas fa-users nav-icon"></i>
            <p>
                List UKM Yang Diikuti
            </p>
            </a>
        </li>
@endsection


