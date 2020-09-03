@extends('layout.apps')
@section('content')
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-white-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    {{-- <img src="../img/AdminLTELogo.png"
         alt="AdminLTE Logo"
         class="brand-image img-circle elevation-3"
         style="opacity: .8"> --}}
    <span class="brand-text font-weight-light">My crud</span>
  </a>
    <!-- Sidebar -->
    <div class="sidebar ">
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
            <ul class="nav nav-treeview ">
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
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
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
                    <a href="{{url('/deposito/index')}}" class="nav-link active">
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
            <h1>Produtos no Deposito</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('index.home')}}">Menu</a></li>
              <li class="breadcrumb-item active">Produtos no Deposito</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
       </section>
       <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                          <div class="main-content">   
                                <div class="panel-row">
                                  <a href="#">
                                      <button class="panel panel-50" hidden  id="visualiza" a-view="visualizarProduto"  onclick="fetchContent(this)" a-folder="produto" >Visualizar produto</button>
                                      </a>
                                    <a href="{{route('create.deposito')}}">
                                          <button class="panel panel-50" ><i class="fas fa-plus"></i>Cadastrar</button>  
                                      </a>
                                  </div>
                                  @php
                                      $numberid=0;
                                  @endphp
                                  <select class="form-control select text-center" name="story_story"  id="story_story" required><br>
                                    <option  value="{{$story->story ?? ''}}">{{$story->story ?? 'Selecione o deposito'}}</option>
                                    @foreach($storys as $story)
                                          @php
                                            $numberid=$numberid+1;
                                          @endphp
                                        <option value="{{$story->id}}" >{{$story->story}}</option>
                                    @endforeach
                                  </select><br>
                                  @php
                                      $is=0;
                                      $numberid=0;
                                  @endphp
                                  
                                <div class="main-cad-cadastro">
                                  <div class="main-cad-view" id="pai"> 
                                      @foreach ($storys as $story)
                                      @php
                                        $numberid=$numberid+1;
                                      @endphp
                                     
                                        <div  class="main-cad-filho" id="{{$story->id}}">
                                          {{-- <form action="{{route('deposito.search')}}" method="post">
                                            @csrf
                                            <div class="form-row">
                                              <div class="form-group col-md-6">
                                                 <label for=""> Produto:</label>
                                                <input type="text" name="filter" class="form-control" value="{{ $filters['filter'] ?? ''}}">
                                              </div>
                                              <div class="form-group col-md-6">
                                                <label for=""> Categoria:</label>
                                                <input type="text" name="filter1" class="form-control" value="{{ $filters['filter1'] ?? ''}}">
                                                <div class="butons">
                                                  <button type="submit" style="justify-content: flex-end" class="btn btn-success"> <i class="fas fa-search"></i> </button>
                                                </div>
                                            </div>
                                          </div>
                                          </form> --}}
                                          <br><br><h3 class="bg-primary text-center">{{$story->story}} </h3>
                                        <table class="table table-bordered data-table text-center" id="example{{$numberid}}" >
                                                  <thead class="bg-primary" >
                                                    <tr>
                                                      <th scope="col">Código</th>
                                                      <th scope="col">Produto</th>
                                                      <th scope="col">Quantidade</th>
                                                      <th scope="col">Categoria</th>
                                                      <th  scope="col">Ações</th>
                                                    </tr>
                                                  </thead>
                                                    @foreach($depositos as $deposito )
                                                        @if ($story->id==$deposito->story_id)           
                                                        <tbody>
                                                        <td>{{$deposito->id}}</td>
                                                        @php
                                                          $product=$deposito->find($deposito->products_id)->relProduct;
                                                         @endphp
                                                        <td>{{$product->name}}</td>
                                                        <td>{{$deposito->qtd}}</td>
                                                        @php
                                                        $category=$deposito->find($deposito->products_id)->relcategory;
                                                       @endphp
                                                        <td>{{$category->category}}</td>
                                                      
                                                        <td>
                                                                  <a href="{{route('edit.deposito',$deposito->id)}}">
                                                                  <button class="btn btn-primary" a-view="editDeposito" a-folder="deposito/{{$deposito->id}}" onclick="fetchContent(this)">
                                                                            <i class="fas fa-edit"></i>
                                                                          </button>
                                                                    </a>
                                                                    <form class="form-danger"  action="{{route('destroy.deposito',$deposito->id)}}"  method="POST">
                                                                      @csrf
                                                                      @method('DELETE')
                                                                      <button type="submit" class="btn btn-danger" data-toggle="" onclick="confirmdelete(event)" >
                                                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                          <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                                                        </svg>
                                                                      </button> 
                                                                    </form>   
                                                        </td>
                                                      </tr>
                                                        @endif
                                                    @endforeach
                                                  </tbody>
                                                </table>
                                    </div>
                                  @endforeach
                                  </div>
                                </div>
                              </div>                                                             
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
      </div>
    </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
  </div>
@endsection
@section('script')
<script>
$(document).ready(function() {
  $('#story_story').select2({
    theme: 'bootstrap4'
  });
});
</script>

@for ($i = 1; $i <=$numberid; $i++)
<script>
    $(document).ready(function(){
       var id = "<?php print $i; ?>";
      $(`#example${id}`).DataTable({
        "responsive": true,
        "autoWidth": false,
        language: {
          url: "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
        },
      });
  });
</script>
@endfor

@endsection


 