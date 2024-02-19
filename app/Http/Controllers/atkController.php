<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon; // Import library Carbon untuk manipulasi tanggal

use App\Models\atk;
use App\Models\kodeGL;
use App\Models\unit;
use App\Models\rekamTambahSaldoAtk;
use App\Models\rekamPendaftaranAtk;
use App\Models\rekamPenghapusanAtk;
use App\Models\requestAtk;


use Illuminate\Support\Facades\Auth;

class atkController extends Controller
{
    public function index(){


        $daftarkodeGL = kodeGL::where('kategori','ATK')->get();
        return view('dashboard.atk.pendaftaranAtk',[
            'kodeGLs' => $daftarkodeGL
        ]);
    }
    public function pendaftaranAtk(Request $request){

        
        $validateData = $request->validate([
            'namaBarang' => 'required|unique:atk',
            'kodeGL' => 'required',
            'debet' => 'required',
            'satuanBarang' => 'required',
            'hargaSatuan' => 'required'

        ]);





        $kodeGL = kodeGL::where('kodeGabungan', $request->kodeGL)->first();

        $newAtk = atk::create([
            'namaBarang' => $validateData['namaBarang'],
            'kodeGL' => $validateData['kodeGL'],
            'saldo' => $validateData['debet'],
            'status'=> 'new',
            'satuanBarang' => $validateData['satuanBarang'],
            'hargaSatuan' => $validateData['hargaSatuan']
        ]);
        

        $newId = $newAtk->id;

        $kodeBarang = $kodeGL->kode.$newId;


        atk::where('id',$newId)->update([
            'kodeBarang' => $kodeBarang
        ]);

        
        $nip = auth::user()->nip;
        $userName = auth::user()->userName;


        rekamPendaftaranAtk::create([
            'nip' => $nip,
            'namaUser' => $userName,
            'namaBarang' => $request->namaBarang,
            'kodeBarang' => $kodeBarang,
            'debet' => $request->debet
        ]);


        return redirect('/tabel-atk')->with('message','Data Telah Ditambahkan');

    }

    public function getNamaBarang($kodeGL){
        $empData['data'] = atk::where('kodeGL', $kodeGL)->get();

        return response()->json($empData);
    }

    public function getSaldoBarang($namaBarang){
        $empData['data'] = atk::where('namaBarang', $namaBarang)->get();

        return response()->json($empData);
    }

    public function showTabelAtk(){

        $dataAtk = atk::all();

        return view('dashboard.atk.tabelAtk',
        [
        'title' => "Tabel ATK" ,
        'dataAtks' => $dataAtk,
        ]);
    }

    public function tambahSaldoATK($kodeBarang){

        $dataAtk = atk::all()->where('kodeBarang',$kodeBarang)->first();

        return view('dashboard.atk.tambahSaldoAtk', [
            'dataAtk' => $dataAtk
        ]);

        
    }

    public function kirimTambahSaldoATK(Request $request, $kodeBarang){

        $dataAtk = atk::all()->where('kodeBarang',$kodeBarang)->first();

        $saldoAkhir = (int)$dataAtk->saldo + (int)$request->debet;

        $nip = auth::user()->nip;
        $userName = auth::user()->userName;


        rekamTambahSaldoAtk::create([
            'nip' => $nip,
            'namaUser' => $userName,
            'namaBarang' => $request->namaBarang,
            'kodeBarang' => $request->kodeBarang,
            'debet' => $request->debet
        ]);

        atk::where('kodeBarang',$request->kodeBarang)->update([
            'saldo' => $saldoAkhir,
            'status' => 'tambahSaldo'
        ]);

        return redirect('/tabel-atk')->with('message','Saldo Telah Ditambahkan');

        
    }

    public function editATK($kodeBarang){

        $dataAtk = atk::all()->where('kodeBarang',$kodeBarang)->first();

        $kodeGL = kodeGL::all();

        return view('dashboard.atk.editAtk', [
            'dataAtk' => $dataAtk,
            'kodeGLs' => $kodeGL
        ]);

        
    }

