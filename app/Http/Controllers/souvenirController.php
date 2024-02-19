<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon; // Import library Carbon untuk manipulasi tanggal

use App\Models\souvenir;
use App\Models\kodeGL;
use App\Models\unit;
use App\Models\rekamTambahSaldoSouvenir;
use App\Models\rekamPendaftaranSouvenir;
use App\Models\rekamPenghapusanSouvenir;
use App\Models\requestSouvenir;

use Illuminate\Support\Facades\Auth;

class souvenirController extends Controller
{
    public function index(){


        $daftarkodeGL = kodeGL::where('kategori','Souvenir')->get();
        return view('dashboard.souvenir.pendaftaranSouvenir',[
            'kodeGLs' => $daftarkodeGL
        ]);
    }
    public function pendaftaranSouvenir(Request $request){


        
        $validateData = $request->validate([
            'namaBarang' => 'required|unique:souvenir',
            'kodeGL' => 'required',
            'debet' => 'required',
            'satuanBarang' => 'required',
            'hargaSatuan' => 'required'

        ]);




        $kodeGL = kodeGL::where('kodeGabungan', $request->kodeGL)->first();

        $newSouvenir = souvenir::create([
            'namaBarang' => $validateData['namaBarang'],
            'kodeGL' => $validateData['kodeGL'],
            'saldo' => $validateData['debet'],
            'status'=> 'new',
            'satuanBarang' => $validateData['satuanBarang'],
            'hargaSatuan' => $validateData['hargaSatuan']
        ]);
        

        $newId = $newSouvenir->id;

        $kodeBarang = $kodeGL->kode.$newId;


        souvenir::where('id',$newId)->update([
            'kodeBarang' => $kodeBarang
        ]);

        
        $nip = auth::user()->nip;
        $userName = auth::user()->userName;


        rekamPendaftaranSouvenir::create([
            'nip' => $nip,
            'namaUser' => $userName,
            'namaBarang' => $request->namaBarang,
            'kodeBarang' => $kodeBarang,
            'debet' => $request->debet
        ]);


        return redirect('/tabel-souvenir')->with('message','Data Telah Ditambahkan');

    }

    public function getNamaBarang($kodeGL){
        $empData['data'] = souvenir::where('kodeGL', $kodeGL)->get();

        return response()->json($empData);
    }

    public function getSaldoBarang($namaBarang){
        $empData['data'] = souvenir::where('namaBarang', $namaBarang)->get();

        return response()->json($empData);
    }

    public function showTabelSouvenir(){

        $dataSouvenir = souvenir::all();

        return view('dashboard.souvenir.tabelSouvenir',
        [
        'title' => "Tabel Souvenir" ,
        'dataSouvenirs' => $dataSouvenir,
        ]);
    }

    public function tambahSaldoSouvenir($kodeBarang){

        $dataSouvenir = souvenir::all()->where('kodeBarang',$kodeBarang)->first();

        return view('dashboard.Souvenir.tambahSaldoSouvenir', [
            'dataSouvenir' => $dataSouvenir
        ]);

        
    }

    public function kirimTambahSaldoSouvenir(Request $request, $kodeBarang){



        $dataSouvenir = souvenir::all()->where('kodeBarang',$kodeBarang)->first();

        $saldoAkhir = (int)$dataSouvenir->saldo + (int)$request->debet;

        $nip = auth::user()->nip;
        $userName = auth::user()->userName;


        rekamTambahSaldoSouvenir::create([
            'nip' => $nip,
            'namaUser' => $userName,
            'namaBarang' => $request->namaBarang,
            'kodeBarang' => $request->kodeBarang,
            'debet' => $request->debet
        ]);

        souvenir::where('kodeBarang',$request->kodeBarang)->update([
            'saldo' => $saldoAkhir,
            'status' => 'tambahSaldo'
        ]);

        return redirect('/tabel-souvenir')->with('message','Saldo Telah Ditambahkan');

        
    }

    public function editSouvenir($kodeBarang){

        $dataSouvenir = souvenir::all()->where('kodeBarang',$kodeBarang)->first();

        $kodeGL = kodeGL::all();

        return view('dashboard.souvenir.editSouvenir', [
            'dataSouvenir' => $dataSouvenir,
            'kodeGLs' => $kodeGL
        ]);

        
    }

    public function kirimEditSouvenir(Request $request){

        souvenir::where('kodeBarang',$request->kodeBarang)->update([
            'namaBarang' => $request->namaBarang,
            'kodeGL' => $request->kodeGL,
            'hargaSatuan' => $request->hargaSatuan,
            'satuanBarang' => $request->satuanBarang
        ]);

        return redirect('/tabel-souvenir')->with('message','Barang Telah Diedit');
        
    }

