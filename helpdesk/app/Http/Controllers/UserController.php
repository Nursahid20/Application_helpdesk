<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Karyawan;
use App\Models\Jabatan;
use App\Models\Departemen;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\PseudoTypes\LowercaseString;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index', [
            'user' => User::with(['karyawan'])->orderBy('created_at', 'desc')->get()
        ]);
    }

    public function changePassword()
    {
        return view('account.change-password', [
            'user' => User::where('id', auth()->user()->id)->get(),
            'karyawan' => Karyawan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create', [
            'user' => User::all(),
            'karyawan' => Karyawan::where('nama', '!=', '-')->orderBy('nama', 'asc')->get()
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
                'karyawan_id' => 'required|unique:users',
                'username' => 'required|unique:users',
                'level_user' => 'required',
                'password' => 'required|min:6|max:255|required_with:password_confirmation|same:password_confirmation'
            ],
            [
                'karyawan_id.required' => 'NIK & Nama harus di isi',
                'karyawan_id.unique' => 'NIK & Nama sudah terdaftar',
                'username.required' => 'NIK & Nama harus di isi',
                'username.unique' => 'NIK & Nama sudah terdaftar',
                'level_user.required' => 'Level User harus di isi',
                'password.required' => 'Password harus di isi',
                'password.min' => 'Password harus berisikan minimal 6 karakter',
                'password.max' => 'Password mengandung terlalu banyak karakter',
                'password.required_with' => 'Password memerlukan konfirmasi password',
                'password.same' => 'Password harus memiliki isi yang sama dengan Konfirmasi password'
            ]
        );
        $validateData['slug'] = $request->slug;
        $validateData['password'] = Hash::make($request->password);

        User::create($validateData);
        return redirect('/admin/user')->with('success', 'User baru Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show', [
            'user' => $user,
            'jabatan' => Jabatan::all(),
            'departemen' => Departemen::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'user' => $user,
            'karyawan' => Karyawan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'level_user' => 'required',
        ];

        if ($request->username != $user->username)
            $rules['username'] = 'required|unique:users';

        $validateData = $request->validate($rules, [
            'username.required' => 'Username harus di isi',
            'username.unique' => 'Username sudah terdaftar',
            'level_user.required' => 'Level User harus di isi',
        ]);

        if ($request->password) {
            $rules['password'] = 'min:6|max:255|required_with:password_confirmation|same:password_confirmation';
            $validateData = $request->validate($rules, [
                'password.min' => 'Password harus berisikan minimal 6 karakter',
                'password.max' => 'Password mengandung terlalu banyak karakter',
                'password.required_with' => 'Password memerlukan konfirmasi password',
                'password.same' => 'Password harus memiliki isi yang sama dengan Konfirmasi password'
            ]);
            $validateData['password'] = Hash::make($request->password);
        }

        if ($request->slug)
            $validateData['slug'] =  $request->slug;

        User::where('id', $user->id)
            ->update($validateData);

        return redirect('/admin/user')->with('success', 'User Berhasil diubah!');
    }

    public function updateUsernamePassword(Request $request)
    {
        $rules['username'] = 'required';
        $validateData = $request->validate($rules, [
            'username.required' => 'Username harus di isi',
        ]);
        if ($request->password) {
            $rules['password'] = 'min:6|max:255|required_with:password_confirmation|same:password_confirmation';
            $validateData = $request->validate($rules, [
                'password.min' => 'Password harus berisikan minimal 6 karakter',
                'password.max' => 'Password mengandung terlalu banyak karakter',
                'password.required_with' => 'Password memerlukan konfirmasi password',
                'password.same' => 'Password harus memiliki isi yang sama dengan Konfirmasi password'
            ]);
            $validateData['password'] = Hash::make($request->password);
        }
        if ($request->slug)
            $validateData['slug'] =  $request->slug;

        User::where('id', auth()->user()->id)
            ->update($validateData);

        return back()->with('success', 'Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return back()->with('success', 'User Berhasil dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(User::class, 'slug', $request->username);
        return response()->json(['slug' => $slug]);
    }

    public function printReportUser()
    {
        return view('admin.report.master.user', [
            'user' => User::all()
        ]);
    }
}
