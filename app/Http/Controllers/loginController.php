<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function submitLogin(Request $request){


        $credentials = $request->validate([
            'nip' => 'required',
            'password' => 'required'
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = Auth::user()->role;

            if($role !== "Manager"){
                return redirect('/beranda');
            }else{
                return redirect('/tabel-atk');
            }

            


            
        } else {
            return redirect('/login')->with('loginError', 'Invalid credentials');
        }
    }

    public function logout(Request $request){

        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        $request->session()->flush(); // Hapus semua data session


        return redirect('/login');

    }
}
