<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

class userController extends Controller
{   
    

    public function indexUsers(){

        $data = user::all();
        return view('dashboard.user.manajemenUser',[
            'dataUsers' => $data
        ]);
    }

    public function tambahUser(){

        return view('dashboard.user.tambahUser');
    }

    public function kirimTambahUser(Request $request){

        

        $validatedUser = $request->validate([
            'nip' => 'required|unique:users|min:7|max:8|regex:/^[0-9]{6,9}$/',
            'userName' => 'required|unique:users|min:3|max:32',
            'password' => 'required|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/|min:8',
            'confirmPassword' => 'required|same:password',
            'role' => 'required'
        ]);
        
        $validatedUser['password'] = Hash::make($validatedUser['password']);
        
        user::create([
            'nip' => $validatedUser['nip'],
            'userName' => $validatedUser['userName'],
            'password' => $validatedUser['password'],
            'role' => $validatedUser['role']
        ]);
        return redirect('/manajemen-user')->with('message', 'User Ditambahkan!');

    }

    public function getAllUsers()
    { 
        $users       = (new User())->all();
        return response()->json($users, 200);
    }

    public function editUser($nip){

        $dataUser = user::all()->where('nip',$nip)->first();


        return view('dashboard.user.editUser', [
            'dataUser' => $dataUser
        ]);

        
    }

    public function kirimEditUser(Request $request){

        user::where('nip',$request->nip)->update([
            'userName' => $request->userName,
            'role' => $request->role

        ]);

        return redirect('/manajemen-user')->with('message','User Telah Diedit');
        
    }

    public function hapusUser($nip){


        $data = user::where('nip',$nip)->first();

        $data->delete();
        return redirect('/manajemen-user')->with('message-delete','User Telah Dihapus');

    }

    public function accountEditIndex($nip){

        $dataUser = user::where('nip',$nip)->first();

        return view('dashboard.userIndex',['dataUser'=>$dataUser]);
    }

    public function accountEditKirim(Request $request,$nip){

        $dataUser = user::where('nip',$nip)->update([
            'userName' => $request->userName
        ]);


        return redirect('/beranda')->with('message','Edit Akun Berhasil');
    }

    public function accountHapus(request $request,$nip){


        $data = user::where('nip',$nip)->first();
        $data->delete();
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        $request->session()->flush(); // Hapus semua data session


        return redirect('/login');


    }



}