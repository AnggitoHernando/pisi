@extends('layout.mhs')

@section('judul')
    @foreach ($ukm as $uk)
        <title> Detail UKM {{ $uk->NAMA_UKM }}</title>

    @endforeach
@endsection

@section('nama_fitur')
    @foreach ($ukm as $uk)
        Detail UKM {{ $uk->NAMA_UKM }}
    @endforeach
@endsection

@section('konten')

    @foreach ($ukm as $uk)
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Detail UKM {{ $uk->NAMA_UKM}} </h3>
            </div>

        <div class="card-body">
            <img src="{{ asset('images/'.$uk->LOGO) }}" alt="Logo UKM" style="width: 300px; margin-left: auto; margin-right: auto; display: block;">
            <h4 style="margin-top: 20px">Nama UKM         :{{ $uk->NAMA_UKM }}</h4>
            <h4>Ketua            :{{ $uk->NAMA_KETUA }}</h4>
            <h4>Tahun Berdiri    :{{ $uk->TAHUN_BERDIRI }}</h4>
            <h4>Deskripsi dan Syarat Gabung:</h4>
            <textarea readonly rows="20" cols="100" class="detail" style="border: none; font-size: 1.5rem">{{ $uk->DESKRIPSI_UKM }}</textarea>
            <a class="btn btn-success" style="float: right;" href="{{ route('list.ukm',$NIM=Session::get('NIM')) }}">Kembali </a>

        </div>
    @endforeach
@endsection