    public function hapusSouvenir($kodeBarang){

        $nip = auth::user()->nip;
        $userName = auth::user()->userName;

        $data = souvenir::all()->where('kodeBarang',$kodeBarang)->first();
        rekamPenghapusanSouvenir::create([
            'nip' => $nip,
            'namaUser' => $userName,
            'namaBarang' => $data->namaBarang,
            'kodeBarang' => $data->kodeBarang,
        ]);

        
        rekamTambahSaldoSouvenir::where('kodeBarang',$kodeBarang)->delete();
        rekamPendaftaranSouvenir::where('kodeBarang',$kodeBarang)->delete();
        $data->delete();

        


        return redirect('/tabel-souvenir')->with('message-delete','Barang Telah Dihapus');

        
    }

    //Request Souvenir

    public function indexRequestSouvenir(){

        $daftarkodeGL = kodeGL::where('kategori','Souvenir')->get();
        $daftarUnit = unit::all();
        $souvenir =souvenir::all();

        return view('dashboard.souvenir.requestSouvenir',[
            'kodeGLs' => $daftarkodeGL,
            'units' => $daftarUnit,
            'souvenir' => $souvenir 
        ]);
    }
    public function requestSouvenir(Request $request){

        if($request->saldo<$request->debet){
            return redirect('/request-souvenir')->with('message-danger','Saldo Tidak Cukup!');
        }else{

            $nip = auth::user()->nip;
            $userName = auth::user()->userName;

        $request = requestSouvenir::create([
            'namaBarang' => $request->namaBarang,
            'kodeBarang' => $request->kodeBarang,
            'debet' => $request->debet,
            'namaUnit' => $request->unit,
            'nip' => $nip,
            'namaUser' =>$userName
        ]);
        $souvenir = souvenir::where('kodeBarang',$request->kodeBarang)->first();

       $saldoUpdate = $souvenir->saldo - $request->debet;

       $souvenir = souvenir::where('kodeBarang',$request->kodeBarang)->update([
        'saldo'=>$saldoUpdate
        ]);

        return redirect('/tabel-souvenir')->with('message','Request Telah Ditambahkan');
        }

    }



    public function tabelLaporanSouvenir(){
        $yearMonth = date('Y-m'); // Mengambil tahun dan bulan dari input $request->bulan
        $dataSouvenir = souvenir::all();
        $dataUnit = unit::all();
        $daftarkodeGL = kodeGL::where('kategori','Souvenir')->get();
        $requestDebetNested = []; // Inisialisasi array untuk menyimpan nilai debet dalam bentuk nested array
        $totalRequest = [];

        foreach ($dataUnit as $unit) {
            $requestDebet = []; // Inisialisasi array untuk menyimpan nilai debet dalam unit tertentu
            $arraySaldoAwal = [];
            $arrayTambahSaldo = [];
            
            foreach ($dataSouvenir as $souvenir) {
                $saldoAwal = rekamPendaftaranSouvenir::where('namaBarang', $souvenir->namaBarang)->pluck('debet')->first();
                $debetTambahSaldo = rekamTambahSaldoSouvenir::where('namaBarang', $souvenir->namaBarang)->pluck('debet')->first();
                if($debetTambahSaldo == null){
                    $debetTambahSaldo = 0;
                }
                $arrayTambahSaldo[]= $debetTambahSaldo;
                $arraySaldoAwal[] = $saldoAwal;
                $request = requestSouvenir::where('namaBarang', $souvenir->namaBarang)
                    ->where('namaUnit', $unit->namaUnit)
                    ->whereRaw("DATE_FORMAT(updated_at, '%Y-%m') = ?", [$yearMonth])
                    ->get();

                $totalDebet = 0; // Inisialisasi total debet untuk setiap $souvenir
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
        foreach($dataSouvenir as $souvenir){
            $hargaPenggunaan[] = $souvenir->hargaSatuan;
            $hargaSaldoAkhir[] = $souvenir->hargaSatuan;
            $jumlahSaldoAkhir[] = $souvenir->saldo;
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
            $filteredData = $dataSouvenir->where('kodeGL', $kodeGL->kodeGabungan); // Filter data dengan kodeGL yang sesuai
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

        return view('dashboard.souvenir.laporan.tabelLaporanSouvenir',[
            'dataSouvenirs' => $dataSouvenir,
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
