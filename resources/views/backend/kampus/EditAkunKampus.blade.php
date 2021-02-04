@extends('layout.kampus')

@section('judul')
<title>Pengaturan Akun</title>
@endsection

@section('nama_fitur')
Pengaturan Akun
<hr>
@endsection

@section('konten')
    @foreach ($kampus as $kam)
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Pengaturan Akun</h3>
        </div>

    <div class="card-body">
        <form class="registrasi-form" enctype="multipart/form-data" id="frm_edit" >
        @csrf
            <input type="hidden" id="id_kam" value="{{ $kam->ID_KAMPUS }}">
            <label for="basic-url" class="form-label">Nama Kampus</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="basic-url kampus" aria-describedby="basic-addon3" value="{{ $kam->NAMA_KAMPUS}}" name="nama_kampus" readonly>
            </div>
            <label for="basic-url" class="form-label">Alamat</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="basic-url kampus" aria-describedby="basic-addon3" value="{{ $kam->ALAMAT_KAMPUS}}" name="alamat_kampus" readonly>
            </div>
            <label for="basic-url" class="form-label">Username</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="basic-url kampus" aria-describedby="basic-addon3" value="{{ $kam->USERNAME_KAMPUS}}" name="username_kampus" readonly>
            </div>
            <a class="btn btn-secondary" id="edit" style="color: white"> Edit</a>
            <a style="float: right ;color: white" id="simpan" class="btn btn-success">Simpan</a>
            <a style="float: right; color: white; margin-right: 15px" id="batal" class="btn btn-danger">Batal</a>
            {{ csrf_field() }}
        </form>
    </div>


    @endforeach
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
    <script>
    $("#batal").hide();
    $("#simpan").hide();
    $(function(){
      $('#edit').click(function(){
        $('input').removeAttr('readonly','readonly');
        $('#batal').show();
        $('#simpan').show();
      });
    });
    $(function(){
      $('#batal').click(function(){
        $('input').attr('readonly',true);
        $('#batal').hide();
        $('#simpan').hide();
      });
    });

    $('#simpan').click(function (e) {
        var cek =document.getElementById("id_kam").value;;
        e.preventDefault();
        $(this).html('Menyimpan..');
        $.ajax({
        data: $('#frm_edit').serialize(),
        url: "{{ route('Edit.Kampus') }}",
        type: "POST",
        success: function (data) {
        console.log(data);
        $('#simpan').html('Simpan');
        $('input').attr('readonly',true);
        $('#batal').hide();
        $('#simpan').hide();
        swal("Berhasil!","Data Berhasil Disimpan","success");
        },
        error: function (data) {
        console.log('Error:', data);
        $('#simpan').html('Gagal simpan data');
        swal("Gagal","Data Gagal Disimpan","error");
        }

        });


    });

    </script>
@endsection
