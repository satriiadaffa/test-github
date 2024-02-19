<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pendaftaran ATK</title>
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
                <span>Pendaftaran ATK</span>
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
        <form action="/kirim-tambah-atk" class="form" method="post">
            @csrf 
        <div class="row">
                <div class="col-10">
                        <div class="group">
                        <input
                        value="{{old('namaBarang')}}"
                        placeholder="" 
                        type="text" 
                        id="namaBarang" 
                        name="namaBarang" 
                        class="@error('namaBarang') is-invalid @enderror"
                        required>
                        <label for="namaBarang">Nama Barang</label>
                        @error('namaBarang')
                    <div class="text-danger" id='error'>{{ $message }}</div>
                @enderror
                        </div>
                </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="group">
                    <select id="kodeGL" name="kodeGL" >
                        <option disabled selected value="">--Pilih--</option>
                        @foreach($kodeGLs as $kodeGL)
                            <option value="{{$kodeGL->namaKode}} ({{$kodeGL->kode}})">{{$kodeGL->namaKode}} ({{$kodeGL->kode}})</option>
                        @endforeach
                    </select>
                    <label for="kodeGL">Kode GL</label>
                    @error('kodeGL')
                    <div class="text-danger" id='error'>{{ $message }}</div>
                @enderror
                </div> 
            </div>
            <div class="col-4">
                <a href="/tambah-kode-gl" class="btn btn-danger btn-tambah-kode">
                    Tambah Kode Barang<i class="fa-solid fa-plus"></i>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="group">
                <input 
                placeholder="" 
                type="text"
                value="{{old('debet')}}"
                id="debet" 
                name="debet" 
                oninput="formatAngka(this)"
                class="@error('debet') is-invalid @enderror"
                required>
                <label for="debet">Debet</label>
                @error('debet')
                    <div class="text-danger" id='error'>{{ $message }}</div>
                @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="group">
                    <select name="satuanBarang" id="satuanBarang">
                        <option disabled selected value=""></option>
                        <option value="Lembar">Lembar</option>
                        <option value="Buku">Buku</option>
                        <option value="Bendel">Bendel</option>
                        <option value="Rim">Rim</option>
                        <option value="Roll">Roll</option>
                        <option value="Pcs">Pcs</option>
                        <option value="Box">Box</option>
                        <option value="Set">Set</option>
                    </select>
                    <label class="select-label" for="satuanBarang">Satuan Barang</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                <div class="group">
                    <input
                    value="{{old('hargaSatuan')}}"
                    placeholder="" 
                    type="text" 
                    id="hargaSatuan" 
                    name="hargaSatuan"
                    oninput="formatCurrency(this)"
                    class="@error('debet') is-invalid @enderror"
                    required>
                    <label for="hargaSatuan">Harga Satuan</label>
                    @error('hargaSatuan')
                    <div class="text-danger" id='error'>{{ $message }}</div>
                @enderror
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
    function formatCurrency(input) {
        // Menghapus semua karakter non-angka dari input
        let inputValue = input.value.replace(/\D/g, '');

        // Mengubah menjadi angka integer
        let intValue = parseInt(inputValue, 10);

        // Memastikan nilai yang valid
        if (!isNaN(intValue)) {
            // Membuat format dengan Rp. dan pemisah ribuan (titik)
            let formattedValue = 'Rp. ' + intValue.toLocaleString('id-ID');
            input.value = formattedValue;
        } else {
            // Jika nilai tidak valid, kosongkan input
            input.value = '';
        }
    }

    function formatAngka(input) {
        // Hanya biarkan angka yang diterima dalam input
        let inputValue = input.value.replace(/\D/g, '');

        // Tampilkan angka yang dimasukkan dalam format pemisah ribuan (titik)
        let formattedValue = inputValue.toLocaleString('id-ID');
        input.value = formattedValue;

    }

    function prepareForm() {
        // Mendapatkan nilai input hargaSatuan
        let hargaSatuanInput = document.getElementById("hargaSatuan");
        let hargaSatuanValue = hargaSatuanInput.value;
        
        // Menghapus "Rp." dan titik dari nilai
        let cleanedValue = hargaSatuanValue.replace(/Rp\.|\./g, '');
        
        // Memperbarui nilai input dengan yang telah dibersihkan
        hargaSatuanInput.value = cleanedValue;
        
        // Mengirimkan formulir setelah membersihkan nilai hargaSatuan
        document.getElementById("myForm").submit();
    }
</script>       
        
        
        
        
        
</body>
</html>