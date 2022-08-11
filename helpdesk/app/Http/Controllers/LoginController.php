<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Fortify\Fortify;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {


        $credentials = $request->validate(
            [
                'username' => 'required',
                'password' => 'required|max:255'
            ],
            [
                'username.required' => 'Username harus di isi',
                'password.required' => 'Password harus di isi',
                'password.max' => 'Password mencapai batas maximum',
            ]
        );
        if (Auth::attempt($credentials)) {

            if (Auth::user()->level_user == 'Admin') {
                $request->session()->regenerate();
                return redirect()->intended('/admin/dashboard');
            }
            if (Auth::user()->level_user == 'Karyawan') {
                $request->session()->regenerate();
                return redirect()->intended('/user/dashboard');
            }
            if (Auth::user()->level_user == 'IT Support') {
                $request->session()->regenerate();
                return redirect()->intended('/it-support/dashboard');
            }
            if (Auth::user()->level_user == 'Kepala IT') {
                $request->session()->regenerate();
                return redirect()->intended('/it-manager/dashboard');
            }
        } else {
            return back()->with('loginError', 'Login failed!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
