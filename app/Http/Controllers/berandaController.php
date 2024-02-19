<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\atk;
use App\Models\user;
use App\Models\rekamTambahSaldoAtk;
use App\Models\rekamPendaftaranAtk;
use App\Models\requestAtk;
use App\Models\souvenir;

use App\Models\requestSouvenir;
use App\Models\rekamTambahSaldoSouvenir;
use App\Models\rekamPendaftaranSouvenir;

class berandaController extends Controller
{
    public function index(){

        $dataAtk = atk::all();
        $dataSouvenir = souvenir::all();

        $dataRequestAtk = requestAtk::all();
        $dataRequestSouvenir = requestSouvenir::all();

        $dataUser = user::all();

        $countDataAtk = count($dataAtk);
        $countDataSouvenir = count($dataSouvenir);

        $countDataRequestAtk = count($dataRequestAtk);
        $countDataRequestSouvenir = count($dataRequestSouvenir);

        $countDataUser = count($dataUser);

        return view('dashboard.beranda',[
            'countDataAtk' => $countDataAtk,
            'countDataSouvenir' => $countDataSouvenir,
            'countDataUser' => $countDataUser,

            'countDataRequestAtk' => $countDataRequestAtk,
            'countDataRequestSouvenir' => $countDataRequestSouvenir
        ]);

    }

    public  function reset() {
        $dataAtk = atk::all();
        


        foreach ($dataAtk as $data){

            rekamPendaftaranAtk::where('namaBarang', $data->namaBarang)->update([
                'debet' => $data->saldo
            ]);
            
        }

                    // Menghapus semua data dari tabel rekamTambahSaldoAtk
            rekamTambahSaldoAtk::truncate();

            // Menghapus semua data dari tabel requestAtk
            requestAtk::truncate();

        $dataSouvenir = souvenir::all();
        
        foreach ($dataSouvenir as $data){

            rekamPendaftaranSouvenir::where('namaBarang', $data->namaBarang)->update([
                'debet' => $data->saldo
            ]);
            
        }

                    // Menghapus semua data dari tabel rekamTambahSaldoSouvenir
            rekamTambahSaldoSouvenir::truncate();

            // Menghapus semua data dari tabel requestSouvenir
            requestSouvenir::truncate();

        return redirect('/beranda')->with('message', 'Data Telah Direset dan Siap Untuk Input Pada Bulan Baru');
    }
}
