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
                                        <h4>Detail Hardware</h4>
                                        <hr>
                                        <div class="row mb-3 pt-3">
                                            <div class="col-6">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6 class="mb-4">Kode </h6>
                                                    </div>
                                                    <div class="col-8">
                                                        <h6 class="mb-4">: {{ $aset->kode_hardware }}</h6>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6 class="mb-4">Nama </h6>
                                                    </div>
                                                    <div class="col-8">
                                                        <h6 class="mb-4">: {{ $aset->nama }}</h6>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6 class="mb-4">Pemilik </h6>
                                                    </div>
                                                    <div class="col-8">
                                                        @if($pemilik == null)
                                                        : -
                                                        @else
                                                        <h6 class="mb-4">: {{ $pemilik->karyawan->nama }} / {{ $pemilik->karyawan->nik }}</h6>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6 class="mb-4">IP Address</h6>
                                                    </div>
                                                    <div class="col-8">
                                                        <h6 class="mb-4">: {{ $aset->ip }}</h6>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6 class="mb-4">Serial </h6>
                                                    </div>
                                                    <div class="col-8">
                                                        <h6 class="mb-4">: {{ $aset->serial }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h6 class="mb-">Status </h6>
                                                    </div>
                                                    <div class="col-7">
                                                        <h6 class="mb-4">: {{ $aset->status }}</h6>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h6 class="mb-">Total Perbaikan </h6>
                                                    </div>
                                                    <div class="col-7">
                                                        <h6 class="mb-4">:
                                                            {{ $perbaikan }}
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h6 class="mb-">Tanggal Awal Diterima </h6>
                                                    </div>
                                                    <div class="col-7">
                                                        <?php
                                                        $time1 = strtotime($aset->tanggal_awal_diterima);
                                                        $tanggal_awal_diterima = date('d M, Y', $time1);
                                                        ?>
                                                        <h6 class="mb-4">: <?= $tanggal_awal_diterima; ?></h6>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h6 class="mb-">Tanggal Rusak Total </h6>
                                                    </div>
                                                    <div class="col-7">
                                                        <?php
                                                        $time2 = strtotime($aset->tanggal_rusak_total);
                                                        $tanggal_rusak_total = date('d M, Y', $time2);
                                                        ?>
                                                        @if($aset->tanggal_rusak_total == null)
                                                        : -
                                                        @else
                                                        <h6 class="mb-4">: <?= $tanggal_rusak_total; ?></h6>
                                                        @endif
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