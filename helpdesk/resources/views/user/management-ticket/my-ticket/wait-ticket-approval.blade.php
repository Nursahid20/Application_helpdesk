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
                                    <h4 class="card-title">Tiket Saya</h4><br>
                                    <?php if (session('success')) {  ?>
                                        <div id="flash" data-flash="{{ session('success') }}" style="background-color:red"></div>
                                        <?php session()->forget('success'); ?>
                                    <?php } ?>
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        No
                                                    </th>
                                                    <th>
                                                        Kode Tiket
                                                    </th>
                                                    <th>
                                                        Tanggal
                                                    </th>
                                                    <th>
                                                        Keluhan / Permintaan
                                                    </th>
                                                    <th>
                                                        Kritik/Saran
                                                    </th>
                                                    <th>
                                                        Aksi
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($tiket as $tiket)
                                                <tr>
                                                    <td class="">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td class="">
                                                        {{ $tiket->kode_tiket }}
                                                    </td>
                                                    <td class="">
                                                        <?php
                                                        $dateTime = $tiket->created_at;
                                                        $explode = explode(' ', $dateTime);
                                                        echo $explode[0] . '<br>';
                                                        echo $explode[1];
                                                        ?>
                                                    </td>
                                                    <td class="">
                                                        {{ $tiket->jenis_aset }} <br>
                                                        {{ $tiket->subject }} <br>
                                                        {{ $tiket->deskripsi }}
                                                        @if($tiket->unit == 0)

                                                        @else
                                                        - {{ $tiket->unit }}
                                                        @endif
                                                    </td>
                                                    <td class="">
                                                        @if($tiket->evaluasiTiket->penilaian == '')
                                                        <a href="javascript:;" style="text-decoration:none" data-karyawan_id="{{ auth()->user()->karyawan_id }}" data-tiket_id="{{ $tiket->id }}" data-bs-toggle="modal" title="Add" data-bs-target="#ModalAdd">
                                                            <button class="btn btn-danger border-0" style="padding: 5px 5px 5px 5px;">
                                                                <div class="col" style="padding: 0px 3px">
                                                                    <div>Feedback</div>
                                                                </div>
                                                            </button>
                                                        </a>
                                                        @else
                                                        penilaian : {{ $tiket->evaluasiTiket->penilaian }}
                                                        <br>
                                                        komentar : {{ $tiket->evaluasiTiket->komentar }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="/user/ticket/info/{{ $tiket->kode_tiket }}" class="btn btn-outline-warning" style="border:none;text-decoration: none; color:#ffc107; padding:5px 5px 2px 5px">
                                                            <span class="mdi mdi-18px mdi-information-outline" title="info"></span>
                                                        </a>
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

    $('#ModalAdd').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)
        $('.modal-body form').attr('action', '/user/feedback');
        modal.find('#karyawan_id').attr("value", div.data('karyawan_id'));
        modal.find('#tiket_id').attr("value", div.data('tiket_id'));
    });
</script>
@endsection

<div class="modal fade" id="ModalAdd" tabindex="-1" aria-labelledby="exampleModalLabe2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="margin: auto; width: 50%; padding: 10px;">
        <div class=" modal-content">
            <div class="modal-header p-0">
                <div class="d-flex justify-content-between align-items-center mb-3 p-2" style="margin:0px !important;">
                    <h4 style="text-align: center; padding:10px 10px;margin:0px !important">Tambah Feedback</h4>
                </div>
                <button type="button" class="btn-close" style="padding-left:40px" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/user/feedback" method="post">
                    @csrf
                    <input type="hidden" name="karyawan_id" id="karyawan_id">
                    <input type="hidden" name="tiket_id" id="tiket_id">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pb-3">
                                <label for="penilaian" class="form-label">Penilaian</label>
                                <select class="form-select form-select-sm" required name="penilaian" id="single-select-field" data-placeholder="Pilih..">
                                    <option disabled selected>Pilih..</option>
                                    <option value="Baik">Baik</option>
                                    <option value="Lumayan">Lumayan</option>
                                    <option value="Sangat Baik">Sangat Baik</option>
                                    <option value="Cukup Baik">Cukup Baik</option>
                                    <option value="Tidak Baik">Tidak Baik</option>
                                </select>
                            </div>
                            <label for="komentar" class="form-label">Komentar </label>
                            <textarea class="form-control @error('komentar') is-invalid @enderror" name="komentar" id="komentar" placeholder="komentar" style="height: 100px" required></textarea>
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