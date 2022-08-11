@extends('layout.main')
@section('container')
@include('partials.navSidebar')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">

                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Form Tambah Karyawan</h4>

                                    <form action="/admin/karyawan" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="mb-3">
                                                <div class="col-sm-2 mb-1">
                                                    <label for="img_profile" class="form-label">Upload Foto Profile</label>
                                                    <img src="../../../images/karyawan/default.png" style="width: 140px; height: 160px;" class="img-thumbnail img-preview">
                                                </div>
                                                <input class="form-control @error('img_profile') is-invalid @enderror" name="img_profile" aria-label="Upload" style="padding: 10px 5px;" type="file" id="img_profile" onchange="previewImage()">
                                                @error('img_profile')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <div>
                                                    <label for="nama" class="form-label">Nama</label>
                                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="nama" id="nama" style="border-color: #ced4da" value="{{ old('nama') }}">
                                                    <input type="hidden" class="form-control" id="slug" name="slug">
                                                    @error('nama')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div>
                                                    <label for="nik" class="form-label">NIK</label>
                                                    <input type="number" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik" placeholder="nik" value="{{ old('nik') }}" style="border-color: #ced4da">
                                                    @error('nik')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <div>
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="email" name="email" id="email" value="{{ old('email') }}" style="border-color: #ced4da">
                                                    @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div>
                                                    <label for="blok" class="form-label">Blok </label>
                                                    <select class="form-select form-select-sm @error('blok') is-invalid @enderror" name="blok" id="">
                                                        <option selected disabled style="color: grey;"> Pilih..</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select>
                                                    @error('blok')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <div>
                                                    <label for="jabatan_id" class="form-label">Jabatan</label>
                                                    <select class="form-select form-select-sm @error('jabatan_id') is-invalid @enderror" name="jabatan_id" id="single-select-field" data-placeholder="Pilih..">
                                                        <option></option>
                                                        @foreach($jabatan as $jabatan)
                                                        @if(old('jabatan_id') == $jabatan->id)
                                                        <option value="{{ $jabatan->id }}" selected>{{ $jabatan->nama }}</option>
                                                        @else
                                                        <option value="{{ $jabatan->id }}"> {{ $jabatan->nama }}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                    @error('jabatan_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div>
                                                    <label for="departemen_id" class="form-label">Departemen</label>
                                                    <select class="form-select form-select-sm @error('departemen_id') is-invalid @enderror" name="departemen_id" id="single-select-field_1" data-placeholder="Pilih..">
                                                        <option></option>
                                                        @foreach($departemen as $departemen)
                                                        @if(old('departemen_id') == $departemen->id)
                                                        <option value="{{ $departemen->id }}" selected>{{ $departemen->nama }}</option>
                                                        @else
                                                        <option value="{{ $departemen->id }}"> {{ $departemen->nama }}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                    @error('departemen_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <div>
                                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="tempat_lahir" placeholder="tempat lahir" value="{{ old('tempat_lahir') }}" style="border-color: #ced4da">
                                                    @error('tempat_lahir')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div>
                                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}" style="border-color: #ced4da; padding:7px;">
                                                    @error('tanggal_lahir')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <div>
                                                    <label for="no_telepon" class="form-label">Nomor telepon</label>
                                                    <input type="number" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon" id="no_telepon" placeholder="nomor telepon" value="{{ old('no_telepon') }}" style="border-color: #ced4da">
                                                    @error('no_telepon')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div>
                                                    <label for="jk" class="form-label">Jenis Kelamin</label>
                                                    <select class="form-select form-select-sm @error('jk') is-invalid @enderror" name="jk" id="single-select-field">
                                                        <option disabled selected>Pilih..</option>
                                                        <option value="Laki-laki">Laki-laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                    @error('jk')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" placeholder="alamat" value="{{ old('alamat') }}" style="border-color: #ced4da">

                                            @error('alamat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-success border-0" style="padding: 9px 22px 8px 22px;">
                                            <div class="col" style="padding: 0px 3px">
                                                <div>Simpan</div>
                                            </div>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-panel ends -->

</div>
<script>
    $('#single-select-field').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
    });
    $('#single-select-field_1').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
    });

    // untuk membuat slug otomatis
    const nama = document.querySelector('#nama');
    const slug = document.querySelector('#slug');

    nama.addEventListener('change', function() {
        fetch('/admin/karyawan/checkSlug?nama=' + nama.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    })

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })

    function previewImage() {
        const image = document.querySelector('#img_profile');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection