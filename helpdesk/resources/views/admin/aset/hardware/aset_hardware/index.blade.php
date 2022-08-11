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
                                    <?php if (session('success')) {  ?>
                                        <div id="flash" data-flash="{{ session('success') }}" style="background-color:red"></div>
                                        <?php session()->forget('success'); ?>
                                    <?php } ?>
                                    <h4>Form Aset Hardware</h4><br>
                                    <?php if (auth()->user()->level_user == 'Admin') { ?>
                                        <a href="/admin/aset-hardware/create" style="text-decoration:none">
                                            <button class="btn btn-outline-success border-0" style="padding: 9px 22px 8px 22px;">
                                                <div class="row row-cols-auto">
                                                    <div class="col" style="padding: 0px 3px">
                                                        <span class="mdi mdi-plus"></span>
                                                    </div>
                                                    <div class="col" style="padding: 0px 3px">
                                                        <div>Tambah hardware</div>
                                                    </div>
                                                </div>
                                            </button>
                                        </a>
                                    <?php } ?>
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        No
                                                    </th>
                                                    <th>
                                                        Nama hardware
                                                    </th>
                                                    <th>
                                                        IP Address
                                                    </th>
                                                    <th>
                                                        Serial
                                                    </th>
                                                    <th>
                                                        Status
                                                    </th>
                                                    <th>
                                                        Tanggal Diterima
                                                    </th>
                                                    <th class="text-center">
                                                        Aksi
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($aset as $aset)
                                                <tr>
                                                    <td class="p-2 text-center">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td class="p-2">
                                                        <div class="row">
                                                            <div class="col-6" style="padding-top:11px; padding-right:0px">
                                                                <button class="btn btn-success">{{ $aset->kode_hardware }}</button>
                                                            </div>
                                                            <div class="col-6" style="padding-top:13px;padding-left:0px">
                                                                {{ $aset->nama }}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="p-2 text-center">
                                                        {{ $aset->ip }}
                                                    </td>
                                                    <td class="p-2 text-center">
                                                        {{ $aset->serial }}
                                                    </td>
                                                    <td class="p-2 text-center">
                                                        {{ $aset->status }}
                                                    </td>
                                                    <td class="p-2 text-center">
                                                        <?php
                                                        $time1 = strtotime($aset->tanggal_awal_diterima);
                                                        $tanggal_awal_diterima = date('d M, Y', $time1);
                                                        ?>
                                                        {{ $tanggal_awal_diterima }}
                                                    </td>
                                                    <td class="text-center p-2">
                                                        <a href="/admin/aset-hardware/{{ $aset->kode_hardware }}" class="btn-sm btn btn-outline-warning m-0" style="border:none;text-decoration: none; color:#ffc107; padding:5px 5px 2px 5px">
                                                            <span class="mdi mdi-18px mdi-information-outline" title="info"></span>
                                                        </a>
                                                        <?php if (auth()->user()->level_user == 'Admin') { ?>
                                                            <a href="/admin/aset-hardware/print/{{ $aset->kode_hardware }}" target="_blank" class="btn-sm btn btn-outline-warning m-0" style="border:none;text-decoration: none; color:#ffc107; padding:5px 5px 2px 5px">
                                                                <span class=" mdi mdi-18px mdi-printer" title="print"></span>
                                                            </a>
                                                            <a href="/admin/aset-hardware/{{ $aset->kode_hardware }}/edit" class="btn-sm btn btn-outline-info m-0" style="border:none;text-decoration: none; color:#0dcaf0; padding:5px 5px 2px 5px">
                                                                <span class=" mdi mdi-18px mdi-tooltip-edit" title="edit"></span>
                                                            </a>
                                                            <a href="/admin/aset-hardware/delete/{{ $aset->id }}" class="btn-sm btn btn-outline-danger m-0" style="border:none;text-decoration: none; color:#dc3545; padding:5px 5px 2px 5px"><span class=" mdi mdi-18px mdi-delete-forever " title="delete"></span></a>

                                                        <?php } ?>
                                                        <br>
                                                        <a href="/admin/hardware-repair-details/<?= $aset->kode_hardware ?>" class="btn btn-outline-warning" style="margin: 2px 0; padding: 3px 16px">detail perbaikan hardware</a>
                                                        <?php if (auth()->user()->level_user == 'Admin') { ?>
                                                            <br>
                                                            <a href="/admin/hardware-owner/<?= $aset->kode_hardware ?>" class="btn btn-outline-warning" style="margin: 2px 0; padding: 3px 16px">detail pemilik hardware</a>
                                                        <?php } ?>

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

@endsection