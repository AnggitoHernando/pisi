@extends('layout.ukm')

@section('judul')
    <title>Permintaan Anggota UKM</title>
@endsection

@section('nama_fitur')
    Permintaan Anggota UKM
    <hr>
@endsection

@section('konten')

    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Data Permintaan Persetujuan Anggota UKM</h3>
        </div>

    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>No.</th>
          <th>NIM</th>
          <th>Nama Mahasiswa</th>
          <th>Tempat Tanggal Lahir</th>
          <th>Alamat Mahasiswa</th>
          <th>Prodi</th>
          <th>Fakultas</th>
          <th>Angkatan</th>
          <th>Action </th>

        </tr>
        </thead>
        <tbody>
            @foreach ($anggota as $ang)
                <tr>
                    <input type="hidden" value="{{ $ang->ID_ANGGOTA }}">
                    <input type="hidden" value="{{ $ang->NAMA_UKM }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $ang->NIM }}</td>
                    <td>{{ $ang->NAMA_MHS }}</td>
                    <td>{{ $ang->TTL }}</td>
                    <td>{{ $ang->ALAMAT_MHS }}</td>
                    <td>{{ $ang->PRODI }}</td>
                    <td>{{ $ang->FAKULTAS }}</td>
                    <td>{{ $ang->ANGKATAN }}</td>
                    <td><form class="" action="{{ route('anggota.action',$ang->ID_ANGGOTA) }}" method="post" enctype="multipart/form-data" >
                        @csrf

                        <button class="btn btn-success">Terima</button>
                    </form>
                    <form class="" action="{{ route('anggota.action2',$ang->ID_ANGGOTA) }}" method="post" enctype="multipart/form-data" >
                        @csrf

                        <button class="btn btn-danger" style="margin-top: 15px">Tolak </button>
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
