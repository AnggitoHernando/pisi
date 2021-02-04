@extends('layout.mhs')

@section('judul')
    <title>Status Pendaftaran UKM</title>
@endsection

@section('nama_fitur')
    Status Pendaftaran UKM
@endsection

@section('konten')

    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">List UKM Yang Diikuti</h3>
        </div>

    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>No.</th>
          <th>Logo</th>
          <th>Nama UKM</th>
          <th>Status</th>

        </tr>
        </thead>
        <tbody>
            @foreach ($ukm as $uk)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <input type="hidden" value="{{ $uk->ID_UKM }}">
                    <td><img src="{{ asset('images/'.$uk->LOGO) }}" style="width: 200px"></td>
                    <td>{{ $uk->NAMA_UKM }}</td>
                    <td>@if($uk->STATUS_ANGGOTA == 'Tidak Aktif')
                                Menunggu Persetujuan
                            @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection

