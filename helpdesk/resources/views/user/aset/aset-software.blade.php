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
                                    <h4 style="font-weight: bold;"> Aset Software</h4>
                                    <br>
                                    <?php if (session('success')) {  ?>
                                        <div id="flash" data-flash="{{ session('success') }}" style="background-color:red"></div>
                                        <?php session()->forget('success'); ?>
                                    <?php } ?>
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th> No</th>
                                                    <th> Nama Sofware</th>
                                                    <th> Serial</th>
                                                    <th> Harga</th>
                                                    <th> Tanggal Install </th>
                                                    <th> Tanggal Lisensi Berakhir </th>
                                                    <th> Terinstall pada hardware</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($aset as $aset)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $aset->asetSoftware->nama }}</td>
                                                    <td>{{ $aset->serial }}</td>
                                                    <td>{{ $aset->harga }}</td>
                                                    <td class="p-2 text-center">
                                                        <?php
                                                        $time1 = strtotime($aset->tanggal_install);
                                                        $tanggal_install = date('d M, Y', $time1);
                                                        ?>
                                                        {{ $tanggal_install }}
                                                    </td>
                                                    <td class="p-2 text-center">
                                                        <?php
                                                        $time2 = strtotime($aset->tanggal_lisensi_berakhir);
                                                        $tanggal_lisensi_berakhir = date('d M, Y', $time2);
                                                        ?>
                                                        @if($aset->tanggal_lisensi_berakhir == null)
                                                        -
                                                        @else
                                                        <?= $tanggal_lisensi_berakhir; ?>
                                                        @endif
                                                    </td>
                                                    <td>{{ $aset->asetHardware->nama }}</td>
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