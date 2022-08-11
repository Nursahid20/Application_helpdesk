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
                                    <h2 class="app-page-title">Cetak Nota Permintaan Pembelian Hardware</h2><br>
                                    <?php if (session('success')) {  ?>
                                        <div id="flash" data-flash="{{ session('success') }}" style="background-color:red"></div>
                                        <?php session()->forget('success'); ?>
                                    <?php } ?>
                                    <form action="/admin/print-nota-purchase-requisition" method="post">
                                        @csrf
                                        <input type="hidden" class="form-control" value="{{ $jumlah }}" name="jumlah" id="jumlah">
                                        <div class="row">

                                            <div class="col-2">
                                                <label for="kode_barang" class="form-label">Kode Nota Barang</label>
                                                <input type="text" readonly class="form-control @error('kode_barang') is-invalid @enderror kode_barang" name="kode_barang" id="kode_barang">
                                                @error('kode_barang')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <label for="to_company" class="form-label">Untuk Instansi / Vendor</label>
                                                <input type="text" placeholder="instansi/vendor" class="form-control @error('to_company') is-invalid @enderror to_company" name="to_company" id="to_company">
                                                @error('to_company')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <label for="from_company" class="form-label">Dari Instansi / Vendor</label>
                                                <input type="text" placeholder="instansi/vendor" class="form-control @error('from_company') is-invalid @enderror from_company" name="from_company" id="from_company">
                                                @error('from_company')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-2">
                                                <label for="tanggal" class="form-label">Tanggal</label>
                                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror tanggal" style="border-color: #ced4da; padding: 7px;" name="tanggal" id="tanggal">
                                                @error('tanggal')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col mb-3 mt-3">
                                            <div>
                                                <label for="id_permintaan_pembelian" class="form-label">Permintaan Pembelian</label>
                                                <select class="form-select @error('id_permintaan_pembelian') is-invalid @enderror id_permintaan_pembelian" name="id_permintaan_pembelian[]" id="multiple-select-field" data-placeholder="Pilih.." multiple>
                                                    @foreach($permintaan_pembelian as $permintaan_pembelian)
                                                    <option value="{{ $permintaan_pembelian->id }}">{{ $permintaan_pembelian->nama_barang }} ~ jumlah : {{ $permintaan_pembelian->qty }} ~ harga satuan : {{ $permintaan_pembelian->satuan_harga_barang }}
                                                        ~ Total Harga : {{ $permintaan_pembelian->total_harga_barang }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('id_permintaan_pembelian')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4 pb-2">
                                            <button type="submit" class="btn btn-outline-info"> Buat Nota</button>
                                        </div>
                                    </form>
                                    <br>
                                    <br><br><br>

                                    <h2 class="app-page-title">Data Nota Permintaan Pembelian Hardware</h2><br>

                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        No
                                                    </th>
                                                    <th>
                                                        Kode Barang
                                                    </th>
                                                    <th>
                                                        Untuk Instansi / Vendor
                                                    </th>
                                                    <th>
                                                        Dari Instansi / Vendor
                                                    </th>
                                                    <th>
                                                        Tanggal
                                                    </th>
                                                    <th class="text-center">
                                                        Aksi
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->kode_barang }}</td>
                                                    <td>{{ $data->to_company }}</td>
                                                    <td>{{ $data->from_company }}</td>
                                                    <td>{{ $data->tanggal }}</td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="col-sm-4" style="margin-top: 10px; padding:0">
                                                                    <a href="/admin/print-purchase-requisition/{{ $data->kode_barang }}" type="submit" target="_blank" class="btn btn-outline-info"><i class="bi bi-printer" style="font-size:17px; padding:0;margin:0"></i> <br> Cetak</a>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <a href="/admin/info-purchase-requisition/{{ $data->kode_barang }}" class="btn-sm btn btn-outline-warning " style="border:none;text-decoration: none; color:#ffc107; padding:0 !important;margin:19px 0 0 0 !important;">
                                                                    <span class="mdi mdi-18px mdi-information-outline" title="info"></span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
    $('#multiple-select-field').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        closeOnSelect: false,
    });



    $(document).ready(function() {
        var Text = $(this).val();
        var jumlah = parseInt($("#jumlah").val());
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yy = today.getFullYear('yy').toString().slice(-2);
        $("#kode_barang").val("BR-" + mm + dd + yy + jumlah);
    });
</script>

@endsection