<?php

namespace App\Http\Controllers;

use App\Models\AsetHardware;
use App\Models\Karyawan;
use App\Models\PemilikAsetHardware;
use Illuminate\Http\Request;

class PemilikAsetHardwareController extends Controller
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
        //explode nama hardware underscore
        $data = AsetHardware::where('kode_hardware', end($explode))->get();
        return view('admin.aset.hardware.pemilik_aset_hardware.index', [
            'aset' => PemilikAsetHardware::where('aset_hardware_id', $data[0]->id)->get(),
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
        //explode nama hardware underscore
        $data = AsetHardware::where('kode_hardware', $explode[5])->get();
        return view('admin.aset.hardware.pemilik_aset_hardware.create', [
            'aset' => PemilikAsetHardware::where('aset_hardware_id', $data[0]['id'])->get(),
            'karyawan' => Karyawan::where('nama', '!=', '-')->orderBy('nama', 'asc')->get(),
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
        //explode nama hardware underscore
        $data = AsetHardware::where('kode_hardware', $explode[5])->get();
        $rules = [
            'karyawan_id' => 'required',
            'tanggal_diterima' => 'required'
        ];
        $validateData = $request->validate($rules, [
            'karyawan_id.required' => 'Karyawan harus di isi',
            'tanggal_diterima.required' => 'Tanggal Diterima harus di isi'
        ]);
        $validateData['aset_hardware_id'] = $request->aset_hardware_id;
        $validateData['tanggal_berakhir'] = null;
        PemilikAsetHardware::create($validateData);
        return redirect('/admin/hardware-owner/' . $data[0]->kode_hardware)->with('success', 'Pemilik Aset Hardware Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PemilikAsetHardware  $pemilikAsetHardware
     * @return \Illuminate\Http\Response
     */
    public function show(PemilikAsetHardware $pemilikAsetHardware)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PemilikAsetHardware  $pemilikAsetHardware
     * @return \Illuminate\Http\Response
     */
    public function edit(PemilikAsetHardware $pemilikAsetHardware)
    {
        //explode url
        $explode = explode('/', url()->current());
        //explode nama jenis hardware underscore
        $aset = PemilikAsetHardware::where('id', $explode[6])->get();
        $data = AsetHardware::where('kode_hardware', $explode[5])->get();
        return view('admin.aset.hardware.pemilik_aset_hardware.edit', [
            'aset' => $aset[0],
            'karyawan' => Karyawan::where('nama', '!=', '-')->orderBy('nama', 'asc')->get(),
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PemilikAsetHardware  $pemilikAsetHardware
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PemilikAsetHardware $pemilikAsetHardware)
    {
        //explode url
        $explode = explode('/', url()->current());
        //explode nama jenis hardware underscore
        $data = AsetHardware::where('kode_hardware', $explode[5])->get();
        $rules = [
            'karyawan_id' => 'required',
            'tanggal_diterima' => 'required'
        ];
        $validateData = $request->validate($rules, [
            'karyawan_id.required' => 'Keterangan Kerusakan harus di isi',
            'tanggal_diterima.required' => 'Biaya Perbaikan harus di isi'
        ]);
        if ($request->tanggal_berakhir) {
            $validateData['tanggal_berakhir'] = $request->tanggal_berakhir;
        }
        PemilikAsetHardware::where('id', $explode[6])
            ->update($validateData);;
        return redirect('/admin/hardware-owner/' . $data[0]->kode_hardware)->with('success', 'Pemilik Aset Hardware Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PemilikAsetHardware  $pemilikAsetHardware
     * @return \Illuminate\Http\Response
     */
    public function destroy(PemilikAsetHardware $pemilikAsetHardware)
    {
        $explode = explode('/', url()->current());
        PemilikAsetHardware::find(end($explode))->delete();
        return back()->with('success', 'Pemilik Aset Hardware Berhasil dihapus!');
    }
}
