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
                                    <a href="javascript:;" style="text-decoration:none" data-id="" data-bs-toggle="modal" title="Add" data-bs-target="#ModalAdd">
                                        <button class="btn btn-outline-success border-0" style="padding: 9px 22px 8px 22px;">
                                            <div class="row row-cols-auto">
                                                <div class="col" style="padding: 0px 3px">
                                                    <span class="mdi mdi-plus"></span>
                                                </div>
                                                <div class="col" style="padding: 0px 3px">
                                                    <div>Tambah jabatan</div>
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
                                                        Jabatan
                                                    </th>
                                                    <th class="text-center">
                                                        Aksi
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($jabatan as $jabatan)
                                                <tr>
                                                    <td class="p-2">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td class="p-2">
                                                        {{ $jabatan->nama }}
                                                    </td>
                                                    <td class="text-center p-2">
                                                        <a href="javascript:;" class="btn-sm btn btn-outline-info m-0" style="border:none;text-decoration: none; color:#0dcaf0; padding:5px 5px 2px 5px" data-id="<?= $jabatan['id']; ?>" data-jabatan="<?= $jabatan['nama']; ?>" data-bs-toggle="modal" title="edit" data-bs-target="#ModalEdit">
                                                            <span class=" mdi mdi-18px mdi-tooltip-edit" title="edit"></span>
                                                        </a>
                                                        <a href="/admin/jabatan/delete/{{ $jabatan->id }}" class="btn-sm btn btn-outline-danger m-0 delete-confirm" style="border:none;text-decoration: none; color:#dc3545; padding:5px 5px 2px 5px"><span class=" mdi mdi-18px mdi-delete-forever btn-delete" title="delete"></span></a>
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
            $('.modal-body form').attr('action', '/admin/jabatan');
        });
        $('#ModalEdit').on('show.bs.modal', function(event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this)
            $('.modal-body form').attr('action', '/admin/jabatan/' + div.data('id'));
            modal.find('#nama').attr("value", div.data('jabatan'));
        });
        $('#example').DataTable();
    });
</script>
@endsection
<div class="modal fade" id="ModalAdd" tabindex="-1" aria-labelledby="exampleModalLabe2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="margin: auto; width: 50%; padding: 10px;">
        <div class=" modal-content">
            <div class="modal-header p-0">
                <div class="d-flex justify-content-between align-items-center mb-3 p-2" style="margin:0px !important;">
                    <h4 style="text-align: center; padding:10px 10px;margin:0px !important">Tambah Jabatan</h4>
                </div>
                <button type="button" class="btn-close" style="padding-left:40px" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/jabatan" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-sm-12 pb-1">
                                <label for="nama" class="form-label">Jabatan</label>
                                <input type="text" class="form-control" id="nama" autofocus name="nama" required>
                            </div>
                            <br>
                            <button class="btn btn-success border-0" type="submit" style="padding: 9px 22px 8px 22px;">
                                <div style="padding: 0px 3px">
                                    <div>Simpan</div>
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
                    <h4 style="text-align: center; padding:10px 10px;margin:0px !important">Edit Jabatan</h4>
                </div>
                <button type="button" class="btn-close" style="padding-left:40px" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-sm-12 pb-1">
                                <label for="nama" class="form-label">Jabatan</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <br>
                            <button class="btn btn-success border-0" type="submit" style="padding: 9px 22px 8px 22px;">
                                <div style="padding: 0px 3px">
                                    <div>Simpan</div>
                                </div>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>