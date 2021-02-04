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
        <h3 class="label">Login Sistem Informasi UKM</h3>
        <hr>
        <form class="login-form" action="{{ route('login.post') }}" method="post" enctype="multipart/form-data" id="form">
            @csrf
            <div class="form-group">
              <input type="text" name="username" class="form-control form-control-user" placeholder="Masukkan Username" required oninvalid="this.setCustomValidity('Username tidak boleh kosong')" oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
              <input type="password" name="password" id="pw" class="form-control form-control-user" id="exampleInputPassword" placeholder="Masukkan Kata Sandi.." required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
              <input type="checkbox" class="show-hide" name="show-hide" value="" style="width: 20px" />
              <label for="show-hide" style="font-size: 15px; color: black">Tampilkan Password</label>
            </div>
            <div class="form-group">

            </div>
            <button type="submit" name="button" class="btn btn-primary btn-user btn-block" >Login</button>
            <p style="margin-top: 12px">Belum Punya Akun? <a href="{{ route('hal.depan') }}">Daftar Disini</a> </p>
            <p style="margin-top: 12px">Lupa Password ? <a href="{{ route('reset.password') }}"> Reset Password</a> </p>
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
    }else{
        $('#pw').attr('type','password');
    }
});
});

</script>

</html>
