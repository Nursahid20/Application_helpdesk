<?php

namespace App\Http\Controllers;

use App\Models\JenisAset;
use Illuminate\Http\Request;

class JenisAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.jenis_aset_hardware.index', [
            'jenis_aset_hardware' => JenisAset::where('nama', '!=', '-')->orderBy('created_at', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'nama' => 'required',
            'kode' => 'required',
        ]);

        JenisAset::create($validateData);
        return redirect('/admin/jenis-aset-hardware')->with('success', 'Jenis Aset Hardware Baru Berhasil diubah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jabatan  $jenisAset
     * @return \Illuminate\Http\Response
     */
    public function show(JenisAset $jenisAset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jabatan  $jenisAset
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisAset $jenisAset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jabatan  $jenisAset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisAset $jenisAset)
    {
        $explode = explode('/', url()->current());
        $rules = [
            'nama' => 'required',
            'kode' => 'required'
        ];
        $validateData = $request->validate($rules);
        JenisAset::where('id', end($explode))
            ->update($validateData);

        return redirect('/admin/jenis-aset-hardware')->with('success', 'Jenis Aset Hardware berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jabatan  $jenisAset
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JenisAset::find($id)->delete();
        return back()->with('success', 'Jenis Aset Hardware berhasil dihapus!');
    }
}
