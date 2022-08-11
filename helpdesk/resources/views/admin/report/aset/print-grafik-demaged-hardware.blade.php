<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan Data Grafik Kerusakan Hardware </title>
    <!-- App CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

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

<body style="padding: 50px;">

    <div style="text-align: center">
        <img width="200px" height="84px" src="/images/bmb_logo.png">
        <h1 class="text2" style="font-weight: bold;">BMB BLOK DUA</h1>
        <p style="font-size: 15px;margin:0">Pualam Sari, Binuang, Kabupaten Tapin, Kalimantan Selatan 71183</p>
        <p style="font-size: 15px;margin:0">https://www.bmbbd.com/</p>
    </div><br>

    <hr>
    <h3 style="text-align:center;font-weight: bold;">Laporan Data Grafik Kerusakan Hardware </h3>

    <br>


    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script type="text/javascript">
        window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer", {
                title: {
                    text: ""
                },
                data: [{
                    dataPoints: [{
                            x: 1,
                            y: <?= count($january) ?>,
                            label: "January"
                        },
                        {
                            x: 2,
                            y: <?= count($february) ?>,
                            label: "February"
                        },
                        {
                            x: 3,
                            y: <?= count($march) ?>,
                            label: "March"
                        },
                        {
                            x: 4,
                            y: <?= count($april) ?>,
                            label: "April"
                        },
                        {
                            x: 5,
                            y: <?= count($may) ?>,
                            label: "May"
                        },
                        {
                            x: 6,
                            y: <?= count($june) ?>,
                            label: "June"
                        },
                        {
                            x: 7,
                            y: <?= count($july) ?>,
                            label: "July"
                        },
                        {
                            x: 8,
                            y: <?= count($agust) ?>,
                            label: "Agust"
                        },
                        {
                            x: 9,
                            y: <?= count($september) ?>,
                            label: "September"
                        },
                        {
                            x: 10,
                            y: <?= count($october) ?>,
                            label: "October"
                        },
                        {
                            x: 11,
                            y: <?= count($november) ?>,
                            label: "November"
                        },
                        {
                            x: 12,
                            y: <?= count($december) ?>,
                            label: "December"
                        }
                    ],
                }]
            });

            chart.render();
        }
    </script>

    </head>

    <div id="chartContainer" style="height: 300px; width: 50%; margin-left: 20px">
    </div>




    <script>
        window.print();
    </script>
</body>

</html>