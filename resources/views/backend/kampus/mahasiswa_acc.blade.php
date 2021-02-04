@extends('layout.kampus')

@section('judul')
    <title>Permintaan Akun MHS</title>
@endsection

@section('nama_fitur')
    Permintaan Akun Mahasiswa
    <hr>
@endsection

@section('konten')

    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Data Permintaan Persetujuan Akun</h3>
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
          <th>Email </th>
          <th>Action </th>

        </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswa as $mhs)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $mhs->NIM }}</td>
                    <td>{{ $mhs->NAMA_MHS }}</td>
                    <td>{{ $mhs->TTL }}</td>
                    <td>{{ $mhs->ALAMAT_MHS }}</td>
                    <td>{{ $mhs->PRODI }}</td>
                    <td>{{ $mhs->FAKULTAS }}</td>
                    <td>{{ $mhs->ANGKATAN }}</td>
                    <td>{{ $mhs->EMAIL_MHS }}</td>
                    <td><form class="" action="{{ route('mahasiswa.action',$mhs->EMAIL_MHS) }}" method="post" enctype="multipart/form-data" >
                        @csrf

                        <button class="btn btn-success">Terima</button>
                    </form>
                    <form class="" action="{{ route('mahasiswa.action2',$mhs->EMAIL_MHS) }}" method="post" enctype="multipart/form-data"  >
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
