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
                                    <h4 class="card-title">Form Edit Perbaikan Hardware</h4><br>
                                    <form action="/admin/aset-software-install-on/{{ $hardware[0]->kode_hardware }}/{{ $aset[0]->id }}/update" method="post">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" name="aset_hardware_id" id="aset_hardware_id" value="{{ $hardware[0]->id }}">
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <label for="nama_aset" class="form-label">Nama Hardware</label>
                                                <input type="text" class="form-control" value="{{ $hardware[0]->nama }}" disabled>
                                            </div>
                                            <div class="col-6">
                                                <label for="aset_software_id" class="form-label">Nama Software</label>
                                                <input type="text" class="form-control" value="{{ $name_software }}" disabled>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <div>
                                                    <label for="serial" class="form-label">Serial</label>
                                                    <input type="text" class="form-control " name="serial" value="{{ old('serial', $aset[0]->serial) }}" placeholder="serial" id="serial" style="border-color: #ced4da">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <div>
                                                    <label for="harga" class="form-label">Harga</label>
                                                    <input type="text" class="form-control" name="harga" value="{{ old('harga', $aset[0]->harga) }}" placeholder="harga" id="rupiah" style="border-color: #ced4da">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <div>
                                                    <label for="tanggal_install" class="form-label">Tanggal Install</label>
                                                    <input type="date" class="form-control @error('tanggal_install') is-invalid @enderror" name="tanggal_install" value="{{ old('tanggal_install', $aset[0]->tanggal_install) }}" id="tanggal_install" style="border-color: #ced4da; padding: 7px;">
                                                    @error('tanggal_install')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div>
                                                    <label for="tanggal_lisensi_berakhir" class="form-label">Tanggal Lisensi Berakhir</label>
                                                    <input type="date" class="form-control" name="tanggal_lisensi_berakhir" value="{{ old('tanggal_lisensi_berakhir', $aset[0]->tanggal_lisensi_berakhir) }}" id="tanggal_lisensi_berakhir" style="border-color: #ced4da; padding: 7px;">
                                                </div>
                                            </div>
                                        </div>
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