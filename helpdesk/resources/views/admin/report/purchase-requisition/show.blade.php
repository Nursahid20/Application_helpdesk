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

                                    <h4>Detail Nota</h4>
                                    <hr>
                                    <br>
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-4">
                                                    <h6 class="mb-4">Kode Barang </h6>
                                                </div>
                                                <div class="col-8">
                                                    <h6 class="mb-4">: {{ $data->kode_barang }}</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <h6 class="mb-4">Kepada Perusahaan </h6>
                                                </div>
                                                <div class="col-8">
                                                    <h6 class="mb-4">: {{ $data->to_company }}</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <h6 class="mb-4">Dari Perusahaan </h6>
                                                </div>
                                                <div class="col-8">
                                                    <h6 class="mb-4">: {{ $data->from_company }}</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <h6 class="mb-4">Tanggal </h6>
                                                </div>
                                                <div class="col-8">
                                                    <h6 class="mb-4">: {{ $data->tanggal }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h4>Pemesanan Barang</h4>

                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Pemesan</th>
                                                    <th>Nama Barang</th>
                                                    <th>Satuan Harga Barang</th>
                                                    <th>Qty</th>
                                                    <th>Total Harga Barang</th>
                                                    <th>Catatan</th>
                                                </tr>
                                            </thead>

                                            @foreach($permintaan_pembelian as $permintaan_pembelian)
                                            <tbody>
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $permintaan_pembelian->tiket->karyawan->nama }}</td>
                                                    <td>{{ $permintaan_pembelian->nama_barang }}</td>
                                                    <td>{{ $permintaan_pembelian->satuan_harga_barang }}</td>
                                                    <td>{{ $permintaan_pembelian->qty }}</td>
                                                    <td>{{ $permintaan_pembelian->total_harga_barang }}</td>
                                                    <td>{{ $permintaan_pembelian->catatan }}</td>
                                                </tr>
                                            </tbody>
                                            @endforeach
                                        </table>
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
    <!-- page-body-wrapper ends -->
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
    </script>
    @endsection