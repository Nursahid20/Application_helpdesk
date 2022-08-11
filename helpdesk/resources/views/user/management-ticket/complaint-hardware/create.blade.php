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

                                    <?php if (session('success')) {  ?>
                                        <div id="flash" data-flash="{{ session('success') }}" style="background-color:red"></div>
                                        <?php session()->forget('success'); ?>
                                    <?php } ?>
                                    <h4 class="card-title">Form Tambah Keluhan Hardware</h4><br>
                                    <form action="/user/complaint-hardware" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="aset_hardware_id" class="form-label">Aset Hardware</label>
                                            <select class="form-select form-select-sm @error('aset_hardware_id') is-invalid @enderror" name="aset_hardware_id" id="single-select-field" data-placeholder="Pilih..">
                                                <option></option>
                                                @foreach($aset as $aset)
                                                <?php
                                                $today = date("Y-M-d");
                                                $expire = $aset->tanggal_berakhir;
                                                $today_time = strtotime($today);
                                                $expire_time = strtotime($expire);
                                                if ($today_time <= $expire_time ||  $aset->tanggal_berakhir == null) {
                                                ?>
                                                    @if(old('aset_hardware_id') == $aset->asetHardware->id)
                                                    <option value="{{ $aset->asetHardware->id }}" selected>{{ $aset->asetHardware->nama }} </option>
                                                    @else
                                                    <option value="{{ $aset->asetHardware->id }}"> {{ $aset->asetHardware->nama }} </option>
                                                    @endif
                                                <?php } ?>
                                                @endforeach
                                            </select>
                                            @error('aset_hardware_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="row mb-3">
                                            <div>
                                                <label for="subject" class="form-label">Subject </label>
                                                <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" placeholder="subject" id="subject" style="border-color: #ced4da" value="{{ old('subject') }}">
                                                <input type="hidden" class="form-control" id="slug" name="slug">
                                                @error('subject')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="row">
                                                <div class="col-2">
                                                    <label for="file" class="form-label">Upload foto </label>
                                                    <img src="../../../../file/default.jpg" style="width: 140px; height: 160px;" class="img-thumbnail file_img">
                                                </div>
                                                <div class="col-10" style="margin-top:30px;">
                                                    <input class="form-control @error('file') is-invalid @enderror" name="file" aria-label="Upload" style="padding: 10px 5px;" type="file" id="file" onchange="previewImage()">
                                                    @error('file')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div>
                                                <label for="deskripsi" class="form-label">Deskripsi </label>
                                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" placeholder="deskripsi" value="{{ old('deskripsi') }}" style="height: 100px"></textarea>
                                                @error('deskripsi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="mt-4">
                                            <button type="submit" class="btn btn-success border-0" style="padding: 9px 22px 8px 22px;">
                                                <div class="col" style="padding: 0px 3px">
                                                    <div>Simpan</div>
                                                </div>
                                            </button>
                                        </div>
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
        const image = document.querySelector('#file');
        const imgPreview = document.querySelector('.file_img');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection