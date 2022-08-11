<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan Data Aset Hardware</title>
    <!-- App CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <style type="text/css" media="print">
        @media print {
            @page {
                size: auto;
                margin: 0;
                size: portrait
            }

        }
    </style>


</head>

<body style="padding-top: 15px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">

    <div style="text-align: center">
        <img width="200px" height="84px" src="/images/bmb_logo.png"><br><br>
        <h2 style="font-weight: bold;line-height: 0px; margin-bottom:17px">BMB BLOK DUA</h2>
        <p style="font-size: 15px;margin:0">Pualam Sari, Binuang, Kabupaten Tapin, Kalimantan Selatan 71183</p>
        <p style="font-size: 15px;margin:0">https://www.bmbbd.com/</p>
    </div>

    <hr style="display: block;
            height: 1px;
            background: transparent;
            width: 100%;
            border: none;
            border-top: solid 1px black;">
    <h4 style="font-weight: bold;text-align: center">Laporan Data Aset Hardware {{ $aset[0]->nama }}</h4>

    <br>
    <div class="container" style="text-align: center">

        <div class="row" style="text-align: left">
            <div class="col">
                Kode Hardware : {{ $aset[0]->kode_hardware }} <br>
                Jenis Aset : {{ $aset[0]->jenisAsetHardware->nama }} <br>
                Nama : {{ $aset[0]->nama }} <br>
                IP Address : {{ $aset[0]->ip }} <br>
                Harga : {{ $aset[0]->harga }} <br>
            </div>
            <div class="col">
                Serial : {{ $aset[0]->serial }} <br>
                Status : {{ $aset[0]->status }} <br>
                Tanggal Diterima : {{ $aset[0]->tanggal_awal_diterima }} <br>
                Tanggal Rusak ditolak : {{ $aset[0]->tanggal_rusak_total }}
            </div>
        </div>
    </div>
    <br><br><br><br>
    <div style="text-align: right; margin-right:200px">
        <p>Kepala IT SUPPORT <br>
            {{ auth()->user()->karyawan->nama }}
        </p><br>
        <p>{{ auth()->user()->karyawan->nik }}</p>
    </div>


    <script>
        window.print();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>

</html>