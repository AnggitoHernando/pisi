@extends('layout.kampus')

@section('judul')
<title>List UKM</title>
@endsection

@section('nama_fitur')
List UKM
<hr>
@endsection


@section('konten')

    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Data Unit Kegiatan Mahasiswa</h3>
        </div>

    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>No.</th>
          <th>Nama UKM </th>
          <th>Nama Ketua UKM</th>
          <th>Tahun Berdiri</th>
          <th>Deskripsi UKM</th>
          <th>Logo </th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($ukm as $uk)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $uk->NAMA_UKM }}</td>
                    <td>{{ $uk->NAMA_KETUA }}</td>
                    <td>{{ $uk->TAHUN_BERDIRI }}</td>
                    <td><textarea readonly rows="16" cols="28" style="border: none" >{{ $uk->DESKRIPSI_UKM }} </textarea></td>
                    <td><img src="{{ asset('images/'.$uk->LOGO) }}" style="width: 200px"></td>
                    <td>
                        <a href="{{ route('detail.anggota', $uk->ID_UKM) }}" class="btn btn-info">List Anggota</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
