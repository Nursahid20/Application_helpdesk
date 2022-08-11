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
                                    <h4 class="card-title">Form Tambah Perbaikan Hardware</h4><br>
                                    <form action="/admin/hardware-repair-details/{{ $data[0]->kode_hardware }}/store" method="post">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-6" style="padding: 0 0 0 15px;">
                                                <label for="nama_aset" class="form-label">Nama Hardware</label>
                                                <input type="text" class="form-control" value="{{ $data[0]->nama }}" disabled>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <div>
                                                    <label for="keterangan_kerusakan" class="form-label">Keterangan Kerusakan</label>
                                                    <input type="text" class="form-control @error('keterangan_kerusakan') is-invalid @enderror" name="keterangan_kerusakan" value="{{ old('keterangan_kerusakan') }}" placeholder="Keterangan Kerusakan" id="keterangan_kerusakan" style="border-color: #ced4da">
                                                    @error('keterangan_kerusakan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <div>
                                                    <label for="biaya_perbaikan" class="form-label">Biaya Perbaikan</label>
                                                    <input type="text" class="form-control  @error('biaya_perbaikan') is-invalid @enderror" name="biaya_perbaikan" value="{{ old('biaya_perbaikan') }}" placeholder="Biaya Kerusakan" id="rupiah" style="border-color: #ced4da">
                                                    @error('biaya_perbaikan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-4" style="padding-right: 0px !important">
                                                <div>
                                                    <label for="tanggal_perbaikan" class="form-label">Tanggal Perbaikan</label>
                                                    <input type="date" class="form-control @error('tanggal_perbaikan') is-invalid @enderror" name="tanggal_perbaikan" value="{{ old('tanggal_perbaikan') }}" id="tanggal_perbaikan" style="border-color: #ced4da; padding: 7px;">
                                                    @error('tanggal_perbaikan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-1" style="width:35px;padding-top: 33px; padding-right: 0px !important">
                                                -
                                            </div>
                                            <div class="col-4" style="padding-top: 30px; padding-left: 0px !important">
                                                <input type="date" class="form-control" value="{{ old('sampai_tanggal_perbaikan') }}" name="sampai_tanggal_perbaikan" id="sampai_tanggal_perbaikan" style="border-color: #ced4da; padding: 7px;">
                                            </div>
                                            <div class="col-3">
                                                <div class="row" style="padding-top: 27px; padding-left: 0px !important">
                                                    <div class="col">
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp * Klik Jika Rusak &nbsp &nbsp
                                                        </label>
                                                        <input class="form-check-input" name="status_id" type="checkbox" id="flexCheckChecked">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-success border-0" style="padding: 9px 22px 8px 22px;">
                                            <div class="col" style="padding: 0px 3px">
                                                <div>simpan</div>
                                            </div>
                                        </button>
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

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
    rupiah.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    })
</script>
@endsection