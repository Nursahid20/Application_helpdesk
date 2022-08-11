<?php

namespace App\Http\Controllers;

use App\Models\AsetSoftwareInstallonHardware;
use App\Models\AsetHardware;
use App\Models\AsetSoftware;
use Illuminate\Http\Request;

class AsetSoftwareInstallonHardwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $explode = explode('/', url()->current());
        $hardware = AsetHardware::where('kode_hardware', $explode[5])->get();
        return view('admin.aset.software.aset_software_install_on_hardware.index', [
            'aset' => AsetSoftwareInstallonHardware::where('aset_hardware_id', $hardware[0]->id)->get(),
            'hardware' => $hardware
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $explode = explode('/', url()->current());
        $hardware = AsetHardware::where('kode_hardware', $explode[5])->get();
        $install = AsetSoftwareInstallonHardware::where('aset_hardware_id', $hardware[0]->id)->get();

        if (count($install) == 0) {
            $value[] = 0;
        } else {
            foreach ($install as $d) {
                $value[] = $d->aset_software_id;
            }
        }

        $json = json_encode($value);
        $explode1 = explode("[", $json);
        $explode2 = explode("]", $explode1[1]);
        $explode3 = explode(",", $explode2[0]);
        $data = AsetSoftware::whereNotIn('id', $explode3)->get();
        return view('admin.aset.software.aset_software_install_on_hardware.create', [
            'software' => $data,
            'hardware' => $hardware
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
            'aset_software_id' => 'required',
            'tanggal_install' => 'required',
        ];
        $validateData = $request->validate($rules, [
            'aset_software_id.required' => 'Aset Software harus di isi',
            'tanggal_install.required' => 'Tanggal Install harus di isi',
        ]);
        $validateData['aset_hardware_id'] = $request->aset_hardware_id;
        if ($request->harga == null) {
            $validateData['harga'] = 'Rp. 0';
        } else {
            $validateData['harga'] = $request->harga;
        }
        if ($request->serial == null) {
            $validateData['serial'] = '0';
        } else {
            $validateData['serial'] = $request->serial;
        }
        if ($request->tanggal_lisensi_berakhir == null) {
            $validateData['tanggal_lisensi_berakhir'] = null;
        } else {
            $validateData['tanggal_lisensi_berakhir'] = $request->tanggal_lisensi_berakhir;
        }
        foreach ($request->aset_software_id as $software) {
            $validateData['aset_software_id'] = $software;
            AsetSoftwareInstallonHardware::create($validateData);
        }
        return redirect('/admin/aset-software-install-on/' . $data[0]->kode_hardware)->with('success', 'Aset Install Software Baru Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AsetSoftwareInstallonHardware  $asetSoftwareInstallonHardware
     * @return \Illuminate\Http\Response
     */
    public function show(AsetSoftwareInstallonHardware $asetSoftwareInstallonHardware)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AsetSoftwareInstallonHardware  $asetSoftwareInstallonHardware
     * @return \Illuminate\Http\Response
     */
    public function edit(AsetSoftwareInstallonHardware $asetSoftwareInstallonHardware)
    {
        $explode = explode('/', url()->current());
        $hardware = AsetHardware::where('kode_hardware', $explode[5])->get();
        $aset = AsetSoftwareInstallonHardware::where('id', $explode[6])->get();
        $software_id = AsetSoftware::where('id', $aset[0]->aset_software_id)->get();
        return view('admin.aset.software.aset_software_install_on_hardware.edit', [
            'aset' => $aset,
            'hardware' => $hardware,
            'name_software' => $software_id[0]->nama
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AsetSoftwareInstallonHardware  $asetSoftwareInstallonHardware
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AsetSoftwareInstallonHardware $asetSoftwareInstallonHardware)
    {
        //explode url
        $explode = explode('/', url()->current());
        //explode nama jenis hardware underscore
        $data = AsetHardware::where('kode_hardware', $explode[5])->get();
        $rules = [
            'tanggal_install' => 'required',
        ];
        $validateData = $request->validate($rules, [
            'tanggal_install.required' => 'Tanggal Install harus di isi',
        ]);
        if ($request->harga) {
            $validateData['harga'] = $request->harga;
        }
        if ($request->serial) {
            $validateData['serial'] = $request->serial;
        }
        if ($request->tanggal_lisensi_berakhir) {
            $validateData['tanggal_lisensi_berakhir'] = $request->tanggal_lisensi_berakhir;
        }
        AsetSoftwareInstallonHardware::where('id', $explode[6])
            ->update($validateData);

        return redirect('/admin/aset-software-install-on/' . $data[0]->kode_hardware)->with('success', 'Aset Install Software Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AsetSoftwareInstallonHardware  $asetSoftwareInstallonHardware
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //explode url
        $explode = explode('/', url()->current());
        AsetSoftwareInstallonHardware::find(end($explode))->delete();
        return back()->with('success', 'Aset Install Software Berhasil dihapus!');
    }
}
