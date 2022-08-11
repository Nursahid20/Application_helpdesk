<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\JenisAsetController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\SubTiketController;
use App\Http\Controllers\DetailPerbaikanAsetHardwareController;
use App\Http\Controllers\c;
use App\Http\Controllers\PemilikAsetHardwareController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\AsetHardwareController;
use App\Http\Controllers\AsetSoftwareController;
use App\Http\Controllers\AsetSoftwareInstallonHardwareController;
use App\Http\Controllers\PermintaanPembelianController;
use App\Models\asetSoftwareInstallonHardware;
use App\Models\DetailPerbaikanAsetHardware;
use App\Models\Tiket;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;
use App\Models\AsetHardware;
use App\Models\PermintaanPembelian;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middeleteware group. Now create something great!
|
*/




// login & logout
Route::get('/', [LoginController::class, 'index'])->middleware('auth');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

//tampilan dashboard karyawan
Route::get('/user/dashboard', [HomeController::class, 'dashboardUser'])->middleware('karyawan');
//tampilan dashboard admin
Route::get('/admin/dashboard', [HomeController::class, 'dashboardAdmin'])->middleware('admin');
//tampilan dashboard kepala it
Route::get('/it-manager/dashboard', [HomeController::class, 'dashboardAdmin'])->middleware('kepala it');
//tampilan dashboard it-support
Route::get('/it-support/dashboard', [HomeController::class, 'dashboardItSupport'])->middleware('it support');

//checkslug
Route::get('/admin/user/checkSlug', [UserController::class, 'checkSlug'])->middleware('admin');
Route::get('/admin/karyawan/checkSlug', [KaryawanController::class, 'checkSlug'])->middleware('admin');
Route::get('/admin/information/checkSlug', [InformasiController::class, 'checkSlug'])->middleware('admin');

//account
Route::get('/account', [KaryawanController::class, 'account'])->middleware('user');
Route::get('/change-password', [UserController::class, 'changePassword'])->middleware('user');
Route::put('/change-password/{slug}', [UserController::class, 'updateUsernamePassword'])->middleware('user');

// resource  
Route::resource('/admin/user', UserController::class)->middleware('admin');
Route::resource('/admin/karyawan', KaryawanController::class)->middleware('admin');
Route::resource('/admin/jabatan', JabatanController::class)->middleware('admin');
Route::resource('/admin/jenis-aset-hardware', JenisAsetController::class)->middleware('admin');
Route::resource('/admin/departemen', DepartemenController::class)->middleware('admin');
Route::resource('/admin/aset-hardware', AsetHardwareController::class)->middleware('admin');
Route::resource('/admin/aset-software', AsetSoftwareController::class)->middleware('admin');
Route::resource('/admin/information', InformasiController::class)->middleware('admin');

