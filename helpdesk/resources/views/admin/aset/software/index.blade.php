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
                                    <div id="flash" data-flash="{{ session('success') }}" style="background-color:red"></div>
                                    <h4>Aset Software</h4><br>
                                    <a href="javascript:;" style="text-decoration:none" data-id="" data-bs-toggle="modal" title="Add" data-bs-target="#ModalAdd">
                                        <button class="btn btn-outline-success border-0" style="padding: 9px 22px 8px 22px;">
                                            <div class="row row-cols-auto">
                                                <div class="col" style="padding: 0px 3px">
                                                    <span class="mdi mdi-plus"></span>
                                                </div>
                                                <div class="col" style="padding: 0px 3px">
                                                    <div>Tambah Software</div>
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
                                                        Nama Software
                                                    </th>
                                                    <th>
                                                        Keterangan
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
                                                    <td class="p-2">
                                                        {{ $aset->nama }}
                                                    </td>
                                                    <td class="p-2">
                                                        {{ $aset->keterangan }}
                                                    </td>
                                                    <td class="text-center p-2">
                                                        <a href="javascript:;" class="btn-sm btn btn-outline-info m-0" style="border:none;text-decoration: none; color:#0dcaf0; padding:5px 5px 2px 5px" data-id="<?= $aset['id']; ?>" data-software="<?= $aset['nama']; ?>" data-keterangan="<?= $aset['keterangan']; ?>" data-bs-toggle="modal" title="edit" data-bs-target="#ModalEdit">
                                                            <span class=" mdi mdi-18px mdi-tooltip-edit" title="edit"></span>
                                                        </a>

                                                        <a href="/admin/aset-software/delete/{{ $aset->id }}" class="btn-sm btn btn-outline-danger m-0 delete-confirm" style="border:none;text-decoration: none; color:#dc3545; padding:5px 5px 2px 5px"><span class=" mdi mdi-18px mdi-delete-forever btn-delete" title="delete"></span></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div id="flash" data-flash="{{ session('success') }}" style="background-color:red"></div>
                                    <h4>Aset PC & Laptop</h4><br>
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-striped table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        No
                                                    </th>
                                                    <th>
                                                        Nama Hardware
                                                    </th>
                                                    <th class="text-center">
                                                        Aksi
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($pc as $pc)
                                                <tr>
                                                    <td class="p-2">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td class="p-2">
                                                        <div class="row">
                                                            <div class="col" style="padding-top: 2px !important; padding-right: 0px !important; max-width:110px !important;">
                                                                <button class="btn btn-success p-1" style="margin-bottom: 0px !important">{{ $pc->kode_hardware }}</button>
                                                            </div>
                                                            <div class="col" style="padding-top:6px !important; margin:0px !important;padding-left: 0px !important">
                                                                {{ $pc->nama }}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="p-2 text-center">
                                                        <a href="/admin/aset-software-install-on/{{ $pc->kode_hardware }}" class="btn btn-outline-warning" style="margin: 2px 0; padding: 3px 16px">Aplikasi Terinstal</a>
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
        $('#ModalAdd').on('show.bs.modal', function(event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this)
            $('.modal-body form').attr('action', '/admin/aset-software');
            $('.modal-body form').css('overflow', 'hidden');
        });
        $('#ModalEdit').on('show.bs.modal', function(event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this)
            $('.modal-body form').attr('action', '/admin/aset-software/' + div.data('id'));
            modal.find('#nama').attr("value", div.data('software'));
            modal.find('#keterangan').attr("value", div.data('keterangan'));
            modal.find('#id_software').attr("value", div.data('id'));
        });
        $('#example').DataTable();
        $('#example1').DataTable();
    });
</script>
@endsection

<div class="modal fade" id="ModalAdd" tabindex="-1" aria-labelledby="exampleModalLabe2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="margin: auto; width: 50%; padding: 10px;">
        <div class=" modal-content">
            <div class="modal-header p-0">
                <div class="d-flex justify-content-between align-items-center mb-3 p-2" style="margin:0px !important;">
                    <h4 style="text-align: center; padding:10px 10px;margin:0px !important">Add Software</h4>
                </div>
                <button type="button" class="btn-close" style="padding-left:40px" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/aset-software" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-sm-12 pb-1">
                                <label for="nama" class="form-label">Software</label>
                                <input type="text" class="form-control" id="nama" autofocus name="nama" required>
                            </div>
                            <div class="col-sm-12 pb-1">
                                <label for="keterangan" class="form-label">Detail</label>
                                <input type="text" class="form-control" id="keterangan" autofocus name="keterangan" required>
                            </div>
                            <br>
                            <button class="btn btn-success border-0" type="submit" style="padding: 9px 22px 8px 22px;">
                                <div style="padding: 0px 3px">
                                    <div>Save</div>
                                </div>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalEdit" tabindex="-1" aria-labelledby="exampleModalLabe2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="margin: auto; width: 50%; padding: 10px;">
        <div class="modal-content">
            <div class="modal-header p-0">
                <div class="d-flex justify-content-between align-items-center mb-3 p-2" style="margin:0px !important;">
                    <h4 style="text-align: center; padding:10px 10px;margin:0px !important">Edit Software</h4>
                </div>
                <button type="button" class="btn-close" style="padding-left:40px" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" id="id_software" name="id_software">
                            <div class="col-sm-12 pb-1">
                                <label for="nama" class="form-label">Software</label>
                                <input type="text" class="form-control" id="nama" autofocus name="nama" required>
                            </div>
                            <div class="col-sm-12 pb-1">
                                <label for="keterangan" class="form-label">Detail</label>
                                <input type="text" class="form-control" id="keterangan" autofocus name="keterangan" required>
                            </div>
                            <br>
                            <button class="btn btn-success border-0" type="submit" style="padding: 9px 22px 8px 22px;">
                                <div style="padding: 0px 3px">
                                    <div>Save</div>
                                </div>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>