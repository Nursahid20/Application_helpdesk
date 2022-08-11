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
                                    <h2 class="app-page-title">Filter Grafik Data Tiket</h2><br>
                                    <form action="/admin/print-grafik-demaged-hardware" method="post" target="_blank">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-4 pb-2">
                                                <label for="tahun" class="form-label">Tahun</label>
                                                <select class="form-select form-select-sm @error('tahun') is-invalid @enderror tahun" id="tahun" name="tahun" value="">
                                                    <option selected disabled>--Pilih Tahun--</option>
                                                    <?php
                                                    for ($i = date('Y'); $i >= date('Y') - 32; $i -= 1) {
                                                        echo "<option value='$i'> $i </option>";
                                                    }
                                                    ?>
                                                </select>
                                                @error('tahun')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror

                                            </div>
                                            <div class="col pb-2">
                                                <button type="submit" class="btn btn-outline-info" style="margin-top: 26px; margin-left:10px;"><i class="bi bi-printer" style="font-size:17px"></i> Cetak</button>
                                            </div>
                                        </div><br>
                                    </form>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection