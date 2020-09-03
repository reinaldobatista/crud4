@extends('layout.app')
@section('title')
<title>MyCrud/CadastraLancamentoGerencial</title>
@endsection
@section('content')
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-white-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="/img/crud1.png"
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
              <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
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
                    <a href="{{url('/financeiro/indexBaixa')}}" class="nav-link active">
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
                <li class="breadcrumb-item active"><a href="{{route('indexBaixa.financeiro')}}">Baixar lancamento</a></li>
                <li class="breadcrumb-item ">Cadastrar Baixa de lancamento</li>
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
                  <h3 class="card-title">Cadastrar Baixa de lancamento</h3>
  
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <main>
                    <form action="{{route('update.financeiro',$parcelas->id)}}" method="post" name="form-baixa-lancamento" enctype="multipart/form-data" onsubmit="return validarBaixarlancamento()">
                      @method('PUT')
                        <div class="main-cad-cadastro">   
                            <div class="panel-cad-cadastro">
                              <nav class="w-100">
                                <div class="nav nav-tabs"role="tablist">
                                  <a class="nav-item nav-link show  active" id="lancamento" type="submit" data-toggle="tab" role="tab" aria-controls="product-desc" aria-selected="true">Lancamento</a>
                                  {{-- <a class="nav-item nav-link" id="parcelamento" type="submit" data-toggle="tab" role="tab" aria-controls="product-comments" aria-selected="false">Valor pago</a> --}}
                                </div>
                              </nav>
                                  <div class="pai" id="pai">
                                    <div class="filho" id="filho1">
                                      <div class="form-row">
                                          @csrf
                                          @php
                                            $lancamento=$parcelas->find($parcelas->id)->relLancamentoGerencial;
                                            $pedido_vendas=$lancamento->find($lancamento->id)->relPedidoVenda;
                                            $cliente=$lancamento->find($lancamento->id)->relusers;
                                            $tipo=$lancamento->find($lancamento->id)->relTipo;
                                          @endphp
                                          @foreach ($pedidoVendas as $pedidoVenda)
                                             @if ($pedidoVenda->numberPedido==$pedido_vendas->numberPedido)
                                              <input class="form-control" type="text" name="pedidovenda[]"  value="{{$pedidoVenda->id}}" hidden >
                                             @endif
                                          @endforeach
                                          <div class="form-group col-md-6">
                                            <fieldset disabled>
                                              <label for=""> Nome do Documento:</label>
                                              <input class="form-control" type="text" name="description"  value="{{$lancamento->description}}">
                                            </fieldset>
                                            <input class="form-control" type="text" name="lacamentoid"  value="{{$lancamento->id}}" hidden>
                                          </div>
                                          <div class="form-group col-md-3">
                                            <fieldset disabled>
                                              <label for=""> Valor:</label>
                                              <input class="form-control"  type="text" name="valueTotal" id="valueTotal" placeholder="Valor:"  value="{{$parcelas->value}}">
                                            </fieldset>
                                          </div>
                                          <div class="form-group col-md-3">
                                              <label for=""> Data da Operação:</label>
                                              <input class="form-control"  type="date" name="data_pagamento" placeholder="Data de competencia:"  >
                                              <div style="color: red; background:rgb(233, 163, 163) "><small id="erro1"></small></div><br>
                                          </div>
                                          <div class="form-group col-md-6">
                                            <fieldset disabled>
                                                <label for="">Cliente/Fornecedor:</label>
                                                <input class="form-control" name="cliente_id" value="{{$cliente->name}}"  id="cliente_id"><br> </fieldset>
                                          </div> 
                                          <div class="form-group col-md-6">
                                            <fieldset disabled>
                                                <label for=""> Tipo:</label>
                                                <input class="form-control" name="tipo"  value="{{$tipo->name}}" id="tipo"><br>
                                            </fieldset>
                                          </div>    
                                          <div class="form-group col-md-6">
                                            <label for=""> Valor Pago:</label>
                                            <input class="form-control" type="text" id="value" name="valor_recebido" placeholder="Valor da parcela:" value="{{$product->name ?? old('name')}}">
                                            <div style="color: red ; background:rgb(233, 163, 163) " ><small id="erro2"></small></div><br>
                                          </div>
                                          {{-- <div class="form-group col-md-6">
                                                <label >Quitado</label>
                                                  <select type="text" name="quitado" class="form-control" id="quitado">
                                                    <option value="">Selecione</option>
                                                    <option value="1">sim</option>
                                                    <option value="2">não</option>
                                                  </select>
                                                 
                                              </div> --}}
                                          </div>
                                      </div>
                                         
                                    </div>
                                   
                                  </div>
                                </div>
                                
                                  <div class="butons">
                                    <button type="submit" class="btn btn-success" > Salvar </button>
                                    <a href="{{route('index')}}" class="btn btn-default"> Cancelar</a>
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
    $(document).ready(function() {
      $('#value').on('change',function(){
            let valorTotal= document.querySelector('#valueTotal').value;
            let valor= document.querySelector('#value').value;
           if(valorTotal>valor)
           {
            msg_erro='Valor menor do quer valor da parcela!';
            modalerro(msg_erro);
            document.getElementById('erro2').innerHTML= msg_erro;
            document.querySelector('#value').value=valorTotal
           }
           
        })
    });
  </script>
  @endsection
  
