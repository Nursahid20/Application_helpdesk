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
                                                <img src="../../../images/karyawan/{{ $karyawan[0]->img_profile }}" width="150cm" height="200cm" class="rounded mx-auto d-block mb-2" alt="">
                                                <p class="text-center mb-1">{{ $karyawan[0]->nama }}</p>
                                                <p class="text-center mb-1">{{ $karyawan[0]->email }}</p>
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
                                                            <p class="mb-4">Nama </p>
                                                        </div>
                                                        <div class="col-8">
                                                            <p class="mb-4">: {{ $karyawan[0]->nama }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <p class="mb-4">Email </p>
                                                        </div>
                                                        <div class="col-8">
                                                            <p class="mb-4">: {{ $karyawan[0]->email }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <p class="mb-4">Jabatan </p>
                                                        </div>
                                                        <div class="col-8">
                                                            <p class="mb-4">:
                                                                <?php
                                                                for ($i = 0; $i < count($jabatan); $i++) {
                                                                    if ($jabatan[$i]->id == $karyawan[0]->jabatan_id) {
                                                                        echo $jabatan[$i]->nama;
                                                                    }
                                                                }
                                                                ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <p class="mb-4">Jenis Kelamin </p>
                                                        </div>
                                                        <div class="col-8">
                                                            <p class="mb-4">: {{ $karyawan[0]->jk }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <p class="mb-4">Tempat Lahir </p>
                                                        </div>
                                                        <div class="col-8">
                                                            <p class="mb-4">: {{ $karyawan[0]->tempat_lahir }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <p class="mb-4">NIK </p>
                                                        </div>
                                                        <div class="col-8">
                                                            <p class="mb-4">: {{ $karyawan[0]->nik }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <p class="mb-4">Blok </p>
                                                        </div>
                                                        <div class="col-8">
                                                            <p class="mb-4">: {{ $karyawan[0]->blok }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <p class="mb-4">Departemen </p>
                                                        </div>
                                                        <div class="col-8">
                                                            <p class="mb-4">:
                                                                <?php
                                                                for ($i = 0; $i < count($departemen); $i++) {
                                                                    if ($departemen[$i]->id == $karyawan[0]->departemen_id) {
                                                                        echo $departemen[$i]->nama;
                                                                    }
                                                                }
                                                                ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <p class="mb-4">No Telepon </p>
                                                        </div>
                                                        <div class="col-8">
                                                            <p class="mb-4">: {{ $karyawan[0]->no_telepon }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <p class="mb-4">Tanggal Lahir </p>
                                                        </div>
                                                        <div class="col-8">
                                                            <p class="mb-4">: {{ $karyawan[0]->tanggal_lahir }}</p>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <p class="mb-4">Alamat </p>
                                                        </div>
                                                        <div class="col-10">
                                                            <p class="mb-4">: {{ $karyawan[0]->alamat }}</p>
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