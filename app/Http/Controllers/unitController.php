<?php

namespace App\Http\Controllers;

use App\Models\unit;
use Illuminate\Http\Request;


class unitController extends Controller
{
    public function index(){
        return view('dashboard.unit.tambahUnit');
    }

    public function tambahUnit(Request $request){

        

        $newUnit = unit::create([
            'namaUnit' => $request->namaUnit,

        ]);


        unit::where('id',$newUnit->id)->update([
            'kodeUnit' => 'unit_'.$newUnit->id
        ]);


        return redirect('/request-atk')->with('message','Unit Berhasil Ditambahkan');
    }

    public function showTabelUnit(){

        $dataUnit = unit::all();

        return view('dashboard.unit.tabelUnit',
        [

        'dataUnits' => $dataUnit,
        ]);
    }

    public function editUnit($kodeUnit){

        $dataUnit = unit::all()->where('kodeUnit',$kodeUnit)->first();


        return view('dashboard.unit.editUnit', [
            'dataUnit' => $dataUnit
        ]);

        
    }

    public function kirimEditUnit(Request $request){

        $validate = $request->validate([
            'namaUnit' => 'required|unique:unit'
        ]);

        unit::where('kodeUnit',$request->kodeUnit)->update([
            'namaUnit' => $request->namaUnit,

        ]);

        return redirect('/tabel-unit')->with('message','Unit Telah Diedit');
        
    }

    public function hapusUnit($kodeUnit){


        $data = unit::all()->where('kodeUnit',$kodeUnit)->first();

        $data->delete();
        return redirect('/tabel-unit')->with('message-delete','Unit Telah Dihapus');

    }

}
