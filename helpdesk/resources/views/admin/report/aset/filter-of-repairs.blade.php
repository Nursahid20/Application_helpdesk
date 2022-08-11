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
                                    <h2 class="app-page-title">Data Biaya Perbaikan Aset Hardware</h2><br>

                                    <div class="col">
                                        <form action="/admin/print-cost-of-repairs" method="post" target="_blank">
                                            @csrf
                                            <div class="row">
                                                <div class="col-6 pb-2">
                                                    <label for="aset_hardware_id" class="form-label">Aset Hardware</label>
                                                    <select class="form-select form-select-sm @error('aset_hardware_id') is-invalid @enderror aset_hardware_id" id="aset_hardware_id" name="aset_hardware_id" id="single-select-field" data-placeholder="Pilih..">
                                                        <option selected disabled>--Pilih Hardware--</option>
                                                        @foreach($aset_hardware as $aset_hardware)
                                                        <option value="{{ $aset_hardware->id }}">{{ $aset_hardware->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('aset_hardware_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                                <div class="col pb-2">
                                                    <button type="submit" class="btn btn-outline-info" style="margin-top: 26px; "><i class="bi bi-printer" style="font-size:17px"></i> Cetak</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                                <br>
                                <hr><br>
                                <div class="card-body">
                                    <h2 class="app-page-title">Data Aset Hardware Rusak</h2><br>

                                    <div class="col">
                                        <form action="/admin/print-aset-hardware-demaged" method="post" target="_blank">
                                            @csrf

                                            <div class="row">
                                                <div class="col-sm-4 pb-2">
                                                    <label for="hari" class="form-label">hari</label>
                                                    <select class="form-select form-select-sm @error('hari') is-invalid @enderror hari" id="hari" name="hari" value="">
                                                        <option selected disabled>--Pilih hari--</option>
                                                        <?php
                                                        $year = date('Y');
                                                        $month = date('m');
                                                        $days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
                                                        for ($i = 1; $i <= $days; $i++) {
                                                        ?>
                                                            <option value="{{ $i }}">{{ $i }}</option>
                                                        <?php } ?>
                                                    </select>
                                                    @error('hari')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
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
                                                <div class="col pb-2">
                                                    <button type="submit" class="btn btn-outline-info" style="margin-top: 26px; "><i class="bi bi-printer" style="font-size:17px"></i> Cetak</button>
                                                </div>
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