@extends('layout.app')
@section('content')
<div class="flex-dashboard">
    <sidebar>
        <div class="sidebar-title">
           <img src="img/crud1.png" >
           <h2> My Crud</h2>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="{{url("/")}}"> <i class="fas fa-home"></i> Menu</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="{{url('administraCategorias')}}"> <i class="fas fa-toolbox"></i> Administrar Categorias</a>
                </li>
            </ul>
            <ul>
                <li class="nav-itemdropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-box"></i> Administrar Estoque</a>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{url('/administraEstoque')}}"><i class="fas fa-store"></i>Adicionar estoque</a>
                      <a class="dropdown-item" href="#"><i class="fas fa-boxes"></i>Adicionar prouduto ao<br> Estoque</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="{{url('administra/Usuarios')}}"> <i class="fas fa-user"></i>Administrar Usuarios</a>
                </li>
            </ul>
            <ul>
              <li class="nav-itemdropdown">
                  <a class="nav-link dropdown-toggle" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-file-alt"></i> Relatorios </a>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                    <a class="dropdown-item" href="{{url("/report/user")}}"><i class="fas fa-users"></i>Relatorio de usuarios</a>
                    <a class="dropdown-item" href="{{url('/report/produtos')}}"><i class="fas fa-file-alt"></i>Relatorio de proudutos</a>
              </li>
          </ul>
            {{-- <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="fas fa-box"></i> 
                      <p>
                       Administrar Estoque
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{url('/administraEstoque')}}" class="nav-link">
                          <p><i class="fas fa-store"></i>Adicionar estoque</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <p><i class="fas fa-boxes"></i>Adicionar prouduto ao Estoque</p>
                        </a>
                      </li>
                    </ul>
                  </ul>
              </nav> --}}
        </div>
           
        </sidebar>
    <main>
        <header>
            <a href="{{url("/")}}"><i class="fas fa-home"></i>Menu</a>
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                     <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
          </li>
        </header>
        <div class="main-content">   
                <div class="panel-row">
                <a href="#">
                        <button class="panel panel-50" a-view="deposito" a-folder="cadastra" onclick="fetchContent(this)">Adicionar Produto ao deposito</button>
                    </a>
                    <a href="#">
                         <button class="panel panel-50" a-view="deposito" id="visualizar" onclick="fetchContent(this)" a-folder="visualizar" >Visualizar Produtos no deposito</button>
                    </a>
                </div>
                 <div class="ajax-content" id="ajax-content"></div>
        </div>
    </main>
  
       
</div>
@endsection
@section('posjs')
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
