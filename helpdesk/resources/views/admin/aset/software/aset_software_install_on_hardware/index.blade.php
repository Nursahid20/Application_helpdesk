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
                                    <h4>aset {{ $hardware[0]->nama }} </h4><br>
                                    <a href="javascript:;" style="text-decoration:none" data-id="" data-bs-toggle="modal" title="Add" data-bs-target="#ModalAdd">
                                        <a href="/admin/aset-software-install-on/{{ $hardware[0]->kode_hardware }}/create" style="text-decoration:none">
                                            <button class="btn btn-outline-success border-0" style="padding: 9px 22px 8px 22px;">
                                                <div class="row row-cols-auto">
                                                    <div class="col" style="padding: 0px 3px">
                                                        <span class="mdi mdi-plus"></span>
                                                    </div>
                                                    <div class="col" style="padding: 0px 3px">
                                                        <div>Tambah install software</div>
                                                    </div>
                                                </div>
                                            </button>
                                        </a>
                                    </a>
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        No
                                                    </th>
                                                    <th>
                                                        Nama Software
                                                    </th>
                                                    <th>
                                                        Serial
                                                    </th>
                                                    <th>
                                                        Harga
                                                    </th>
                                                    <th class="text-center">
                                                        Tanggal Install
                                                    </th>
                                                    <th class="text-center">
                                                        Tanggal Lisensi Berakhir
                                                    </th>
                                                    <th class="text-center">
                                                        Aksi
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($aset as $aset)
                                                <tr>
                                                    <td class="p-2">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td class="p-2 ">
                                                        {{ $aset->asetSoftware->nama }}
                                                    </td>
                                                    <td class="p-2">
                                                        @if($aset->serial == '0')
                                                        -
                                                        @else
                                                        {{ $aset->serial }}
                                                        @endif
                                                    </td>
                                                    <td class="p-2">
                                                        @if($aset->harga == 'Rp. 0')
                                                        -
                                                        @else
                                                        {{ $aset->harga }}
                                                        @endif
                                                    </td>
                                                    <td class="p-2 text-center">
                                                        {{ $aset->tanggal_install }}
                                                    </td>
                                                    <td class="p-2 text-center">
                                                        @if($aset->tanggal_lisensi_berakhir == null)
                                                        -
                                                        @else
                                                        {{ $aset->tanggal_lisensi_berakhir }}
                                                        @endif
                                                    </td>
                                                    <td class="p-2 text-center">
                                                        <a href="/admin/aset-software-install-on/{{ $hardware[0]->kode_hardware }}/{{ $aset->id }}/edit" class="btn-sm btn btn-outline-info m-0" style="border:none;text-decoration: none; color:#0dcaf0; padding:5px 5px 2px 5px">
                                                            <span class=" mdi mdi-18px mdi-tooltip-edit" title="edit"></span>
                                                        </a>
                                                        <a href="/admin/aset-software-install-on/{{ $hardware[0]->kode_hardware }}/delete/{{ $aset->id }}" class="btn-sm btn btn-outline-danger m-0 delete-confirm" style="border:none;text-decoration: none; color:#dc3545; padding:5px 5px 2px 5px"><span class=" mdi mdi-18px mdi-delete-forever btn-delete" title="delete"></span></a>
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