<?php

namespace App\Http\Controllers;

use App\Models\AsetSoftware;
use App\Models\Karyawan;
use App\Models\DetailPerbaikanAsetHardware;
use App\Models\asetSoftwareInstallonHardware;
use App\Models\PemilikAsetHardware;
use App\Models\AsetHardware;
use Illuminate\Http\Request;

class AsetSoftwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pc = AsetHardware::where('kode_hardware', 'LIKE', '%LP%')->orWhere('kode_hardware', 'LIKE', '%CP%')->get();
        return view('admin.aset.software.index', [
            'aset' => AsetSoftware::orderBy('nama', 'asc')->get(),
            'pc' => $pc
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            "nama" => 'required',
            "keterangan" => 'required'
        ]);

        AsetSoftware::create($validateData);
        return redirect('/admin/aset-software')->with('success', 'Software has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AsetSoftware  $asetSoftware
     * @return \Illuminate\Http\Response
     */
    public function show(AsetSoftware $asetSoftware)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AsetSoftware  $asetSoftware
     * @return \Illuminate\Http\Response
     */
    public function edit(AsetSoftware $asetSoftware)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AsetSoftware  $asetSoftware
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AsetSoftware $asetSoftware)
    {
        $rules = [
            'nama' => 'required',
            'keterangan' => 'required'
        ];
        $validateData = $request->validate($rules);
        AsetSoftware::where('id', $request->id_software)->update($validateData);
        return redirect('/admin/aset-software')->with('success', 'Software has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AsetSoftware  $asetSoftware
     * @return \Illuminate\Http\Response
     */
    public function destroySoftware($id)
    {
        AsetSoftware::find($id)->delete();
        return back()->with('success', 'Software has been removed!');
    }



    //user
    //user
    public function asetSoftwareUser()
    {

        $karyawan = Karyawan::where('id', auth()->user()->karyawan->id)->get();
        $pemilik = PemilikAsetHardware::where('karyawan_id', $karyawan[0]->id)->get();

        $value = [];
        foreach ($pemilik as $pemilik) {
            $today = date("Y-M-d");
            $expire = $pemilik->tanggal_berakhir;
            $today_time = strtotime($today);
            $expire_time = strtotime($expire);
            if ($today_time <= $expire_time || $pemilik->tanggal_berakhir == null) {
                $value[] = $pemilik->aset_hardware_id;
            }
        }
        $install = asetSoftwareInstallonHardware::whereIn('aset_hardware_id', $value)->get();
        return view('user.aset.aset-software', [
            'aset' => $install
        ]);
    }
}
