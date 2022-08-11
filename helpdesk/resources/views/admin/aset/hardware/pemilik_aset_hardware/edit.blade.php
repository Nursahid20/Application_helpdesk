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
                                    <h4 class="card-title">Form Tambah Pemilik Hardware</h4><br>
                                    <form action="/admin/hardware-owner/{{ $data[0]->kode_hardware }}/{{ $aset->id }}/update" method="post">
                                        @method('put')
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-6" style="padding: 0 0 0 15px;">
                                                <label for="nama_aset" class="form-label">Nama Hardware</label>
                                                <input type="text" class="form-control" value="{{ $data[0]->nama }}" disabled>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label for="karyawan_id" class="form-label">NIK & Nama karyawan</label>
                                                <select class="form-select form-select-sm @error('karyawan_id') is-invalid @enderror" name="karyawan_id" id="single-select-field" data-placeholder="Pilih..">
                                                    <option></option>
                                                    @foreach($karyawan as $karyawan)
                                                    @if(old('karyawan_id', $aset->karyawan_id) == $karyawan->id)
                                                    <option value="{{ $karyawan->id }}" selected>{{ $karyawan->nik  }} - {{ $karyawan->nama }}</option>
                                                    @else
                                                    <option value="{{ $karyawan->id }}">{{ $karyawan->nik  }} - {{ $karyawan->nama }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                                @error('karyawan_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-6" style="padding-right: 0px !important">
                                                <div>
                                                    <label for="tanggal_diterima" class="form-label">Tanggal Diterima</label>
                                                    <input type="date" class="form-control @error('tanggal_diterima') is-invalid @enderror" name="tanggal_diterima" value="{{ old('tanggal_diterima', $aset->tanggal_diterima) }}" id="tanggal_diterima" style="border-color: #ced4da; padding: 7px;">
                                                    @error('tanggal_diterima')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6" style="padding-right: 0px !important">
                                                <div>
                                                    <label for="tanggal_berakhir" class="form-label">Tanggal Berakhir</label>
                                                    <input type="date" class="form-control @error('tanggal_berakhir') is-invalid @enderror" name="tanggal_berakhir" value="{{ old('tanggal_berakhir', $aset->tanggal_berakhir) }}" id="tanggal_berakhir" style="border-color: #ced4da; padding: 7px;">
                                                    @error('tanggal_berakhir')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
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