@extends('layout.ukm')

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
            <h3 class="card-title">Data Anggota UKM</h3>
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
          <th>Status</th>
          <th>Action </th>

        </tr>
        </thead>
        <tbody>
            @foreach ($anggota as $ang)
                <tr>
                    <input type="hidden" value="{{ $ang->ID_ANGGOTA }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $ang->NIM }}</td>
                    <td>{{ $ang->NAMA_MHS }}</td>
                    <td>{{ $ang->TTL }}</td>
                    <td>{{ $ang->ALAMAT_MHS }}</td>
                    <td>{{ $ang->PRODI }}</td>
                    <td>{{ $ang->FAKULTAS }}</td>
                    <td>{{ $ang->ANGKATAN }}</td>
                    <td>{{ $ang->STATUS_ANGGOTA }}</td>
                    <td>

                        <a class="btn btn-info" href="{{route('list.action',$ang->ID_ANGGOTA)}}">Detail Anggota</a>

                         <form class="" action="{{ route('list.action2',$ang->ID_ANGGOTA) }}" method="post" enctype="multipart/form-data" >
                        @csrf

                            <button class="btn btn-danger" style="margin-top: 15px" onclick="return confirm('Yakin Anggota Akan Dihapus??')">Hapus Anggota </button>
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
