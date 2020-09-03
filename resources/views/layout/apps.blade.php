<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  @yield('title')
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/adminlte/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="../css/all.css">
  <link rel="stylesheet" href="../assets/sweetalert2/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="../assets/adminlte/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('index.home')}}" class="nav-link">Menu</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    {{-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> --}}

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <span>
              {{ Auth::user()->name }}
            </span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <li class="user-footer">
                <a class="btn btn-default btn-flat float-right  btn-block " href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-fw fa-power-off"></i>
                    Sair
                </a>
                <form id="logout-form" action="http://localhost:8000/logout" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>

        </ul>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> --}}
    </ul>
  </nav>
  <!-- /.navbar -->
@yield('content')
 
        <footer class="main-footer">
          <div class="float-right d-none d-sm-block">
            <b>Version</b> 0.0.1
          </div>
          <strong> &copy; 2020  <a href="http://adminlte.io">MY crud</a>.</strong> Todos os Direitos
          Reservados
        </footer>
        
          <!-- Control Sidebar -->
          <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
          </aside>
          <!-- /.control-sidebar -->
</div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="../assets/adminlte/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables -->
        <script src="../assets/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../assets/adminlte/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../assets/adminlte/dist/js/demo.js"></script>
        <!-- page script -->
        <script src="../js/ajaxs.js"></script>
        <script src="../js/modal.js"></script>
        <script src="../js/validacao.js"></script>
        <script src="/assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
        <script src="/assets/sweetalert2/dist/sweetalert2.min.js"></script>
        <script src="../assets/adminlte/plugins/select2/js/select2.full.min.js"></script>
        @if(session()->has('success'))
        <?php
        $sucess=session('success');
        ?>
        <script language="javascript">
          var msg = "<?php print $sucess; ?>";
              Swal.fire({
              icon: 'success',
              title: 'Salvar',
              text: `${msg}`,
              showConfirmButton: true,
              })                                    
        </script>
        @endif
        @if ($errors->any())
        <?php
        $errorss="";
        ?>
        @foreach ( $errors->all() as $error)

        <?php
        $errorss=$errorss.$error;
        ?>
        @endforeach
        <script language="javascript">  
        var msg = "<?php print $errorss; ?>";
            Swal.fire({
              icon: 'warning',
              title: 'Error',
              text: `${msg}`,
              showConfirmButton: true,
            })   
                                          
        </script>
        @endif
        @if(session()->has('error'))
        <?php
        $sucess=session('error');
        ?>
        <script language="javascript">
          var msg = "<?php print $sucess; ?>";
              Swal.fire({
              icon: 'warning',
              title: 'Error',
              text: `${msg}`,
              showConfirmButton: true,
              })                                    
        </script>
        @endif
        @yield('script')
        {{-- <script>
          $(function () {
            $("#example").DataTable({
              "responsive": true,
              "autoWidth": false,
              language: {
               url: "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
                },
            });
            $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
            });
          });
        </script> --}}
</body>
</html>
        