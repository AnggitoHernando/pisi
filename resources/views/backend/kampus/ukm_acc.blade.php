@extends('layout.kampus')

@section('judul')
<title>Permintaan Akun UKM</title>
@endsection

@section('nama_fitur')
Permintaan Akun UKM
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
          <th>Nama UKM </th>
          <th>Nama Ketua UKM</th>
          <th>Tahun Berdiri</th>
          <th>Deskripsi UKM</th>
          <th>Logo </th>
          <th>Email </th>
          <th>Action </th>

        </tr>
        </thead>
        <tbody>
            @foreach ($ukm as $uk)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <input type="hidden" value="{{ $uk->ID_UKM }}">
                    <td>{{ $uk->NAMA_UKM }}</td>
                    <td>{{ $uk->NAMA_KETUA }}</td>
                    <td>{{ $uk->TAHUN_BERDIRI }}</td>
                    <td><textarea readonly rows="16" cols="28" style="border: none" >{{ $uk->DESKRIPSI_UKM }} </textarea></td>
                    <td><img src="{{ asset('images/'.$uk->LOGO) }}" style="width: 200px"></td>
                    <td>{{ $uk->EMAIL_UKM }}</td>
                    <td>
                        <form class="" action="{{ route('ukm.action',$uk->EMAIL_UKM) }}" method="post" enctype="multipart/form-data" >
                        @csrf
                            <button class="btn btn-success">Terima</button>
                        </form>
                        <form class="" action="{{ route('ukm.action2',$uk->EMAIL_UKM) }}" method="post" enctype="multipart/form-data" >
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
