@extends('layout.mhs')

@section('judul')
<title>Ganti Password</title>
@endsection

@section('nama_fitur')
Ganti Password
<hr>
@endsection

@section('konten')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Ganti Password</h3>
        </div>

    <div class="card-body">
        <form class="registrasi-form" enctype="multipart/form-data" id="frm_edit" >
        @csrf
            <label for="basic-url" class="form-label">Password Lama</label>
            <div class="input-group mb-3">
                <input type="password" class="form-control" id="password_lama" aria-describedby="basic-addon3"  name="password_lama">
            </div>
            <label for="basic-url" class="form-label">Password Baru</label>
            <div class="input-group mb-3">
                <input type="password" class="form-control" id="password_baru" aria-describedby="basic-addon3" name="password_baru">
            </div>
            <label for="basic-url" class="form-label" id="password">Ulangi Password Baru</label>
            <div class="input-group mb-3">
                <input type="password" class="form-control" id="ulangi" aria-describedby="basic-addon3" name="ulangi">
            </div>

            <input type="checkbox" class="show-hide" name="show-hide" value="" />
            <label for="show-hide">Tampilkan Password</label>

            <a style="float: right ;color: white" id="simpan" class="btn btn-success">Simpan</a>
            {{ csrf_field() }}
        </form>
    </div>
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
    <script>
    $('#simpan').click(function (e) {
        var pass1 =document.getElementById("password_baru").value;
        var pass2 =document.getElementById("ulangi").value;
        if(pass1!=pass2){
            return swal("Error","Password Yang Dimasukkan Tidak Sama","error");
        }
        else{

            e.preventDefault();
            $(this).html('Menyimpan..');
            $.ajax({
            data: $('#frm_edit').serialize(),
            url: "{{ route('get.password_mhs') }}",
            type: "POST",
            dataType: "JSON",
            success: function (results) {
            //console.log(data);
            if(results.success == true){
                $('#simpan').html('Simpan');
                swal("Berhasil!",results.message,"success");
                $('#frm_edit').trigger('reset');
            }else if(results.success == false){
                $('#simpan').html('Simpan');
                swal("Gagal",results.message,"error");
            }
            }
            })
        };
    });

    $(document).ready(function(){
		$('.show-hide').click(function(){
			if($(this).is(':checked')){
				$('#password_lama').attr('type','text');
				$('#password_baru').attr('type','text');
				$('#ulangi').attr('type','text');
			}else{
				$('#password_lama').attr('type','password');
				$('#password_baru').attr('type','password');
				$('#ulangi').attr('type','password');
			}
		});
	    });

    </script>
@endsection