    public function kirimEditATK(Request $request){

        atk::where('kodeBarang',$request->kodeBarang)->update([
            'namaBarang' => $request->namaBarang,
            'kodeGL' => $request->kodeGL,
            'hargaSatuan' => $request->hargaSatuan,
            'satuanBarang' => $request->satuanBarang
        ]);

        return redirect('/tabel-atk')->with('message','Barang Telah Diedit');
        
    }

    public function hapusATK($kodeBarang){

        $nip = auth::user()->nip;
        $userName = auth::user()->userName;

        $data = atk::all()->where('kodeBarang',$kodeBarang)->first();
        rekamPenghapusanAtk::create([
            'nip' => $nip,
            'namaUser' => $userName,
            'namaBarang' => $data->namaBarang,
            'kodeBarang' => $data->kodeBarang,
        ]);

        
        rekamTambahSaldoAtk::where('kodeBarang',$kodeBarang)->delete();
        rekamPendaftaranAtk::where('kodeBarang',$kodeBarang)->delete();
        $data->delete();

        


        return redirect('/tabel-atk')->with('message-delete','Barang Telah Dihapus');

        
    }

    //Request ATK

    public function indexRequestATK(){

        $daftarkodeGL = kodeGL::where('kategori','ATK')->get();
        $daftarUnit = unit::all();
        $atk =atk::all();

        return view('dashboard.atk.requestAtk',[
            'kodeGLs' => $daftarkodeGL,
            'units' => $daftarUnit,
            'atk' => $atk 
        ]);
    }
    public function requestAtk(Request $request){

        

        if($request->saldo<$request->debet){
            return redirect('/request-atk')->with('message-danger','Saldo Tidak Cukup!');
        }else{

        
            $nip = auth::user()->nip;
            $userName = auth::user()->userName;

        $request = requestAtk::create([
            'namaBarang' => $request->namaBarang,
            'kodeBarang' => $request->kodeBarang,
            'debet' => $request->debet,
            'namaUnit' => $request->unit,
            'nip' => $nip,
            'namaUser' =>$userName
        ]);
        $atk = atk::where('kodeBarang',$request->kodeBarang)->first();

       $saldoUpdate = $atk->saldo - $request->debet;

       $atk = atk::where('kodeBarang',$request->kodeBarang)->update([
        'saldo'=>$saldoUpdate
        ]);

        return redirect('/tabel-atk')->with('message','Request Telah Ditambahkan');
        }

    }


