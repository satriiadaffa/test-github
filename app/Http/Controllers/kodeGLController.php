<?php

namespace App\Http\Controllers;

use App\Models\kodeGL;
use Illuminate\Http\Request;

class kodeGLController extends Controller
{
    public function index(){
        return view('dashboard.tambahKodeGL');
    }

    public function tambahKodeGL(Request $request){


        kodeGL::create([
            'kode' => $request->kode,
            'namaKode' => $request->namaKode,
            'kodeGabungan' => $request->namaKode.' ('.$request->kode.')',
            'kategori' => $request->kategori
        ]);

        return redirect('/pendaftaran-atk')->with('message','Kode GL Berhasil Ditambahkan!');
    }

}
