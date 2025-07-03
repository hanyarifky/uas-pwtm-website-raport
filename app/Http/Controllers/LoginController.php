<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate(
            [
                'userid' => ['required', 'string',],
                'password' => ['required']
            ],
            [
                'userid.required' => "Harap masukkan UserId",
                'userid.string' => "Harap masukkan UserId yang benar",
                'password.required' => "Harap masukkan Password"
            ]
        );

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            alert()->success('Success', 'Login Berhasil');

            if (Auth::user()->role == 'siswa') {
                return redirect()->intended('/siswa');
            }

            return redirect()->intended('/admin');
        }

        alert()->error('Login Gagal', "UserId atau Password yang anda masukkan salah!");

        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}
