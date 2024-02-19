<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{url('css/login.css')}}">
    <link rel="stylesheet" href="{{url('bootstrap-5.3.1/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('bootstrap-5.3.1/dist/js/bootstrap.bundle.min.js')}}">
    
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-5">
                <img class="img-login" src="image/logo app warna.png" alt="Logo Bank Jatim Warna">
            </div>
            <div class="col-5">
                <div class="card login-card" style="height:55vh">
                    <span class="title">Masuk</span>
                    <form action="/submit-login" class="form" method="post">
                        @csrf
                        <div class="group">
                            <input placeholder="" type="text" id="nip" name="nip" class="@error('nip') is-invalid @enderror" required>
                            <label for="nip">NIP</label>
                            @error('nip')
                                <div class="text-danger" id='error'>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="group">
                            <input placeholder="" type="password" id="password" name="password" class="@error('password') is-invalid @enderror" required>
                            <label for="userName">Kata Sandi</label>
                            @error('password')
                                <div class="text-danger" id='error'>{{ $message }}</div>
                            @enderror
                        </div>
                        @if (session('loginError'))
                            <div class="row">
                                <div class="col">
                                    <div class="alert-con">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <label>{{ session('loginError') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <input class="login-Submit-Button" type="Submit" value="Masuk">
                    </form>
                </div>
            </div>
            
        </div>
    </div>
      
</body>
</html>

