<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\PseudoTypes\LowercaseString;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.information.index', [
            'informasi' => Informasi::orderBy('created_at', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.information.create', [
            'informasi' => Informasi::all()
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
        $validateData = $request->validate(
            [
                'subject' => 'required',
                'pesan' => 'required'
            ],
            [
                'subject.required' => 'Subject harus di isi',
                'pesan.unique' => 'Pesan sudah terdaftar'
            ]
        );
        $validateData['dari'] = auth()->user()->karyawan->nama;
        $validateData['tanggal'] = $request->tanggal;
        $validateData['slug'] = $request->slug;
        Informasi::create($validateData);
        return redirect('/admin/information')->with('success', 'Informasi baru Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function show(Informasi $informasi)
    {
        $explode = explode('/', url()->current());
        return view('admin.information.show', [
            'informasi' => Informasi::where('slug', end($explode))->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Informasi $informasi)
    {
        $explode = explode('/', url()->current());
        return view('admin.information.edit', [
            'informasi' => Informasi::where('slug', $explode[5])->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Informasi $informasi)
    {
        $explode = explode('/', url()->current());
        $validateData = $request->validate(
            [
                'subject' => 'required',
                'pesan' => 'required'
            ],
            [
                'subject.required' => 'Subject harus di isi',
                'pesan.unique' => 'Pesan sudah terdaftar'
            ]
        );
        $validateData['slug'] = $request->slug;
        $validateData['tanggal'] = $request->tanggal;
        $validateData['pesan'] = $request->pesan;
        $validateData['subject'] = $request->subject;
        Informasi::where('slug', end($explode))
            ->update($validateData);
        return redirect('/admin/information')->with('success', 'Informasi Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Informasi $informasi)
    {
        $explode = explode('/', url()->current());
        Informasi::find(end($explode))->delete();
        return back()->with('success', 'Informasi Berhasil dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Informasi::class, 'slug', $request->subject);
        return response()->json(['slug' => $slug]);
    }

    public function informationUser()
    {
        return view('user.information.index', [
            'informasi' => Informasi::latest()->paginate(5)->withQueryString()
        ]);
    }
}
