@extends('layout.register')

@section('judul')
    <title>Pendaftaran Mahasiswa</title>

@endsection

@section('form')
    <form class="registrasi-form" action="{{ route('mhs.add') }}">
    @csrf
        <span class="title">
            Registrasi Mahasiswa
        </span>
        <div class="form-grup @if ($errors->has('NIM')) has-error @endif">
            <span class="label-input">NIM </span>
            <input class="reg-input" type="text" name="NIM" placeholder="Masukkan NIM Anda" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" value="{{ old('NIM') }}">
            <span class="focus-input100"></span>
            @if ($errors->has('NIM')) <span class="help-block">{{ $errors->first('NIM') }} @endif</span>
        </div>
        <div class="form-grup @if ($errors->has('mahasiswa')) has-error @endif">
            <span class="label-input">Nama Lengkap</span>
            <input class="reg-input" type="text" name="mahasiswa" placeholder="Nama Lengkap Anda." required  oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" value="{{ old('mahasiswa') }}">
            <span class="focus-input100" ></span>
            @if ($errors->has('mahasiswa')) <span class="help-block">{{ $errors->first('mahasiswa') }} @endif</span>
        </div>
        <div class="form-grup @if ($errors->has('ttl')) has-error @endif">
            <span class="label-input">Tempat Tanggal Lahir</span>
            <input class="reg-input" type="text" name="ttl" placeholder="Masukkan Tempat, Tanggal Lahir Anda." required  oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" value="{{ old('ttl') }}">
            <span class="focus-input100"></span>
            @if ($errors->has('ttl')) <span class="help-block">{{ $errors->first('ttl') }} @endif</span>
        </div>
        <div class="form-grup @if ($errors->has('alamat')) has-error @endif">
            <span class="label-input">Alamat</span>
            <input class="reg-input" type="text" name="alamat" placeholder="Alamat." required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" value="{{ old('alamat') }}">
            <span class="focus-input100"></span>
            @if ($errors->has('alamat')) <span class="help-block">{{ $errors->first('alamat') }} @endif</span>
        </div>
        <div class="form-grup @if ($errors->has('prodi')) has-error @endif">
            <span class="label-input">Program Studi</span>
            <input class="reg-input" type="text" name="prodi" placeholder="Asal Program Studi." required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" value="{{ old('prodi') }}">
            <span class="focus-input100"></span>
            @if ($errors->has('prodi')) <span class="help-block">{{ $errors->first('prodi') }} @endif</span>
        </div>
        <div class="form-grup @if ($errors->has('fakultas')) has-error @endif">
            <span class="label-input">Fakultas</span>
            <input class="reg-input" type="text" name="fakultas" placeholder="Asal Fakultas" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" value="{{ old('fakultas') }}">
            <span class="focus-input100"></span>
            @if ($errors->has('fakultas')) <span class="help-block">{{ $errors->first('fakultas') }} @endif</span>
        </div>
        <div class="form-grup @if ($errors->has('Angkatan')) has-error @endif">
            <span class="label-input">Angkatan</span>
            <input class="reg-input" type="text" name="Angkatan" placeholder="Angkatan." required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" value="{{ old('Angkatan') }}">
            <span class="focus-input100"></span>
            @if ($errors->has('Angkatan')) <span class="help-block">{{ $errors->first('Angkatan') }} @endif</span>
        </div>
        <div class="form-grup @if ($errors->has('NO_TELFON')) has-error @endif">
            <span class="label-input">No.Telepon</span>
            <input class="reg-input notelp" type="text" name="NO_TELFON" placeholder="Masukan Nomor Telepon." required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" value="{{ old('NO_TELFON') }}" onkeypress="return isNumberKey(event)">
            <span class="focus-input100"></span>
            @if ($errors->has('No. Telepon')) <span class="help-block">{{ $errors->first('No. Telepon') }} @endif</span>
        </div>
        <div class="form-grup @if ($errors->has('Email')) has-error @endif">
            <span class="label-input">Email</span>
            <input class="reg-input" type="text" name="Email" placeholder="Masukkan Email" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" value="{{ old('Email') }}">
            <span class="focus-input100"></span>
            @if ($errors->has('Email')) <span class="help-block">{{ $errors->first('Email') }} @endif</span>
        </div>
        <div class="form-grup @if ($errors->has('username')) has-error @endif">
            <span class="label-input">Username</span>
            <input class="reg-input" type="text" name="username" placeholder="Nama Lengkap Anda." required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" value="{{ old('username') }}">
            <span class="focus-input100"></span>
            @if ($errors->has('username')) <span class="help-block">{{ $errors->first('username') }} @endif</span>
        </div>
        <div class="form-grup @if ($errors->has('pass')) has-error @endif">
            <span class="label-input">Password</span>
            <input class="reg-input" id="pw" type="password" name="pass" placeholder="Masukan Password" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" >
            <span class="focus-input100"></span>
            <input type="checkbox" class="show-hide" name="show-hide" value="" />
            <label for="show-hide">Tampilkan Password</label>
            @if ($errors->has('pass')) <span class="help-block">{{ $errors->first('pass') }} @endif</span>
        </div>
        <div class="register-btn-submit">
            <button class="btn-submit" type="submit">Daftar </button>
            <a class="back" href="{{ route('hal.depan') }} ">Back</a> <a class="akun" href="">Sudah Punya Akun?</a>
        </div>

        <script src="{{ asset('frontend/halamandepan/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('frontend/registermhs/js/java.js') }}"></script>

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
    </form>
@endsection
