<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tabel ATK</title>
    <script type="text/javascript" src="{{url('jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{url('DataTables/js/jquery.dataTables.min.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{url('bootstrap-5.3.1/dist/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('DataTables/css/jquery.dataTables.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('DataTables/css/dataTables.bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('css/beranda.css')}}">
    <link rel="stylesheet" href="{{url('css/tabel.css')}}">
    <link rel="stylesheet" href="{{url('fontawesome/css/all.min.css')}}">
    @extends('staticView')
</head>
<body>
    @section('content')
    <div class="content-container">
        <div class="row">
            <div class="col">
              <div class="page-title">
                  <i class="fa-solid fa-pencil"></i>
                  <span>Tabel ATK</span>
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
        @elseif (session('message-delete'))
          <div class="row">
            <div class="col">
                <div class="alert-con">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <label>{{ session('message-delete') }}</label>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col table-container">
                <table class="table table-striped table-bordered data">
                    <thead>
                        <tr>			
                            <th>Nama Barang</th>
                            <th>Kode Barang</th>
                            <th>Kode GL</th>
                            <th>Saldo</th>
                            <th>Satuan</th>
                            <th>Harga Satuan</th>
                            @if(Auth::user()->role !='Manager')
                            <th>Aksi</th>
                            @endif 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataAtks as $dataAtk)
                            <tr>				
                                <td>{{$dataAtk->namaBarang}}</td>
                                <td>{{$dataAtk->kodeBarang}}</td>
                                <td>{{$dataAtk->kodeGL}}</td>
                                <td>{{$dataAtk->saldo}}</td>
                                <td>{{$dataAtk->satuanBarang}}</td>
                                <td>Rp. {{ number_format($dataAtk->hargaSatuan, 0, ',', '.') }},-</td>
                                @if(Auth::user()->role !='Manager')
                                <td class="buttons">
                                    <a href="{{url('/tambah-saldo-atk/'.$dataAtk->kodeBarang)}}">
                                        <div class="btn btn-success btn-tambah" title="Tambah Saldo {{$dataAtk->kodeBarang}}"><i class="fa-solid fa-plus"></i></div>
                                    </a>
                                    <a href="{{url('/edit-atk/'.$dataAtk->kodeBarang)}}" class="btn btn-secondary btn-aksi" title="Edit Data {{$dataAtk->kodeBarang}}">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <a href="{{ url('/hapus-atk/'.$dataAtk->kodeBarang) }}" class="btn btn-danger btn-hapus" title="Hapus Data {{$dataAtk->kodeBarang}}"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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