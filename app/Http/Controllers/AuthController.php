<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        if (Session::has('login')) {
            return redirect('dashboard');
        }
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $data = User::where('email', $email)->first();
        if ($data) {
            if (Hash::check($password, $data->password)) {
                Session::put('nama', $data->name);
                Session::put('level', $data->level);
                Session::put('login', TRUE);
                return redirect('dashboard');
            }
            $request->session()->flash('status', 'Password salah');
            return redirect('login');
        }
        $request->session()->flash('status', 'Email salah');
        return redirect('login');
    }

    public function logout()
    {
        Session::flush();
        return redirect('login');
    }
}
