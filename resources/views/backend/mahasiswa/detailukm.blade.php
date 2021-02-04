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
            <form class="" id="form" action="{{ route('mhs.ukm',$uk->ID_UKM) }}" method="post" enctype="multipart/form-data" >
                @csrf
                <input type="hidden" name="NIM" value="{{ Session::get('NIM')}}">
                <input type="hidden" name="id_ukm" value="{{ $uk->ID_UKM}}">
                <button class="btn btn-success" style="float: right;">Join </button>
            </form>


        </div>
    @endforeach
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
