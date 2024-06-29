<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Monolog\Registry;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function actionlogin(Request $request){
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        // dd($data);

        if (Auth::attempt($data)) {
            if (auth()->user()->role_id == 1) {
                return redirect()->route('a.dashboard');
            }
            else if (auth()->user()->role_id == 2) {
                return redirect()->route('k.dashboard');
            }
        }
        else {
            return redirect('/login')->with('failed', 'Nama atau Password anda salah, Hubungi NO.081393601766 untuk mereset password');
        }
    }

    public function actionlogout() {
        Auth::logout();
        return redirect('/');
    }
}
