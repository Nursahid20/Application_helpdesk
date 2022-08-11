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
                                    <h4 class="card-title">Form Tambah Hardware</h4><br>
                                    <form action="/admin/aset-hardware" method="post">
                                        @csrf
                                        <input type="hidden" class="form-control" name="kode_hardware" id="kode_hardware">
                                        <input type="hidden" class="form-control" name="kode_jenis_aset_hardware" id="kode_jenis_aset_hardware">
                                        <input type="hidden" class="form-control" value="{{ $id }}" id="last_id_hardware">
                                        <div class="row mb-3">
                                            <div class="col">
                                                <div>
                                                    <label for="nama" class="form-label">Nama</label>
                                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama') }}" placeholder="nama" style="border-color: #ced4da; ">
                                                    @error('nama')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-6 mb-3">
                                                <label for="jenis_hardware" class="form-label">Jenis Hardware</label>
                                                <select class="form-select form-select-sm @error('jenis_hardware') is-invalid @enderror jenis_hardware" name="jenis_hardware" id="single-select-field" data-placeholder="Pilih..">
                                                    <option></option>
                                                    @foreach($jenis_hardware as $jenis_hardware)
                                                    @if(old('jenis_hardware') == $jenis_hardware->id)
                                                    <option value="{{ $jenis_hardware->kode }}" selected>{{ $jenis_hardware->nama }}</option>
                                                    @else
                                                    <option value="{{ $jenis_hardware->kode }}">{{ $jenis_hardware->nama }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                                @error('jenis_hardware')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <div>
                                                    <label for="harga" class="form-label">Harga</label>
                                                    <input type="text" class="form-control  @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}" placeholder="harga" id="rupiah" style="border-color: #ced4da">
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
                                                    <label for="ip" class="form-label">IP Address</label>
                                                    <input type="text" class="form-control @error('ip') is-invalid @enderror" name="ip" id="ip" value="{{ old('ip') }}" placeholder="IP address" style="border-color: #ced4da; ">
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
                                                    <input type="text" class="form-control @error('serial') is-invalid @enderror" name="serial" id="serial" value="{{ old('serial') }}" placeholder="serial" style="border-color: #ced4da; ">
                                                    @error('serial')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div>
                                                    <label for="status" class="form-label">Status </label>
                                                    <select class="form-select form-select-sm @error('status') is-invalid @enderror" name="status" id="">
                                                        <option selected disabled style="color: grey;"> Pilih..</option>
                                                        <option value="Baik">Baik</option>
                                                        <option value="Cukup Baik">Cukup Baik</option>
                                                        <option value="Rusak">Rusak</option>
                                                    </select>
                                                    @error('status')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-4">
                                                <div>
                                                    <label for="tanggal_awal_diterima" class="form-label">Tanggal Awal Diterima</label>
                                                    <input type="date" class="form-control @error('tanggal_awal_diterima') is-invalid @enderror" value="{{ old('tanggal_awal_diterima') }}" name="tanggal_awal_diterima" id="tanggal_awal_diterima" style="border-color: #ced4da; padding: 7px;">
                                                    @error('tanggal_awal_diterima')
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

    $(".jenis_hardware").on('change', function() {
        var Text = $(this).val();
        var last_id_hardware = parseInt($("#last_id_hardware").val());
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yy = today.getFullYear('yy').toString().slice(-2);
        Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
        $("#kode_hardware").val(Text + "-" + mm + dd + yy + (last_id_hardware + 1));
        $("#kode_jenis_aset_hardware").val(Text);
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