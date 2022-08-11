<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan Data Grafik Tiket </title>
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
    <h3 style="text-align:center;font-weight: bold;">Laporan Data Grafik Tiket </h3>

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
                                y: <?= count($january_accept) ?>,
                                label: "January"
                            },
                            {
                                x: 2,
                                y: <?= count($february_accept) ?>,
                                label: "February"
                            },
                            {
                                x: 3,
                                y: <?= count($march_accept) ?>,
                                label: "March"
                            },
                            {
                                x: 4,
                                y: <?= count($april_accept) ?>,
                                label: "April"
                            },
                            {
                                x: 5,
                                y: <?= count($may_accept) ?>,
                                label: "May"
                            },
                            {
                                x: 6,
                                y: <?= count($june_accept) ?>,
                                label: "June"
                            },
                            {
                                x: 7,
                                y: <?= count($july_accept) ?>,
                                label: "July"
                            },
                            {
                                x: 8,
                                y: <?= count($agust_accept) ?>,
                                label: "Agust"
                            },
                            {
                                x: 9,
                                y: <?= count($september_accept) ?>,
                                label: "September"
                            },
                            {
                                x: 10,
                                y: <?= count($october_accept) ?>,
                                label: "October"
                            },
                            {
                                x: 11,
                                y: <?= count($november_accept) ?>,
                                label: "November"
                            },
                            {
                                x: 12,
                                y: <?= count($december_accept) ?>,
                                label: "December"
                            }
                        ],
                    },
                    {
                        dataPoints: [{
                                x: 1,
                                y: <?= count($january_denied) ?>,
                                label: "January"
                            },
                            {
                                x: 2,
                                y: <?= count($february_denied) ?>,
                                label: "February"
                            },
                            {
                                x: 3,
                                y: <?= count($march_denied) ?>,
                                label: "March"
                            },
                            {
                                x: 4,
                                y: <?= count($april_denied) ?>,
                                label: "April"
                            },
                            {
                                x: 5,
                                y: <?= count($may_denied) ?>,
                                label: "May"
                            },
                            {
                                x: 6,
                                y: <?= count($june_denied) ?>,
                                label: "June"
                            },
                            {
                                x: 7,
                                y: <?= count($july_denied) ?>,
                                label: "July"
                            },
                            {
                                x: 8,
                                y: <?= count($agust_denied) ?>,
                                label: "Agust"
                            },
                            {
                                x: 9,
                                y: <?= count($september_denied) ?>,
                                label: "September"
                            },
                            {
                                x: 10,
                                y: <?= count($october_denied) ?>,
                                label: "October"
                            },
                            {
                                x: 11,
                                y: <?= count($november_denied) ?>,
                                label: "November"
                            },
                            {
                                x: 12,
                                y: <?= count($december_denied) ?>,
                                label: "December"
                            }
                        ],
                    },
                    {
                        dataPoints: [{
                                x: 1,
                                y: <?= count($january_wait_admin) ?>,
                                label: "January"
                            },
                            {
                                x: 2,
                                y: <?= count($february_wait_admin) ?>,
                                label: "February"
                            },
                            {
                                x: 3,
                                y: <?= count($march_wait_admin) ?>,
                                label: "March"
                            },
                            {
                                x: 4,
                                y: <?= count($april_wait_admin) ?>,
                                label: "April"
                            },
                            {
                                x: 5,
                                y: <?= count($may_wait_admin) ?>,
                                label: "May"
                            },
                            {
                                x: 6,
                                y: <?= count($june_wait_admin) ?>,
                                label: "June"
                            },
                            {
                                x: 7,
                                y: <?= count($july_wait_admin) ?>,
                                label: "July"
                            },
                            {
                                x: 8,
                                y: <?= count($agust_wait_admin) ?>,
                                label: "Agust"
                            },
                            {
                                x: 9,
                                y: <?= count($september_wait_admin) ?>,
                                label: "September"
                            },
                            {
                                x: 10,
                                y: <?= count($october_wait_admin) ?>,
                                label: "October"
                            },
                            {
                                x: 11,
                                y: <?= count($november_wait_admin) ?>,
                                label: "November"
                            },
                            {
                                x: 12,
                                y: <?= count($december_wait_admin) ?>,
                                label: "December"
                            }
                        ],
                    },
                    {
                        dataPoints: [{
                                x: 1,
                                y: <?= count($january_wait_it) ?>,
                                label: "January"
                            },
                            {
                                x: 2,
                                y: <?= count($february_wait_it) ?>,
                                label: "February"
                            },
                            {
                                x: 3,
                                y: <?= count($march_wait_it) ?>,
                                label: "March"
                            },
                            {
                                x: 4,
                                y: <?= count($april_wait_it) ?>,
                                label: "April"
                            },
                            {
                                x: 5,
                                y: <?= count($may_wait_it) ?>,
                                label: "May"
                            },
                            {
                                x: 6,
                                y: <?= count($june_wait_it) ?>,
                                label: "June"
                            },
                            {
                                x: 7,
                                y: <?= count($july_wait_it) ?>,
                                label: "July"
                            },
                            {
                                x: 8,
                                y: <?= count($agust_wait_it) ?>,
                                label: "Agust"
                            },
                            {
                                x: 9,
                                y: <?= count($september_wait_it) ?>,
                                label: "September"
                            },
                            {
                                x: 10,
                                y: <?= count($october_wait_it) ?>,
                                label: "October"
                            },
                            {
                                x: 11,
                                y: <?= count($november_wait_it) ?>,
                                label: "November"
                            },
                            {
                                x: 12,
                                y: <?= count($december_wait_it) ?>,
                                label: "December"
                            }
                        ],
                    },
                    {
                        dataPoints: [{
                                x: 1,
                                y: <?= count($january_finish) ?>,
                                label: "January"
                            },
                            {
                                x: 2,
                                y: <?= count($february_finish) ?>,
                                label: "February"
                            },
                            {
                                x: 3,
                                y: <?= count($march_finish) ?>,
                                label: "March"
                            },
                            {
                                x: 4,
                                y: <?= count($april_finish) ?>,
                                label: "April"
                            },
                            {
                                x: 5,
                                y: <?= count($may_finish) ?>,
                                label: "May"
                            },
                            {
                                x: 6,
                                y: <?= count($june_finish) ?>,
                                label: "June"
                            },
                            {
                                x: 7,
                                y: <?= count($july_finish) ?>,
                                label: "July"
                            },
                            {
                                x: 8,
                                y: <?= count($agust_finish) ?>,
                                label: "Agust"
                            },
                            {
                                x: 9,
                                y: <?= count($september_finish) ?>,
                                label: "September"
                            },
                            {
                                x: 10,
                                y: <?= count($october_finish) ?>,
                                label: "October"
                            },
                            {
                                x: 11,
                                y: <?= count($november_finish) ?>,
                                label: "November"
                            },
                            {
                                x: 12,
                                y: <?= count($december_finish) ?>,
                                label: "December"
                            }
                        ],
                    },
                ]
            });

            chart.render();
        }
    </script>

    </head>

    <div id="chartContainer" style="height: 300px; width: 50%; margin-left: 20px">
    </div>
    <br>
    <div style="margin-left: 50px">
        <i class="bi bi-square-fill" style="font-size:13px ;color:#4f81bc"></i> Ticket Accept <br>
        <i class="bi bi-square-fill" style="font-size:13px ;color:#c0504e"></i> Ticket Denied <br>
        <i class="bi bi-square-fill" style="font-size:13px ;color:#9bbb58"></i> Ticket Wait Approval Admin <br>
        <i class="bi bi-square-fill" style="font-size:13px ;color:#23bfaa"></i> Ticket Wait Approval IT Support <br>
        <i class="bi bi-square-fill" style="font-size:13px ;color:#8064a1"></i> Ticket Finish <br>
    </div>



    <script>
        window.print();
    </script>
</body>

</html>