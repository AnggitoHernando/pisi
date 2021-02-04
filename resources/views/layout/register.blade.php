<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layout.icon')
    @yield('judul')
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/registermhs/css/register.css') }}" rel="stylesheet">

</head>
<body>
    <div class="register">
        <div class="container-register">
            <div class="register-1">
                <img class="logo" src="{{ asset('frontend/halamandepan/img/logo.png') }}" alt="logo UINSA" style="width:150px; height:auto;"></img>
            </div>
            <div class="register-pos p-l-50 p-r-50 p-t-72 p-b-50">
                @yield('form')
            </div>
        </div>

    </div>
    

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>

</body>
</html>