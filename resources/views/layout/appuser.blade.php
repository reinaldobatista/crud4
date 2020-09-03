<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  @yield('title')
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/assets/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/adminlte/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="/css/all.css">
  <link rel="stylesheet" href="/assets/adminlte/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed">
<div class="wrapper">
    @yield('content')
    {{-- <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
          <b>Version</b> 0.0.1
        </div>
        <strong> &copy; 2020  <a href="http://adminlte.io">MY crud</a>.</strong> Todos os Direitos
        Reservados
      </footer> --}}
    
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
</div>
  <!-- ./wrapper -->
        
           <!-- jQuery -->
           <script src="/assets/adminlte/plugins/jquery/jquery.min.js"></script>
           <!-- Bootstrap 4 -->
           <script src="/assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
           <!-- DataTables -->
           <script src="/assets/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
           <script src="/assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
           <script src="/assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
           <script src="/assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
           <!-- AdminLTE App -->
           <script src="/assets/adminlte/dist/js/adminlte.min.js"></script>
           <!-- AdminLTE for demo purposes -->
           <script src="/assets/adminlte/dist/js/demo.js"></script>
           <!-- page script -->
           <script src="/js/ajaxs.js"></script>
           <script src="/js/modal.js"></script>
           <script src="/js/validacao.js"></script>
           <script src="/assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
           <script src="/assets/sweetalert2/dist/sweetalert2.min.js"></script>
           <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
           <script src="/assets/adminlte/plugins/select2/js/select2.full.min.js"></script>
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