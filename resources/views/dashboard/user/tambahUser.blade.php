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
                <span>Tambah User</span>
            </div>
          </div>
          <div class="col-8">
          </div>
        </div>
        <form action="/kirim-tambah-user" class="form" method="post">
            @csrf 
        <div class="row">
                <div class="col-10">
                        <div class="group">
                        <input
                        value="{{old('nip')}}"
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
                    value="{{old('userName')}}"
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
                    placeholder="" 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="@error('password') is-invalid @enderror"
                    required>
                    <label for="password">Kata Sandi</label>
                    <div class="text-below">Kata Sandi Minimal 8 Karakter, Mengandung Angka & Huruf</div>
                    @error('password')
                        <div class="text-danger" id='error'>{{ $message }}</div>
                    @enderror
                    </div>
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                    <div class="group">
                    <input
                    type="password" 
                    placeholder="" 
                    type="confirmPassword" 
                    id="confirmPassword" 
                    name="confirmPassword" 
                    class="@error('confirmPassword') is-invalid @enderror"
                    required>
                    <label for="confirmPassword">Konfirmasi Kata Sandi</label>
                    @error('confirmPassword')
                        <div class="text-danger" id='error'>{{ $message }}</div>
                    @enderror
                    </div>
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                    <div class="group">
                        <select name="role" id="role">
                            <option value="" {{ old('role') == '' ? 'selected disabled' : '' }}></option>
                            <option value="Super Admin" {{ old('role') == 'Super Admin' ? 'selected' : '' }}>Super Admin</option>
                            <option value="Manager" {{ old('role') == 'Manager' ? 'selected' : '' }}>Manager</option>
                            <option value="Staff" {{ old('role') == 'Staff' ? 'selected' : '' }}>Staff</option>
                        </select>
                    <label for="role">Role</label>
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