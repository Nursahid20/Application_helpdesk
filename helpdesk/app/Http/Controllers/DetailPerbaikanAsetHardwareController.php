<?php

namespace App\Http\Controllers;

use App\Models\DetailPerbaikanAsetHardware;
use App\Models\AsetHardware;
use Illuminate\Http\Request;

class DetailPerbaikanAsetHardwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //explode url
        $explode = explode('/', url()->current());
        //explode nama jenis hardware underscore
        $data = AsetHardware::where('kode_hardware', end($explode))->get();
        return view('admin.aset.hardware.detail_perbaikan_aset_hardware.index', [
            'aset' => DetailPerbaikanAsetHardware::where('aset_hardware_id', $data[0]->id)->get(),
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //explode url
        $explode = explode('/', url()->current());
        //explode nama jenis hardware underscore
        $data = AsetHardware::where('kode_hardware', $explode[5])->get();
        return view('admin.aset.hardware.detail_perbaikan_aset_hardware.create', [
            'aset' => DetailPerbaikanAsetHardware::where('aset_hardware_id', $data[0]['id'])->get(),
            'data' => $data
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
        //explode url
        $explode = explode('/', url()->current());
        //explode nama jenis hardware underscore
        $data = AsetHardware::where('kode_hardware', $explode[5])->get();
        $rules = [
            'keterangan_kerusakan' => 'required',
            'biaya_perbaikan' => 'required',
            'tanggal_perbaikan' => 'required'
        ];
        $validateData = $request->validate($rules, [
            'keterangan_kerusakan.required' => 'Keterangan Kerusakan harus di isi',
            'biaya_perbaikan.required' => 'Biaya Perbaikan harus di isi',
            'tanggal_perbaikan.required' => 'Tanggal Perbaikan harus di isi'
        ]);

        if ($request->status_id == 'on') {
            AsetHardware::where('kode_hardware', $explode[5])->update([
                'status' => 'Rusak',
                'tanggal_rusak_total' => date('Y-m-d')
            ]);
        }

        $validateData['aset_hardware_id'] = $data[0]->id;
        $validateData['tanggal_perbaikan'] = $request->tanggal_perbaikan . " - " . $request->sampai_tanggal_perbaikan;
        DetailPerbaikanAsetHardware::create($validateData);
        return redirect('/admin/hardware-repair-details/' . $data[0]->kode_hardware)->with('success', 'Perbaikan Aset Hardware Baru Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailPerbaikanAsetHardware  $detailPerbaikanAsetHardware
     * @return \Illuminate\Http\Response
     */
    public function show(DetailPerbaikanAsetHardware $detailPerbaikanAsetHardware)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailPerbaikanAsetHardware  $detailPerbaikanAsetHardware
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailPerbaikanAsetHardware $detailPerbaikanAsetHardware)
    {
        //explode url
        $explode = explode('/', url()->current());
        //explode nama jenis hardware underscore
        $aset = DetailPerbaikanAsetHardware::where('id', $explode[6])->get();
        return view('admin.aset.hardware.detail_perbaikan_aset_hardware.edit', [
            'aset' => $aset[0],
            'kode_hardware' => $explode[5]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailPerbaikanAsetHardware  $detailPerbaikanAsetHardware
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailPerbaikanAsetHardware $detailPerbaikanAsetHardware)
    {
        $explode = explode('/', url()->current());
        $rules = [
            'keterangan_kerusakan' => 'required',
            'biaya_perbaikan' => 'required',
            'tanggal_perbaikan' => 'required'
        ];
        $validateData = $request->validate($rules, [
            'keterangan_kerusakan.required' => 'Keterangan Kerusakan harus di isi',
            'biaya_perbaikan.required' => 'Biaya Perbaikan harus di isi',
            'tanggal_perbaikan.required' => 'Tanggal Perbaikan harus di isi'
        ]);
        $validateData['tanggal_perbaikan'] = $request->tanggal_perbaikan . " - " . $request->sampai_tanggal_perbaikan;
        DetailPerbaikanAsetHardware::where('id', $explode[6])
            ->update($validateData);;
        return redirect('/admin/hardware-repair-details/' . $explode[5])->with('success', 'Perbaikan Aset Hardware Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailPerbaikanAsetHardware  $detailPerbaikanAsetHardware
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $explode = explode('/', url()->current());
        DetailPerbaikanAsetHardware::find(end($explode))->delete();
        return back()->with('success', 'Perbaikan Aset Hardware Berhasil dihapus!');
    }

    public function filterCostOfRepairs()
    {

        return view('admin.report.aset.filter-of-repairs', [
            'aset_hardware' => AsetHardware::where('kode_hardware', '!=', '-')->get(),
        ]);
    }

    public function printCostOfRepairs(Request $request)
    {
        $aset = DetailPerbaikanAsetHardware::where('aset_hardware_id', $request->aset_hardware_id)->get();
        return view('admin.report.aset.print-costs-of-repairs', [
            'aset' => $aset
        ]);
    }

    public function printAsetHardwareDemaged(Request $request)
    {
        $hari = $request->hari;
        $bulan = $request->bulan;
        $tahun = $request->tahun;


        if ($request->hari && $request->bulan && $request->tahun) {
            $aset = AsetHardware::where('status', 'Rusak')->whereDay('tanggal_rusak_total', $hari)->whereMonth('tanggal_rusak_total', $bulan)->whereYear('tanggal_rusak_total', $tahun)->get();;
            return view('admin.report.aset.print-aset-hardware-demaged', [
                'aset' => $aset
            ]);
        } elseif ($request->bulan && $request->tahun) {
            $aset = AsetHardware::where('status', 'Rusak')->whereMonth('tanggal_rusak_total', $bulan)->whereYear('tanggal_rusak_total', $tahun)->get();;
            return view('admin.report.aset.print-aset-hardware-demaged', [
                'aset' => $aset
            ]);
        } else {
            $aset = AsetHardware::where('status', 'Rusak')->get();;
            return view('admin.report.aset.print-aset-hardware-demaged', [
                'aset' => $aset
            ]);
        }
    }
}
