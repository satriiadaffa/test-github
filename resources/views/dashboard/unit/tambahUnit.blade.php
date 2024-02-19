<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
          <div class="col-4">
            <div class="page-title">
                <i class="fa-solid fa-file-import"></i>
                <span>Tambah Unit</span>
            </div>
          </div>
          <div class="col-8">
          </div>
        </div>
        <form action="/kirim-tambah-unit" class="form" method="post">
            @csrf 
        <div class="row">
                <div class="col-10">
                        <div class="group">
                        <input
                        value="{{old('kode')}}"
                        placeholder="" 
                        type="text" 
                        id="namaUnit" 
                        name="namaUnit" 
                        required>
                        <label for="namaUnit">Nama Unit</label>
                        </div>
                </div>
        </div>
        <div class="row">
            <div class="col-10">
                <input class="btn btn-danger btn-submit" onclick="prepareForm()" type="submit" value="Kirim">
            </div>
        </div>
        
        </form>
    </div>
    @endsection
     
</body>
</html>