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
                                    <h4 style="font-weight: bold;"> Permintaan Pembelian</h4>
                                    <br>
                                    <?php if (session('success')) {  ?>
                                        <div id="flash" data-flash="{{ session('success') }}" style="background-color:red"></div>
                                        <?php session()->forget('success'); ?>
                                    <?php } ?>
                                    <a href="/admin/purchase-requisition-hardware/create" style="text-decoration:none">
                                        <button class="btn btn-outline-success border-0" style="padding: 9px 22px 8px 22px;">
                                            <div class="row row-cols-auto">
                                                <div class="col" style="padding: 0px 3px">
                                                    <span class="mdi mdi-plus"></span>
                                                </div>
                                                <div class="col" style="padding: 0px 3px">
                                                    <div>Tambah Permintaan Pembelian</div>
                                                </div>
                                            </div>
                                        </button>
                                    </a>
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        No
                                                    </th>
                                                    <th>
                                                        Tanggal
                                                    </th>
                                                    <th>
                                                        Nama
                                                    </th>
                                                    <th>
                                                        Satuan Harga Barang
                                                    </th>
                                                    <th>
                                                        Qty
                                                    </th>
                                                    <th>
                                                        Total Harga Barang
                                                    </th>
                                                    <th>
                                                        Catatan
                                                    </th>
                                                    <th class="text-center">
                                                        Aksi
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $data)
                                                <tr>
                                                    <td> {{ $loop->iteration }}</td>
                                                    <td>
                                                        <?php
                                                        $explode = explode(' ', $data->created_at);
                                                        echo $explode[0] . '<br>';
                                                        echo $explode[1];
                                                        ?>
                                                    </td>
                                                    <td>{{ $data->nama_barang }}</td>
                                                    <td>{{ $data->satuan_harga_barang }}</td>
                                                    <td>{{ $data->qty }}</td>
                                                    <td>{{ $data->total_harga_barang }}</td>
                                                    <td>{{ $data->catatan }}</td>

                                                    <td class="text-center">
                                                        <a href="/admin/purchase-requisition-hardware/{{ $data->id }}/edit" class="btn-sm btn btn-outline-info m-0" style="border:none;text-decoration: none; color:#0dcaf0; padding:5px 5px 2px 5px">
                                                            <span class=" mdi mdi-18px mdi-tooltip-edit" title="edit"></span>
                                                        </a>
                                                        <a href="/admin/purchase-requisition-hardware/delete/{{ $data->id }}" class="btn-sm btn btn-outline-danger m-0 delete-confirm" style="border:none;text-decoration: none; color:#dc3545; padding:5px 5px 2px 5px"><span class=" mdi mdi-18px mdi-delete-forever btn-delete" title="delete"></span></a>
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
    <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endsection