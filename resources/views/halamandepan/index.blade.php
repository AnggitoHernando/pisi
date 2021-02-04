<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistem Informasi UKM UINSA</title>
  <link href="{{ asset('frontend/halamandepan/img/favicon.ico') }}" rel="icon">

  <!-- Bootstrap Core CSS -->
  <link href="{{ asset('frontend/halamandepan/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="{{ asset('frontend/halamandepan/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="{{ asset('frontend/halamandepan/vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="{{ asset('frontend/halamandepan/css/stylish-portfolio.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">


  <nav class="navbar navbar-expand-lg navbar-dark fixed-top py-3" id="mainNav">

    <a class="navbar-brand js-scroll-trigger" href="#page-top"> <img class="logo" src="{{ asset('frontend/halamandepan/img/logo.png') }}" alt="logo UINSA" style="width:100px; height:auto;"></img></a>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      @if(Session::has('pesan'))
      <div class="alert alert-success" role="alert" >{{ Session::get('pesan') }} </div>
      @endif
        <ul class="navbar-nav text-uppercase ml-auto">
          <div class="dropdown" id="dropdown">
            <li class="nav-item"><a class="nav-link js-scroll-trigger" style="cursor:pointer" >Register</a>
            <div class="dropdown-content">
              <a href="{{ route('mhs.daftar') }}">Mahasiswa</a>
              <a href="{{ route('ukm.daftar') }}">UKM</a>
            </div>
          </div>
        </li>
        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{route('login')}}" >Login</a></li>
        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about" >About</a></li>
        </ul>
    </div>
    </nav>
  <!-- Header -->
  <header class="masthead d-flex">
    <div class="container text-center my-auto">
      <h1 class="mb-1">Sistem Informasi Unit Kegiatan Mahasiswa Universitas Islam Negeri Sunan Ampel Surabaya</h1>
    </div>
    <div class="overlay"></div>
  </header>

  <!-- About -->
  <section class="content-section" id="about" style="color:#013818!important;">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <h2>Sistem Informasi Unit Kegiatan Mahasiswa Universitas Islam Negeri Sunan Ampel Surabaya</h2>
          <p class="lead mb-5">Sistem Informasi Unit Kegiatan Mahasiswa merupakan sistem yang dikembangkan dengan tujuan untuk mempermudah mahasiswa baru untuk daftar pada UKM yang diminati dan dapat mempermudah pihak kampus dalam memanajemen tentang unit kegiatan mahasiswa UIN Sunan Ampel Surabaya</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Map -->
  <div id="contact" class="map">
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.2807852341502!2d112.73206241432132!3d-7.322324674037499!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb6c094d1b87%3A0xbc3def4f4bd2fa7!2sUniversitas%20Islam%20Negeri%20Sunan%20Ampel%20Surabaya!5e0!3m2!1sid!2sid!4v1605166680749!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    <br />
    <small>
      <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.2807852341502!2d112.73206241432132!3d-7.322324674037499!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb6c094d1b87%3A0xbc3def4f4bd2fa7!2sUniversitas%20Islam%20Negeri%20Sunan%20Ampel%20Surabaya!5e0!3m2!1sid!2sid!4v1605166680749!5m2!1sid!2sid"></a>
    </small>
  </div>

  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      <ul class="list-inline mb-5">
        <li class="list-inline-item">
          <a class="social-link rounded-circle text-white mr-3" href="https://web.facebook.com/UinSurabaya?_rdc=1&_rdr">
            <i class="icon-social-facebook"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="social-link rounded-circle text-white mr-3" href="https://twitter.com/humas_uinsby">
            <i class="icon-social-twitter"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="social-link rounded-circle text-white" href="https://www.instagram.com/uinsa_surabaya/?hl=id">
            <i class="icon-social-instagram"></i>
          </a>
        </li>
      </ul>
      <p class="text-muted small mb-0">Copyright &copy; A.H 2020</p>
    </div>
  </footer>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('frontend/halamandepan/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/halamandepan/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Plugin JavaScript -->
  <script src="{{ asset('frontend/halamandepan/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{ asset('frontend/halamandepan/js/stylish-portfolio.min.js') }}"></script>

</body>

</html>
