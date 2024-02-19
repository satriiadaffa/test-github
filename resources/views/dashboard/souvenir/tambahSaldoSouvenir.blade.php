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
          <div class="col">
            <div class="page-title">
                <i class="fa-solid fa-file-import"></i>
                <span>Penambahan Saldo Souvenir</span>
            </div>
          </div>
        </div>
        <form action="{{url('/kirim-tambah-saldo-souvenir/'.$dataSouvenir->kodeBarang)}}" class="form" method="post">
            @csrf
        <div class="row">
                <div class="col-10">
                        <div class="group">
                        <input
                        value="{{$dataSouvenir->namaBarang}}"
                        placeholder="" 
                        readonly
                        type="text" 
                        id="namaBarang" 
                        name="namaBarang" 
                        required>
                        <label for="namaBarang">Nama Barang</label>
                        </div>
                </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="group">
                    <input
                    value="{{$dataSouvenir->kodeGL}}"
                    type="text" 
                    list="datalistOptions" 
                    id="kodeGL" 
                    name="kodeGL" 
                    placeholder="" 
                    required readonly>
                    <label for="kodeGL">Kode GL</label>
                </div> 
            </div>
            <div class="col-4">
                <div class="group">
                    <input
                    value="{{$dataSouvenir->kodeBarang}}"
                    type="text" 
                    list="datalistOptions" 
                    id="kodeBarang" 
                    name="kodeBarang" 
                    placeholder="" 
                    required readonly>
                    <label for="kodeBarang">Kode Barang</label>
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                <div class="group">
                    <input
                    value="Rp. {{ number_format($dataSouvenir->hargaSatuan, 0, ',', '.') }}"
                    placeholder="" 
                    type="text" 
                    id="hargaSatuan" 
                    name="hargaSatuan"
                    oninput="formatCurrency(this)"
                    required
                    readonly>
                    <label for="hargaSatuan">Harga Satuan</label>
                    </div>
            </div>  
        </div>
        <div class="row">
            <div class="col-6">
                <div class="group">
                    <input
                    value="{{$dataSouvenir->saldo}}"
                    type="text" 
                    list="datalistOptions" 
                    id="saldo" 
                    name="saldo" 
                    placeholder="" 
                    required readonly>
                    <label for="saldo">Saldo Awal</label>
                </div>
            </div>
            <div class="col-4">
                <div class="group">
                    <select name="satuanBarang" id="satuanBarang" readonly>
                        <option readonly selected value="{{$dataSouvenir->satuanBarang}}">{{$dataSouvenir->satuanBarang}}</option>
                    </select>
                    <label class="select-label" for="satuanBarang">Satuan Barang</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="group">
                <input 
                autofocus
                placeholder="" 
                type="text"
                value="{{old('debet')}}"
                id="debet" 
                name="debet" 
                required>
                <label for="debet">Debet</label>
                </div>
            </div>
            <div class="col-4">
                <div class="alert alert-success text-center" role="alert">
                    <i class="fa-solid fa-angles-left"></i>
                     Isi Debet di Samping
                     <i class="fa-solid fa-angles-left"></i>
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
            }
        }

        function prepareForm() {
    // MendapSouveniran nilai input hargaSatuan
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



