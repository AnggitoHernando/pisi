@extends('layout.mhs')

@section('judul')
    <title>Join UKM</title>
@endsection

@section('nama_fitur')
    Join UKM
@endsection

@section('konten')

    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">List UKM</h3>
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
                        <form class="" action="{{ route('mhs.ukm',$uk->ID_UKM) }}" id="form" method="post" enctype="multipart/form-data" >
                        @csrf
                            <input type="hidden" name="NIM" value="{{ Session::get('NIM')}}">
                            <input type="hidden" name="id_ukm" value="{{ $uk->ID_UKM}}">
                            <input type="hidden" name="status_anggota" value="Tidak Aktif">
                            <button class="btn btn-success" id="join" >Join </button>
                            <a href=" {{route('detail.ukm', $uk->ID_UKM) }}" class="btn btn-info" style="margin-top:20px ">Detail</a>
                        </form>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>


  <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
  <script>
      $(document).on('submit','#form',function(e){
        e.preventDefault();
        let url =$(this).attr('action')
        let form = new FormData(this)

        $.ajaxSetup({

        headers: {
            'X-CRSF-TOKEN' : $('meta[name="crsf-token"]').attr('content')
        }

    })

    $.ajax({
        type:"POST",
        url: url,
        data:form,
        dataType: "JSON",
        processData:false,
        contentType:false,
        success: function(response){
            //console.log(response)
            if(response.bergabung){
                swal("Gagal",response.bergabung,"error");
            }else if(response.terdaftar){
                swal("Info",response.terdaftar,"info");
            }else if(response.sukses){
                swal("Berhasil",response.sukses,"success");
            }
        }

    });

    })
  </script>
@endsection