// get
Route::get('/admin/all-ticket', [TiketController::class, 'allTicket'])->middleware('admin');
Route::get('/admin/ticket-need-approval', [TiketController::class, 'ticketNeedApproval'])->middleware('admin');
Route::get('/admin/wait-approval-ticket', [TiketController::class, 'waitApprovalTicket'])->middleware('admin');
Route::get('/admin/ticket/{slug}/respond', [TiketController::class, 'respondTicket'])->middleware('admin');
Route::get('admin/download/{uuid}', [DownloadController::class, 'download'])->name('file.download')->middleware('admin');
Route::get('/admin/ticket/info/{slug}', [TiketController::class, 'show'])->middleware('admin');
Route::get('/admin/kategori', [SubTiketController::class, 'kategori'])->middleware('admin');
Route::get('/admin/lampiran', [SubTiketController::class, 'lampiran'])->middleware('admin');
Route::get('/admin/status', [SubTiketController::class, 'status'])->middleware('admin');
Route::get('/admin/prioritas', [SubTiketController::class, 'prioritas'])->middleware('admin');
Route::get('/admin/aset-hardware', [AsetHardwareController::class, 'index'])->middleware('admin');
Route::get('/admin/purchase-requisition-hardware', [PermintaanPembelianController::class, 'index'])->middleware('admin');
Route::get('/admin/purchase-requisition-hardware/create', [PermintaanPembelianController::class, 'create'])->middleware('admin');
Route::get('/admin/purchase-requisition-hardware/{id}/edit', [PermintaanPembelianController::class, 'edit'])->middleware('admin');
Route::get('/admin/hardware-owner/{slug}', [PemilikAsetHardwareController::class, 'index'])->middleware('admin');
Route::get('/admin/hardware-repair-details/{slug}', [DetailPerbaikanAsetHardwareController::class, 'index'])->middleware('admin');
Route::get('/admin/aset-software-install-on/{slug}', [AsetSoftwareInstallonHardwareController::class, 'index'])->middleware('admin');
Route::get('/admin/hardware-repair-details/{slug}/create', [DetailPerbaikanAsetHardwareController::class, 'create'])->middleware('admin');
Route::get('/admin/aset-software-install-on/{slug}/create', [AsetSoftwareInstallonHardwareController::class, 'create'])->middleware('admin');
Route::get('/admin/aset-software-install-on/{slug}/{id}/edit', [AsetSoftwareInstallonHardwareController::class, 'edit'])->middleware('admin');
Route::get('/admin/hardware-owner/{slug}/create', [PemilikAsetHardwareController::class, 'create'])->middleware('admin');
Route::get('/admin/hardware-owner/{slug}/{id}/edit', [PemilikAsetHardwareController::class, 'edit'])->middleware('admin');
Route::get('/admin/hardware-repair-details/{slug}/{id}/edit', [DetailPerbaikanAsetHardwareController::class, 'edit'])->middleware('admin');
Route::get('/admin/filter-ticket', [TiketController::class, 'filterTicket'])->middleware('admin');
Route::get('/admin/filter-feedback-ticket', [TiketController::class, 'filterFeedbackTicket'])->middleware('admin');
Route::get('/admin/filter-detail-total-ticket', [TiketController::class, 'filterTotalTicket'])->middleware('admin');
Route::get('/admin/filter-aset', [AsetHardwareController::class, 'filterAset'])->middleware('admin');
Route::get('/admin/filter-cost-of-repairs', [DetailPerbaikanAsetHardwareController::class, 'filterCostOfRepairs'])->middleware('admin');
Route::get('/admin/filter-purchase-requisition', [PermintaanPembelianController::class, 'filterPurchaseRequisition'])->middleware('admin');
Route::get('/admin/filter-grafik-ticket-employe', [TiketController::class, 'filterGrafikTicketEmploye'])->middleware('admin');
Route::get('/admin/filter-grafik-ticket', [TiketController::class, 'filterGrafikTicket'])->middleware('admin');
Route::get('/admin/filter-grafik-demaged-hardware', [AsetHardwareController::class, 'filterGrafikDemagedHardware'])->middleware('admin');
Route::get('/admin/print-purchase-requisition/{slug}', [PermintaanPembelianController::class, 'printPurchaseRequisiton'])->middleware('admin');
Route::get('/admin/info-purchase-requisition/{slug}', [PermintaanPembelianController::class, 'infoPurchaseRequisiton'])->middleware('admin');
Route::get('/admin/print-all-ticket', [TiketController::class, 'printAllTicket'])->middleware('admin');
Route::get('/admin/print-all-detail-total-ticket', [TiketController::class, 'printAllDetailTotalTicket'])->middleware('admin');
Route::get('/admin/print-ticket-approved', [TiketController::class, 'printTicketApproved'])->middleware('admin');
Route::get('/admin/print-ticket-rejected', [TiketController::class, 'printTicketRejected'])->middleware('admin');
Route::get('/admin/print-all-feedback-ticket', [TiketController::class, 'printAllFeedbackTicket'])->middleware('admin');
Route::get('/admin/print-feedback-ticket-approved', [TiketController::class, 'printFeedbackTicketApproved'])->middleware('admin');
Route::get('/admin/print-feedback-ticket-rejected', [TiketController::class, 'printFeedbackTicketRejected'])->middleware('admin');
Route::get('/admin/report-user', [UserController::class, 'printReportUser'])->middleware('admin');
Route::get('/admin/report-karyawan', [KaryawanController::class, 'printReportKaryawan'])->middleware('admin');
Route::get('/admin/print-all-aset-hardware', [AsetHardwareController::class, 'printAllAsetHardware'])->middleware('admin');
Route::get('/admin/print-all-aset-software', [AsetHardwareController::class, 'printAllAsetSoftware'])->middleware('admin');
Route::get('/admin/user/delete/{id}', [UserController::class, 'destroy'])->middleware('admin');
Route::get('/admin/information/delete/{id}', [InformasiController::class, 'destroy'])->middleware('admin');
Route::get('/admin/ticket/delete/{id}', [TiketController::class, 'destroy'])->middleware('admin');
Route::get('/admin/karyawan/delete/{id}', [KaryawanController::class, 'destroy'])->middleware('admin');
Route::get('/admin/departemen/delete/{id}', [DepartemenController::class, 'destroy'])->middleware('admin');
Route::get('/admin/jabatan/delete/{id}', [JabatanController::class, 'destroy'])->middleware('admin');
Route::get('/admin/jenis-aset-hardware/delete/{id}', [JenisAsetController::class, 'destroy'])->middleware('admin');
Route::get('/admin/kategori/delete/{id}', [SubTiketController::class, 'destroyKategori'])->middleware('admin');
Route::get('/admin/lampiran/delete/{id}', [SubTiketController::class, 'destroyLampiran'])->middleware('admin');
Route::get('/admin/status/delete/{id}', [SubTiketController::class, 'destroyStatus'])->middleware('admin');
Route::get('/admin/prioritas/delete/{id}', [SubTiketController::class, 'destroyPrioritas'])->middleware('admin');
Route::get('/admin/aset-hardware/delete/{id}', [AsetHardwareController::class, 'destroyHardware'])->middleware('admin');
Route::get('/admin/aset-software/delete/{id}', [AsetSoftwareController::class, 'destroySoftware'])->middleware('admin');
Route::get('/admin/hardware-repair-details/{slug}/delete/{id}', [DetailPerbaikanAsetHardwareController::class, 'destroy'])->middleware('admin');
Route::get('/admin/hardware-owner/{slug}/delete/{id}', [PemilikAsetHardwareController::class, 'destroy'])->middleware('admin');
Route::get('/admin/aset-software-install-on/{slug}/delete/{id}', [AsetSoftwareInstallonHardwareController::class, 'destroy'])->middleware('admin');
Route::get('/admin/purchase-requisition-hardware/delete/{id}', [PermintaanPembelianController::class, 'destroy'])->middleware('admin');
Route::get('/admin/aset-hardware/print/{slug}', [AsetHardwareController::class, 'printAsetHardware'])->middleware('admin');
Route::post('/admin/filter-feedback-ticket-month-year', [TiketController::class, 'printFeedbackTicketMonthYear'])->middleware('admin');
Route::post('/admin/print-feedback-karyawan', [TiketController::class, 'printFeedbackKaryawan'])->middleware('admin');
Route::post('/admin/print-detail-ticket-month-year', [TiketController::class, 'printDetailTicketMonthYear'])->middleware('admin');
Route::post('/admin/filter-ticket-month-year', [TiketController::class, 'printTicketMonthYear'])->middleware('admin');
Route::post('/admin/print-grafik-ticket-employe', [TiketController::class, 'printGrafikTicketEmploye'])->middleware('admin');
Route::post('/admin/print-grafik-ticket', [TiketController::class, 'printGrafikTicket'])->middleware('admin');
Route::post('/admin/filter-ticket-karyawan', [TiketController::class, 'printTicketKaryawan'])->middleware('admin');
Route::post('/admin/filter-aset-hardware-day-month-year', [AsetHardwareController::class, 'printAsetHardwareDMY'])->middleware('admin');
Route::post('/admin/filter-hardware-owner-karyawan', [AsetHardwareController::class, 'printPemilikAsetHardware'])->middleware('admin');
Route::post('/admin/print-grafik-demaged-hardware', [AsetHardwareController::class, 'printGrafikDemagedHardware'])->middleware('admin');
Route::post('/admin/filter-aset-software-installon-hardware', [AsetHardwareController::class, 'printAsetSoftwareInstallOnHardware'])->middleware('admin');
Route::post('/admin/print-cost-of-repairs', [DetailPerbaikanAsetHardwareController::class, 'printCostOfRepairs'])->middleware('admin');
Route::post('/admin/print-aset-hardware-demaged', [DetailPerbaikanAsetHardwareController::class, 'printAsetHardwareDemaged'])->middleware('admin');
Route::post('/admin/print-nota-purchase-requisition', [PermintaanPembelianController::class, 'createNotaPurchaseRequisiton'])->middleware('admin');
Route::post('/admin/purchase-requisition-hardware', [PermintaanPembelianController::class, 'store'])->middleware('admin');
Route::post('/admin/kategori/add', [SubTiketController::class, 'storeKategori'])->middleware('admin');
Route::post('/admin/lampiran/add', [SubTiketController::class, 'storeLampiran'])->middleware('admin');
Route::post('/admin/status/add', [SubTiketController::class, 'storeStatus'])->middleware('admin');
Route::post('/admin/prioritas/add', [SubTiketController::class, 'storePrioritas'])->middleware('admin');
Route::post('/admin/aset-software-install-on/{slug}/store', [AsetSoftwareInstallonHardwareController::class, 'store'])->middleware('admin');
Route::post('/admin/hardware-repair-details/{slug}/store', [DetailPerbaikanAsetHardwareController::class, 'store'])->middleware('admin');
Route::post('/admin/hardware-owner/{slug}/store', [PemilikAsetHardwareController::class, 'store'])->middleware('admin');
Route::post('/admin/ticket/{slug}/respond', [TiketController::class, 'storeRespondTicket'])->middleware('admin');
Route::put('/admin/purchase-requisition-hardware/{id}', [PermintaanPembelianController::class, 'update'])->middleware('admin');
Route::put('/admin/kategori/update/{id}', [SubTiketController::class, 'updateKategori'])->middleware('admin');
Route::put('/admin/lampiran/update/{id}', [SubTiketController::class, 'updateLampiran'])->middleware('admin');
Route::put('/admin/information/update/{id}', [InformasiController::class, 'update'])->middleware('admin');
Route::put('/admin/status/update/{id}', [SubTiketController::class, 'updateStatus'])->middleware('admin');
Route::put('/admin/prioritas/update/{id}', [SubTiketController::class, 'updatePrioritas'])->middleware('admin');
Route::put('/admin/hardware-repair-details/{slug}/{id}/update', [DetailPerbaikanAsetHardwareController::class, 'update'])->middleware('admin');
Route::put('/admin/hardware-owner/{slug}/{id}/update', [PemilikAsetHardwareController::class, 'update'])->middleware('admin');
Route::put('/admin/aset-software-install-on/{slug}/{id}/update', [AsetSoftwareInstallonHardwareController::class, 'update'])->middleware('admin');

