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
                                    <div class="row">
                                        <div class="col">
                                            <a href="/admin/karyawan/create" style="text-decoration:none">
                                                <button class="btn btn-outline-success border-0" style="padding: 9px 22px 8px 22px;">
                                                    <div class="row row-cols-auto">
                                                        <div class="col" style="padding: 0px 3px">
                                                            <span class="mdi mdi-plus"></span>
                                                        </div>
                                                        <div class="col" style="padding: 0px 3px">
                                                            <div>Tambah karyawan</div>
                                                        </div>
                                                    </div>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="/admin/report-karyawan" target="_blank" type="submit" style="float: right;" class="btn btn-outline-info"><i class="bi bi-printer" style="font-size:17px"></i> Cetak</a>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        No
                                                    </th>
                                                    <th>
                                                        NIK
                                                    </th>
                                                    <th>
                                                        Nama
                                                    </th>
                                                    <th>
                                                        Jabatan
                                                    </th>
                                                    <th>
                                                        Departemen
                                                    </th>
                                                    <th class="text-center">
                                                        Aksi
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($karyawan as $k)
                                                <tr>
                                                    <td class="p-2">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td class="p-2">
                                                        {{ $k->nik }}
                                                    </td>
                                                    <td class="p-2">
                                                        {{ $k->nama }}
                                                    </td>
                                                    <td class="p-2">
                                                        {{ $k->jabatan->nama }}
                                                    </td>
                                                    <td class="p-2">
                                                        {{ $k->departemen->nama }}
                                                    </td>
                                                    <td class="text-center p-2">
                                                        <a href="/admin/karyawan/{{ $k->slug }}" class="btn-sm btn btn-outline-warning m-0" style="border:none;text-decoration: none; color:#ffc107; padding:5px 5px 2px 5px">
                                                            <span class="mdi mdi-18px mdi-information-outline" title="info"></span>
                                                        </a>
                                                        <a href="/admin/karyawan/{{ $k->slug }}/edit" class="btn-sm btn btn-outline-info m-0" style="border:none;text-decoration: none; color:#0dcaf0; padding:5px 5px 2px 5px">
                                                            <span class=" mdi mdi-18px mdi-tooltip-edit" title="edit"></span>
                                                        </a>
                                                        <a href="/admin/karyawan/delete/{{ $k->id }}}" class="btn-sm btn btn-outline-danger m-0 delete-confirm" style="border:none;text-decoration: none; color:#dc3545; padding:5px 5px 2px 5px"><span class=" mdi mdi-18px mdi-delete-forever btn-delete" title="delete"></span></a>
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