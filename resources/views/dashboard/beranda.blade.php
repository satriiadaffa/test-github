<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengelolaan Gudang</title>
    <script type="text/javascript" src="{{url('jquery.min.js')}} Data"></script>
	<script type="text/javascript" src="{{url('DataTables/js/jquery.dataTables.min.js')}} Data"></script>
	<link rel="stylesheet" type="text/css" href="{{url('bootstrap-5.3.1/dist/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('DataTables/css/jquery.dataTables.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('DataTables/css/dataTables.bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('css/beranda.css')}}">
    <link rel="stylesheet" href="{{url('fontawesome/css/all.min.css')}}">

    @extends('staticView')
</head>
<body>
    @section('content')
    
    <div class="content-container">
        <div class="row">
          <div class="col-6">
            <div class="page-title">
                <i class="fa-solid fa-house"></i>
                <span>Beranda</span>
            </div>
          </div>
        </div>
        @if (session('message'))
          <div class="row">
            <div class="col">
                <div class="alert-con">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <label>{{ session('message') }}</label>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(Auth::user()->role !='Manager')
        <div class="row">
            <div class="col-6">
                    <div class="card-container" id="pendaftaran-atk">
                                <div class="card-title">
                                    <div class="data-count btn btn-danger">{{$countDataAtk}} Data</div>
                                    <div class="data-name">Pendaftaran ATK</div>
                                </div>
                            <a href="/pendaftaran-atk"class="streched-link" >
                                <div class="plus-icon text-center">
                                    <i class="fa-solid fa-plus" style="color: white"></i>
                                </div>
                            </a>
                    </div>
            </div>
            <div class="col-6">
                    <div class="card-container" id="request-atk">
                                <div class="card-title">
                                    <div class="data-count btn btn-danger">{{$countDataRequestAtk}} Data</div>
                                    <div class="data-name">Request ATK</div>
                                </div>
                            <a href="/request-atk"class="streched-link" >
                                <div class="plus-icon text-center">
                                    <i class="fa-solid fa-plus" style="color: white"></i>
                                </div>
                            </a>
                            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                    <div class="card-container" id="pendaftaran-souvenir">
                                <div class="card-title">
                                    <div class="data-count btn btn-danger">{{$countDataSouvenir}} Data</div>
                                    <div class="data-name">Pendaftaran Souvenir</div>
                                </div>
                            <a href="/pendaftaran-souvenir"class="streched-link" >
                                <div class="plus-icon text-center">
                                    <i class="fa-solid fa-plus" style="color: white"></i>
                                </div>
                            </a>
                            </div>
            </div>
            <div class="col-6">
                <div class="card-container" id="request-souvenir">
                            <div class="card-title">
                                <div class="data-count btn btn-danger">{{$countDataRequestSouvenir}} Data</div>
                                <div class="data-name">Request Souvenir</div>
                            </div>
                        <a href="/request-souvenir"class="streched-link" >
                            <div class="plus-icon text-center">
                                <i class="fa-solid fa-plus" style="color: white"></i>
                            </div>
                        </a>
                </div>
            </div>       
        </div>
        @if(Auth::user()->role =='Super Admin')
            <div class="row">
                <div class="col">
                        <div class="card-container" id="tambah-user">
                                    <div class="card-title">
                                        <div class="data-count btn btn-danger">{{$countDataUser}} Data</div>
                                        <div class="data-name">Tambah User</div>
                                    </div>
                                <a href="/tambah-user"class="streched-link" >
                                    <div class="plus-icon text-center">
                                        <i class="fa-solid fa-plus" style="color: white"></i>
                                    </div>
                                </a>
                        </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col">
                    <div class="card-container" id="reset-season">
                                <div class="card-title">
                                    <div class="data-name">Reset Season</div>
                                </div>
                            <a href="/reset-season"class="streched-link"onclick="return confirm('Apakah Anda Yakin Ingin Reset Data Untuk Inputan di Bulan Baru?');">
                                <div class="plus-icon text-center">
                                    <i class="fa-solid fa-plus" style="color: white"></i>
                                </div>
                            </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @endsection

    <script type="text/javascript">
        $(document).ready(function(){
            $('.data').DataTable();
        });
    </script>
</body>
</html>


