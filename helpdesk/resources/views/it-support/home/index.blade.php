@extends('layout.main')
@section('container')
@include('partials.navSidebar')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="tab-content tab-content-basic">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="statistics-details d-flex align-items-center justify-content-between">
                                        <div>
                                            <p class="statistics-title">Total Tiket Terselesaikan</p>
                                            <h3 class="rate-percentage text-center">{{ $tiket_selesai; }}</h3>
                                        </div>
                                        <div class="d-none d-md-block">
                                            <p class="statistics-title">Total Tiket dalam Proses</p>
                                            <h3 class="rate-percentage text-center">{{ $tiket_proses; }}</h3>
                                        </div>
                                        <div class="d-none d-md-block">
                                            <p class="statistics-title">Total Tiket Menunggu Persetujuan</p>
                                            <h3 class="rate-percentage text-center">{{ $tiket_menunggu }}</h3>
                                        </div>
                                        <div class="d-none d-md-block">
                                            <p class="statistics-title">Total Tiket Ditolak</p>
                                            <h3 class="rate-percentage text-center">{{ $tiket_ditolak }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-8 d-flex flex-column">
                                    <div class="row flex-grow">
                                        <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                                            <div class="card card-rounded">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h4 class="card-title card-title-dash">Grafik Tiket tahun 2022</h4><br><br>
                                                        </div>
                                                        <div class="col">

                                                            <div id="performance-line-legend"></div>
                                                        </div>
                                                    </div>
                                                    <div class="chartjs-wrapper mt-5">
                                                        <canvas id="performaneLine"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 d-flex flex-column">
                                    <div class="row flex-grow">

                                        <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                            <div class="card card-rounded">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-6  text-center">
                                                            <div>
                                                                <p class="statistics-title">Total Karyawan</p>
                                                                <h3 class="rate-percentage">{{ $karyawan }}</h3>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6  text-center pb-4">
                                                            <div>
                                                                <p class="statistics-title">Total IT Support</p>
                                                                <h3 class="rate-percentage">{{ $it_support; }}</h3>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6  text-center">
                                                            <div>
                                                                <p class="statistics-title">Total Hardware</p>
                                                                <h3 class="rate-percentage">{{ $hardware }}</h3>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6  text-center">
                                                            <div>
                                                                <p class="statistics-title">Total Software</p>
                                                                <h3 class="rate-percentage">{{ $software; }}</h3>
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
        </div>
    </div>
</div>

<input type="hidden" value="<?= $january_finish ?>" id="january_finish">
<input type="hidden" value="<?= $february_finish ?>" id="february_finish">
<input type="hidden" value="<?= $march_finish ?>" id="march_finish">
<input type="hidden" value="<?= $april_finish ?>" id="april_finish">
<input type="hidden" value="<?= $may_finish ?>" id="may_finish">
<input type="hidden" value="<?= $june_finish ?>" id="june_finish">
<input type="hidden" value="<?= $july_finish ?>" id="july_finish">
<input type="hidden" value="<?= $agust_finish ?>" id="agust_finish">
<input type="hidden" value="<?= $september_finish ?>" id="september_finish">
<input type="hidden" value="<?= $october_finish ?>" id="october_finish">
<input type="hidden" value="<?= $november_finish ?>" id="november_finish">
<input type="hidden" value="<?= $december_finish ?>" id="december_finish">

<input type="hidden" value="<?= $january_denied ?>" id="january_denied">
<input type="hidden" value="<?= $february_denied ?>" id="february_denied">
<input type="hidden" value="<?= $march_denied ?>" id="march_denied">
<input type="hidden" value="<?= $april_denied ?>" id="april_denied">
<input type="hidden" value="<?= $may_denied ?>" id="may_denied">
<input type="hidden" value="<?= $june_denied ?>" id="june_denied">
<input type="hidden" value="<?= $july_denied ?>" id="july_denied">
<input type="hidden" value="<?= $agust_denied ?>" id="agust_denied">
<input type="hidden" value="<?= $september_denied ?>" id="september_denied">
<input type="hidden" value="<?= $october_denied ?>" id="october_denied">
<input type="hidden" value="<?= $november_denied ?>" id="november_denied">
<input type="hidden" value="<?= $december_denied ?>" id="december_denied">

<input type="hidden" value="<?= $january_wait ?>" id="january_wait">
<input type="hidden" value="<?= $february_wait ?>" id="february_wait">
<input type="hidden" value="<?= $march_wait ?>" id="march_wait">
<input type="hidden" value="<?= $april_wait ?>" id="april_wait">
<input type="hidden" value="<?= $may_wait ?>" id="may_wait">
<input type="hidden" value="<?= $june_wait ?>" id="june_wait">
<input type="hidden" value="<?= $july_wait ?>" id="july_wait">
<input type="hidden" value="<?= $agust_wait ?>" id="agust_wait">
<input type="hidden" value="<?= $september_wait ?>" id="september_wait">
<input type="hidden" value="<?= $october_wait ?>" id="october_wait">
<input type="hidden" value="<?= $november_wait ?>" id="november_wait">
<input type="hidden" value="<?= $december_wait ?>" id="december_wait">
@endsection