<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manajemen User</title>
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
            <div class="col-10">
              <div class="page-title">
                <i class="fa-solid fa-users"></i>
                  <span>Manajemen User</span>
              </div>
            </div>
            <div class="col-2">
                <a href="/tambah-user" class="btn btn-success">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    <span>Tambah User</span>
                </a>
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
        <div class="row">
            <div class="col table-container" style="border-top-left-radius: 0px;">
                <table class="table table-striped table-bordered data">
                    <thead>
                        <tr>			
                            <th>NIP</th>
                            <th>Nama User</th>
                            <th>Role</th>
                            <th>Tanggal Ditambahkan</th>
                            @if(Auth::user()->role !='Manager')
                            <th>Aksi</th>
                            @endif 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataUsers as $dataUser)
                            <tr>				
                                <td>{{$dataUser->nip}}</td>
                                <td>{{$dataUser->userName}}</td>
                                <td>{{$dataUser->role}}</td>
                                <td>{{$dataUser->created_at}}</td>
                                @if(Auth::user()->role !='Manager')
                                <td class="buttons">
                                    <a href="{{url('/edit-user/'.$dataUser->nip)}}" class="btn btn-secondary btn-aksi" title="Edit Data {{$dataUser->nip}}">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <a href="{{ url('/hapus-user/'.$dataUser->nip) }}" class="btn btn-danger btn-hapus" title="Hapus Data {{$dataUser->nip}}"
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