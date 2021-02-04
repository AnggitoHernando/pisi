@extends('layout.ukm')

@section('judul')
@foreach ($ukm as $uk)
    <title>Pengaturan Akun {{ $uk->NAMA_UKM}}</title>
@endforeach
@endsection

@section('nama_fitur')
@foreach ($ukm as $uk)
    Pengaturan Akun {{ $uk->NAMA_UKM}}
<hr>
@endforeach
@endsection

@section('konten')
    @foreach ($ukm as $uk)
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Pengaturan Akun </h3>
        </div>

    <div class="card-body">
        <form id="form" action="{{ route('Edit.UKM') }}" enctype="multipart/form-data" method="POST">
        @csrf
            <input type="hidden" id="id_kam" value="{{ $uk->ID_UKM }}">
            <label for="basic-url" class="form-label">Nama UKM</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="nama_ukm" aria-describedby="basic-addon3" value="{{ $uk->NAMA_UKM}}" name="nama_UKM" readonly>
            </div>
            <label for="basic-url" class="form-label">Nama Ketua</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="nama_ketua" aria-describedby="basic-addon3" value="{{ $uk->NAMA_KETUA}}" name="nama_ketua" readonly>
            </div>
            <label for="basic-url" class="form-label">Tahun Berdiri</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="tahun_berdiri" aria-describedby="basic-addon3" value="{{ $uk->TAHUN_BERDIRI}}" name="tahun_berdiri" readonly>
            </div>
            <label for="basic-url" class="form-label">Deskripsi UKM dan Syarat Gabung</label>
            <div class="input-group mb-3">
                <textarea class="form-control" rows="20" cols="100" id="deskripsi" aria-describedby="basic-addon3"  name="deskripsi_ukm" readonly>{{ $uk->DESKRIPSI_UKM}}</textarea>
            </div>
            <label for="basic-url" class="form-label">Logo</label>
            <div class="input-group mb-3">
                <img src="{{ asset('images/'.$uk->LOGO) }}" alt="Logo UKM" style="width: 300px; margin-right:15px; display: block;" class="img-thumbnail">
            </div>
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="logo" aria-describedby="basic-addon3" name="logo" disabled>
            </div>
            <label for="basic-url" class="form-label">Email UKM</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="email" aria-describedby="basic-addon3" value="{{ $uk->EMAIL_UKM}}" name="email_ukm" readonly>
            </div>
            <label for="basic-url" class="form-label">Username</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="username" aria-describedby="basic-addon3" value="{{ $uk->USERNAME_UKM}}" name="username_UKM" readonly>
            </div>
            <label for="basic-url" class="form-label">Pendaftaran</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="pendaftaran" aria-describedby="basic-addon3" value="{{ $uk->PENDAFTARAN}}" name="pendaftaran" readonly>
            </div>
            <a class="btn btn-secondary" id="edit" style="color: white"> Edit</a>
            <button style="float: right ;color: white" id="simpan" class="btn btn-success">Simpan</button>
            <a style="float: right; color: white; margin-right: 15px" id="batal" class="btn btn-danger">Batal</a>
            {{ csrf_field() }}
        </form>
    </div>


    @endforeach
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
    <script>
    var pass1 =document.getElementById("nama_ukm").value;

    $("#batal").hide();
    $("#simpan").hide();
    $(function(){
      $('#edit').click(function(){
        $('input').removeAttr('readonly','readonly');
        $('#deskripsi').removeAttr('readonly','readonly');
        $('#logo').removeAttr('disabled','disabled');
        $('#batal').show();
        $('#simpan').show();
      });
    });

    $(function(){
      $('#batal').click(function(){
        $('input').attr('readonly',true);
        $('#deskripsi').attr('readonly',true);
        $('#logo').trigger('cancel');
        $('#logo').attr('disabled',true);
        $('#batal').hide();
        $('#simpan').hide();
      });
    });

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
            if(response.gambar){
                $('.img-thumbnail').attr('src', response.gambar).change
            }else if(response.sukses){
                $('#simpan').html('Simpan');
                $('input').attr('readonly',true);
                $('#deskripsi').attr('readonly',true);
                $('#batal').hide();
                $('#simpan').hide();
                swal("Berhasil!",response.sukses,"success");
            }
        }

    });

    })
    </script>
@endsection
