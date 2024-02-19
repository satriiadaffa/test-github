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
                <i class="fa-solid fa-user"></i>
                <span>Edit User</span>
            </div>
          </div>
          <div class="col-8">
          </div>
        </div>
        <form action="/account/edit/kirim/{{$dataUser->nip}}" class="form" method="post">
            @csrf 
        <div class="row">
                <div class="col-10">
                        <div class="group">
                        <input
                        value="{{$dataUser->nip}}"
                        style="background-color:lightgray !important;"
                        readonly
                        placeholder="" 
                        type="text" 
                        id="nip" 
                        name="nip" 
                        class="@error('nip') is-invalid @enderror"
                    required>
                    <label for="userName">NIP</label>
                    <div class="text-below">Kolom NIP harus Berisi 7-8 Angka</div>
                    @error('nip')
                        <div class="text-danger" id='error'>{{ $message }}</div>
                    @enderror
                        </div>
                </div>
        </div>
        <div class="row">
            <div class="col-10">
                    <div class="group">
                    <input
                    value="{{$dataUser->userName}}"
                    placeholder="" 
                    type="text" 
                    id="userName" 
                    name="userName" 
                    class="@error('userName') is-invalid @enderror"
                    required>
                    <label for="userName">Nama User</label>
                    <div class="text-below">Nama User Minimal 3 Huruf & Maksimal 32 Huruf</div>
                    @error('userName')
                        <div class="text-danger" id='error'>{{ $message }}</div>
                    @enderror
                    </div>
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                    <div class="group">
                        <input
                        value="{{$dataUser->role}}"
                        placeholder="" 
                        type="text" 
                        id="role" 
                        name="role" 
                        class="@error('role') is-invalid @enderror"
                        readonly>
                    <label for="role">Role</label>
                    </div>
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                <input class="btn btn-danger btn-submit" type="submit" value="Kirim">
            </div>
        </div>
        
        </form>
    </div>
    @endsection
     
</body>
</html>