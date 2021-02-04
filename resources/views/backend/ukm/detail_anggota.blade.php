@extends('layout.ukm')

@section('judul')
    @foreach ($tes as $uk)
        <title> Detail {{ $uk->NAMA_MHS }}</title>

    @endforeach
@endsection

@section('nama_fitur')
    @foreach ($tes as $uk)
        Detail {{ $uk->NAMA_MHS }}
    @endforeach
@endsection

@section('konten')

    @foreach ($tes as $uk)
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Detail {{ $uk->NAMA_MHS}} </h3>
            </div>

        <div class="card-body">
            <h4>NIM Mahasiswa           :{{ $uk->NIM }}</h4>
            <h4>Nama Mahasiswa          :{{ $uk->NAMA_MHS }}</h4>
            <h4>Tempat Tanggal Lahir    :{{ $uk->TTL }}</h4>
            <h4>Alamat                  :{{ $uk->ALAMAT_MHS }}</h4>
            <h4>Fakultas                :{{ $uk->FAKULTAS }}</h4>
            <h4>Prodi                   :{{ $uk->PRODI }}</h4>
            <h4>Tahun Masuk/Angkatan    :{{ $uk->ANGKATAN }}</h4>
            <a class="btn btn-success" style="float: right;" href="{{ route('list.anggota',$NAMA_UKM=Session::get('NAMA_UKM')) }}">Kembali </a>

        </div>
    @endforeach
@endsection
