@extends('layout.main')
@section('container')
@include('partials.navSidebar')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3 border-end">
                                            <h4>Foto Profile</h4>
                                            <hr>
                                            <div style="text-align:center; padding-top:20px">
                                                <img src="../../../images/karyawan/{{ $karyawan->img_profile }}" width="150cm" height="200cm" class="rounded mx-auto d-block mb-2" alt="">
                                                <h6 class="text-center mb-1">{{ $karyawan->nama }}</h6>
                                                <p class="text-center mb-1">{{ $karyawan->email }}</p>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <h4>Detail Profile</h4>
                                            <hr>
                                            <br>
                                            <div class="row mb-3">
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6 class="mb-4">Nama </h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <h6 class="mb-4">: {{ $karyawan->nama }}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6 class="mb-4">Email </h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <h6 class="mb-4">: {{ $karyawan->email }}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6 class="mb-4">Jabatan </h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <h6 class="mb-4">:
                                                                <?php
                                                                for ($i = 0; $i < count($jabatan); $i++) {
                                                                    if ($jabatan[$i]->id == $karyawan->jabatan_id) {
                                                                        echo $jabatan[$i]->nama;
                                                                    }
                                                                }
                                                                ?>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6 class="mb-4">Jenis Kelamin </h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <h6 class="mb-4">: {{ $karyawan->jk }}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6 class="mb-4">Tempat Lahir </h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <h6 class="mb-4">: {{ $karyawan->tempat_lahir }}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6 class="mb-4">NIK </h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <h6 class="mb-4">: {{ $karyawan->nik }}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6 class="mb-4">Blok </h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <h6 class="mb-4">: {{ $karyawan->blok }}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6 class="mb-4">Departemen </h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <h6 class="mb-4">:
                                                                <?php
                                                                for ($i = 0; $i < count($departemen); $i++) {
                                                                    if ($departemen[$i]->id == $karyawan->departemen_id) {
                                                                        echo $departemen[$i]->nama;
                                                                    }
                                                                }
                                                                ?>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6 class="mb-4">No Telepon </h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <h6 class="mb-4">: {{ $karyawan->no_telepon }}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6 class="mb-4">Tanggal Lahir </h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <h6 class="mb-4">: {{ $karyawan->tanggal_lahir }}</h6>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <h6 class="mb-4">Alamat </h6>
                                                        </div>
                                                        <div class="col-10">
                                                            <h6 class="mb-4">: {{ $karyawan->alamat }}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    <!-- page-body-wrapper ends -->
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
    </script>
    @endsection