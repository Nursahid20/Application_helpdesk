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
                                    <h4 class="card-title">Form Tambah Perimntaan / Keluhan Software</h4><br>
                                    <form action="/user/complaint-software" method="post">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="aset_hardware_id" class="form-label">Aset Hardware</label>
                                            <select class="form-select form-select-sm @error('aset_hardware_id') is-invalid @enderror" name="aset_hardware_id" id="single-select-field" data-placeholder="Pilih..">
                                                <option></option>
                                                @if($aset != null)
                                                @foreach($aset as $aset)
                                                <?php
                                                $today = date("Y-M-d");
                                                $expire = $aset->tanggal_berakhir;
                                                $today_time = strtotime($today);
                                                $expire_time = strtotime($expire);
                                                if ($today_time <= $expire_time ||  $aset->tanggal_berakhir == null) {
                                                ?>
                                                    @if(old('aset_hardware_id') == $aset->asetHardware->id)
                                                    <!-- <?php

                                                            ?> -->
                                                    <option value="{{ $aset->asetHardware->id }}" selected>{{ $aset->asetHardware->nama }} </option>
                                                    @else
                                                    <option value="{{ $aset->asetHardware->id }}"> {{ $aset->asetHardware->nama }} </option>
                                                    @endif
                                                <?php } ?>
                                                @endforeach
                                                @else

                                                @endif
                                            </select>
                                            @error('aset_hardware_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col mb-3">
                                            <div>
                                                <label for="subject" class="form-label">Nama Aplikasi</label>
                                                <select class="form-select" name="subject[]" id="multiple-select-custom-field" data-placeholder="Choose anything" multiple>
                                                    @foreach($software as $software)
                                                    @if(old('subject') == $software->nama)
                                                    <option value="{{ $software->nama }}" selected>{{ $software->nama }}</option>
                                                    @else
                                                    <option value="{{ $software->nama }}"> {{ $software->nama }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                                @error('subject')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
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

    $('#multiple-select-custom-field').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        closeOnSelect: false,
        tags: true
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