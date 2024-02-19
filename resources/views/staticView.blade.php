<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script type="text/javascript" src="{{url('jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{url('DataTables/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('popper.min.js')}}"></script>
    <script type="text/javascript" src="{{url('bootstrap-5.3.1/dist/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{url('bootstrap-5.3.1/dist/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('DataTables/css/jquery.dataTables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('DataTables/css/dataTables.bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('css/staticView.css')}}">
    <link rel="stylesheet" href="{{url('fontawesome/css/all.min.css')}}">


    
  </head>
  <body>
    <nav>
      <div class="logo shifted">
          <i class="fa-solid fa-angles-left"></i>
      </div>
      <div class="sidebar">
        <img src="{{asset('image/logo app putih.png')}}" alt="Logo">
        <div class="sidebar-content">
          <ul class="lists">
            <li class="list">
              @if(Auth::user()->role !== 'Manager')
                <a href="/beranda" class="nav-link">
                  <i class="fa-solid fa-house"></i>
                  <span class="link">Beranda</span>
                </a>
              @endif
            </li>
            <li class="list">
              <a class="nav-link" onclick="showTables()">
                <i class="fa-solid fa-table"></i>
                <span class="link">Daftar Tabel</span>
                <div class="stick-right">
                  <i class="fa-solid fa-caret-down"></i>
                </div>
              </a>
            </li>
              <ul class="sub-menu-tables">
                  <a class="sub-list"  href="/tabel-atk">
                    <i class="fa-solid fa-pencil"></i>
                    <span class="link">Tabel ATK</span>
                  </a>
                  <a class="sub-list" href="/tabel-souvenir">
                    <i class="fas fa-boxes"></i>
                    <span class="link">Tabel Souvenir</span>
                  </a>
                  <a class="sub-list" href="/tabel-unit">
                    <i class="fa-solid fa-people-group"></i>
                    <span class="link">Tabel Unit</span>
                  </a>
              </ul>
            <li class="list">
              <a class="nav-link" onclick="showTransactions()">
                <i class="fa-solid fa-file-import"></i>
                <span class="link">Transaksi</span>
                <div class="stick-right">
                  <i class="fa-solid fa-caret-down"></i>
                </div>
              </a>
            </li>
            <ul class="sub-menu-transactions">
                <a class="sub-list" href="/transaksi-atk-masuk">
                  <i class="fa-solid fa-pencil"></i>
                  <span class="link">Transaksi ATK</span>
                </a>
                <a class="sub-list" href="/transaksi-souvenir-masuk">
                  <i class="fas fa-boxes"></i>
                  <span class="link">Transaksi Souvenir</span>
                </a>
            </ul>
            <li class="list">
              <a class="nav-link" onclick="showReports()">
                <i class="fa-solid fa-file"></i>
                <span class="link">Laporan</span>
                <div class="stick-right">
                  <i class="fa-solid fa-caret-down"></i>
                </div>
              </a>
            </li>
            <ul class="sub-menu-reports">
                <a class="sub-list" href="/laporan-atk">
                  <i class="fa-solid fa-pencil"></i>
                  <span class="link">Laporan ATK</span>
                </a>
                <a class="sub-list" href="/laporan-souvenir">
                  <i class="fas fa-boxes"></i>
                  <span class="link">Laporan Souvenir</span>
                </a>
            </ul>
            @if(Auth::user()->role == 'Super Admin')
            <li class="list">
              <a href="/manajemen-user" class="nav-link">
                  <i class="fa-solid fa-users"></i> 
                  <span class="link">Manajemen User</span>
              </a>
            </li>
            @endif
          </ul>

          <div class="bottom-content">
            <li class="list">

              <div class="dropup-center dropup">
                <button type="button" class="nav-link" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa-solid fa-user"></i>
                <span class="link">{{Auth::user()->userName}}</span>
                <div class="stick-right" style="margin-right: -18px">
                  <i class="fa-solid fa-caret-up"></i>
                </div>
                </button>
                <ul class="dropdown-menu dropdown-menu-light" style="width: 130%">
                  <div style="display: flex; align-items: center;">
                    <i class="fa-solid fa-circle-user" style="font-size:60px;padding:10px 10px 10px 10px;"></i>
                    <div style="display: flex; flex-direction: column;">
                      <div class="link" style="font-size:20px;margin:auto 10px;">{{Auth::user()->userName}}</div>
                      <div class="link" style="font-size:15px;margin:0px 10px;">{{Auth::user()->nip}}</div>
                      <div class="link" style="font-size:15px;margin:0px 10px;">{{Auth::user()->role}}</div>
                    </div>
                    <div>

                    </div>
                  </div>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <a class="dropdown-item" href="/account/edit/{{Auth::user()->nip}}" style="display: flex; align-items: center; justify-content: center;">
                      <i class="fa-solid fa-pencil"></i>
                      <span class="link">Edit Akun</span>
                    </a>
                    <form action="/account/hapus/{{Auth::user()->nip}}" method="POST" class="dropdown-item" style="display: flex; align-items: center; justify-content: center;">
                      @csrf <!-- Include this line to add the CSRF token to your form -->
                    
                      <button type="submit" id="delete-account" style="background: none; border: none; cursor: pointer; display: flex; align-items: center;justify-content: center; width: 100% !important;"onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                        <i class="fa-solid fa-pencil" style="margin-right: 5px;"></i>Hapus Akun
                      </button>
                    </form>
                  </li>
                </ul>
              </div>

            </li>
            <li class="list">
              <form action="/logout" method="post">
                @csrf
                <button class="nav-link" type="submit"><i class="fa-solid fa-right-from-bracket"></i></i>Logout</button>
              </form> 
            </li>
          </div>
        </div>
      </div>
    </nav>

    <section class="main-content">
        @section('content')      
        @show
    </section>
    
    <script>
      // Fungsi untuk mengaktifkan kelas "open" pada navbar
    function showNavbar() {
      navBar.classList.add("open");
    }

    // Panggil fungsi showNavbar saat halaman dimuat
    window.addEventListener("DOMContentLoaded", showNavbar);

      const navBar = document.querySelector("nav"),
    menuBtns = document.querySelectorAll(".logo"),
    overlay = document.querySelector(".overlay");

    menuBtns.forEach((menuBtn) => {
    menuBtn.addEventListener("click", () => {
    navBar.classList.toggle("open");
    document.querySelector('.main-content').classList.toggle("shifted");
    document.querySelector('.logo').classList.toggle("shifted");

    // Mengubah ikon saat kelas "shifted" diaktifkan
    const logoIcon = document.querySelector('.logo i');
    if (document.querySelector('.logo').classList.contains('shifted')) {
      logoIcon.classList.remove('fa-bars');
      logoIcon.classList.add('fa-angles-left');
    } else {
      // Mengubah ikon kembali ke "fa-bars" saat kelas "shifted" dinonaktifkan
      logoIcon.classList.remove('fa-angles-left');
      logoIcon.classList.add('fa-bars');
    }
  });
});

overlay.addEventListener("click", () => {
  navBar.classList.remove("open");
  document.querySelector('.logo').classList.remove("shifted");
});

function showTables() {
      var subMenu = document.querySelector('.sub-menu-tables');
      if (subMenu.style.display === 'block') {
        subMenu.style.display = 'none'; // Jika sudah ditampilkan, maka tutup
      } else {
        subMenu.style.display = 'block'; // Jika belum ditampilkan, maka tampilkan
      }}
function showTransactions() {
  var subMenu = document.querySelector('.sub-menu-transactions');

  if (subMenu.style.display === 'block') {
    subMenu.style.display = 'none'; // Jika sudah ditampilkan, maka tutup
  } else {
    subMenu.style.display = 'block'; // Jika belum ditampilkan, maka tampilkan
  }
}
function showReports() {
      var subMenu = document.querySelector('.sub-menu-reports');
      if (subMenu.style.display === 'block') {
        subMenu.style.display = 'none'; // Jika sudah ditampilkan, maka tutup
      } else {
        subMenu.style.display = 'block'; // Jika belum ditampilkan, maka tampilkan
      }}
      </script>
    
  </body>
</html>
