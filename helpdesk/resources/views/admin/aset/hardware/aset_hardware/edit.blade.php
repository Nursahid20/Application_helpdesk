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
                                    <h4 class="card-title">Form Edit Hardware</h4><br>
                                    <form action="/admin/aset-hardware/{{ $aset->kode_hardware }}" method="post">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" name="aset_hardware_id" value="{{ $aset->id }}">
                                        <div class="row mb-3">
                                            <div class="col">
                                                <div>
                                                    <label for="nama" class="form-label">Nama</label>
                                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama', $aset->nama) }}" style="border-color: #ced4da; ">

                                                    @error('nama')
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
                                                    <label for="ip" class="form-label">IP Address</label>
                                                    <input type="text" class="form-control @error('ip') is-invalid @enderror" name="ip" id="ip" value="{{ old('ip', $aset->ip) }}" style="border-color: #ced4da; ">
                                                    @error('ip')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div>
                                                    <label for="serial" class="form-label">Serial</label>
                                                    <input type="text" class="form-control @error('serial') is-invalid @enderror" name="serial" id="serial" value="{{ old('serial', $aset->serial) }}" style="border-color: #ced4da; ">
                                                    @error('serial')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div>
                                                    <label for="harga" class="form-label">Harga</label>
                                                    <input type="text" class="form-control  @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga', $aset->harga) }}" placeholder="harga" id="rupiah" style="border-color: #ced4da">
                                                    @error('harga')
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
                                                    <label for="status" class="form-label">Status </label>
                                                    <select class="form-select form-select-sm @error('status') is-invalid @enderror" name="status" id="single-select-field_1">
                                                        @if($aset->status == 'Baik')
                                                        <option value="Baik" selected>Baik</option>
                                                        <option value="Cukup Baik">Cukup Baik</option>
                                                        <option value="Rusak">Rusak</option>
                                                        @elseif($aset->status == 'Cukup Baik')
                                                        <option value="Cukup Baik" selected>Cukup Baik</option>
                                                        <option value="Baik">Baik</option>
                                                        <option value="Rusak">Rusak</option>
                                                        @elseif($aset->status == 'Rusak')
                                                        <option value="Rusak" selected>Rusak</option>
                                                        <option value="Baik">Baik</option>
                                                        <option value="Cukup Baik">Cukup Baik</option>
                                                        @else
                                                        <option value="Baik">Baik</option>
                                                        <option value="Cukup Baik">Cukup Baik</option>
                                                        <option value="Rusak">Rusak</option>
                                                        @endif
                                                    </select>
                                                    @error('status')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div>
                                                    <label for="tanggal_awal_diterima" class="form-label">Tanggal Awal Diterima</label>
                                                    <input type="date" class="form-control @error('tanggal_awal_diterima') is-invalid @enderror" name="tanggal_awal_diterima" value="{{ old('tanggal_awal_diterima', $aset->tanggal_awal_diterima) }}" id="tanggal_awal_diterima" style="border-color: #ced4da; padding: 7px;">
                                                    @error('tanggal_awal_diterima')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div>
                                                    <label for="tanggal_rusak_total" class="form-label">Tanggal Rusak Total</label>
                                                    <input type="date" class="form-control " name="tanggal_rusak_total" value="{{ old('tanggal_rusak_total', $aset->tanggal_rusak_total) }}" id="tanggal_rusak_total" style="border-color: #ced4da; padding: 7px;">
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