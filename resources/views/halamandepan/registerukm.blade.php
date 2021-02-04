@extends('layout.register')

@section('judul')
    <title>Pendaftaran UKM</title>

@endsection

@section('form')
    <form class="registrasi-form" action="{{ route('ukm.tambah') }}" method="post" enctype="multipart/form-data" >
    @csrf
        <span class="title">
            Registrasi UKM
        </span>
        <div class="form-grup">
            <span class="label-input">Nama UKM</span>
            <input class="reg-input" type="text" name="nama_ukm" placeholder="Masukkan Nama UKM" required  oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" value="{{ old('nama_ukm') }}">
            <span class="focus-input100"></span>
        </div>
        <div class="form-grup">
            <span class="label-input">Nama Ketua</span>
            <input class="reg-input" type="text" name="nama_ketua" placeholder="Masukkan Nama Ketua UKM" required  oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" value="{{ old('nama_ketua') }}">
            <span class="focus-input100"></span>
        </div>
        <div class="form-grup @if ($errors->has('tahun')) has-error @endif" >
            <span class="label-input">Tahun Berdiri</span>
            <input class="reg-input" type="text" name="tahun" placeholder="Tahun Berdiri UKM" required  oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" value="{{ old('tahun') }}">
            <span class="focus-input100"></span>
            @if ($errors->has('tahun')) <span class="help-block">{{ $errors->first('tahun') }} @endif</span>
        </div>
        <div class="form-grup">
            <span class="label-input">Deskripsi UKM</span>
            <textarea class="reg-input" type="text" name="deskripsi" placeholder="Masukkan Deskripsi UKM" required  oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" >{{ old('deskripsi') }}</textarea>
            <span class="focus-input100"></span>
        </div>
        <div class="form-grup ">
            <span class="label-input">Logo</span>
            <input class="reg-input" type="file" name="logo">
            <span class="focus-input100"></span>
        </div>
        <div class="form-grup @if ($errors->has('email')) has-error @endif">
            <span class="label-input">Email</span>
            <input class="reg-input" type="text" name="email" placeholder="Masukkan Email" required  oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" value="{{ old('email') }}">
            <span class="focus-input100"></span>
            @if ($errors->has('email')) <span class="help-block">{{ $errors->first('email') }} @endif</span>
        </div>
        <div class="form-grup">
            <span class="label-input">Username</span>
            <input class="reg-input" type="text" name="username" placeholder="Masukkan Username" required  oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" value="{{ old('username') }}">
            <span class="focus-input100"></span>
        </div>
        <div class="form-grup">
            <span class="label-input">Password</span>
            <input class="reg-input" type="password" id="password" name="password" placeholder="Masukkan Password" required >
            <span class="focus-input100"></span>
            <input type="checkbox" class="show-hide" name="show-hide" value="" />
            <label for="show-hide">Tampilkan Password</label>
        </div>

        <div class="register-btn-submit">
            <button class="btn-submit" type="submit">Daftar </button>
            <a class="back" href="{{ route('hal.depan') }}">Back</a> <a class="akun" href="">Sudah Punya Akun?</a>
        </div>

        <script src="{{ asset('frontend/halamandepan/vendor/jquery/jquery.min.js') }}"></script>
        <script>
            $(document).ready(function(){
		$('.show-hide').click(function(){
			if($(this).is(':checked')){
				$('#password').attr('type','text');
			}else{
				$('#password').attr('type','password');
			}
		});
	    });
    </script>
    </form>
@endsection
