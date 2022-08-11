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
                                    <h2 class="app-page-title">Data Aset Hardware</h2><br>

                                    <br>
                                    <div class="row">
                                        <div class="col-5 ">
                                            <div class="row">
                                                <div class="col-2 text-center">
                                                    <a href="/admin/print-all-aset-hardware" target="_blank" target="_blank" class="btn btn-outline-info" style="border:none;text-decoration: none; color:black; padding:5px; margin: 0; " title="Cetak Semua Tiket">
                                                        <i class="bi bi-printer" style="font-size:25px"></i></span>
                                                    </a>
                                                </div>
                                                <div class="col" style="padding-top: 8px">
                                                    <h6> Cetak Aset Hardware</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <form action="/admin/filter-aset-hardware-day-month-year" method="post" target="_blank">
                                                @csrf
                                                <div class="row">
                                                    <div class="col pb-2">
                                                        <label for="jenis_aset_id" class="form-label">Jenis Aset</label>
                                                        <select class="form-select form-select-sm @error('jenis_aset_id') is-invalid @enderror jenis_aset_id" id="jenis_aset_id" name="jenis_aset_id" id="single-select-field" data-placeholder="Pilih..">
                                                            <option selected disabled>--Pilih Jenis Aset--</option>
                                                            @foreach($jenis_aset as $jenis)
                                                            <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('jenis_aset_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                </div>
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
                                    <hr>
                                    <div class="row">
                                        <div class="col-5 ">
                                            <div class="row">
                                                <div class="col-2 text-center">

                                                </div>
                                                <div class="col" style="padding-top: 8px">
                                                    <h6> Cetak Pemilik Aset Hardware</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <form action="/admin/filter-hardware-owner-karyawan" method="post" target="_blank">
                                                @csrf
                                                <div class="row">
                                                    <div class="col pb-2">
                                                        <label for="karyawan_id" class="form-label">NIK & Karyawan</label>
                                                        <select class="form-select form-select-sm @error('karyawan_id') is-invalid @enderror karyawan_id" id="karyawan_id" name="karyawan_id" id="single-select-field" data-placeholder="Pilih..">
                                                            <option selected disabled>--Pilih Karyawan--</option>
                                                            @foreach($karyawan as $karyawan)
                                                            <option value="{{ $karyawan->id }}">{{ $karyawan->nik }} - {{ $karyawan->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('karyawan_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                </div>


                                                <div class="col pb-2">
                                                    <button type="submit" class="btn btn-outline-info" style="margin-top: 26px; "><i class="bi bi-printer" style="font-size:17px"></i> Cetak</button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <div class="card-body">
                                    <h2 class="app-page-title">Data Aset Software</h2><br>

                                    <br>
                                    <div class="row">

                                        <div class="col-5 ">
                                            <div class="row">
                                                <div class="col-2 text-center">
                                                    <a href="/admin/print-all-aset-software" target="_blank" target="_blank" class="btn btn-outline-info" style="border:none;text-decoration: none; color:black; padding:5px; margin: 0; " title="Cetak Semua Tiket">
                                                        <i class="bi bi-printer" style="font-size:25px"></i></span>
                                                    </a>
                                                </div>
                                                <div class="col" style="padding-top: 8px">
                                                    <h6> Cetak Aset Software</h6>
                                                </div>
                                            </div><br><br>
                                        </div>
                                        <div class="col">
                                            <form action="/admin/filter-aset-software-installon-hardware" method="post" target="_blank">
                                                @csrf
                                                <div class="row">
                                                    <div class="col pb-2">
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


                                                </div>
                                                <div class="col pb-2">
                                                    <button type="submit" class="btn btn-outline-info" style="margin-top: 26px; "><i class="bi bi-printer" style="font-size:17px"></i> Cetak</button>
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
</div>
<script>
    $('#single-select-field').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
    });
</script>

@endsection