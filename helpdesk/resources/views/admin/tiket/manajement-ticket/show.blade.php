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
                                            <h4>Foto Lampiran</h4>
                                            <hr>
                                            <div style="text-align:center; padding-top:20px">
                                                <img src="../../../file/{{ $tiket[0]->file_lama }}" width="150cm" height="200cm" class="rounded mx-auto d-block mb-2" alt="">
                                                <h6 class="text-center mb-1"></h6>
                                                <p class="text-center mb-1"></p>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <h4>Detail Tiket
                                                <?php if ($tiket[0]->kategori->id == 3) { ?>
                                                    - Keluhan Hardware
                                                <?php } ?>
                                                <?php if ($tiket[0]->kategori->id == 4) { ?>
                                                    - Permintaan Hardware
                                                <?php } ?>
                                                <?php if ($tiket[0]->kategori->id == 6) { ?>
                                                    - Permintaan Perubahan Document
                                                <?php } ?>
                                                <?php if ($tiket[0]->kategori->id == 5) { ?>
                                                    - Keluhan / Permintaan Software
                                                <?php } ?>
                                            </h4>
                                            <hr>
                                            <br>
                                            <div class="row">
                                                <div class="col-7 ">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6 class="mb-4">Kode Tiket</h6>
                                                        </div>
                                                        <div class="col-6">
                                                            <h6 class="mb-4">: {{ $tiket[0]->kode_tiket }}</h6>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6 class="mb-4">Nama Karyawan</h6>
                                                        </div>
                                                        <div class="col-6">
                                                            <h6 class="mb-4">: {{ $tiket[0]->karyawan->nama }}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6 class="mb-4">Nama IT Support</h6>
                                                        </div>
                                                        <div class="col-6">
                                                            <h6 class="mb-4">: {{ $tiket[0]->itSupport->nama }}</h6>
                                                        </div>
                                                    </div>

                                                    <?php if (!($tiket[0]->kategori->id == 4 || $tiket[0]->kategori->id == 6)) { ?>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <h6 class="mb-4">Aset </h6>
                                                            </div>
                                                            <div class="col-8">
                                                                <h6 class="mb-4">: {{ $tiket[0]->asetHardware->nama }}</h6>
                                                            </div>
                                                        </div>
                                                    <?php } ?>

                                                    <?php if ($tiket[0]->kategori->id == 6) { ?>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <h6 class="mb-4">Lampiran</h6>
                                                            </div>
                                                            <div class="col-6">
                                                                <h6 class="mb-4">: {{ $tiket[0]->lampiran->lampiran }}</h6>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6 class="mb-4">Status</h6>
                                                        </div>
                                                        <div class="col-6">
                                                            <h6 class="mb-4">: {{ $tiket[0]->status->status }}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6 class="mb-4">Estimasi Waktu</h6>
                                                        </div>
                                                        <div class="col-6">
                                                            <h6 class="mb-4">:
                                                                <?php if ($tiket[0]->tanggal_mulai == '0000/00/00') { ?>
                                                                    -
                                                                <?php } elseif ($tiket[0]->tanggal_akhir == '0000/00/00') { ?>
                                                                    -
                                                                <?php } else { ?>
                                                                    {{ $tiket[0]->tanggal_mulai }} - {{ $tiket[0]->tanggal_akhir }}
                                                                <?php }  ?>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6 class="mb-4">Unit </h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <h6 class="mb-4">: {{ $tiket[0]->unit }}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6 class="mb-4">Level Urgensi</h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <h6 class="mb-4">: {{ $tiket[0]->prioritas->prioritas }}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php if (!($tiket[0]->kategori->id == 6)) { ?>
                                                    <div class="row ">
                                                        <div class="col-2">
                                                            <h6 class="mb-4">Subject </h6>
                                                        </div>
                                                        <div class="col-10">
                                                            <h6 class="mb-4" style="padding-left: 27px">: {{ $tiket[0]->subject }}</h6>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <div class="row">
                                                    <div class="col-2">
                                                        <h6 class="mb-4">Deskripsi </h6>
                                                    </div>
                                                    <div class="col-10">
                                                        <h6 class="mb-4" style="padding-left: 27px">: {{ $tiket[0]->deskripsi }}</h6>
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