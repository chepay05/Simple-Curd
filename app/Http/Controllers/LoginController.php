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

    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'email Wajib di isi',
                'password.required' => 'password Wajib di isi',
            ]
        );
        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($infoLogin)) {
            if (Auth::user()->role == 'admin') {
                return redirect()->route('index');
            } elseif (Auth::user()->role == 'staff') {
                return redirect()->route('karyawan_departemen.index');
            }
        } else {
            return redirect('')->withErrors('Username dan Password Tidak sesuai');
        };
    }

    public function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
