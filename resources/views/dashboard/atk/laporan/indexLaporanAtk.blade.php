<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Atk</title>
    <script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript" src="DataTables/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-5.3.1/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="DataTables/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="DataTables/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="css/beranda.css">
    <link rel="stylesheet" href="css/formInput.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    @extends('staticView')
</head>
<body>
    @section('content')
    <div class="content-container">
        <div class="row">
          <div class="col-4">
            <div class="page-title">
                <i class="fa-solid fa-file-import"></i>
                <span>Laporan Atk</span>
            </div>
          </div>
          <div class="col-8">
          </div>
        </div>
        <form action="/tabel-laporan-atk" class="form" method="post">
            @csrf 
        <div class="row">
            <div class="col-10">
                <div class="group">
                    <input
                    value="{{old('bulan')}}"
                    placeholder="" 
                    type="month" 
                    id="bulan" 
                    name="bulan" 
                    required>
                    <label for="bulan">Pilih Bulan</label>
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
<script>
    // Mengambil elemen input tanggalMulai dan tanggalSelesai
    var tanggalMulaiInput = document.getElementById("tanggalMulai");
    var tanggalSelesaiInput = document.getElementById("tanggalSelesai");
    
    // Menambahkan event listener untuk perubahan pada tanggalMulai
    tanggalMulaiInput.addEventListener("change", function() {
        // Mengatur nilai atribut min pada tanggalSelesai sesuai dengan tanggalMulai
        tanggalSelesaiInput.min = tanggalMulaiInput.value;
        // Mengatur nilai tanggalSelesai jika sebelumnya sudah lebih kecil dari tanggalMulai
        if (tanggalSelesaiInput.value < tanggalMulaiInput.value) {
            tanggalSelesaiInput.value = tanggalMulaiInput.value;
        }
    });
</script>
</body>
</html>