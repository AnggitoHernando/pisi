<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.icon')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="crsf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('frontend/halamandepan/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sweetalert.css')}}">
    <title>Login</title>
</head>
<body>
    <div class="container">
        @if (Session::has('pesan'))
            <div class="alert alert-danger" role="alert">{{ Session::get('pesan') }}</div>
        @endif
        <img src="{{ asset('frontend/halamandepan/img/logo.png')}}" alt="" style="width: 200px" class="logo">
        <h3 class="label" style="margin-left: 50px">Reset Password</h3>
        <hr>
        <form class="login-form" action="{{ route('get.reset') }}" method="post" enctype="multipart/form-data" id="form">
            @csrf
            <div class="form-group">
                <input type="text" name="email" class="form-control form-control-user" placeholder="Masukkan Email Yang Terdaftar" required oninvalid="this.setCustomValidity('Email tidak boleh kosong')" oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
                <input type="password" name="password" id="pw" class="form-control form-control-user" id="exampleInputPassword" placeholder="Masukkan Kata Sandi Baru" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
                <input type="password" name="ulangi" id="pw1" class="form-control form-control-user" id="exampleInputPassword" placeholder="Masukkan Ulang Kata Sandi Baru" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                <input type="checkbox" class="show-hide" name="show-hide" value="" style="width: 20px" />
                <label for="show-hide" style="font-size: 15px; color: black">Tampilkan Password</label>
            </div>

            <button type="submit" name="button" class="btn btn-primary btn-user btn-block" >Reset</button>
            <p style="margin-top: 12px; text-align: right"><a href="{{ route('login') }}" id="login">Login Disini</a> </p>

          </form>
    </div>
</body>
<script src="{{ asset('frontend/halamandepan/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/halamandepan/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script>
    $(document).ready(function(){
$('.show-hide').click(function(){
    if($(this).is(':checked')){
        $('#pw').attr('type','text');
        $('#pw1').attr('type','text');
    }else{
        $('#pw').attr('type','password');
        $('#pw1').attr('type','password');
    }
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
    var pass1 =document.getElementById("pw").value;
    var pass2 =document.getElementById("pw1").value;
    if(pass1!=pass2){
        return swal("Error","Password Yang Dimasukkan Tidak Sama","error");
    }else{

        $.ajax({
            type:"POST",
            url: url,
            data:form,
            dataType: "JSON",
            processData:false,
            contentType:false,
            success: function(response){
                //console.log(response)
                if(response.sukses){
                    swal("Berhasil",response.sukses,"success");
                    $('#form').trigger('reset');
                    var login =$('#login').attr('href');
                    setTimeout(function(){
                        window.location.href=login
                    },1500);
                }else if(response.gagal){
                    swal("Error",response.gagal,"error");
                }
            }

        });
    }
    })
</script>

</html>
