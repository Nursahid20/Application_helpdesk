<!DOCTYPE html>
<html lang="en">

<head>
    <title> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style media="print">
        @page {
            size: auto;
            margin: 0;
        }

        @media print {
            @page {
                size: auto;
                margin: 0;
                size: landscape
            }

        }
    </style>

<body class="p-5">
    <div class="row" style="padding-top: 50px">
        <div class="col-4">
            <div style="text-align: center">
                Nama <br> Perusahaan
                <br>
                <br>
            </div>
            <div class="row">
                <div class="col-2">
                    To
                    <br>
                    From
                    <br>

                </div>
                <div class="col">
                    : {{ $data['to_company'] }}
                    <br>
                    : {{ $data['from_company'] }}
                </div>

            </div>
        </div>
        <div class="col-4">
            <div style="text-align: center; padding-top: 50px">
                <h4 style="font-weight: bold"> PURCHASE REQUISITION</h4>
            </div>

        </div>
        <div class="col-4">
            <br><br><br>
            <div class="row">
                <div class="col-2">
                    No
                    <br>
                    Date
                </div>
                <div class="col">
                    : {{ $data['kode_barang'] }}
                    <br>
                    : {{ $data['tanggal'] }}
                </div>
            </div>
        </div>
        <div>
            please order the following items to be delivery by :
        </div>
    </div>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="coll">No</th>
                <th scope="coll">Name Items</th>
                <th scope="coll">Qty</th>
                <th scope="coll">Unit Price</th>
                <th scope="coll">Total Price</th>
                <th scope="coll">Marks</th>
            </tr>
        </thead>
        <tbody>
            @foreach($permintaan_pembelian as $permintaan_pembelian)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $permintaan_pembelian->nama_barang }}</td>
                <td>{{ $permintaan_pembelian->qty }}</td>
                <td>
                    <?php
                    $hasil_rupiah = "Rp " . number_format($permintaan_pembelian->satuan_harga_barang, 2, ',', '.');
                    echo $hasil_rupiah;
                    ?>
                </td>
                <td>
                    <?php
                    $hasil_rupiah = "Rp " . number_format($permintaan_pembelian->total_harga_barang, 2, ',', '.');
                    echo $hasil_rupiah;
                    ?>
                </td>
                <td>{{ $permintaan_pembelian->catatan }}</td>
            </tr>
            @endforeach
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </tbody>
    </table>



    <br>
    <div class="row">
        <div class="col " style="text-align: center">
            Request By:
            <br><br>
            <div style="text-decoration: underline">
                ( &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; )
            </div>
        </div>
        <div class="col">

        </div>
        <div class="col " style="text-align: center">
            Approved By:
            <br><br>
            <div style="text-decoration: underline">
                ( &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; )
            </div>
        </div>
    </div>

    <script>
        window.print();
    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>