Route::get('/it-support/information', [InformasiController::class, 'informationUser'])->middleware('it support');
Route::get('/it-support/wait-ticket-approval', [TiketController::class, 'waitTicketApprovalItSupport'])->middleware('it support');
Route::get('/it-support/all-ticket', [TiketController::class, 'allTicketItSupport'])->middleware('it support');
Route::get('/it-support/ticket/{slug}/respond', [TiketController::class, 'respondTicketItSupport'])->middleware('it support');
Route::get('/it-support/ticket/{slug}/progress', [TiketController::class, 'progressTicketItSupport'])->middleware('it support');
Route::get('/it-support/ticket/info/{slug}', [TiketController::class, 'showTicketItSupport'])->middleware('it support');
Route::get('/it-support/request-hardware', [TiketController::class, 'requestHardware'])->middleware('it support');
Route::get('/it-support/my-ticket', [TiketController::class, 'myTicketItSupport'])->middleware('it support');
Route::get('/it-support/aset-hardware', [AsetHardwareController::class, 'asetHardwareUser'])->middleware('it support');
Route::get('/it-support/aset-software', [AsetSoftwareController::class, 'asetSoftwareUser'])->middleware('it support');
Route::get('/it-support/aset-hardware/{slug}', [AsetHardwareController::class, 'showAsetHardwareUser'])->middleware('it support');
Route::post('/it-support/request-hardware', [TiketController::class, 'storeRequestHardware'])->middleware('it support');
Route::post('/it-support/ticket/{slug}/respond', [TiketController::class, 'storeRespondTicketItSupport'])->middleware('it support');
Route::post('/it-support/ticket/{slug}/progress', [TiketController::class, 'storeProgressTicketItSupport'])->middleware('it support');

