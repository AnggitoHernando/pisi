@extends('layout.kampus')

@section('judul')
<title>List Anggota UKM</title>
@endsection

@section('nama_fitur')
List Anggota UKM
<hr>
@endsection


@section('konten')

    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title"></h3>
        </div>

    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>No.</th>
          <th>NIM</th>
          <th>Nama Mahasiswa</th>
          <th>Tempat Tanggal Lahir</th>
          <th>Alamat</th>
          <th>Prodi</th>
          <th>Fakultas</th>
          <th>Angkatan/Tahun Masuk</th>
          <th>No. Telepon</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($anggota as $ang)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $ang->NIM }}</td>
                    <td>{{ $ang->NAMA_MHS }}</td>
                    <td>{{ $ang->TTL }}</td>
                    <td>{{ $ang->ALAMAT_MHS }}</td>
                    <td>{{ $ang->PRODI }}</td>
                    <td>{{ $ang->FAKULTAS }}</td>
                    <td>{{ $ang->ANGKATAN }}</td>
                    <td>{{ $ang->NO_TELFON }}</td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
