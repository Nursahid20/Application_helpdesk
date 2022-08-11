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
                                    <h4 style="font-weight: bold;"> Manajemen Tiket </h4>
                                    <br>
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
                                                        Nama Karyawan
                                                    </th>
                                                    <th>
                                                        Keluhan / Permintaan
                                                    </th>
                                                    <th>
                                                        Status
                                                    </th>
                                                    <th>
                                                        Progress
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
                                                    <td>{{ $data->kode_tiket }}</td>
                                                    <td>
                                                        <?php
                                                        $explode = explode(' ', $data->created_at);
                                                        echo $explode[0] . '<br>';
                                                        echo $explode[1];
                                                        ?>
                                                    </td>
                                                    <td>{{ $data->karyawan->nama }} <br> Departemen : {{ $data->karyawan->departemen->nama }} </td>

                                                    <td class="">
                                                        {{ $data->jenis_aset }}
                                                        <br>
                                                        @if($data->unit == 0)

                                                        @else
                                                        {{ $data->unit }} unit
                                                        @endif
                                                        {{ $data->subject }} <br>
                                                        {{ $data->deskripsi }}

                                                    </td>
                                                    </td>
                                                    <td>{{ $data->status->status }}</td>
                                                    <td>
                                                        <?php
                                                        if ($data->status->status == 'Diterima') {
                                                        ?>
                                                            <a href="/it-support/ticket/{{ $data->kode_tiket }}/progress" class="btn btn-info m-0">
                                                                Progress
                                                            </a>
                                                        <?php } else { ?>
                                                            <button disabled class="btn btn-info m-0">
                                                                Progress
                                                            </button>
                                                        <?php } ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php if ($data->status->status == 'Belum Ditanggapi IT Support') { ?>
                                                            <a href="/it-support/ticket/{{ $data->kode_tiket }}/respond" class="btn btn-info m-0" style="gap: 3">
                                                                Tanggapi
                                                            </a><br>
                                                        <?php } ?>

                                                        <a href="/it-support/ticket/info/{{ $data->kode_tiket }}" class="btn btn-outline-warning" style="border:none;text-decoration: none; color:#ffc107; padding:5px 5px 2px 5px">
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
</script>
@endsection