@extends('layout.apps')
@section('title')
<title>MyCrud/CadastraProdutos</title>
@endsection
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
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="fas fa-industry"></i>
                <p>
                    Produto
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('/products/index')}}" class="nav-link active">
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
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fas fa-file-alt"></i>
                  <p>
                    Relatorios
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('/relatorio/indexuser')}}" class="nav-link">
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
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('index.home')}}">Menu</a></li>
                <li class="breadcrumb-item active"><a href="{{route('index')}}">Visualizar Produtos</a></li>
                <li class="breadcrumb-item ">Cadastrar Produtos</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
         </section>
         <section class="content">
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->

              <div class="card direct-chat direct-chat-primary">
                <div class="card-header bg-primary">
                  <h3 class="card-title">Cadastrar Produto</h3>
  
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <main>
                    <form action="{{route('store.products')}}" method="post" name="form-product" enctype="multipart/form-data" onsubmit="return validar()">
                        <div class="main-cad-cadastro">   
                            <div class="panel-cad-cadastro">
                                <div class="form-row">
                                    @csrf
                                    <div class="form-group col-md-6">
                                        <label for=""> Nome:</label>
                                        <input class="form-control" type="text" name="name" placeholder="Nome:" value="{{$product->name ?? old('name')}}">
                                        <div style="color: red ; background:rgb(233, 163, 163) " ><small id="erro1"></small></div><br>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for=""> Preço:</label>
                                        <input class="form-control"  type="text" name="price" placeholder="Preço:"  value="{{$product->price?? old('price')}}">
                                        <div style="color: red; background:rgb(233, 163, 163) "><small id="erro2"></small></div><br>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for=""> Descrição:</label>
                                        <textarea class="form-control" rows="6"  type="text" name="description" placeholder="Descrição:"  value="{{$product->description??old('description')}}"></textarea>
                                        <div style="color: red; background:rgb(233, 163, 163) "><small id="erro3"></small></div><br>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <select class="form-control" name="category_id"  id="category_id"><br>
                                            <option value="{{$category->id ?? ''}}">{{$category->category ?? 'Selecione a categoria'}}</option>
                                            @foreach($categorys as $category)
                                                <option value="{{$category->id}}">{{$category->category}}</option>
                                            @endforeach
                                        </select>
                                        <div style="color: red; background:rgb(233, 163, 163) "><small id="erro4"></small></div><br>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input class="form-control" type="file" name="image" class="form-control">
                                        <div style="color: red; background:rgb(233, 163, 163) "><small id="erro5"></small></div><br>
                                    </div>
                                </div>
                                <div class="butons">
                                    <button type="submit" class="btn btn-success" > Salvar </button>
                                    <a href="{{route('index')}}" class="btn btn-default"> Cancelar</a>
                                </div>        
                        </div>
                    </form> 
                </main>
                {{-- <div class="card-footer">
                </div> --}}
                <!-- /.card-footer-->
              </div>
              <!--/.direct-chat -->
            </section>
          </div>     
          <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
 @endsection
 @section('script')
 <script>
    $(document).ready(function() {
      $('#category_category').select2({
        theme: 'bootstrap4'
      });
    });
  </script>
  @endsection
