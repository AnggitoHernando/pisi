@extends('layout.mhs')

@section('judul')
@foreach ($mhs as $m)
    <title>Pengaturan Akun {{ $m->NAMA_MHS}}</title>
@endforeach
@endsection

@section('nama_fitur')
@foreach ($mhs as $m)
    Pengaturan Akun {{ $m->NAMA_MHS}}
<hr>
@endforeach
@endsection

@section('konten')
    @foreach ($mhs as $m)
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Pengaturan Akun</h3>
        </div>

    <div class="card-body">
        <form id="frm_edit" enctype="multipart/form-data" method="POST">
        @csrf
            <input type="hidden" id="NIM" value="{{ $m->NIM }}">
            <label for="basic-url" class="form-label">NIM</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="nama_mhs" aria-describedby="basic-addon3" value="{{ $m->NIM}}" name="NIM" readonly>
            </div>
            <label for="basic-url" class="form-label">Nama Mahasiswa</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="basic-url mhs" aria-describedby="basic-addon3" value="{{ $m->NAMA_MHS}}" name="NAMA_MHS" readonly>
            </div>
            <label for="basic-url" class="form-label">Alamat</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="basic-url mhs" aria-describedby="basic-addon3" value="{{ $m->ALAMAT_MHS}}" name="alamat_mhs" readonly>
            </div>
            <label for="basic-url" class="form-label">Tempat, Tanggal Lahir</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="basic-url mhs" aria-describedby="basic-addon3" value="{{ $m->TTL}}" name="ttl" readonly>
            </div>
            <label for="basic-url" class="form-label">Fakultas</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="basic-url mhs" aria-describedby="basic-addon3" value="{{ $m->FAKULTAS}}" name="fakultas" readonly>
            </div>
            <label for="basic-url" class="form-label">Program Studi</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="basic-url mhs" aria-describedby="basic-addon3" value="{{ $m->PRODI}}" name="prodi" readonly>
            </div>
            <label for="basic-url" class="form-label">Angkatan/Tahun Masuk</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="basic-url mhs" aria-describedby="basic-addon3" value="{{ $m->ANGKATAN}}" name="angkatan" readonly>
            </div>
            <label for="basic-url" class="form-label">No. Telepon</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="basic-url mhs" aria-describedby="basic-addon3" value="{{ $m->NO_TELFON}}" name="no_telepon" readonly>
            </div>
            <label for="basic-url" class="form-label">Email</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="basic-url mhs" aria-describedby="basic-addon3" value="{{ $m->EMAIL_MHS}}" name="email" readonly>
            </div>
            <label for="basic-url" class="form-label">Username</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="basic-url mhs" aria-describedby="basic-addon3" value="{{ $m->USERNAME_MHS}}" name="username" readonly>
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
        $('#deskripsi').attr('readonly',true);
        $('#logo').trigger('cancel');
        $('#logo').attr('disabled',true);
        $('#batal').hide();
        $('#simpan').hide();
      });
    });

    $('#simpan').click(function (e) {
        e.preventDefault();
        $(this).html('Menyimpan..');
        $.ajax({
        data: $('#frm_edit').serialize(),
        url: "{{ route('Edit.Mhs') }}",
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
