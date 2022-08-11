<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BMBBD </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.rtl.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="../../../../../../../vendors/js/vendor.bundle.base.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="../../../../../../../vendors/feather/feather.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../../../../../vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../../../../../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../../../../../../vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../../../../../../../vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../../../../../../../vendors/css/vendor.bundle.base.css">
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    <link rel="stylesheet" href="../../../../../../../css_admin/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="../../../../../../../images/favicon.ico" />
    <script src="../../../../../../../js/sweetalert2.all.min.js"></script>
    <script src="../../../../../../../js/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="../../../../../../../css/sweetalert2.min.css">
    <script src="https://kit.fontawesome.com/56855f71a3.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../../../../../multiselect/fonts/icomoon/style.css">
    <link rel="stylesheet" href="../../../../../../../multiselect/css/jquery.multiselect.css">
    <link rel="stylesheet" href="css/style.css">



    <style>
        .select2 {
            border-color: blue !important;
        }
    </style>

</head>

<!-- partial:partials/_navbar.html -->
<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
        </div>
        <div>
            <a class="navbar-brand brand-logo" href="/admin/dashboard">
                <img src="../../../../../../images/bmb_logo.png" alt="logo" />
            </a>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav" style="padding-left:15px; padding-top:50px">
            <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                <!-- <h4>Tabel User</h4> -->
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown d-none d-lg-block">

                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
                    <a class="dropdown-item py-3">
                        <p class="mb-0 font-weight-medium float-left">Select category</p>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                        <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis font-weight-medium text-dark">Bootstrap Bundle </p>
                            <p class="fw-light small-text mb-0">This is a Bundle featuring 16 unique dashboards</p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item">
                        <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis font-weight-medium text-dark">Angular Bundle</p>
                            <p class="fw-light small-text mb-0">Everything you’ll ever need for your Angular projects</p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item">
                        <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis font-weight-medium text-dark">VUE Bundle</p>
                            <p class="fw-light small-text mb-0">Bundle of 6 Premium Vue Admin Dashboard</p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item">
                        <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis font-weight-medium text-dark">React Bundle</p>
                            <p class="fw-light small-text mb-0">Bundle of 8 Premium React Admin Dashboard</p>
                        </div>
                    </a>
                </div>
            </li>
            <li class="nav-item d-none d-lg-block">
                <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
                    <span class="input-group-addon input-group-prepend border-right">
                        <span class="icon-calendar input-group-text calendar-icon"></span>
                    </span>
                    <input type="text" class="form-control">
                </div>
            </li>
            <!-- <li class="nav-item">
                <form class="search-form" action="#">
                    <i class="icon-search"></i>
                    <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                </form>
            </li> -->

            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="img-xs rounded-circle" src="../../../../../../../../../images/karyawan/default.png" alt="Profile image"> </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="dropdown-header text-center">
                        <img class="img-md rounded-circle" width="50px" src="../../../../../../../../../images/karyawan/default.png" alt="Profile image">
                        <p class="mb-1 mt-3 font-weight-semibold">{{ auth()->user()->karyawan->nama }}</p>
                        <p class="fw-light text-muted mb-0">{{ auth()->user()->karyawan->email }}</p>
                    </div>

                    <a href="/account" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> Profile saya </a>
                    <a href="/change-password" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-key-outline text-primary me-2"></i> Ganti Pasword</a>

                    <form action="/logout" method="post">
                        @csrf
                        <button class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i> Logout</button>
                    </form>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>

<body>

    <div class="container-scroller">
        @yield('container')
    </div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
        var flash = $('#flash').data('flash');
        if (flash) {
            swal.fire(
                '',
                flash,
                'success'
            )
        }
        $('.delete-confirm').on('click', function(event) {
            event.preventDefault();
            const url = $(this).attr('href');
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda tidak akan dapat mengembalikan data ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya, Hapus!',
                cancelButtonText: 'Batalkan',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        });
    </script>
    <script src="../../../../../../../vendors/chart.js/Chart.min.js"></script>
    <script src="../../../../../../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="../../../../../../../vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../../../../../../../js_admin/off-canvas.js"></script>
    <script src="../../../../../../../js_admin/hoverable-collapse.js"></script>
    <script src="../../../../../../../js_admin/template.js"></script>
    <script src="../../../../../../../js_admin/settings.js"></script>
    <script src="../../../../../../../js_admin/todolist.js"></script>
    <script src="../../../../../../../js_admin/jquery.cookie.js" type="text/javascript"></script>
    <script src="../../../../../../../js_admin/dashboard.js"></script>
    <script src="../../../../../../../js_admin/Chart.roundedBarCharts.js"></script>
    <script src="../../../../../../../multiselect/js/jquery.multiselect.js"></script>
    <script src="../../../../../../../multiselect/js/main.js"></script>

</body>

</html>