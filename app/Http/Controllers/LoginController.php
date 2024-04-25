<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function postlogin(Request $request)
    {
        $credentials =  $request->validate(
            [
                'username' => 'required',
                'password' => 'required|min:5|max:20',
            ],
            [
                'username.required' => 'Username anda Wajib diisi!!!',
                'password.required' => 'Password anda Wajib diisi!!!',
                'password.min' => 'Minimal Password 5 Character!!!',
                'password.max' => 'Maksimal Password 20 Character!!!',
            ]
        );

        if (Auth::guard('admin')->attempt($credentials))
            return redirect('/dashboard');
        elseif (Auth::guard('user')->attempt($credentials)) {
            return redirect('/dashboard');
        }
        return back()->with('loginerror', 'Data yang anda masukan salah');
    }

    public function logout()
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
            Alert::success('Success', 'Logout Berhasil!!!');
            return redirect('/login');
        } elseif (Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
            Alert::success('Success', 'Logout Berhasil!!!');
            return redirect('/login');
        }
    }
}
