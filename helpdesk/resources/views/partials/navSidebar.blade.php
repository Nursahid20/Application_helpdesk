<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
            </li>
        </ul>
        <div class="tab-content" id="setting-content">
            <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
                <div class="add-items d-flex px-3 mb-0">
                    <form class="form w-100">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                            <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                        </div>
                    </form>
                </div>
                <div class="list-wrapper px-3">
                    <ul class="d-flex flex-column-reverse todo-list">
                        <li>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox">
                                    Team review meeting at 3.00 PM
                                </label>
                            </div>
                            <i class="remove ti-close"></i>
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox">
                                    Prepare for presentation
                                </label>
                            </div>
                            <i class="remove ti-close"></i>
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox">
                                    Resolve all the low priority tickets due today
                                </label>
                            </div>
                            <i class="remove ti-close"></i>
                        </li>
                        <li class="completed">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox" checked>
                                    Schedule meeting for next week
                                </label>
                            </div>
                            <i class="remove ti-close"></i>
                        </li>
                        <li class="completed">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox" checked>
                                    Project review
                                </label>
                            </div>
                            <i class="remove ti-close"></i>
                        </li>
                    </ul>
                </div>
                <h4 class="px-3 text-muted mt-5 fw-light mb-0">Events</h4>
                <div class="events pt-4 px-3">
                    <div class="wrapper d-flex mb-2">
                        <i class="ti-control-record text-primary me-2"></i>
                        <span>Feb 11 2018</span>
                    </div>
                    <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
                    <p class="text-gray mb-0">The total number of sessions</p>
                </div>
                <div class="events pt-4 px-3">
                    <div class="wrapper d-flex mb-2">
                        <i class="ti-control-record text-primary me-2"></i>
                        <span>Feb 7 2018</span>
                    </div>
                    <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                    <p class="text-gray mb-0 ">Call Sarah Graves</p>
                </div>
            </div>
            <!-- To do section tab ends -->
            <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                <div class="d-flex align-items-center justify-content-between border-bottom">
                    <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                    <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 fw-normal">See All</small>
                </div>
                <ul class="chat-list">
                    <li class="list active">
                        <div class="profile"><img src="../../../../../../../images/karyawan/default.png" alt="image"><span class="online"></span></div>
                        <div class="info">
                            <p>Thomas Douglas</p>
                            <p>Available</p>
                        </div>
                        <small class="text-muted my-auto">19 min</small>
                    </li>
                    <li class="list">
                        <div class="profile"><img src="../../../../../../../images/karyawan/default.png" alt="image"><span class="offline"></span></div>
                        <div class="info">
                            <div class="wrapper d-flex">
                                <p>Catherine</p>
                            </div>
                            <p>Away</p>
                        </div>
                        <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                        <small class="text-muted my-auto">23 min</small>
                    </li>
                    <li class="list">
                        <div class="profile"><img src="../../../../../../../images/karyawan/default.png" alt="image"><span class="online"></span></div>
                        <div class="info">
                            <p>Daniel Russell</p>
                            <p>Available</p>
                        </div>
                        <small class="text-muted my-auto">14 min</small>
                    </li>
                    <li class="list">
                        <div class="profile"><img src="../../../../../../../images/karyawan/default.png" alt="image"><span class="offline"></span></div>
                        <div class="info">
                            <p>James Richardson</p>
                            <p>Away</p>
                        </div>
                        <small class="text-muted my-auto">2 min</small>
                    </li>
                    <li class="list">
                        <div class="profile"><img src="../../../../../../../images/karyawan/default.png" alt="image"><span class="online"></span></div>
                        <div class="info">
                            <p>Madeline Kennedy</p>
                            <p>Available</p>
                        </div>
                        <small class="text-muted my-auto">5 min</small>
                    </li>
                    <li class="list">
                        <div class="profile"><img src="../../../../../../../images/karyawan/default.png" alt="image"><span class="online"></span></div>
                        <div class="info">
                            <p>Sarah Graves</p>
                            <p>Available</p>
                        </div>
                        <small class="text-muted my-auto">47 min</small>
                    </li>
                </ul>
            </div>
            <!-- chat tab ends -->
        </div>
    </div>
    <!-- partial -->
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas " id="sidebar ">
        <ul class="nav">
            <!-- <li class="nav-item nav-category">Forms and Datas</li> -->
            @if(auth()->user()->level_user == 'Admin')
            <li class="nav-item  {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
                <a class="nav-link " href="/admin/dashboard">
                    <i class="bi bi-house menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#data-master" aria-expanded="{{ Request::is('admin/user*','admin/karyawan','admin/jabatan','admin/departemen') ? 'true' : 'false' }}" aria-controls="data-master">
                    <i class="bi bi-collection menu-icon"></i>
                    <span class="menu-title">Data Master</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse {{ Request::is('admin/user*','admin/karyawan','admin/jabatan','admin/departemen') ? 'show' : '' }}" id="data-master">
                    <ul class="nav flex-column sub-menu">
                        <!-- <li class="nav-item {{ Request::is('admin/skripsi*') ? 'active' : '' }}"> <a class="nav-link" href="/admin/skripsi">Data Skripsi</a></li> -->
                        <li class="nav-item {{ Request::is('admin/user*') ? 'active' : '' }}"> <a class="nav-link" href="/admin/user">Data User</a></li>
                        <li class="nav-item {{ Request::is('admin/karyawan*') ? 'active' : '' }}"> <a class="nav-link" href="/admin/karyawan">Data Karyawan</a></li>
                        <li class="nav-item {{ Request::is('admin/jabatan*') ? 'active' : '' }}"> <a class="nav-link" href="/admin/jabatan">Data Jabatan</a></li>
                        <li class="nav-item {{ Request::is('admin/departemen*') ? 'active' : '' }}"> <a class="nav-link" href="/admin/departemen">Data Departemen</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#manajemen" aria-expanded="{{ Request::is('admin/ticket-need-approval*','admin/wait-approval-ticket','admin/all-ticket') ? 'true' : 'false' }}" aria-controls="manajemen">
                    <i class="bi bi-ticket menu-icon"></i>
                    <span class="menu-title">Manajemen Tiket</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse {{ Request::is('admin/ticket-need-approval*','admin/wait-approval-ticket','admin/all-ticket') ? 'show' : '' }}" id="manajemen">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item {{ Request::is('admin/ticket-need-approval*') ? 'active' : '' }}"> <a class="nav-link" href="/admin/ticket-need-approval">Tiket Perlu persetujuan</a></li>
                        <li class="nav-item {{ Request::is('admin/wait-approval-ticket*') ? 'active' : '' }}"> <a class="nav-link" href="/admin/wait-approval-ticket">Menunggu Tiket Disetujui IT</a></li>
                        <li class="nav-item {{ Request::is('admin/all-ticket*') ? 'active' : '' }}"> <a class=" nav-link" href="/admin/all-ticket">Semua Tiket</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#sub-tiket" aria-expanded="{{ Request::is('admin/kategori*','admin/status','admin/lampiran','admin/prioritas') ? 'true' : 'false' }}" aria-controls="sub-tiket">
                    <i class="bi bi-ticket-perforated menu-icon"></i>
                    <span class="menu-title">Sub Tiket</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse {{ Request::is('admin/kategori*','admin/status','admin/lampiran','admin/prioritas') ? 'show' : '' }}" id="sub-tiket">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item {{ Request::is('admin/kategori*') ? 'active' : '' }}"> <a class="nav-link" href="/admin/kategori">Data Kategori</a></li>
                        <li class="nav-item {{ Request::is('admin/status*') ? 'active' : '' }}"> <a class="nav-link" href="/admin/status">Data Status</a></li>
                        <li class="nav-item {{ Request::is('admin/lampiran*') ? 'active' : '' }}"> <a class="nav-link" href="/admin/lampiran">Data Lampiran</a></li>
                        <li class="nav-item {{ Request::is('admin/prioritas*') ? 'active' : '' }}"> <a class="nav-link" href="/admin/prioritas">Data Prioritas</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item  {{ Request::is('admin/purchase-requisition-hardware') ? 'active' : '' }}">
                <a class="nav-link" href="/admin/purchase-requisition-hardware">
                    <i class="bi bi-receipt menu-icon"></i>
                    <span class="menu-title">Permintaan Pembelian</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#aset" aria-expanded="{{ Request::is('admin/aset-hardware*', 'admin/aset-software', 'admin/jenis-aset-hardware') ? 'true' : 'false' }}" aria-controls="aset">
                    <i class="bi bi-box-seam menu-icon"></i>
                    <span class="menu-title">Aset</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse {{ Request::is('admin/aset-hardware*', 'admin/jenis-aset-hardware*', 'admin/aset-software') ? 'show' : '' }}" id="aset">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item {{ Request::is('admin/jenis-aset-hardware') ? 'active' : '' }}"> <a class="nav-link" href="/admin/jenis-aset-hardware">Jenis Aset Hardware</a></li>
                        <li class="nav-item {{ Request::is('admin/aset-hardware') ? 'active' : '' }}"> <a class="nav-link" href="/admin/aset-hardware">Aset Hardware</a></li>
                        <li class="nav-item {{ Request::is('admin/aset-software') ? 'active' : '' }}"> <a class="nav-link" href="/admin/aset-software">Aset Software</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#laporan" aria-expanded="{{ Request::is('admin/filter-ticket*', 'admin/filter-feedback-ticket', 'admin/filter-detail-total-ticket', 'admin/filter-aset', 'admin/filter-cost-of-repairs', 'admin/filter-purchase-requisition',  'admin/filter-grafik-demaged-hardware','admin/filter-grafik-ticket-employe', 'admin/filter-grafik-ticket') ? 'true' : 'false' }}" aria-controls="laporan">
                    <i class="bi bi-clipboard-data menu-icon"></i>
                    <span class="menu-title">Laporan</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse {{ Request::is('admin/filter-ticket*', 'admin/filter-feedback-ticket','admin/filter-detail-total-ticket', 'admin/filter-aset', 'admin/filter-cost-of-repairs', 'admin/filter-purchase-requisition', 'admin/filter-grafik-ticket-employe', 'admin/filter-grafik-ticket', 'admin/filter-grafik-demaged-hardware') ? 'show' : '' }}" id="laporan">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item {{ Request::is('admin/filter-grafik-ticket-employe') ? 'active' : '' }}"> <a class="nav-link" href="/admin/filter-grafik-ticket-employe">Data Grafik <br> Tiket Karyawan</a></li>
                        <li class="nav-item {{ Request::is('admin/filter-ticket') ? 'active' : '' }}"> <a class="nav-link" href="/admin/filter-ticket">Data Tiket</a></li>
                        <li class="nav-item {{ Request::is('admin/filter-feedback-ticket') ? 'active' : '' }}"> <a class="nav-link" href="/admin/filter-feedback-ticket">Data Kritik/Saran TIket</a></li>
                        <li class="nav-item {{ Request::is('admin/filter-detail-total-ticket') ? 'active' : '' }}"> <a class="nav-link" href="/admin/filter-detail-total-ticket">Data Detail Total Tiket</a></li>
                        <li class="nav-item {{ Request::is('admin/filter-grafik-ticket') ? 'active' : '' }}"> <a class="nav-link" href="/admin/filter-grafik-ticket">Data Grafik Tiket</a></li>
                        <li class="nav-item {{ Request::is('admin/filter-aset') ? 'active' : '' }}"> <a class="nav-link" href="/admin/filter-aset">Data Aset</a></li>
                        <li class="nav-item {{ Request::is('admin/filter-cost-of-repairs') ? 'active' : '' }}"> <a class="nav-link" href="/admin/filter-cost-of-repairs">Data Biaya Perbaikan <br> Hardware</a></li>
                        <li class="nav-item {{ Request::is('admin/filter-grafik-demaged-hardware') ? 'active' : '' }}"> <a class="nav-link" href="/admin/filter-grafik-demaged-hardware">Data Grafik Tingkat <br> kerusakan Hardware</a></li>
                        <li class="nav-item {{ Request::is('admin/filter-purchase-requisition') ? 'active' : '' }}"> <a class="nav-link" href="/admin/filter-purchase-requisition">Data Purchase Requisition /<br>
                                Permintaan Pembelian </a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item  {{ Request::is('admin/information') ? 'active' : '' }}">
                <a class="nav-link" href="/admin/information">
                    <i class="bi bi-info-circle menu-icon"></i>
                    <span class="menu-title">Informasi</span>
                </a>
            </li>
            @elseif(auth()->user()->level_user == 'Karyawan')
            <li class="nav-item {{ Request::is('user/dashboard*') ? 'active' : '' }}">
                <a class="nav-link " href="/user/dashboard">
                    <i class="bi bi-house menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#aset" aria-expanded="{{ Request::is('user/aset*') ? 'true' : 'false' }}" aria-controls="aset">
                    <i class="bi bi-box-seam menu-icon"></i>
                    <span class="menu-title">Aset</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse {{ Request::is('user/aset*') ? 'show' : '' }}" id="aset">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item {{ Request::is('user/aset-hardware*') ? 'active' : '' }}"> <a class="nav-link" href="/user/aset-hardware">Aset Hardware</a></li>
                        <li class="nav-item {{ Request::is('user/aset-software*') ? 'active' : '' }}"> <a class="nav-link" href="/user/aset-software">Aset Software</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#tiket" aria-expanded="{{ Request::is('user/wait-ticket-approval*', 'user/rejected-ticket*', 'user/approved-ticket*', 'user/my-ticket*') ? 'true' : 'false' }}" aria-controls="tiket">
                    <i class="bi bi-ticket menu-icon"></i>
                    <span class="menu-title">Data Tiket</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse {{ Request::is('user/wait-ticket-approval*', 'user/rejected-ticket*', 'user/approved-ticket*', 'user/my-ticket*') ? 'show' : '' }}" id="tiket">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item {{ Request::is('user/wait-ticket-approval*') ? 'active' : '' }}"> <a class="nav-link" href="/user/wait-ticket-approval">Menunggu Persetujuan</a></li>
                        <li class="nav-item {{ Request::is('user/rejected-ticket*') ? 'active' : '' }}"> <a class="nav-link" href="/user/rejected-ticket">Tiket Ditolak</a></li>
                        <li class="nav-item {{ Request::is('user/approved-ticket*') ? 'active' : '' }}"> <a class="nav-link" href="/user/approved-ticket">Tiket disetuju</a></li>
                        <li class="nav-item {{ Request::is('user/my-ticket*') ? 'active' : '' }}"> <a class="nav-link" href="/user/my-ticket">Tiket Saya</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#crete_ticket" aria-expanded="{{ Request::is('user/complaint-hardware*', 'user/software-ticket*', 'user/request-hardware*', 'user/document-modification*') ? 'true' : 'false' }}" aria-controls="crete_ticket">
                    <i class="bi bi-clipboard2-plus menu-icon"></i>
                    <span class="menu-title">Buat Tiket</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse {{ Request::is('user/complaint-hardware*', 'user/software-ticket*', 'user/request-hardware*', 'user/document-modification*') ? 'show' : '' }}" id="crete_ticket">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item {{ Request::is('user/complaint-hardware*') ? 'active' : '' }}"> <a class="nav-link" href="/user/complaint-hardware">Keluhan Hardware</a></li>
                        <li class="nav-item {{ Request::is('user/request-hardware*') ? 'active' : '' }}"> <a class="nav-link" href="/user/request-hardware">Permintaan Hardware</a></li>
                        <li class="nav-item {{ Request::is('user/software-ticket*') ? 'active' : '' }}"> <a class="nav-link" href="/user/software-ticket">Permintaan / Keluhan <br> Software</a></li>
                        <li class="nav-item {{ Request::is('user/document-modification*') ? 'active' : '' }}"> <a class="nav-link" href="/user/document-modification">Permintaan Perubahan <br>Dokumen</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ Request::is('user/information*') ? 'active' : '' }}">
                <a class="nav-link" href="/user/information">
                    <i class="bi bi-info-circle menu-icon"></i>
                    <span class="menu-title">Informasi</span>
                </a>
            </li>
            @elseif(auth()->user()->level_user == 'IT Support')
            <li class="nav-item {{ Request::is('it-support/dashboard*') ? 'active' : '' }}">
                <a class="nav-link " href="/it-support/dashboard">
                    <i class="bi bi-house menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#aset" aria-expanded="{{ Request::is('it-support/aset*') ? 'true' : 'false' }}" aria-controls="aset">
                    <i class="bi bi-box-seam menu-icon"></i>
                    <span class="menu-title">Aset </span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse {{ Request::is('it-support/aset*') ? 'show' : '' }}" id="aset">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item {{ Request::is('it-support/aset-hardware*') ? 'active' : '' }}"> <a class="nav-link" href="/it-support/aset-hardware">Aset Hardware</a></li>
                        <li class="nav-item {{ Request::is('it-support/aset-software*') ? 'active' : '' }}"> <a class="nav-link" href="/it-support/aset-software">Aset Software</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#aset_karyawan" aria-expanded="{{ Request::is('admin/aset*') ? 'true' : 'false' }}" aria-controls="aset">
                    <i class="bi bi-box-seam menu-icon"></i>
                    <span class="menu-title">Aset Karyawan</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse {{ Request::is('admin/aset*') ? 'show' : '' }}" id="aset_karyawan">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item {{ Request::is('admin/aset-hardware*') ? 'active' : '' }}"> <a class="nav-link" href="/admin/aset-hardware">Aset Hardware</a></li>
                        <li class="nav-item {{ Request::is('admin/aset-software*') ? 'active' : '' }}"> <a class="nav-link" href="/admin/aset-software">Aset Software</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#tiket" aria-expanded="{{ Request::is('it-support/wait-ticket-approval*', 'it-support/rejected-ticket*', 'it-support/approved-ticket*', 'it-support/all-ticket*') ? 'true' : 'false' }}" aria-controls="tiket">
                    <i class="bi bi-ticket menu-icon"></i>
                    <span class="menu-title">Data Tiket</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse {{ Request::is('it-support/wait-ticket-approval*', 'it-support/rejected-ticket*', 'it-support/approved-ticket*', 'it-support/all-ticket*') ? 'show' : '' }}" id="tiket">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item {{ Request::is('it-support/wait-ticket-approval*') ? 'active' : '' }}"> <a class="nav-link" href="/it-support/wait-ticket-approval">Menunggu Persetujuan</a></li>
                        <!--   <li class="nav-item {{ Request::is('it-support/rejected-ticket*') ? 'active' : '' }}"> <a class="nav-link" href="/it-support/rejected-ticket">Tiket Ditolak</a></li>
                        <li class="nav-item {{ Request::is('it-support/approved-ticket*') ? 'active' : '' }}"> <a class="nav-link" href="/it-support/approved-ticket">Tiket disetuju</a></li> -->
                        <li class="nav-item {{ Request::is('it-support/all-ticket*') ? 'active' : '' }}"> <a class="nav-link" href="/it-support/all-ticket">Semua Tiket</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#create_ticket" aria-expanded="{{ Request::is('it-support/complaint-hardware*', 'it-support/software-ticket*', 'it-support/request-hardware*', 'it-support/document-modification*') ? 'true' : 'false' }}" aria-controls="create_ticket">
                    <i class="bi bi-clipboard2-plus menu-icon"></i>
                    <span class="menu-title">Buat Tiket</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse {{ Request::is('it-support/request-hardware*','it-support/my-ticket') ? 'show' : '' }}" id="create_ticket">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item {{ Request::is('it-support/my-ticket*') ? 'active' : '' }}"> <a class="nav-link" href="/it-support/my-ticket">Tiket Saya</a></li>
                    </ul>
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item {{ Request::is('it-support/request-hardware*') ? 'active' : '' }}"> <a class="nav-link" href="/it-support/request-hardware">Permintaan Hardware</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ Request::is('it-support/information*') ? 'active' : '' }}">
                <a class="nav-link" href="/it-support/information">
                    <i class="bi bi-info-circle menu-icon"></i>
                    <span class="menu-title">Informasi</span>
                </a>
            </li>
            @else
            <li class="nav-item  {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
                <a class="nav-link " href="/it-manager/dashboard">
                    <i class="bi bi-house menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#laporan" aria-expanded="{{ Request::is('it-manager/filter-ticket*', 'it-manager/filter-feedback-ticket', 'it-manager/filter-detail-total-ticket', 'it-manager/filter-aset', 'it-manager/filter-cost-of-repairs', 'it-manager/filter-purchase-requisition',  'it-manager/filter-grafik-demaged-hardware','it-manager/filter-grafik-ticket-employe', 'it-manager/filter-grafik-ticket') ? 'true' : 'false' }}" aria-controls="laporan">
                    <i class="bi bi-clipboard-data menu-icon"></i>
                    <span class="menu-title">Laporan</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse {{ Request::is('it-manager/filter-ticket*', 'it-manager/filter-feedback-ticket','it-manager/filter-detail-total-ticket', 'it-manager/filter-aset', 'it-manager/filter-cost-of-repairs', 'it-manager/filter-purchase-requisition', 'it-manager/filter-grafik-ticket-employe', 'it-manager/filter-grafik-ticket', 'it-manager/filter-grafik-demaged-hardware') ? 'show' : '' }}" id="laporan">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item {{ Request::is('it-manager/filter-grafik-ticket-employe') ? 'active' : '' }}"> <a class="nav-link" href="/it-manager/filter-grafik-ticket-employe">Data Grafik <br> Tiket Karyawan</a></li>
                        <li class="nav-item {{ Request::is('it-manager/filter-ticket') ? 'active' : '' }}"> <a class="nav-link" href="/it-manager/filter-ticket">Data Tiket</a></li>
                        <li class="nav-item {{ Request::is('it-manager/filter-feedback-ticket') ? 'active' : '' }}"> <a class="nav-link" href="/it-manager/filter-feedback-ticket">Data Kritik/Saran TIket</a></li>
                        <li class="nav-item {{ Request::is('it-manager/filter-detail-total-ticket') ? 'active' : '' }}"> <a class="nav-link" href="/it-manager/filter-detail-total-ticket">Data Detail Total Tiket</a></li>
                        <li class="nav-item {{ Request::is('it-manager/filter-grafik-ticket') ? 'active' : '' }}"> <a class="nav-link" href="/it-manager/filter-grafik-ticket">Data Grafik Tiket</a></li>
                        <li class="nav-item {{ Request::is('it-manager/filter-aset') ? 'active' : '' }}"> <a class="nav-link" href="/it-manager/filter-aset">Data Aset</a></li>
                        <li class="nav-item {{ Request::is('it-manager/filter-cost-of-repairs') ? 'active' : '' }}"> <a class="nav-link" href="/it-manager/filter-cost-of-repairs">Data Biaya Perbaikan <br> Hardware</a></li>
                        <li class="nav-item {{ Request::is('it-manager/filter-grafik-demaged-hardware') ? 'active' : '' }}"> <a class="nav-link" href="/it-manager/filter-grafik-demaged-hardware">Data Grafik Tingkat <br> kerusakan Hardware</a></li>
                        <li class="nav-item {{ Request::is('it-manager/filter-purchase-requisition') ? 'active' : '' }}"> <a class="nav-link" href="/it-manager/filter-purchase-requisition">Data Purchase Requisition /<br>Permintaan Pembelian </a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ Request::is('it-manager/information*') ? 'active' : '' }}">
                <a class="nav-link" href="/it-manager/information">
                    <i class="bi bi-info-circle menu-icon"></i>
                    <span class="menu-title">Informasi</span>
                </a>
            </li>

            @endif
        </ul>
    </nav>

    <!-- partial -->