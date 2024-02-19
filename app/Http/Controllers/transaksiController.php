<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\atk;
use App\Models\kodeGL;
use App\Models\rekamTambahSaldoAtk;
use App\Models\rekamPendaftaranAtk;
use App\Models\rekamPenghapusanAtk;
use App\Models\rekamTambahSaldoSouvenir;
use App\Models\rekamPendaftaranSouvenir;
use App\Models\rekamPenghapusanSouvenir;
use App\Models\requestAtk;
use App\Models\requestSouvenir;

class transaksiController extends Controller
{

    //atk

    public function indexTransaksiMasuk(){


        $dataPendaftaran = rekamPendaftaranAtk::all();
        return view('dashboard.atk.transaksi.transaksiAtkMasuk',[
            'datas' => $dataPendaftaran
        ]);
    }

    public function indexTransaksiMasukTambahSaldo(){

        $dataTambahSaldo = rekamTambahSaldoAtk::all();
        return view('dashboard.atk.transaksi.transaksiAtkMasukTambahSaldo',[
            'datas' => $dataTambahSaldo
        ]);
    }

    public function indexTransaksiKeluar(){
        return view('dashboard.atk.transaksi.transaksiAtkKeluar');
    }

    public function indexRekamanPenghapusan(){

        $data = rekamPenghapusanAtk::all();

        return view('dashboard.atk.transaksi.transaksiPenghapusanAtk',[
            'datas' => $data
        ]);
    }

    public function indexRequest(){

        $data = requestAtk::all();


        return view('dashboard.atk.transaksi.transaksiAtkKeluar',[
            'datas' => $data
        ]);
    }


    //souvenir

    public function indexTransaksiMasukSouvenir(){


        $dataPendaftaran = rekamPendaftaranSouvenir::all();
        return view('dashboard.souvenir.transaksi.transaksiSouvenirMasuk',[
            'datas' => $dataPendaftaran
        ]);
    }

    public function indexTransaksiMasukTambahSaldoSouvenir(){

        $dataTambahSaldo = rekamTambahSaldoSouvenir::all();
        return view('dashboard.souvenir.transaksi.transaksiSouvenirMasukTambahSaldo',[
            'datas' => $dataTambahSaldo
        ]);
    }

    public function indexTransaksiKeluarSouvenir(){
        return view('dashboard.souvenir.transaksi.transaksiSouvenirKeluar');
    }

    public function indexRekamanPenghapusanSouvenir(){

        $data = rekamPenghapusanSouvenir::all();

        return view('dashboard.souvenir.transaksi.transaksiPenghapusanSouvenir',[
            'datas' => $data
        ]);
    }

    public function indexRequestSouvenir(){

        $data = requestSouvenir::all();


        return view('dashboard.souvenir.transaksi.transaksiSouvenirKeluar',[
            'datas' => $data
        ]);
    }
}

