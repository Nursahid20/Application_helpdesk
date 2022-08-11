<?php

use App\Models\PemilikAsetHardware;
use App\Models\Karyawan;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan Data Aset Hardware</title>
    <!-- App CSS -->

    <style type="text/css" media="print">
        @media print {
            @page {
                size: auto;
                margin: 0;
                size: landscape
            }

        }
    </style>

    <style type="text/css">
        body {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        hr {
            display: block;
            height: 1px;
            background: transparent;
            width: 100%;
            border: none;
            border-top: solid 1px #aaa;
        }

        .table-cetak2,
        .table-cetak2 tr,
        .table-cetak2 td,
        .table-cetak2 th {
            border: 1px solid #999;
            padding: 8px 10px;
            font-size: 13px;
            border-collapse: collapse;
        }


        .kop-head1 {
            font-size: 20px;
            line-height: 15px;
        }

        .kop-head2 {
            margin-top: -10px;
            margin-bottom: -3px;
            font-size: 24px;
            font-weight: bold;
        }

        .kop3 {
            font-size: 13px;
            line-height: 6px;
        }

        table tr .text {
            text-align: center;
            font-size: 13px;
        }

        .ttd {
            width: 950;
            margin-left: 350px;
        }

        .top-text {
            width: 430px;
        }

        .text1 {
            line-height: 100px;
        }

        .text2 {
            line-height: 0px;
        }

        .text3 {
            line-height: 5px;
        }

        .laporan-judul {
            margin-top: 30px;
            margin-bottom: 30px;
            font-size: 16px;
        }
    </style>

</head>

<body style="padding-top: 15px;">
    <center>
        <div style="text-align: center">
            <img width="200px" height="84px" src="/images/bmb_logo.png">
            <h1 class="text2" style="font-weight: bold;">BMB BLOK DUA</h1>
            <p style="font-size: 15px;margin:0">Pualam Sari, Binuang, Kabupaten Tapin, Kalimantan Selatan 71183</p>
            <p style="font-size: 15px;margin:0">https://www.bmbbd.com/</p>
        </div><br>

        <hr>
        <h4 class="text3" style="font-weight: bold;">Laporan Data Aset Hardware <?php
                                                                                $pemilik = Karyawan::where('id', $karyawan_id)->get();
                                                                                echo $pemilik[0]->nama;
                                                                                ?></h4>

        <br>
        <table class="table-cetak2" width="95%" collspacing="0">
            <thead>
                <tr>
                    <th scope="coll">No</th>
                    <th scope="coll">Kode Hardware</th>
                    <th scope="coll">Jenis Aset</th>
                    <th scope="coll">Nama Hardware</th>
                    <th scope="coll">Tanggal Diterima</th>
                    <th scope="coll">Tanggal Berakhir</th>
                </tr>
            </thead>
            <tbody>
                @foreach($aset as $aset)
                <tr>
                    <td> {{ $loop->iteration }}</td>
                    <td>{{ $aset->asetHardware->kode_hardware }}</td>
                    <td>{{ $aset->asetHardware->jenisAsetHardware->nama }}</td>
                    <td>{{ $aset->asetHardware->nama }}</td>
                    <td style="text-align: center;">{{ $aset->tanggal_diterima }}</td>
                    <td style="text-align: center;">{{ $aset->tanggal_berakhir }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <table class="ttd">
            <tr>
                <td class="top-text"></td>
                <td class="text">
                    <p class="text1">Kepala IT SUPPORT</p>
                    <p class="text2">{{ auth()->user()->karyawan->nama }}</p>
                    <p class="text3">{{ auth()->user()->karyawan->nik }}</p>
                </td>
            </tr>
        </table>

    </center>
    <script>
        window.print();
    </script>
</body>

</html>