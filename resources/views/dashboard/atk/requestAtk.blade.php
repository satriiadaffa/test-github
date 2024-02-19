<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Request ATK</title>
    <script type="text/javascript" src="{{url('jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{url('DataTables/js/jquery.dataTables.min.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{url('bootstrap-5.3.1/dist/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('DataTables/css/jquery.dataTables.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('DataTables/css/dataTables.bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('css/beranda.css')}}">
    <link rel="stylesheet" href="{{url('css/formInput.css')}}">
    <link rel="stylesheet" href="{{url('fontawesome/css/all.min.css')}}">
    @extends('staticView')
</head>
<body>
    @section('content')
    <div class="content-container">
        <div class="row">
          <div class="col">
            <div class="page-title">
                <i class="fa-solid fa-file-import"></i>
                <span>Request ATK</span>
            </div>
          </div>
        </div>
        @if (session('message'))
          <div class="row">
            <div class="col-10">
                <div class="alert-con">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <label>{{ session('message') }}</label>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <form action="/kirim-request-atk" class="form" method="post">
            @csrf 
            <div class="row">
                <div class="col-6">
                    <div class="group">
                        <select name="unit" id="unit">
                            @foreach($units as $unit)
                            <option value="{{$unit->namaUnit}}">{{$unit->namaUnit}}</option>
                            @endforeach
                        </select>
                        <label class="select-label" for="unit">Unit</label>
                    </div> 
                </div>
                <div class="col-4">
                    <a href="/tambah-unit" class="btn btn-danger btn-tambah-kode">
                        Tambah Unit<i class="fa-solid fa-plus"></i>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="group">
                        <select name="kodeGL" id="kodeGL">
                            <option selected disabled value="">--Pilih--</option>
                            @foreach($kodeGLs as $kodeGL)
                            <option value="{{$kodeGL->namaKode}} ({{$kodeGL->kode}})">{{$kodeGL->namaKode}} ({{$kodeGL->kode}})</option>
                            @endforeach
                        </select>
                        <label for="kodeGL">Kode GL</label>
                    </div> 
                </div>
                <div class="col-4">
                    <div class="group">
                    <input 
                    readonly
                    type="text"
                    value=" "
                    id="kodeBarang" 
                    name="kodeBarang" 
                    required>
                    <label for="kodeBarang">Kode Barang</label>
                    </div>
                </div>
            </div>
        <div class="row">
                <div class="col-10">
                    <div class="group">
                        <select name="namaBarang" id="namaBarang">
                            <option selected disabled value=""></option>
                        </select>
                        <label for="namaBarang">Nama Barang</label>
                    </div> 
                </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="group">
                    <input 
                    placeholder="" 
                    value=" "
                    type="text"
                    id="saldo" 
                    name="saldo" 
                    readonly
                    required>
                    <label for="saldo">Saldo</label>
                </div>
            </div>
            <div class="col-6">
                <div class="group">
                <input 
                placeholder="" 
                type="text"
                value="{{old('debet')}}"
                id="debet" 
                name="debet" 
                required>
                <label for="debet">Debet</label>
                </div>
            </div>
        </div>
        @if (session('message-danger'))
          <div class="row">
            <div class="col-10">
                <div class="alert-con">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <label>{{ session('message-danger') }}</label>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-10">
                <input class="btn btn-danger btn-submit" type="submit" value="Kirim">
            </div>
        </div>
        
        </form>
    </div>
    @endsection 

<script type="text/javascript" src="{{url('ajax.js')}}"></script>

</body>
</html>