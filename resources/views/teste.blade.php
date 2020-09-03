@extends('layout.apps')
@section('content')
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-white-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="../img/crud1.png"
         alt="AdminLTE Logo"
         class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">My crud</span>
  </a>
    <!-- Sidebar -->
    <div class="sidebar">
      {{-- <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">Menu de Navegação</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-industry"></i>
              <p>
                  Produto
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/products/index')}}" class="nav-link">
                  <i class="fas fa-tv"></i>
                  <p>Visualizar Produtos</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="fas fa-toolbox"></i>
                <p>
                  Categorias
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('/category/index')}}" class="nav-link">
                    <i class="fas fa-list"></i>
                    <p>Visualizar categorias</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="fas fa-box"></i>
                <p>
                  Estoque
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('/story/index')}}" class="nav-link">
                    <i class="fas fa-box-open"></i>
                    <p>Visualizar Estoque</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('/deposito/index')}}" class="nav-link">
                      <i class="fas fa-boxes"></i>
                      <p>Adicionar Produto</p>
                    </a>
                  </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="fas fa-user-cog"></i>
                <p>
                  Usuario
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview ">
                <li class="nav-item">
                  <a href="{{url('/user/index')}}" class="nav-link">
                    <i class="fas fa-list"></i>
                    <p>Visualizar  Usuarios</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="fas fa-shopping-cart"></i>
                <p>
                  Comercial
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview ">
                <li class="nav-item">
                  <a href="{{url('/vendasonline/index')}}" class="nav-link">
                    <i class="fas fa-globe-americas"></i>
                    <p>Vendas online</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="fas fa-money-check-alt"></i>
                <p>
                  Financeiro
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview ">
                <li class="nav-item">
                  <a href="{{url('/financeiro/index')}}" class="nav-link">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <p>Lancamento Gerencial</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('/financeiro/indexBaixa')}}" class="nav-link">
                    <i class="fas fa-donate"></i>
                    <p>Baixa de Lancamentos</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="fas fa-file-alt"></i>
                <p>
                  Relatorios
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('/relatorio/indexuser')}}" class="nav-link active">
                    <i class="fas fa-users"></i>
                    <p>Relatorio de usuarios</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('/relatorio/indexproducts')}}" class="nav-link">
                      <i class="fas fa-file-alt"></i>
                      <p>Relatorio de Produtos</p>
                    </a>
                  </li>
              </ul>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Relatorio de Usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('index.home')}}">Menu</a></li>
              <li class="breadcrumb-item active">Relatorio de Usuarios</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
       </section>
       <section class="content">
        <div class="form-group col-md-6">
          <label for=""> Tipo:</label>
          <select class="form-control" name="tipo"  id="tipo" onshow="" required ><br>
              <option value="">Selecione o tipo</option>
              @foreach ($categorys as $category)
              <option value="{{$category->id}}">{{$category->category}}</option>
              @endforeach
          </select>
          <div style="color: red; background:rgb(233, 163, 163) "><small id="erro2"></small></div><br>
        </div>   
        <div class="form-group col-md-6">
          <label for=""> Tipo:</label>
          <select class="form-control" name="produtos"  id="produtos"><br>
              <option value="">Selecione o tipo</option>
          </select>
          <div style="color: red; background:rgb(233, 163, 163) "><small id="erro2"></small></div><br>
        </div>   
        
      </section>
      <!-- /.content -->
  </div>      
@endsection
<script language="javascript">
  $(document).ready(function(){
        var objProduct="<?php print $products;?>"
        $('#tipo').on('change',function(e)
        {
            console.log(e);
            var categoria_id= e.target.value;
            $.get(`/financeiro/teste/${categoria_id}`+categoria_id,function(data){
                console.log(objProduct);
                $('#produtos').empty();
                $.each(data,function(index,objProduct){
                    $('#produtos').append('<option value="'+objProduct.id+'">'+objProduct.name+'</option>');
                });
            });
        });
        

    });
</script>
@section('posjs')
<script>
  $(document).ready(function() {
    $('#tipo').select2({
      theme: 'bootstrap4'
    });
  });
</script>
<script language="javascript">
  $(document).ready(function(){
        var objProduct="<?php print $products;?>"
        $('#tipo').on('change',function(e)
        {
            console.log(e);
            var categoria_id= e.target.value;
            $.get(`/financeiro/teste/${categoria_id}`+categoria_id,function(data){
                console.log(objProduct);
                $('#produtos').empty();
                $.each(data,function(index,objProduct){
                    $('#produtos').append('<option value="'+objProduct.id+'">'+objProduct.name+'</option>');
                });
            });
        });
        

    });
</script>
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

@endsection

