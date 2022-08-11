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
                                    <h2 class="app-page-title">Data Total Tiket</h2><br>
                                    <div class="row">
                                        <div class="col-1 text-center">

                                            <a href="/admin/print-all-detail-total-ticket" target="_blank" target="_blank" class="btn btn-outline-info" style="border:none;text-decoration: none; color:black; padding:5px; margin: 0; " title="Cetak Semua Tiket">
                                                <i class="bi bi-printer" style="font-size:25px"></i></span>
                                            </a>
                                        </div>
                                        <div class="col" style="padding-top: 8px">
                                            <h6> Cetak Tiket </h6>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <h3>Filter Detail Data Total Tiket</h3><br>
                                    <form action="/admin/print-detail-ticket-month-year" method="post" target="_blank">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-4 pb-2">
                                                <label for="bulan" class="form-label">Bulan</label>
                                                <select class="form-select form-select-sm @error('bulan') is-invalid @enderror bulan" id="bulan" name="bulan" id="single-select-field" data-placeholder="Pilih..">
                                                    <option selected disabled>--Pilih Bulan--</option>
                                                    <option value="01">1</option>
                                                    <option value="02">2</option>
                                                    <option value="03">3</option>
                                                    <option value="04">4</option>
                                                    <option value="05">5</option>
                                                    <option value="06">6</option>
                                                    <option value="07">7</option>
                                                    <option value="08">8</option>
                                                    <option value="09">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                                @error('bulan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
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
                                            <div class="col-sm-4 pb-2">
                                                <button type="submit" class="btn btn-outline-info" style="margin-top: 26px; margin-left:10px;"><i class="bi bi-printer" style="font-size:17px"></i> Cetak</button>
                                            </div>
                                        </div><br>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#single-select-field').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
    });
</script>

@endsection