    public function tabelLaporanAtk(){
        $yearMonth = date('Y-m'); // Mengambil tahun dan bulan dari input $request->bulan
        $dataAtk = atk::all();
        $dataUnit = unit::all();
        $daftarkodeGL = kodeGL::where('kategori','ATK')->get();
        $requestDebetNested = []; // Inisialisasi array untuk menyimpan nilai debet dalam bentuk nested array
        $totalRequest = [];

        


        foreach ($dataUnit as $unit) {
            $requestDebet = []; // Inisialisasi array untuk menyimpan nilai debet dalam unit tertentu
            $arraySaldoAwal = [];
            $arrayTambahSaldo = [];
            
            foreach ($dataAtk as $atk) {
                $saldoAwal = rekamPendaftaranAtk::where('namaBarang', $atk->namaBarang)->pluck('debet')->first();
                $debetTambahSaldo = rekamTambahSaldoAtk::where('namaBarang', $atk->namaBarang)
                                                            ->pluck('debet')
                                                            ->first();
                if($debetTambahSaldo == null){
                    $debetTambahSaldo = 0;
                }
                $arrayTambahSaldo[]= $debetTambahSaldo;
                $arraySaldoAwal[] = $saldoAwal;
                $request = requestAtk::where('namaBarang', $atk->namaBarang)
                    ->where('namaUnit', $unit->namaUnit)
                    ->whereRaw("DATE_FORMAT(updated_at, '%Y-%m') = ?", [$yearMonth])
                    ->get();

                $totalDebet = 0; // Inisialisasi total debet untuk setiap $atk
                foreach ($request as $singleRequest) {
                    $totalDebet += $singleRequest->debet;
                }
                $requestDebet[] = [
                    'namaUnit' => $unit->namaUnit,
                    'totalDebet' => $totalDebet,
                ];
            } 
            $requestDebetNested[] = $requestDebet; // Menambahkan array debet dalam unit ke array nested
        }

        $i = 0;
        foreach($requestDebet as $reqDeb){
            $totalUnitRequest = 0;
            foreach($requestDebetNested as $reqDeb){  
                $dataKe = $reqDeb[$i];    
                $totalUnitRequest += $dataKe['totalDebet'];
            }           
            $totalRequest[] = $totalUnitRequest;     
            $i += 1;  
        }
        $hargaPenggunaan = [];
        $hargaSaldoAkhir = [];
        $jumlahSaldoAkhir = [];
        foreach($dataAtk as $atk){
            $hargaPenggunaan[] = $atk->hargaSatuan;
            $hargaSaldoAkhir[] = $atk->hargaSatuan;
            $jumlahSaldoAkhir[] = $atk->saldo;
        }   
        $totalPenggunaan = []; // Inisialisasi array untuk menyimpan hasil penjumlahan
        foreach ($hargaPenggunaan as $index => $harga) {
            if (isset($totalRequest[$index])) {
                $totalPenggunaan[$index] = $harga*$totalRequest[$index];
            }
        }
        $totalSaldoAkhir = []; // Inisialisasi array untuk menyimpan hasil penjumlahan
        foreach ($hargaSaldoAkhir as $index => $harga) {
            if (isset($jumlahSaldoAkhir[$index])) {
                $totalSaldoAkhir[$index] = $harga*$jumlahSaldoAkhir[$index];
            }
        }
        $totalPenggunaanAkhir = [];
        $sisaPersediaan = []; // Array untuk menyimpan data per kodeGL
        foreach($daftarkodeGL as $kodeGL) {
            $arrayHarga = [];
            $arraySaldoAkhir =[];
            $filteredData = $dataAtk->where('kodeGL', $kodeGL->kodeGabungan); // Filter data dengan kodeGL yang sesuai
            $penggunaan = 0;
            foreach($filteredData as $index => $data) {
                $arrayHarga[] = $data->hargaSatuan;
                $arraySaldoAkhir[] = $data->saldo;
                $penggunaan += $totalPenggunaan[$index];
            }
            $totalPenggunaanAkhir[] = $penggunaan;
            $totalSisaPersediaan = 0;
            foreach ($arrayHarga as $index => $harga) {
                $totalSisaPersediaan += $harga * $arraySaldoAkhir[$index];
            }
            $sisaPersediaan[] = $totalSisaPersediaan;
        }

        $date = Carbon::createFromFormat('Y-m', $yearMonth)->locale('id'); // Atur lokalisasi ke bahasa Indonesia
        $formattedDate = $date->translatedFormat('F Y'); // Formatkan tanggal sesuai dengan nama bulan dan tahun



        return view('dashboard.atk.laporan.tabelLaporanAtk',[
            'dataAtks' => $dataAtk,
            'yearMonth' => $formattedDate,
            'kodeGLs' => $daftarkodeGL,
            'sisaPersediaans' => $sisaPersediaan,
            'totalPenggunaans' => $totalPenggunaan,
            'totalPenggunaanAkhirs' => $totalPenggunaanAkhir,
            'totalSaldoAkhirs' => $totalSaldoAkhir,
            'totalRequests' => $totalRequest,
            'saldoAwals' => $arraySaldoAwal,
            'tambahSaldos' => $arrayTambahSaldo,
            'requestDebetNesteds' => $requestDebetNested
        ]);
    }

}
