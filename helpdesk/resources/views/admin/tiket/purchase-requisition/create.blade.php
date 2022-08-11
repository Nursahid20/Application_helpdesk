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

                                    <h4 class="card-title">Form Tambah Permintaan Pembelian</h4>
                                    <br>
                                    <form action="/admin/purchase-requisition-hardware" method="post">
                                        @csrf
                                        <div class="col-12 mb-3">
                                            <label for="tiket_id" class="form-label">Permintaan Hardware Karyawan</label>
                                            <select class="form-select form-select-sm @error('tiket_id') is-invalid @enderror tiket_id" name="tiket_id" id="single-select-field" data-placeholder="Pilih..">
                                                <option></option>
                                                @foreach($data as $data)
                                                @if(old('tiket_id') == $data->id)
                                                <option value="{{ $data->id }}" selected>{{ $data->kode_tiket }} ~ {{ $data->karyawan->nama }} ~ {{ $data->unit }} ~ {{ $data->subject }} ~ {{ $data->deskripsi }}</option>
                                                @else
                                                <option value="{{ $data->id }}">{{ $data->kode_tiket }} ~ {{ $data->karyawan->nama }} ~ {{ $data->unit }} ~ {{ $data->subject }} ~ {{ $data->deskripsi }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                            @error('tiket_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <div>
                                                    <label for="nama_barang" class="form-label">Nama Barang</label>
                                                    <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" placeholder="nama barang" id="nama_barang" style="border-color: #ced4da" value="{{ old('nama_barang') }}">
                                                    @error('nama_barang')
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
                                                    <label for="satuan_harga_barang" class="form-label">Harga Barang Satuan</label>
                                                    <input type="number" class="form-control  @error('satuan_harga_barang') is-invalid @enderror" name="satuan_harga_barang" value="{{ old('satuan_harga_barang') }}" placeholder="Biaya Kerusakan" oninput="calculate()" id="rupiah" style="border-color: #ced4da">
                                                    @error('satuan_harga_barang')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div>
                                                    <label for="qty" class="form-label">Qty / Jumlah</label>
                                                    <input type="number" class="form-control @error('qty') is-invalid @enderror" name="qty" id="qty" oninput="calculate()" placeholder="qty / jumlah" value="{{ old('qty') }}" style="border-color: #ced4da">
                                                    @error('qty')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div>
                                                    <label for="total_harga_barang" class="form-label">Total harga barang</label>
                                                    <input type="number" class="form-control @error('total_harga_barang') is-invalid @enderror" placeholder="total harga barang" name="total_harga_barang" id="total_harga_barang" value="{{ old('total_harga_barang') }}" style="border-color: #ced4da">
                                                    @error('total_harga_barang')
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
                                                    <label for="catatan" class="form-label">Catatan</label>
                                                    <input type="text" class="form-control @error('catatan') is-invalid @enderror" name="catatan" id="catatan" placeholder="catatan" value="{{ old('catatan') }}" style="border-color: #ced4da; padding:7px;">
                                                    @error('catatan')
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
                                                <div>Simpan</div>
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

    public





    function calculate() {

        var value_satuan = document.getElementById("rupiah").value;
        var qty = document.getElementById("qty").value;
        var myResult = value_satuan * qty;

        document.getElementById('total_harga_barang').value = myResult;
    }


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

    // untuk membuat slug otomatis
    const nama = document.querySelector('#nama');
    const slug = document.querySelector('#slug');

    nama.addEventListener('change', function() {
        fetch('/admin/karyawan/checkSlug?nama=' + nama.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    })

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })

    function previewImage() {
        const image = document.querySelector('#img_profile');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection