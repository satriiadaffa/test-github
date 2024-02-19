<?php

namespace App\Exports;

use App\Models\atk;
use App\Models\kodeGL;
use App\Models\unit;
use App\Models\user;
use App\Models\rekamTambahSaldoAtk;
use App\Models\rekamPendaftaranAtk;
use App\Models\rekamPenghapusanAtk;
use App\Models\requestAtk;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportTableAtk implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $bulan;

    public function __construct($bulan)
    {
        $this->bulan = $bulan;
    }

    public function view(): View
    {
        $yearMonth = substr($this->bulan, 0, 7); // Mengambil tahun dan bulan dari input $request->bulan

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

                $debetTambahSaldo = rekamTambahSaldoAtk::where('namaBarang', $atk->namaBarang)->pluck('debet')->first();

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

        return view('dashboard.atk.laporan.tabelLaporanAtk',[
            'dataAtks' => $dataAtk,
            'kodeGLs' => $daftarkodeGL,
            'yearMonth' => $yearMonth,
            'totalPenggunaans' => $totalPenggunaan,
            'totalSaldoAkhirs' => $totalSaldoAkhir,
            'totalRequests' => $totalRequest,
            'saldoAwals' => $arraySaldoAwal,
            'tambahSaldos' => $arrayTambahSaldo,
            'requestDebetNesteds' => $requestDebetNested
        ]);
    }
}
