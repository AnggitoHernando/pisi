@extends('layout.mhs')

@section('judul')
    <title>List UKM Yang Diikuti</title>
@endsection

@section('nama_fitur')
    List UKM Yang Diikuti
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
          <th>Action </th>

        </tr>
        </thead>
        <tbody>
            @foreach ($ukm as $uk)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <input type="hidden" value="{{ $uk->ID_UKM }}">
                    <td><img src="{{ asset('images/'.$uk->LOGO) }}" style="width: 200px"></td>
                    <td>{{ $uk->NAMA_UKM }}</td>
                    <td style="width: 100px">
                        <a href=" {{route('detail.ukm2', $uk->ID_UKM) }}" class="btn btn-info" style="margin-top:20px ">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection

