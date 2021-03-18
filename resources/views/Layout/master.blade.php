<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIPAT Liga X</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('/lte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/lte/bower_components/font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="/lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

   <link rel="stylesheet" href="/lte/bower_components/datatables.net/css/dataTables.bootstrap.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/lte/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/lte/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/lte/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="/lte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ route('home') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SIPAT</b> TOPSIS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu" class="full-left image">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"> {{Auth::User()->name}}</span>
              <i class="fa fa-gear"></i>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('images/'.auth()->user()->foto)}}" class="img-circle" alt="User Image">
                <p>
                  {{Auth::User()->name}}
                  <small>{{Auth::User()->role}}</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="pull-left">

                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                </div>
              </li>
              <!-- Menu Footer-->
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('images/'.auth()->user()->foto)}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        @if(Auth::user()->role =='Admin')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i> <span>Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('pemain.index') }}"><i class="fa fa-circle-o"></i> Data Pemain</a></li>
            <li><a href="{{ route('kriteria.index') }}"><i class="fa fa-circle-o"></i> Kriteria</a></li>
             <li><a href="{{ route('bobot.index') }}"><i class="fa fa-circle-o"></i> Bobot</a></li>
            <li><a href="{{ route('user.index') }}"><i class="fa fa-circle-o"></i> User</a></li>
          </ul>
        </li>
        @endif
        @if(Auth::user()->role=='Penanggung Jawab')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i> <span>Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('pemain.index') }}"><i class="fa fa-circle-o"></i> Pemain</a></li>
            <li><a href="{{ route('alternatif.index') }}"><i class="fa fa-circle-o"></i> Alternatif</a></li>
            <li><a href="{{ route('bobotkriteria.index') }}"><i class="fa fa-circle-o"></i> Bobot Kriteria</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Rekomendasi</span>
            <span class="pull-right-container">
              <span class="fa fa-angle-left pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('rekomendasi.index') }}"><i class="fa fa-circle-o"></i> Lihat Rekomendasi</a></li>
          </ul>
        </li>
        @endif
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Informatika</b>-2020
    </div>
    <strong>Oki Iskandar - 3411151177.</strong> Sistem Pendukung Keputusan Pemilihan Pemain Sepak Bola Terbaik.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="/lte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/lte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="/lte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- DataTables -->
<script src="/lte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="/lte/bower_components/datatables.net-bs/js/dataTables.resvonsive.min.js"></script>
<script src="/lte/bower_components/datatables.net-bs/js/dataTables.buttons.min.js"></script>
<script src="/lte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/lte/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/lte/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/lte/js/demo.js"></script>
<!-- bootstrap datepicker -->
<script src="/lte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
@yield('footer')
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>

<script>
  $(function () {
    $('#datepicker').datepicker({
      autoclose: true
    })
  }
</script>
</body>
</html>
