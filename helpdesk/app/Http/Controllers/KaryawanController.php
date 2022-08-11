<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Departemen;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.karyawan.index', [
            'karyawan' => Karyawan::with(['jabatan', 'departemen'])->where('nama', '!=', '-')->orderBy('created_at', 'desc')->get()
        ]);
    }

    public function account()
    {
        return view('account.profile', [
            'karyawan' => Karyawan::where('id', auth()->user()->karyawan_id)->get(),
            'jabatan' => Jabatan::where('nama', '!=', '-')->get(),
            'departemen' => Departemen::where('nama', '!=', '-')->get(),
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.karyawan.create', [
            'jabatan' => Jabatan::where('nama', '!=', '-')->orderBy('nama', 'asc')->get(),
            'departemen' => Departemen::where('nama', '!=', '-')->orderBy('nama', 'asc')->get()
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
        $validateData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email:dns|unique:karyawans',
            'jabatan_id' => 'required',
            'departemen_id' => 'required',
            'no_telepon' => 'required',
            'nik' => 'required|unique:karyawans',
            'jk' => 'required',
            'alamat' => 'required',
            'img_profile' => 'required|image|file|max:2024',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'blok' => 'required',
        ]);

        $file = $request->file('img_profile');

        if (!($file)) {
            $validateData['img_profile'] = 'default.png';
        } else {
            $ex = explode(('.'), $file->getClientOriginalName());
            $fileImg = date('mdYHis') . uniqid() . '.' . end($ex);
            $validateData['img_profile'] = $fileImg;
            request()->img_profile->move(public_path('images/karyawan'), $fileImg);
        }
        $validateData['slug'] = $request->slug;

        Karyawan::create($validateData);
        return redirect('/admin/karyawan')->with('success', 'Karyawan Baru Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        return view('admin.karyawan.show', [
            'karyawan' => $karyawan,
            'jabatan' => Jabatan::all(),
            'departemen' => Departemen::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        return view('admin.karyawan.edit', [
            'jabatan' => Jabatan::where('nama', '!=', '-')->orderBy('nama', 'asc')->get(),
            'departemen' => Departemen::where('nama', '!=', '-')->orderBy('nama', 'asc')->get(),
            'karyawan' => $karyawan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $rules = [
            'nama' => 'required',
            'jabatan_id' => 'required',
            'departemen_id' => 'required',
            'no_telepon' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'img_profile' => 'image|file|max:2024',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'blok' => 'required',
        ];
        if ($request->email != $karyawan->email) {
            $rules['email'] = 'required|email:dns|unique:karyawans';
        }
        if ($request->nik != $karyawan->nik) {
            $rules['nik'] = 'required|unique:karyawans';
        }
        $validateData = $request->validate($rules);

        if ($request->file('img_profile')) {
            if ($request->oldImage == $request->img_profile) {
                unlink("/images/karyawan/" . $request->oldimage);
            }
            $file = $request->file('img_profile');
            $ex = explode(('.'), $file->getClientOriginalName());
            $fileImg = date('mdYHis') . uniqid() . '.' . end($ex);
            $validateData['img_profile'] = request()->img_profile->move(public_path('images/karyawan'), $fileImg);
            $validateData['img_profile'] = $fileImg;
        }
        if ($request->slug) {
            $validateData['slug'] =  $request->slug;
        }
        Karyawan::where('id', $karyawan->id)
            ->update($validateData);

        return redirect('/admin/karyawan')->with('success', 'Karyawan Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Karyawan::find($id)->delete();
        return back()->with('success', 'Karyawan Berhasil dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Karyawan::class, 'slug', $request->nama);

        return response()->json(['slug' => $slug]);
    }

    public function printReportKaryawan()
    {
        return view('admin.report.master.karyawan', [
            'karyawan' => Karyawan::where('nama', '!=', '-')->get()
        ]);
    }
}
