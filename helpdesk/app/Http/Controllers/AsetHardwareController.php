<?php

namespace App\Http\Controllers;

use App\Models\AsetHardware;
use App\Models\AsetSoftware;
use App\Models\asetSoftwareInstallonHardware;
use App\Models\Karyawan;
use App\Models\PemilikAsetHardware;
use App\Models\DetailPerbaikanAsetHardware;
use App\Models\JenisAset;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

use function PHPSTORM_META\elementType;

class AsetHardwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.aset.hardware.aset_hardware.index', [
            'aset' => AsetHardware::with(['pemilikAsetHardware'])->where('nama', '!=', '-')->orderBy('created_at', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = AsetHardware::latest('id')->first();
        $id = $data;
        if ($data == null) {
            $id = 0;
        } else {
            $id = $id->id;
        }
        return view('admin.aset.hardware.aset_hardware.create', [
            'aset' => AsetHardware::orderBy('nama', 'asc')->get(),
            'jenis_hardware' => JenisAset::where('nama', '!=', '-')->orderBy('nama', 'asc')->get(),
            'id' => $id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'jenis_hardware' => 'required',
            'ip' => 'required',
            'serial' => 'required',
            'harga' => 'required',
            'status' => 'required',
            'tanggal_awal_diterima' => 'required',
        ];
        $validateData = $request->validate($rules, [
            'nama.required' => 'Nama harus di isi',
            'jenis_hardware.required' => 'Jenis Hardware harus di isi',
            'ip.required' => 'IP Address harus di isi',
            'serial.required' => 'Serial harus di isi',
            'harga.required' => 'Harga harus di isi',
            'status.required' => 'Statu harus di isi',
            'tanggal_awal_diterima.required' => 'Tanggal Awal Diterima harus di isi',
        ]);
        $jenis_aset_hardware = JenisAset::where('kode', $request->kode_jenis_aset_hardware)->get();
        $validateData['jenis_aset_hardware_id'] = $jenis_aset_hardware[0]->id;
        $validateData['kode_hardware'] = $request->kode_hardware;
        $validateData['tanggal_rusak_total'] = null;
        AsetHardware::create($validateData);
        return redirect('/admin/aset-hardware')->with('success', 'Hardware Baru Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AsetHardware  $asetHardware
     * @return \Illuminate\Http\Response
     */
    public function show(AsetHardware $asetHardware)
    {
        $detail = DetailPerbaikanAsetHardware::where('aset_hardware_id', $asetHardware->id)->get();
        $pemilik = PemilikAsetHardware::where('aset_hardware_id', $asetHardware->id)->latest()->first();
        return view('admin.aset.hardware.aset_hardware.show', [
            'aset' => $asetHardware,
            'perbaikan' => count($detail),
            'pemilik' => $pemilik
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AsetHardware  $asetHardware
     * @return \Illuminate\Http\Response
     */
    public function edit(AsetHardware $asetHardware)
    {
        $data = AsetHardware::latest('id')->first();
        return view('admin.aset.hardware.aset_hardware.edit', [
            'aset' => $asetHardware,
            'jenis_hardware' => JenisAset::orderBy('nama', 'asc')->get(),
            'kode_hardware' => $data->kode,
            'last_id_hardware' => $data->id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AsetHardware  $asetHardware
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AsetHardware $asetHardware)
    {
        $rules = [
            'nama' => 'required',
            'ip' => 'required',
            'serial' => 'required',
            'status' => 'required',
            'harga' => 'required',
            'tanggal_awal_diterima' => 'required',
        ];
        $validateData = $request->validate($rules);
        if ($request->tanggal_rusak_total) {
            $validateData['tanggal_rusak_total'] = $request->tanggal_rusak_total;
        }
        AsetHardware::where('id', $request->aset_hardware_id)
            ->update($validateData);;
        return redirect('/admin/aset-hardware')->with('success', 'Hardware Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AsetHardware  $asetHardware
     * @return \Illuminate\Http\Response
     */
    public function destroyHardware($id)
    {
        AsetHardware::find($id)->delete();
        return back()->with('success', 'Hardware Berhasil dihapus!');
    }





    //user
    public function asetHardwareUser()
    {
        return view('user.aset.aset-hardware', [
            'aset' => PemilikAsetHardware::where('karyawan_id', auth()->user()->karyawan_id)->orderBy('created_at', 'desc')->get()
        ]);
    }

    public function showAsetHardwareUser(AsetHardware $asetHardware)
    {
        $explode = explode('/', url()->current());
        $aset = AsetHardware::where('kode_hardware', end($explode))->get();
        $detail = DetailPerbaikanAsetHardware::where('aset_hardware_id', $aset[0]->id)->get();
        $pemilik = PemilikAsetHardware::where('aset_hardware_id', $aset[0]->id)->latest()->first();
        return view('user.aset.show-aset-hardware', [
            'aset' => $aset[0],
            'perbaikan' => count($detail),
            'pemilik' => $pemilik
        ]);
    }



    //filter aset
    public function filterAset()
    {
        $pc = AsetHardware::where('kode_hardware', 'LIKE', '%LP%')->orWhere('kode_hardware', 'LIKE', '%CP%')->get();
        return view('admin.report.aset.filter-aset', [
            'jenis_aset' => JenisAset::where('kode', '!=', '-')->get(),
            'karyawan' => Karyawan::where('nama', '!=', '-')->get(),
            'aset_hardware' => $pc

        ]);
    }

    public function filterGrafikDemagedHardware()
    {
        return view('admin.report.aset.filter-grafik-demaged-hardware');
    }

    //print detail total tiket
    public function printAllAsetHardware()
    {
        return view('admin.report.aset.print-all-aset-hardware', [
            'aset' => AsetHardware::where('kode_hardware', '!=', '-')->get()
        ]);
    }

    public function printAsetHardware()
    {
        $explode = explode('/', url()->current());
        return view('admin.report.aset.print-aset-hardware', [
            'aset' => AsetHardware::where('kode_hardware', end($explode))->get()
        ]);
    }

    public function printGrafikDemagedHardware(Request $request)
    {
        $january = AsetHardware::where('kode_hardware', '!=', '-')->where('status', 'Rusak')->whereMonth('created_at', 1)->whereYear('created_at', $request->tahun)->get();
        $february = AsetHardware::where('kode_hardware', '!=', '-')->where('status', 'Rusak')->whereMonth('created_at', 2)->whereYear('created_at', $request->tahun)->get();
        $march = AsetHardware::where('kode_hardware', '!=', '-')->where('status', 'Rusak')->whereMonth('created_at', 3)->whereYear('created_at', $request->tahun)->get();
        $april = AsetHardware::where('kode_hardware', '!=', '-')->where('status', 'Rusak')->whereMonth('created_at', 4)->whereYear('created_at', $request->tahun)->get();
        $may = AsetHardware::where('kode_hardware', '!=', '-')->where('status', 'Rusak')->whereMonth('created_at', 5)->whereYear('created_at', $request->tahun)->get();
        $june = AsetHardware::where('kode_hardware', '!=', '-')->where('status', 'Rusak')->whereMonth('created_at', 6)->whereYear('created_at', $request->tahun)->get();
        $july = AsetHardware::where('kode_hardware', '!=', '-')->where('status', 'Rusak')->whereMonth('created_at', 7)->whereYear('created_at', $request->tahun)->get();
        $agust = AsetHardware::where('kode_hardware', '!=', '-')->where('status', 'Rusak')->whereMonth('created_at', 8)->whereYear('created_at', $request->tahun)->get();
        $september = AsetHardware::where('kode_hardware', '!=', '-')->where('status', 'Rusak')->whereMonth('created_at', 9)->whereYear('created_at', $request->tahun)->get();
        $october = AsetHardware::where('kode_hardware', '!=', '-')->where('status', 'Rusak')->whereMonth('created_at', 10)->whereYear('created_at', $request->tahun)->get();
        $november = AsetHardware::where('kode_hardware', '!=', '-')->where('status', 'Rusak')->whereMonth('created_at', 11)->whereYear('created_at', $request->tahun)->get();
        $december = AsetHardware::where('kode_hardware', '!=', '-')->where('status', 'Rusak')->whereMonth('created_at', 12)->whereYear('created_at', $request->tahun)->get();
        $data = AsetHardware::where('kode_hardware', '!=', '-')->where('status', 'Rusak')->get();
        return view('admin.report.aset.print-grafik-demaged-hardware', [
            'data' => $data,
            'january' => $january,
            'february' => $february,
            'march' => $march,
            'april' => $april,
            'may' => $may,
            'june' => $june,
            'july' => $july,
            'agust' => $agust,
            'september' => $september,
            'october' => $october,
            'november' => $november,
            'december' => $december,
        ]);
    }


    public function printAsetSoftwareInstallOnHardware(Request $request)
    {
        $hardware = AsetHardware::where('id', $request->aset_hardware_id)->get();
        return view('admin.report.aset.print-aset-software-installon-hardware', [
            'aset' => asetSoftwareInstallonHardware::where('aset_hardware_id', $hardware[0]->id)->get(),
            'nama_hardware' => $hardware[0]
        ]);
    }

    public function printAllAsetSoftware()
    {
        return view('admin.report.aset.print-all-aset-software', [
            'aset' => AsetSoftware::all()
        ]);
    }

    public function printPemilikAsetHardware(Request $request)
    {
        return view('admin.report.aset.print-aset-hardware-karyawan', [
            'aset' => PemilikAsetHardware::where('karyawan_id', $request->karyawan_id)->get(),
            'karyawan_id' => $request->karyawan_id,
        ]);
    }

    public function printAsetHardwareDMY(Request $request)
    {
        $jenis_aset = $request->jenis_aset_id;
        $hari = $request->hari;
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        if ($request->jenis_aset_id) {
            return view('admin.report.aset.print-all-aset-hardware', [
                'aset' => AsetHardware::where('kode_hardware', '!=', '-')->where('jenis_aset_hardware_id', $jenis_aset)->get()
            ]);
        } elseif ($request->bulan && $request->tahun) {
            return view('admin.report.aset.print-all-aset-hardware', [
                'aset' => AsetHardware::where('kode_hardware', '!=', '-')->whereMonth('tanggal_awal_diterima', $bulan)->whereYear('tanggal_awal_diterima', $tahun)->get()
            ]);
        } elseif ($request->jenis_aset_id && $request->hari && $request->bulan && $request->tahun) {
            return view('admin.report.aset.print-all-aset-hardware', [
                'aset' => AsetHardware::where('kode_hardware', '!=', '-')->where('jenis_aset_hardware_id', $jenis_aset)->get()
            ]);
        } else {
            return view('admin.report.aset.print-all-aset-hardware', [
                'aset' => AsetHardware::where('kode_hardware', '!=', '-')->whereDay('tanggal_awal_diterima', $hari)->whereMonth('tanggal_awal_diterima', $bulan)->whereYear('tanggal_awal_diterima', $tahun)->get()
            ]);
        }
    }
}
