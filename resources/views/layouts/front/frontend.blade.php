<!DOCTYPE html>
<html style="scroll-behavior: smooth;">

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/favicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Sistem informasi geografis</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.css') }}" />
  <!-- font awesome style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Custom styles for this template -->
  <link href="{{ asset('bostorek/css/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('bostorek/css/responsive.css') }}" rel="stylesheet" />

  <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
</head>

<body>

    @if (session('message'))
    {{ sweetAlert(session('message'), 'success') }}
    @endif
    @if (session('error'))
    {{ sweetAlert(session('error'), 'warning') }}
    @endif
  <div class="hero_area">
    <!-- header section strats -->

    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{ URL::to('/') }}">
            <span>
              Sistem informasi geografis
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link pl-lg-0" href="{{ URL::to('/') }}">Beranda <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ URL::to('/#data') }}"> Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ URL::to('/#cluster') }}"> Cluster</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ URL::to('/#tentang_kami') }}">Tentang kami</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ URL::to('/login') }}">Login</a>
              </li>
            </ul>
            {{-- <from class="search_form">
              <input type="text" class="form-control" placeholder="Search here...">
              <button class="" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </from> --}}
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    @yield('content')
  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> Made with <i class="fas fa-heart text-danger"></i>
        <a href="">by Hikma jelita</a>
      </p>
    </div>
  </footer>
  <!-- footer section -->
  <!-- Sweet Alert -->
  <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
  <!-- jQery -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  {{-- scanner --}}
<script src="{{ asset('plugins/scanner/html5-qrcode.min.js') }}"></script>

  <script src="{{ asset('plugins/qrcodejs/jquery.min.js') }}"></script>
  <script src="{{ asset('plugins/qrcodejs/qrcode.min.js') }}"></script>
  <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
  @yield('script')

</body>

</html>

