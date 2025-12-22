<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Basic -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Rent4u</title>
  <script src="{{asset('landingpage/js/jquery-3.4.1.min.js')}}"></script>
  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('landingpage/css/bootstrap.css') }}" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('landingpage/css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('landingpage/css/responsive.css')}}" rel="stylesheet" />
  
  <style>
    .navbar-brand {
        display: flex;
        align-items: center;
    }
    .navbar-brand img {
        max-height: 40px; /* Sesuaikan ukuran tinggi logo sesuai kebutuhan */
        margin-right: 10px;
    }
  </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section starts -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="#">
            <img src="{{ asset('landingpage/images/logo.png') }}" alt="Logo">
            <span style="font-size: 24px; font-weight: bold; text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);">
              RENT 4 U
            </span>
          </a>

          <div class="navbar-collapse" id="">
            <div class="user_option" style="color: white; font-weight: bold; text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);">
              @if(Session::get('login') == true)
                <a href="#">{{ Session::get('username') }}</a>
              @else
                <a href="{{ url('login') }}">Login</a>
              @endif
            </div>
            <div class="custom_menu-btn">
              <button onclick="openNav()">
                <span class="s-1"> </span>
                <span class="s-2"> </span>
                <span class="s-3"> </span>
              </button>
            </div>
            <div id="myNav" class="overlay">
              <div class="overlay-content">
                <a href="{{url('admin/dashboard')}}">Data Penyewaan</a>
                <a href="{{url('admin/laporanKeuangan')}}">Laporan Keuangan</a>
                <a href="{{url('admin/top_transactions')}}">Report TOP 10 Transaksi</a>
                <a href="{{url('admin/barang/index')}}">Barang</a>
                @if(Session::get('login') == true)
                  <a href="{{ url('logout') }}">Logout</a>
                @else
                  <a href="{{ url('login') }}">Login</a>
                @endif
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    
    @yield('content')

  <!-- footer section -->
  <footer class="container-fluid footer_section">
    <p>
      Copyright &copy; 2020 All Rights Reserved. Design by
      <a href="https://html.design/">Free Html Templates</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a>
    </p>
  </footer>
  <!-- footer section -->

  <script src="{{asset('landingpage/js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="{{asset('landingpage/js/custom.js')}}"></script>
</body>
</html>
