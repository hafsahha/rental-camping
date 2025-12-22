<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
session_id('tubesrentaldpw');
session_start();

class AuthController extends Controller
{
    public function login(){
        return view('login'); 
    }

    public function register(){
        return view('register'); 
    }

    public function authenticating(Request $request){
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)){
            // if(Auth::user()->status != 'active'){
            //     Session::flash('status', 'failed');
            //     Session::flash('message', 'Akun tidak aktif');
            //     return redirect('/login');
            // }
            Session::put('login', true);
            Session::put('id_user', Auth::user()->id);
            Session::put('username', Auth::user()->username);

            $request->session()->regenerate();
            if(Auth::user()->role_id == 1){
                return redirect('admin/dashboard');
            }

            if(Auth::user()->role_id == 2){
                return redirect('/');
            }    
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'Login invalid');
        return redirect('/login');
    
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');

    }
    public function registerProcess(Request $request){
        $validated = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'nomor_telepon_user' => 'max:255',
            'alamat_user' => 'required',
        ]);

        $user = User::create($request->all());

        if($user) {
            return redirect('login');
        } else {
            return response()->json([
                'status' => 'Error',
                'message' => 'Registrasi Gagal'
            ]);
        }
    }
}
