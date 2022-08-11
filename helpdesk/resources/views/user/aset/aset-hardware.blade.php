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
                                    <h4 style="font-weight: bold;"> Aset Hardware</h4>
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
                                                    <th> Nama Hardware</th>
                                                    <th> IP Address</th>
                                                    <th> Serial</th>
                                                    <th> Status</th>
                                                    <th> Tanggal Diterima</th>
                                                    <th> Tanggal Berakhir</th>
                                                    <th class="text-center"> Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- $today = date("Y-m-d");
        $expire = $row->expireDate; //from database

        $today_time = strtotime($today);
        $expire_time = strtotime($expire);

        if ($expire_time < $today_time) { /* do Something */
        }     -->


                                                @foreach($aset as $aset)

                                                <?php
                                                $today = date("Y-M-d");
                                                $expire = $aset->tanggal_berakhir;
                                                $today_time = strtotime($today);
                                                $expire_time = strtotime($expire);
                                                if ($today_time <= $expire_time ||  $aset->tanggal_berakhir == null) {
                                                ?>
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $aset->asetHardware->nama }}</td>
                                                        <td>{{ $aset->asetHardware->ip }}</td>
                                                        <td>{{ $aset->asetHardware->serial }}</td>
                                                        <td>{{ $aset->asetHardware->status }}</td>

                                                        <td class="p-2 text-center">
                                                            <?php
                                                            $time1 = strtotime($aset->tanggal_diterima);
                                                            $tanggal_diterima = date('d M, Y', $time1);
                                                            ?>
                                                            {{ $tanggal_diterima }}
                                                        </td>
                                                        <td class="p-2 text-center">
                                                            <?php
                                                            $time2 = strtotime($aset->tanggal_berakhir);
                                                            $tanggal_berakhir = date('d M, Y', $time2);
                                                            ?>
                                                            @if($aset->tanggal_berakhir == null)
                                                            -
                                                            @else
                                                            <?= $tanggal_berakhir; ?>
                                                            @endif
                                                        </td>
                                                        <td><a href="/user/aset-hardware/{{ $aset->asetHardware->kode_hardware }}" class="btn-sm btn btn-outline-warning m-0" style="border:none;text-decoration: none; color:#ffc107; padding:5px 5px 2px 5px">
                                                                <span class="mdi mdi-18px mdi-information-outline" title="info"></span>
                                                            </a></td>
                                                    </tr>
                                                <?php } ?>
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