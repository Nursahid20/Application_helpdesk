<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use App\Models\Karyawan;
use App\Models\User;
use App\Models\AsetHardware;
use App\Models\AsetSoftware;
use App\Models\ProgressTiket;
use App\Models\EvaluasiTiket;
use App\Models\JenisAset;
use App\Models\PemilikAsetHardware;
use App\Models\SubTiket;
use Illuminate\Http\Request;


class TiketController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Tiket $tiket)
    {
        $explode = explode('/', url()->current());
        return view('admin.tiket.manajement-ticket.show', [
            'tiket' => Tiket::where('kode_tiket', $explode[6])->get(),
            'user' => User::where('level_user', 'IT Support')->get(),
            'prioritas' => SubTiket::where('prioritas', '!=', '')->get(),
            'explode' => $explode[5]
        ]);
    }

    public function edit(Tiket $tiket)
    {
    }

    public function update(Request $request, Tiket $tiket)
    {
    }

    public function destroy(Tiket $tiket)
    {
        $explode = explode('/', url()->current());
        Tiket::find(end($explode))->delete();
        return back()->with('success', 'Tiket Berhasil dihapus!');
    }

    //admin
    public function allTicket()
    {
        return view('admin.tiket.manajement-ticket.index', [
            'data' => Tiket::where('kode_tiket', '!=', '')->orderBy('created_at', 'desc')->get(),
            'karyawan' => Karyawan::all(),
            'sub_tiket' => SubTiket::all(),
        ]);
    }

    public function ticketNeedApproval()
    {
        return view('admin.tiket.manajement-ticket.need-approval-ticket', [
            'data' => Tiket::where('kode_tiket', '!=', '')->where('status_id', 5)->orderBy('created_at', 'desc')->get(),
            'karyawan' => Karyawan::all(),
            'sub_tiket' => SubTiket::all(),
        ]);
    }

    public function waitApprovalTicket()
    {
        return view('admin.tiket.manajement-ticket.wait-approval-ticket', [
            'data' => Tiket::where('kode_tiket', '!=', '')->where('status_id', 6)->orderBy('created_at', 'desc')->get(),
            'karyawan' => Karyawan::all(),
            'sub_tiket' => SubTiket::all(),
        ]);
    }

    public function respondTicket()
    {
        $explode = explode('/', url()->current());
        return view('admin.tiket.manajement-ticket.respond-ticket', [
            'tiket' => Tiket::where('kode_tiket', $explode[5])->get(),
            'user' => User::where('level_user', 'IT Support')->get(),
            'prioritas' => SubTiket::where('prioritas', '!=', '')->get(),
            'explode' => $explode[5]
        ]);
    }

    public function storeRespondTicket(Request $request)
    {
        if ($request->status_id == 4) {
            $rules = [
                'keterangan_ditolak' => 'required',
                'status_id' => 'required',
            ];
            $request->validate($rules, [
                'keterangan_ditolak.required' => 'Keterangan ditolak harus di isi',
                'status_id.required' => 'Tanggapan harus di isi',
            ]);
            $validateData['status_id'] = $request->status_id;
            $id_tiket = Tiket::where('kode_tiket', $request->kode_tiket)->get();
            EvaluasiTiket::create([
                'keterangan_ditolak' => $request->keterangan_ditolak,
                'karyawan_id' => $id_tiket[0]->karyawan_id,
                'tiket_id' => $id_tiket[0]->id,
                'penilaian' => '',
                'komentar' => '',
            ]);

            $dataas =  EvaluasiTiket::latest()->first();
            Tiket::where('kode_tiket', $request->kode_tiket)->update(['evaluasi_tiket_id' => $dataas->id]);
        } else {



            $explode = explode('/', url()->current());
            $tiket = Tiket::where('kode_tiket', $explode[5])->get();
            if (!($tiket[0]->kategori->id == 4)) {
                $rules = [
                    'it_support_id' => 'required',
                    'status_id' => 'required',
                    'prioritas_id' => 'required'
                ];
                $validateData = $request->validate($rules, [
                    'it_support_id.required' => 'IT Support harus di pilih',
                    'status_id.required' => 'Tanggapan harus di isi',
                    'prioritas_id.required' => 'level urgensi harus di isi'
                ]);
                $validateData['it_support_id'] = $request->it_support_id;
                $validateData['prioritas_id'] = $request->prioritas_id;
                $validateData['status_id'] = $request->status_id;
            } else {
                $rules = [
                    'status_id' => 'required',
                    'prioritas_id' => 'required'
                ];
                $validateData = $request->validate($rules, [
                    'status_id.required' => 'Tanggapan harus di isi',
                    'prioritas_id.required' => 'level urgensi harus di isi'
                ]);
                $validateData['status_id'] = $request->status_id;
                $validateData['prioritas_id'] = $request->prioritas_id;
            }
        }
        Tiket::where('kode_tiket', $request->kode_tiket)->update($validateData);
        return redirect('/admin/all-ticket')->with('success', 'Tanggapan Berhasil ditambahkan!');
    }

    //it support
    public function myTicketItSupport()
    {
        return view('it-support.tiket.manajement-ticket.my-ticket', [
            'tiket' => Tiket::where('karyawan_id', auth()->user()->karyawan_id)->get()
        ]);
    }

    public function waitTicketApprovalItSupport()
    {
        return view('it-support.tiket.manajement-ticket.wait-ticket-approval', [
            'data' => Tiket::where('kode_tiket', '!=', '')->where('it_support_id', auth()->user()->karyawan->id)->where('status_id', '6')->orderBy('created_at', 'desc')->get(),
            'karyawan' => Karyawan::all(),
            'sub_tiket' => SubTiket::all(),
        ]);
    }
    public function allTicketItSupport()
    {
        return view('it-support.tiket.manajement-ticket.index', [
            'data' => Tiket::where('kode_tiket', '!=', '')->where('it_support_id', auth()->user()->karyawan->id)->orderBy('created_at', 'desc')->get(),
            'karyawan' => Karyawan::all(),
            'sub_tiket' => SubTiket::all(),
        ]);
    }

    public function showTicketItSupport(Tiket $tiket)
    {
        $explode = explode('/', url()->current());
        return view('it-support.tiket.manajement-ticket.show', [
            'tiket' => Tiket::where('kode_tiket', $explode[6])->orderBy('created_at', 'desc')->get(),
            'user' => User::where('level_user', 'IT Support')->get(),
            'prioritas' => SubTiket::where('prioritas', '!=', '')->get(),
            'explode' => $explode[5]
        ]);
    }
    public function respondTicketItSupport()
    {
        $explode = explode('/', url()->current());
        return view('it-support.tiket.manajement-ticket.respond-ticket', [
            'tiket' => Tiket::where('kode_tiket', $explode[5])->get(),
            'user' => User::where('level_user', 'IT Support')->get(),
            'prioritas' => SubTiket::where('prioritas', '!=', '')->get(),
            'explode' => $explode[5]
        ]);
    }
    public function progressTicketItSupport()
    {
        $explode = explode('/', url()->current());
        $tiket = Tiket::where('kode_tiket', $explode[5])->get();
        $progress = ProgressTiket::where('tiket_id', $tiket[0]->id)->get();
        return view('it-support.tiket.manajement-ticket.progress', [
            'explode' => $explode[5],
            'progress' => $progress,
            'tiket_id' => $tiket[0]->id,
            'tiket' => $tiket
        ]);
    }
    public function storeRespondTicketItSupport(Request $request)
    {
        if ($request->status_id == 2) {
            $rules = [
                'tanggal_mulai' => 'required',
                'status_id' => 'required',
                'tanggal_akhir' => 'required'
            ];
            $validateData = $request->validate($rules, [
                'tanggal_mulai.required' => 'Tanggal Mulai harus di pilih',
                'status_id.required' => 'Tanggapan harus di pilih',
                'tanggal_akhir.required' => 'Tanggal Akhir harus di isi'
            ]);
            $validateData['tanggal_mulai'] = $request->tanggal_mulai;
            $validateData['status_id'] = $request->status_id;
            $validateData['tanggal_akhir'] = $request->tanggal_akhir;
            Tiket::where('kode_tiket', $request->kode_tiket)->update($validateData);
        } elseif ($request->status_id == 4) {
            $rules = [
                'status_id' => 'required',
                'keterangan_ditolak' => 'required',
            ];
            $validateData = $request->validate($rules, [
                'status_id.required' => 'Tanggapan harus di pilih',
                'keterangan_ditolak' => 'Keterangan ditolak harus di isi',
            ]);
            $validateData['status_id'] = $request->status_id;
            if ($request->keterangan_ditolak) {
                $tikets = Tiket::where('kode_tiket', $request->kode_tiket)->get();
                $data_evaluasi = EvaluasiTiket::where('tiket_id', $tikets[0]->id)->get();
                if (isset($data_evaluasi[0]->karyawan_id)) {
                    EvaluasiTiket::where('tiket_id', $tikets[0]->id)->update([
                        'penilaian' => '',
                        'komentar' => ''
                    ]);
                } else {
                    EvaluasiTiket::create([
                        'karyawan_id' =>  $tikets[0]->karyawan_id,
                        'tiket_id' =>  $tikets[0]->id,
                        'keterangan_ditolak' =>  $request->keterangan_ditolak,
                        'penilaian' =>  '',
                        'komentar' =>  '',
                    ]);
                    $last_id = EvaluasiTiket::all()->last();
                    Tiket::where('id', $tikets[0]->id)->update(['evaluasi_tiket_id' => $last_id->id]);
                }

                $rules = [
                    'keterangan_ditolak' => 'required',
                ];
                $request->validate($rules, [
                    'keterangan_ditolak.required' => 'Keterangan ditolak harus di isi'
                ]);
                Tiket::where('kode_tiket', $request->kode_tiket)->update(['status_id' => $request->status_id]);
                $id_tiket = Tiket::where('kode_tiket', $request->kode_tiket)->get();
                EvaluasiTiket::where('tiket_id', $id_tiket[0]->id)->update(['keterangan_ditolak' => $request->keterangan_ditolak]);
            }
        } else {
            $rules = [
                'tanggal_mulai' => 'required',
                'status_id' => 'required',
                'tanggal_akhir' => 'required'
            ];
            $validateData = $request->validate($rules, [
                'tanggal_mulai.required' => 'Tanggal Mulai harus di pilih',
                'status_id.required' => 'Tanggapan harus di pilih',
                'tanggal_akhir.required' => 'Tanggal Akhir harus di isi'
            ]);
        }
        return redirect('/it-support/all-ticket')->with('success', 'Tanggapan Berhasil ditambahkan!');
    }

    public function storeProgressTicketItSupport(Request $request)
    {
        if ($request->file_baru) {
            $rules = [
                'number' => 'required',
                'keterangan' => 'required',
                'file_baru' => 'required'
            ];
            $validateData = $request->validate($rules, [
                'number.required' => 'Persentase harus di pilih',
                'keterangan.required' => 'Keterangan harus di isi',
                'file_baru.required' => 'File harus di isi'
            ]);
            $validateData['number'] = $request->number;
            $validateData['keterangan'] = $request->keterangan;
            $validateData['file_baru'] = $request->file_baru;
            $validateData['tiket_id'] = $request->tiket_id;

            $file = $request->file('file_baru');

            if (!($file)) {
                $validateData['file_baru'] = 'default.jpg';
            } else {
                $ex = explode(('.'), $file->getClientOriginalName());
                $fileImg = date('mdYHis') . uniqid() . '.' . end($ex);
                $validateData['file_baru'] = $fileImg;
                request()->file_baru->move(public_path('file'), $fileImg);
            }

            Tiket::where('id', $request->tiket_id)->update(['file_baru' => $validateData['file_baru']]);
        } else {
            $rules = [
                'number' => 'required',
                'keterangan' => 'required',
            ];
            $validateData = $request->validate($rules, [
                'number.required' => 'Persentase harus di pilih',
                'keterangan.required' => 'Keterangan harus di isi',
            ]);
            $validateData['number'] = $request->number;
            $validateData['keterangan'] = $request->keterangan;
            $validateData['tiket_id'] = $request->tiket_id;
        }

        ProgressTiket::create($validateData);
        return redirect('/it-support/ticket/' . $request->kode_tiket .  '/progress')->with('success', 'Progress Berhasil ditambahkan!');
    }

    //user
    public function myTicket()
    {
        return view('user.management-ticket.my-ticket.index', [
            'tiket' => Tiket::where('karyawan_id', auth()->user()->karyawan_id)->orderBy('created_at', 'desc')->get()
        ]);
    }

    public function waitTicket()
    {
        return view('user.management-ticket.my-ticket.wait-ticket-approval', [
            'tiket' => Tiket::where('karyawan_id', auth()->user()->karyawan_id)->where('status_id', '!=', 1)->where('status_id', '!=', 2)->where('status_id', '!=', 3)->where('status_id', '!=', 4)->orderBy('created_at', 'desc')->get()
        ]);
    }

    public function rejectedTicket()
    {
        return view('user.management-ticket.my-ticket.rejected-ticket', [
            'tiket' => Tiket::where('karyawan_id', auth()->user()->karyawan_id)->where('status_id', '!=', 1)->where('status_id', '!=', 2)->where('status_id', '!=', 5)->where('status_id', '!=', 3)->where('status_id', '!=', 6)->orderBy('created_at', 'desc')->get()
        ]);
    }

    public function approvedTicket()
    {
        return view('user.management-ticket.my-ticket.approved-ticket', [
            'tiket' => Tiket::where('karyawan_id', auth()->user()->karyawan_id)->where('status_id', '!=', 1)->where('status_id', '!=', 5)->where('status_id', '!=', 4)->where('status_id', '!=', 6)->orderBy('created_at', 'desc')->get()
        ]);
    }



    public function complaintHardware()
    {
        return view('user.management-ticket.complaint-hardware.create', [
            'aset' => PemilikAsetHardware::where('karyawan_id', auth()->user()->karyawan_id)->get()
        ]);
    }


    public function complaintSoftware()
    {
        $aset = PemilikAsetHardware::where('karyawan_id', auth()->user()->karyawan_id)->get();
        function like_match($pattern, $subject)
        {
            $pattern = str_replace('%', '.*', preg_quote($pattern, '/'));
            return (bool) preg_match("/^{$pattern}$/i", $subject);
        }
        foreach ($aset as $aset) {
            if (like_match('LP%', $aset->asetHardware->kode_hardware) == TRUE || like_match('CP%', $aset->asetHardware->kode_hardware) == TRUE) {
                $value[] = $aset;
            }
        }

        if (isset($value)) {
            $data = $value;
        } else {
            $data = [];
        }
        return view('user.management-ticket.complaint-software.create', [
            'aset' => $data,
            'software' => AsetSoftware::all()
        ]);
    }

    public function RequestHardware()
    {
        return view('user.management-ticket.request-hardware.create', [
            'jenis_aset' => JenisAset::where('nama', '!=', '-')->where('nama', '!=', 'Aplikasi')->where('nama', '!=', 'Network')->where('nama', '!=', 'Sistem Operasi')->where('nama', '!=', 'Driver')->get(),
        ]);
    }

    public function DocumentModification()
    {
        return view('user.management-ticket.document-modification.create', [
            'lampiran' => SubTiket::where('lampiran', '!=', '-')->get()
        ]);
    }

    public function storeComplaintHardware(Request $request)
    {
        $rules = [
            'aset_hardware_id' => 'required',
            'subject' => 'required',
            'deskripsi' => 'required',
            'file' => 'required|image|file|max:20000',
        ];
        $validateData = $request->validate($rules, [
            'aset_hardware_id.required' => 'Hardware harus di pilih',
            'subject.required' => 'Subject Tiket harus di isi',
            'file.required' => 'Upload Gambar harus di isi',
            'deskripsi.required' => 'Deskripsi harus di isi'
        ]);
        $validateData['karyawan_id'] = auth()->user()->karyawan_id;
        $validateData['it_support_id'] = 1;
        $validateData['status_id'] = 5;
        $validateData['kategori_id'] = 3;
        $validateData['lampiran_id'] = 1;
        $validateData['prioritas_id'] = 1;
        $validateData['evaluasi_tiket_id'] = 1;
        $validateData['unit'] = 0;
        $validateData['file_baru'] = 'default.jpg';
        $validateData['tanggal_mulai'] = null;
        $validateData['tanggal_akhir'] = null;

        $file = $request->file;

        if (!($file)) {
            $validateData['file_lama'] = 'default.jpg';
        } else {
            $ex = explode(('.'), $file->getClientOriginalName());
            $fileImg = date('mdYHis') . uniqid() . '.' . end($ex);
            $validateData['file_lama'] = $fileImg;
            request()->file->move(public_path('file'), $fileImg);
        }

        $tiket = Tiket::where('karyawan_id', auth()->user()->karyawan_id)->get();
        $validateData['kode_tiket'] = 'REQ-' . auth()->user()->karyawan->nik . '-' . count($tiket) + 1;

        Tiket::create($validateData);
        return redirect('/user/my-ticket')->with('success', 'Keluhan Hardware Berhasil ditambahkan!');
    }

    public function storeComplaintSoftware(Request $request)
    {
        $rules = [
            'aset_hardware_id' => 'required',
            'subject' => 'required',
            'deskripsi' => 'required'
        ];
        $validateData = $request->validate($rules, [
            'aset_hardware_id.required' => 'Hardware harus di pilih',
            'subject.required' => 'Nama Aplikasi harus di isi',
            'deskripsi.required' => 'Deskripsi harus di isi'
        ]);
        $validateData['karyawan_id'] = auth()->user()->karyawan_id;
        $validateData['it_support_id'] = 1;
        $validateData['status_id'] = 5;
        $validateData['kategori_id'] = 5;
        $validateData['lampiran_id'] = 1;
        $validateData['prioritas_id'] = 1;
        $validateData['evaluasi_tiket_id'] = 1;
        $validateData['subject'] = implode(',', $request->subject);
        $validateData['unit'] = 0;
        $validateData['file_lama'] = 'default.jpg';
        $validateData['file_baru'] = 'default.jpg';
        $validateData['tanggal_mulai'] = null;
        $validateData['tanggal_akhir'] = null;

        $tiket = Tiket::where('karyawan_id', auth()->user()->karyawan_id)->get();
        $validateData['kode_tiket'] = 'REQ-' . auth()->user()->karyawan->nik . '-' . count($tiket) + 1;
        Tiket::create($validateData);
        return redirect('/user/my-ticket')->with('success', 'Keluhan Software Berhasil ditambahkan!');
    }

    public function storeRequestHardware(Request $request)
    {
        $rules = [
            'subject' => 'required',
            'unit' => 'required',
            'deskripsi' => 'required'
        ];
        $validateData = $request->validate($rules, [
            'subject.required' => 'Jenis Hardware harus di pilih',
            'unit.required' => 'Unit harus di isi',
            'deskripsi.required' => 'Deskripsi harus di isi'
        ]);
        $validateData['karyawan_id'] = auth()->user()->karyawan_id;
        $validateData['it_support_id'] = 1;
        $validateData['status_id'] = 5;
        $validateData['kategori_id'] = 4;
        $validateData['lampiran_id'] = 1;
        $validateData['prioritas_id'] = 1;
        $validateData['evaluasi_tiket_id'] = 1;
        $validateData['aset_hardware_id'] = 1;
        $validateData['file_lama'] = 'default.jpg';
        $validateData['file_baru'] = 'default.jpg';
        $validateData['tanggal_mulai'] = null;
        $validateData['tanggal_akhir'] = null;

        $tiket = Tiket::where('karyawan_id', auth()->user()->karyawan_id)->get();
        $validateData['kode_tiket'] = 'REQ-' . auth()->user()->karyawan->nik . '-' . count($tiket) + 1;
        Tiket::create($validateData);
        return redirect('/user/my-ticket')->with('success', 'Permintaan Hardware Berhasil ditambahkan!');
    }

    public function storeDocumentModification(Request $request)
    {
        $rules = [
            'lampiran_id' => 'required',
            'file' => 'required|file|max:40000|mimes:jpg,jpeg,png,doc,docx,pdf,zip,rar,text,ods,xlsx',
            'deskripsi' => 'required'
        ];
        $validateData = $request->validate($rules, [
            'lampiran_id.required' => 'Lampiran harus harus di pilih',
            'file.required' => 'Unit harus di isi',
            'file.size' => 'File yang diunggah melebihi direktif upload, max = 40 mb',
            'deskripsi.required' => 'Deskripsi harus di isi'
        ]);
        $validateData['karyawan_id'] = auth()->user()->karyawan_id;
        $validateData['it_support_id'] = 1;
        $validateData['status_id'] = 5;
        $validateData['kategori_id'] = 6;
        $validateData['prioritas_id'] = 1;
        $validateData['evaluasi_tiket_id'] = 1;
        $validateData['aset_hardware_id'] = 1;
        $validateData['unit'] = 0;
        $validateData['subject'] = '';
        $validateData['tanggal_mulai'] = null;
        $validateData['tanggal_akhir'] = null;
        $validateData['file_baru'] = 'default.jpg';

        $file = $request->file('file');

        if (!($file)) {
            $validateData['file_lama'] = 'default.jpg';
        } else {
            $ex = explode(('.'), $file->getClientOriginalName());
            $fileImg = date('mdYHis') . uniqid() . '.' . end($ex);
            $validateData['file_lama'] = $fileImg;
            request()->file->move(public_path('file'), $fileImg);
        }

        $tiket = Tiket::where('karyawan_id', auth()->user()->karyawan_id)->get();
        $validateData['kode_tiket'] = 'REQ-' . auth()->user()->karyawan->nik . '-' . count($tiket) + 1;
        Tiket::create($validateData);
        return redirect('/user/my-ticket')->with('success', 'Permintaan edit dokument Berhasil ditambahkan!');
    }
    public function storeFeedback(Request $request)
    {
        $validateData['karyawan_id'] = $request->karyawan_id;
        $validateData['tiket_id'] = $request->tiket_id;
        $validateData['penilaian'] = $request->penilaian;
        $validateData['komentar'] = $request->komentar;
        $validateData['keterangan_ditolak'] = '';

        $data_evaluasi = EvaluasiTiket::where('tiket_id', $request->tiket_id)->get();
        if (isset($data_evaluasi[0]->karyawan_id)) {
            EvaluasiTiket::where('tiket_id', $request->tiket_id)->update([
                'penilaian' => $request->penilaian,
                'komentar' => $request->komentar
            ]);
        } else {
            EvaluasiTiket::create($validateData);
            $last_id = EvaluasiTiket::all()->last();
            Tiket::where('id', $request->tiket_id)->update(['evaluasi_tiket_id' => $last_id->id]);
        }
        return redirect('/user/my-ticket')->with('success', 'Feedback Berhasil ditambahkan!');
    }



















    // print tiket
    public function filterTicket()
    {
        return view('admin.report.tiket.filter-tiket', [
            'karyawan' => Karyawan::where('nama', '!=', '-')->get()
        ]);
    }
    public function filterGrafikTicketEmploye()
    {
        return view('admin.report.tiket.filter-grafik-tiket-employe', [
            'karyawan' => Karyawan::where('nama', '!=', '-')->get()
        ]);
    }
    public function filterGrafikTicket()
    {
        return view('admin.report.tiket.filter-grafik-tiket', [
            'karyawan' => Karyawan::where('nama', '!=', '-')->get()
        ]);
    }
    public function printAllTicket()
    {
        return view('admin.report.tiket.print-tiket', [
            'tiket' => Tiket::where('kode_tiket', '!=', '')->get()
        ]);
    }
    public function printTicketApproved()
    {
        return view('admin.report.tiket.print-tiket', [
            'tiket' => Tiket::where('kode_tiket', '!=', '')->where('status_id', '!=', 1)->where('status_id', '!=', 4)->where('status_id', '!=', 5)->where('status_id', '!=', 6)->get()
        ]);
    }
    public function printFeedbackKaryawan(Request $request)
    {
        return view('admin.report.feedback-tiket.print-tiket', [
            'tiket' => Tiket::where('karyawan_id',  $request->karyawan_id)->get(),
        ]);
    }
    public function printTicketKaryawan(Request $request)
    {
        return view('admin.report.tiket.print-tiket', [
            'tiket' => Tiket::where('karyawan_id',  $request->karyawan_id)->get()
        ]);
    }
    public function printTicketRejected()
    {
        return view('admin.report.tiket.print-tiket-rejected', [
            'tiket' => Tiket::where('kode_tiket', '!=', '')->where('status_id', '!=', 1)->where('status_id', '!=', 5)->where('status_id', '!=', 6)->where('status_id', '!=', 2)->where('status_id', '!=', 3)->get()
        ]);
    }
    public function printTicketMonthYear(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        return view('admin.report.tiket.print-tiket', [
            'tiket' => Tiket::where('kode_tiket', '!=', '')->whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->get()
        ]);
    }

    public function printGrafikTicketEmploye(Request $request)
    {
        //accept
        $january_accept = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 1)->whereYear('created_at', $request->tahun)->where('status_id', 2)->get();
        $february_accept = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 2)->whereYear('created_at', $request->tahun)->where('status_id', 2)->get();
        $march_accept = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 3)->whereYear('created_at', $request->tahun)->where('status_id', 2)->get();
        $april_accept = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 4)->whereYear('created_at', $request->tahun)->where('status_id', 2)->get();
        $may_accept = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 5)->whereYear('created_at', $request->tahun)->where('status_id', 2)->get();
        $june_accept = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 6)->whereYear('created_at', $request->tahun)->where('status_id', 2)->get();
        $july_accept = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 7)->whereYear('created_at', $request->tahun)->where('status_id', 2)->get();
        $agust_accept = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 8)->whereYear('created_at', $request->tahun)->where('status_id', 2)->get();
        $september_accept = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 9)->whereYear('created_at', $request->tahun)->where('status_id', 2)->get();
        $october_accept = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 10)->whereYear('created_at', $request->tahun)->where('status_id', 2)->get();
        $november_accept = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 11)->whereYear('created_at', $request->tahun)->where('status_id', 2)->get();
        $december_accept = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 12)->whereYear('created_at', $request->tahun)->where('status_id', 2)->get();
        //finish
        $january_finish = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 1)->whereYear('created_at', $request->tahun)->where('status_id', 3)->get();
        $february_finish = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 2)->whereYear('created_at', $request->tahun)->where('status_id', 3)->get();
        $march_finish = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 3)->whereYear('created_at', $request->tahun)->where('status_id', 3)->get();
        $april_finish = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 4)->whereYear('created_at', $request->tahun)->where('status_id', 3)->get();
        $may_finish = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 5)->whereYear('created_at', $request->tahun)->where('status_id', 3)->get();
        $june_finish = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 6)->whereYear('created_at', $request->tahun)->where('status_id', 3)->get();
        $july_finish = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 7)->whereYear('created_at', $request->tahun)->where('status_id', 3)->get();
        $agust_finish = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 8)->whereYear('created_at', $request->tahun)->where('status_id', 3)->get();
        $september_finish = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 9)->whereYear('created_at', $request->tahun)->where('status_id', 3)->get();
        $october_finish = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 10)->whereYear('created_at', $request->tahun)->where('status_id', 3)->get();
        $november_finish = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 11)->whereYear('created_at', $request->tahun)->where('status_id', 3)->get();
        $december_finish = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 12)->whereYear('created_at', $request->tahun)->where('status_id', 3)->get();
        //denied
        $january_denied = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 1)->whereYear('created_at', $request->tahun)->where('status_id', 4)->get();
        $february_denied = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 2)->whereYear('created_at', $request->tahun)->where('status_id', 4)->get();
        $march_denied = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 3)->whereYear('created_at', $request->tahun)->where('status_id', 4)->get();
        $april_denied = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 4)->whereYear('created_at', $request->tahun)->where('status_id', 4)->get();
        $may_denied = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 5)->whereYear('created_at', $request->tahun)->where('status_id', 4)->get();
        $june_denied = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 6)->whereYear('created_at', $request->tahun)->where('status_id', 4)->get();
        $july_denied = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 7)->whereYear('created_at', $request->tahun)->where('status_id', 4)->get();
        $agust_denied = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 8)->whereYear('created_at', $request->tahun)->where('status_id', 4)->get();
        $september_denied = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 9)->whereYear('created_at', $request->tahun)->where('status_id', 4)->get();
        $october_denied = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 10)->whereYear('created_at', $request->tahun)->where('status_id', 4)->get();
        $november_denied = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 11)->whereYear('created_at', $request->tahun)->where('status_id', 4)->get();
        $december_denied = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 12)->whereYear('created_at', $request->tahun)->where('status_id', 4)->get();
        //wait admin
        $january_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 1)->whereYear('created_at', $request->tahun)->where('status_id', 5)->get();
        $february_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 2)->whereYear('created_at', $request->tahun)->where('status_id', 5)->get();
        $march_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 3)->whereYear('created_at', $request->tahun)->where('status_id', 5)->get();
        $april_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 4)->whereYear('created_at', $request->tahun)->where('status_id', 5)->get();
        $may_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 5)->whereYear('created_at', $request->tahun)->where('status_id', 5)->get();
        $june_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 6)->whereYear('created_at', $request->tahun)->where('status_id', 5)->get();
        $july_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 7)->whereYear('created_at', $request->tahun)->where('status_id', 5)->get();
        $agust_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 8)->whereYear('created_at', $request->tahun)->where('status_id', 5)->get();
        $september_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 9)->whereYear('created_at', $request->tahun)->where('status_id', 5)->get();
        $october_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 10)->whereYear('created_at', $request->tahun)->where('status_id', 5)->get();
        $november_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 11)->whereYear('created_at', $request->tahun)->where('status_id', 5)->get();
        $december_wait_admin = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 12)->whereYear('created_at', $request->tahun)->where('status_id', 5)->get();
        //wait it
        $january_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 1)->whereYear('created_at', $request->tahun)->where('status_id', 6)->get();
        $february_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 2)->whereYear('created_at', $request->tahun)->where('status_id', 6)->get();
        $march_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 3)->whereYear('created_at', $request->tahun)->where('status_id', 6)->get();
        $april_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 4)->whereYear('created_at', $request->tahun)->where('status_id', 6)->get();
        $may_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 5)->whereYear('created_at', $request->tahun)->where('status_id', 6)->get();
        $june_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 6)->whereYear('created_at', $request->tahun)->where('status_id', 6)->get();
        $july_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 7)->whereYear('created_at', $request->tahun)->where('status_id', 6)->get();
        $agust_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 8)->whereYear('created_at', $request->tahun)->where('status_id', 6)->get();
        $september_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 9)->whereYear('created_at', $request->tahun)->where('status_id', 6)->get();
        $october_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 10)->whereYear('created_at', $request->tahun)->where('status_id', 6)->get();
        $november_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 11)->whereYear('created_at', $request->tahun)->where('status_id', 6)->get();
        $december_wait_it = Tiket::where('kode_tiket', '!=', '-')->where('karyawan_id', $request->karyawan_id)->whereMonth('created_at', 12)->whereYear('created_at', $request->tahun)->where('status_id', 6)->get();
        $data = Karyawan::where('id', $request->karyawan_id)->get();
        return view('admin.report.tiket.print-grafik-tiket-employe', [
            'data' => $data,
            'january_accept' => $january_accept,
            'february_accept' => $february_accept,
            'march_accept' => $march_accept,
            'april_accept' => $april_accept,
            'may_accept' => $may_accept,
            'june_accept' => $june_accept,
            'july_accept' => $july_accept,
            'agust_accept' => $agust_accept,
            'september_accept' => $september_accept,
            'october_accept' => $october_accept,
            'november_accept' => $november_accept,
            'december_accept' => $december_accept,

            'january_finish' => $january_finish,
            'february_finish' => $february_finish,
            'march_finish' => $march_finish,
            'april_finish' => $april_finish,
            'may_finish' => $may_finish,
            'june_finish' => $june_finish,
            'july_finish' => $july_finish,
            'agust_finish' => $agust_finish,
            'september_finish' => $september_finish,
            'october_finish' => $october_finish,
            'november_finish' => $november_finish,
            'december_finish' => $december_finish,

            'january_denied' => $january_denied,
            'february_denied' => $february_denied,
            'march_denied' => $march_denied,
            'april_denied' => $april_denied,
            'may_denied' => $may_denied,
            'june_denied' => $june_denied,
            'july_denied' => $july_denied,
            'agust_denied' => $agust_denied,
            'september_denied' => $september_denied,
            'october_denied' => $october_denied,
            'november_denied' => $november_denied,
            'december_denied' => $december_denied,

            'january_wait_admin' => $january_wait_admin,
            'february_wait_admin' => $february_wait_admin,
            'march_wait_admin' => $march_wait_admin,
            'april_wait_admin' => $april_wait_admin,
            'may_wait_admin' => $may_wait_admin,
            'june_wait_admin' => $june_wait_admin,
            'july_wait_admin' => $july_wait_admin,
            'agust_wait_admin' => $agust_wait_admin,
            'september_wait_admin' => $september_wait_admin,
            'october_wait_admin' => $october_wait_admin,
            'november_wait_admin' => $november_wait_admin,
            'december_wait_admin' => $december_wait_admin,

            'january_wait_it' => $january_wait_it,
            'february_wait_it' => $february_wait_it,
            'march_wait_it' => $march_wait_it,
            'april_wait_it' => $april_wait_it,
            'may_wait_it' => $may_wait_it,
            'june_wait_it' => $june_wait_it,
            'july_wait_it' => $july_wait_it,
            'agust_wait_it' => $agust_wait_it,
            'september_wait_it' => $september_wait_it,
            'october_wait_it' => $october_wait_it,
            'november_wait_it' => $november_wait_it,
            'december_wait_it' => $december_wait_it,

        ]);
    }
    public function printGrafikTicket(Request $request)
    {
        //accept
        $january_accept = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 1)->whereYear('created_at', $request->tahun)->where('status_id', 2)->get();
        $february_accept = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 2)->whereYear('created_at', $request->tahun)->where('status_id', 2)->get();
        $march_accept = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 3)->whereYear('created_at', $request->tahun)->where('status_id', 2)->get();
        $april_accept = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 4)->whereYear('created_at', $request->tahun)->where('status_id', 2)->get();
        $may_accept = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 5)->whereYear('created_at', $request->tahun)->where('status_id', 2)->get();
        $june_accept = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 6)->whereYear('created_at', $request->tahun)->where('status_id', 2)->get();
        $july_accept = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 7)->whereYear('created_at', $request->tahun)->where('status_id', 2)->get();
        $agust_accept = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 8)->whereYear('created_at', $request->tahun)->where('status_id', 2)->get();
        $september_accept = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 9)->whereYear('created_at', $request->tahun)->where('status_id', 2)->get();
        $october_accept = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 10)->whereYear('created_at', $request->tahun)->where('status_id', 2)->get();
        $november_accept = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 11)->whereYear('created_at', $request->tahun)->where('status_id', 2)->get();
        $december_accept = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 12)->whereYear('created_at', $request->tahun)->where('status_id', 2)->get();
        //finish
        $january_finish = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 1)->whereYear('created_at', $request->tahun)->where('status_id', 3)->get();
        $february_finish = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 2)->whereYear('created_at', $request->tahun)->where('status_id', 3)->get();
        $march_finish = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 3)->whereYear('created_at', $request->tahun)->where('status_id', 3)->get();
        $april_finish = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 4)->whereYear('created_at', $request->tahun)->where('status_id', 3)->get();
        $may_finish = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 5)->whereYear('created_at', $request->tahun)->where('status_id', 3)->get();
        $june_finish = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 6)->whereYear('created_at', $request->tahun)->where('status_id', 3)->get();
        $july_finish = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 7)->whereYear('created_at', $request->tahun)->where('status_id', 3)->get();
        $agust_finish = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 8)->whereYear('created_at', $request->tahun)->where('status_id', 3)->get();
        $september_finish = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 9)->whereYear('created_at', $request->tahun)->where('status_id', 3)->get();
        $october_finish = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 10)->whereYear('created_at', $request->tahun)->where('status_id', 3)->get();
        $november_finish = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 11)->whereYear('created_at', $request->tahun)->where('status_id', 3)->get();
        $december_finish = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 12)->whereYear('created_at', $request->tahun)->where('status_id', 3)->get();
        //denied
        $january_denied = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 1)->whereYear('created_at', $request->tahun)->where('status_id', 4)->get();
        $february_denied = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 2)->whereYear('created_at', $request->tahun)->where('status_id', 4)->get();
        $march_denied = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 3)->whereYear('created_at', $request->tahun)->where('status_id', 4)->get();
        $april_denied = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 4)->whereYear('created_at', $request->tahun)->where('status_id', 4)->get();
        $may_denied = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 5)->whereYear('created_at', $request->tahun)->where('status_id', 4)->get();
        $june_denied = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 6)->whereYear('created_at', $request->tahun)->where('status_id', 4)->get();
        $july_denied = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 7)->whereYear('created_at', $request->tahun)->where('status_id', 4)->get();
        $agust_denied = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 8)->whereYear('created_at', $request->tahun)->where('status_id', 4)->get();
        $september_denied = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 9)->whereYear('created_at', $request->tahun)->where('status_id', 4)->get();
        $october_denied = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 10)->whereYear('created_at', $request->tahun)->where('status_id', 4)->get();
        $november_denied = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 11)->whereYear('created_at', $request->tahun)->where('status_id', 4)->get();
        $december_denied = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 12)->whereYear('created_at', $request->tahun)->where('status_id', 4)->get();
        //wait admin
        $january_wait_admin = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 1)->whereYear('created_at', $request->tahun)->where('status_id', 5)->get();
        $february_wait_admin = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 2)->whereYear('created_at', $request->tahun)->where('status_id', 5)->get();
        $march_wait_admin = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 3)->whereYear('created_at', $request->tahun)->where('status_id', 5)->get();
        $april_wait_admin = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 4)->whereYear('created_at', $request->tahun)->where('status_id', 5)->get();
        $may_wait_admin = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 5)->whereYear('created_at', $request->tahun)->where('status_id', 5)->get();
        $june_wait_admin = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 6)->whereYear('created_at', $request->tahun)->where('status_id', 5)->get();
        $july_wait_admin = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 7)->whereYear('created_at', $request->tahun)->where('status_id', 5)->get();
        $agust_wait_admin = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 8)->whereYear('created_at', $request->tahun)->where('status_id', 5)->get();
        $september_wait_admin = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 9)->whereYear('created_at', $request->tahun)->where('status_id', 5)->get();
        $october_wait_admin = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 10)->whereYear('created_at', $request->tahun)->where('status_id', 5)->get();
        $november_wait_admin = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 11)->whereYear('created_at', $request->tahun)->where('status_id', 5)->get();
        $december_wait_admin = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 12)->whereYear('created_at', $request->tahun)->where('status_id', 5)->get();
        //wait it
        $january_wait_it = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 1)->whereYear('created_at', $request->tahun)->where('status_id', 6)->get();
        $february_wait_it = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 2)->whereYear('created_at', $request->tahun)->where('status_id', 6)->get();
        $march_wait_it = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 3)->whereYear('created_at', $request->tahun)->where('status_id', 6)->get();
        $april_wait_it = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 4)->whereYear('created_at', $request->tahun)->where('status_id', 6)->get();
        $may_wait_it = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 5)->whereYear('created_at', $request->tahun)->where('status_id', 6)->get();
        $june_wait_it = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 6)->whereYear('created_at', $request->tahun)->where('status_id', 6)->get();
        $july_wait_it = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 7)->whereYear('created_at', $request->tahun)->where('status_id', 6)->get();
        $agust_wait_it = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 8)->whereYear('created_at', $request->tahun)->where('status_id', 6)->get();
        $september_wait_it = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 9)->whereYear('created_at', $request->tahun)->where('status_id', 6)->get();
        $october_wait_it = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 10)->whereYear('created_at', $request->tahun)->where('status_id', 6)->get();
        $november_wait_it = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 11)->whereYear('created_at', $request->tahun)->where('status_id', 6)->get();
        $december_wait_it = Tiket::where('kode_tiket', '!=', '-')->whereMonth('created_at', 12)->whereYear('created_at', $request->tahun)->where('status_id', 6)->get();

        return view('admin.report.tiket.print-grafik-tiket', [
            'january_accept' => $january_accept,
            'february_accept' => $february_accept,
            'march_accept' => $march_accept,
            'april_accept' => $april_accept,
            'may_accept' => $may_accept,
            'june_accept' => $june_accept,
            'july_accept' => $july_accept,
            'agust_accept' => $agust_accept,
            'september_accept' => $september_accept,
            'october_accept' => $october_accept,
            'november_accept' => $november_accept,
            'december_accept' => $december_accept,

            'january_finish' => $january_finish,
            'february_finish' => $february_finish,
            'march_finish' => $march_finish,
            'april_finish' => $april_finish,
            'may_finish' => $may_finish,
            'june_finish' => $june_finish,
            'july_finish' => $july_finish,
            'agust_finish' => $agust_finish,
            'september_finish' => $september_finish,
            'october_finish' => $october_finish,
            'november_finish' => $november_finish,
            'december_finish' => $december_finish,

            'january_denied' => $january_denied,
            'february_denied' => $february_denied,
            'march_denied' => $march_denied,
            'april_denied' => $april_denied,
            'may_denied' => $may_denied,
            'june_denied' => $june_denied,
            'july_denied' => $july_denied,
            'agust_denied' => $agust_denied,
            'september_denied' => $september_denied,
            'october_denied' => $october_denied,
            'november_denied' => $november_denied,
            'december_denied' => $december_denied,

            'january_wait_admin' => $january_wait_admin,
            'february_wait_admin' => $february_wait_admin,
            'march_wait_admin' => $march_wait_admin,
            'april_wait_admin' => $april_wait_admin,
            'may_wait_admin' => $may_wait_admin,
            'june_wait_admin' => $june_wait_admin,
            'july_wait_admin' => $july_wait_admin,
            'agust_wait_admin' => $agust_wait_admin,
            'september_wait_admin' => $september_wait_admin,
            'october_wait_admin' => $october_wait_admin,
            'november_wait_admin' => $november_wait_admin,
            'december_wait_admin' => $december_wait_admin,

            'january_wait_it' => $january_wait_it,
            'february_wait_it' => $february_wait_it,
            'march_wait_it' => $march_wait_it,
            'april_wait_it' => $april_wait_it,
            'may_wait_it' => $may_wait_it,
            'june_wait_it' => $june_wait_it,
            'july_wait_it' => $july_wait_it,
            'agust_wait_it' => $agust_wait_it,
            'september_wait_it' => $september_wait_it,
            'october_wait_it' => $october_wait_it,
            'november_wait_it' => $november_wait_it,
            'december_wait_it' => $december_wait_it,

        ]);
    }

    // print feedback tiket
    public function filterFeedbackTicket()
    {
        return view('admin.report.feedback-tiket.filter-tiket', [
            'karyawan' => Karyawan::where('nama', '!=', '-')->get()
        ]);
    }

    public function printAllFeedbackTicket()
    {
        return view('admin.report.feedback-tiket.print-tiket', [
            'tiket' => Tiket::where('kode_tiket', '!=', '')->get()
        ]);
    }
    public function printFeedbackTicketApproved()
    {
        return view('admin.report.feedback-tiket.print-tiket', [
            'tiket' => Tiket::where('kode_tiket', '!=', '')->where('status_id', '!=', 1)->where('status_id', '!=', 4)->where('status_id', '!=', 5)->where('status_id', '!=', 6)->get()
        ]);
    }
    public function printFeedbackTicketRejected()
    {
        return view('admin.report.feedback-tiket.print-tiket', [
            'tiket' => Tiket::where('kode_tiket', '!=', '')->where('status_id', '!=', 1)->where('status_id', '!=', 5)->where('status_id', '!=', 6)->where('status_id', '!=', 2)->where('status_id', '!=', 3)->get()
        ]);
    }
    public function printFeedbackTicketMonthYear(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        return view('admin.report.feedback-tiket.print-tiket', [
            'tiket' => Tiket::where('kode_tiket', '!=', '')->whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->get()
        ]);
    }

    //print detail total tiket
    public function filterTotalTicket()
    {
        return view('admin.report.detail-total-tiket.filter-tiket');
    }

    public function printAllDetailTotalTicket()
    {
        $tiket = Tiket::where('kode_tiket', '!=', '')->get();
        $data = collect([$tiket]);
        $datas = $data->map(function ($array) {
            return collect($array)->unique('karyawan_id')->all();
        });
        return view('admin.report.detail-total-tiket.print-tiket', [
            'tiket' => $datas[0]
        ]);
    }
    public function printDetailTicketMonthYear(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $tiket = Tiket::where('kode_tiket', '!=', '')->whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->get();
        $data = collect([$tiket]);
        $datas = $data->map(function ($array) {
            return collect($array)->unique('karyawan_id')->all();
        });
        return view('admin.report.detail-total-tiket.print-tiket', [
            'tiket' => $datas[0]
        ]);
    }
}