Route::get('/it-manager/filter-ticket', [TiketController::class, 'filterTicket'])->middleware('kepala it');
Route::get('/it-manager/information', [InformasiController::class, 'informationUser'])->middleware('kepala it');
Route::get('/it-manager/filter-grafik-ticket-employe', [TiketController::class, 'filterGrafikTicketEmploye'])->middleware('kepala it');
Route::get('/it-manager/filter-feedback-ticket', [TiketController::class, 'filterFeedbackTicket'])->middleware('kepala it');
Route::get('/it-manager/filter-detail-total-ticket', [TiketController::class, 'filterTotalTicket'])->middleware('kepala it');
Route::get('/it-manager/filter-grafik-ticket', [TiketController::class, 'filterGrafikTicket'])->middleware('kepala it');
Route::get('/it-manager/filter-aset', [AsetHardwareController::class, 'filterAset'])->middleware('kepala it');
Route::get('/it-manager/filter-cost-of-repairs', [DetailPerbaikanAsetHardwareController::class, 'filterCostOfRepairs'])->middleware('kepala it');
Route::get('/it-manager/filter-grafik-demaged-hardware', [AsetHardwareController::class, 'filterGrafikDemagedHardware'])->middleware('kepala it');
Route::get('/it-manager/filter-purchase-requisition', [PermintaanPembelianController::class, 'filterPurchaseRequisition'])->middleware('kepala it');

