<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
                'email.required' => 'Email wajib di isi',
                'password.required' => 'Password wajib di isi',
            ]
        );

        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infoLogin)) {
            $user = Auth::user();

            if ($user->role == 'admin') {
                // Set the user role in the session
                Session::put('role', 'admin');
                return redirect()->route('index')->with('helo', "Helo Selamat datang " . $user->name);
            } elseif ($user->role == 'staff') {
                // Set the user role in the session
                Session::put('role', 'staff');
                return redirect()->route('karyawan_departemen.index')->with('helo', "Helo Selamat datang " . $user->name);
            }
        } else {
            return redirect()->route('login')->withErrors('Username dan Password Tidak sesuai');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('')->with('helo', "Anda Berhasil Logout");
    }
}