Route::get('user/download-baru/{uuid}', [DownloadController::class, 'downloadBaru'])->name('file_baru.download')->middleware('karyawan');
Route::get('/user/ticket/info/{slug}', [TiketController::class, 'showTicketItSupport'])->middleware('karyawan');
Route::get('/user/aset-hardware', [AsetHardwareController::class, 'asetHardwareUser'])->middleware('karyawan');
Route::get('/user/information', [InformasiController::class, 'informationUser'])->middleware('karyawan');
Route::get('/user/aset-software', [AsetSoftwareController::class, 'asetSoftwareUser'])->middleware('karyawan');
Route::get('/user/aset-hardware/{slug}', [AsetHardwareController::class, 'showAsetHardwareUser'])->middleware('karyawan');
Route::get('/user/complaint-hardware', [TiketController::class, 'complaintHardware'])->middleware('karyawan');
Route::get('/user/software-ticket', [TiketController::class, 'complaintSoftware'])->middleware('karyawan');
Route::get('/user/request-hardware', [TiketController::class, 'requestHardware'])->middleware('karyawan');
Route::get('/user/document-modification', [TiketController::class, 'documentModification'])->middleware('karyawan');
Route::get('/user/my-ticket', [TiketController::class, 'myTicket'])->middleware('karyawan');
Route::get('/user/wait-ticket-approval', [TiketController::class, 'waitTicket'])->middleware('karyawan');
Route::get('/user/approved-ticket', [TiketController::class, 'approvedTicket'])->middleware('karyawan');
Route::get('/user/rejected-ticket', [TiketController::class, 'rejectedTicket'])->middleware('karyawan');
Route::post('/user/complaint-hardware', [TiketController::class, 'storeComplaintHardware'])->middleware('karyawan');
Route::post('/user/complaint-software', [TiketController::class, 'storeComplaintSoftware'])->middleware('karyawan');
Route::post('/user/request-hardware', [TiketController::class, 'storeRequestHardware'])->middleware('karyawan');
Route::post('/user/document-modification', [TiketController::class, 'storeDocumentModification'])->middleware('karyawan');
Route::post('/user/feedback', [TiketController::class, 'storeFeedback'])->middleware('karyawan');
