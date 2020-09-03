@extends('layout.apps')
@section('title')
<title>MyCrud/CadastraLancamentoGerencial</title>
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
                <a href="#" class="nav-link active">
                  <i class="fas fa-money-check-alt"></i>
                  <p>
                    Financeiro
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview menu-open">
                  <li class="nav-item">
                    <a href="{{url('/financeiro/index')}}" class="nav-link active">
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
                <li class="breadcrumb-item active"><a href="{{route('index.financeiro')}}">Lancamento Gerencial</a></li>
                <li class="breadcrumb-item ">Cadastrar Lancamento Gerencial</li>
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
                  <h3 class="card-title">Cadastrar Lancamento Gerencial</h3>
  
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <main>
                    <form action="{{route('store.financeiro')}}" method="post" name="form-lancamento" enctype="multipart/form-data" onsubmit="return validarLancamento()">
                        <div class="main-cad-cadastro">   
                            <div class="panel-cad-cadastro">
                              <nav class="w-100">
                                <div class="nav nav-tabs"role="tablist">
                                  <a class="nav-item nav-link show  active" id="lancamento" type="submit" data-toggle="tab" role="tab" aria-controls="product-desc" aria-selected="true">Lancamento</a>
                                  <div style="" id="erro">
                                    <a class="nav-item nav-link" id="parcelamento" type="submit" data-toggle="tab" role="tab" aria-controls="product-comments" aria-selected="false">Parcelamento</a>
                                    </div>
                                </div>
                              </nav>
                                  <div class="pai" id="pai">
                                    <div class="filho" id="filho1">
                                      <div class="form-row">
                                          @csrf
                                          <div class="form-group col-md-6">
                                              <label for=""> Nome do Documento:</label>
                                              <input class="form-control" type="text" name="description"  value="{{$product->name ?? old('name')}}">
                                              <div style="color: red; background:rgb(233, 163, 163) "><small id="erro1"></small></div><br>
                                          </div>
                                          <div class="form-group col-md-3">
                                              <label for=""> Valor:</label>
                                              <input class="form-control"  type="text" name="valueTotal" id="valueTotal" placeholder="Valor:"  value="{{$product->price?? old('price')}}">
                                              <div style="color: red; background:rgb(233, 163, 163) "><small id="erro2"></small></div><br>
                                          </div>
                                          <div class="form-group col-md-3">
                                            <label for=""> Data de competencia:</label>
                                            <input class="form-control"  type="date" name="data_compra" placeholder="Data de competencia:"  value="{{$product->price?? old('price')}}">
                                            <div style="color: red; background:rgb(233, 163, 163) "><small id="erro3"></small></div><br>
                                          </div>
                                          <div class="form-group col-md-6">
                                            <label for="">Cliente/Fornecedor:</label>
                                            <select class="form-control" name="cliente_id"  id="cliente_id"><br>
                                                <option value="">Selecione o Cliente/Fornecedor</option>
                                                @foreach ($users as $user)
                                                  <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                            <div style="color: red; background:rgb(233, 163, 163) "><small id="erro4"></small></div><br>
                                          </div> 
                                          <div class="form-group col-md-6">
                                            <label for=""> Tipo:</label>
                                            <select class="form-control" name="tipo"  id="tipo"><br>
                                                <option value="">Selecione o tipo</option>
                                                <option value="1">Receita</option>
                                                <option value="2">Despesa</option>
                                            </select>
                                            <div style="color: red; background:rgb(233, 163, 163) "><small id="erro5"></small></div><br>
                                          </div>    
                                      </div>
                                         
                                    </div>
                                    <div class="filho2" id="filho2">
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for=""> Valor a Parcela:</label>
                                                <fieldset disabled="disabled">
                                                    <input class="form-control" type="text" id="ValoraParcela"  value="{{$product->name ?? old('name')}}">
                                                    <div style="color: red ; background:rgb(233, 163, 163) " ><small id="erro6"></small></div><br>
                                                </fieldset>
                                            </div>
                                        </div>
                                      <div class="form-row">
                                        @csrf
                                        <div class="form-group col-md-6">
                                          <label for=""> Valor da parcela:</label>
                                          <input class="form-control" type="text" id="value" name="value" placeholder="Valor da parcela:" value="{{$product->name ?? old('name')}}">
                                      </div>
                                        {{-- <div class="form-group col-md-6">
                                            <label for=""> Numero de Parcelas:</label>
                                            <input class="form-control" type="text" name="teste" placeholder="descrição:" value="{{$product->name ?? old('name')}}">
                                            <div style="color: red ; background:rgb(233, 163, 163) " ><small id="erro1"></small></div><br>
                                        </div> --}}
                                        <div class="form-group col-md-6">
                                            <label for="">Data do Vencimento da parcela:</label>
                                            <input class="form-control" id="data_vencimento" type="date" name="" placeholder="Valor:"  value="{{$product->price?? old('price')}}">
                                        </div>
                                    </div>
                                    <div class="butons">
                                      <a  class="btn btn-success" id="adicionar"> Adicionar </a>
                                    </div>
                                    <table class="table table-bordered data-table table-head-fixed text-center" id="parcela-table" >
                                      <thead>
                                        <tr>
                                          <th scope="col" class="bg-primary">Parcela</th>
                                          <th scope="col" class="bg-primary">Data de Vencimento</th>
                                          <th scope="col" class="bg-primary">Valor</th>
                                          <th scope="col" class="bg-primary">Açoes</th> 
                                        </tr>
                                      </thead>
                                      <tbody>
                
                                      </tbody>
                                    </table>
                                   <div class="end">
                                        <fieldset disabled="disabled">
                                            <label for=""> Valor Parcelado:</label>
                                            <input  class="form-control" type="text" id="valorParcelado"  value="0,0">
                                            <div style="color: red ; background:rgb(233, 163, 163) " ><small id="erro7"></small></div><br>
                                        </fieldset>
                                   </div>
                                  </div>
                                </div>
                                
                                  <div class="butons">
                                    <button type="submit" class="btn btn-success" > Salvar </button>
                                    <a href="{{route('index.financeiro')}}" class="btn btn-default"> Cancelar</a>
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
  <script>
    function RemoveProduct(e)
    {
        total=0;
        $(e).closest('tr').remove();
        var tableParcela = $("#parcela-table").find('tbody').find('tr').find('#parcela');
        if (tableParcela.length > 0) {
                  for (var i = 0; i < tableParcela.length; i++) {
                      $("#parcela-table").find('tbody').find('tr').find('#parcela')[i].value = i + 1;
                      ValorParcelado=$("#parcela-table").find('tbody').find('tr').find('#valueparcela')[i].value;
                      total=total+parseFloat(ValorParcelado);
                  }
              }
              document.querySelector('#valorParcelado').value=total;
             var ValoraParcela= document.querySelector('#valueTotal').value;
             document.querySelector('#ValoraParcela').value=parseFloat(ValoraParcela)-total

    }
  </script>
  <script>
    $(document).ready(function(){
            $('#adicionar').on('click',function(){
              let valor=document.querySelector('#value').value;
              let data_vencimento=document.querySelector('#data_vencimento').value;
              var tableParcela = $("#parcela-table").find('tbody').find('tr').find('#parcela');
              var numberParcela = Number($("#parcela-table").find('tbody').find('tr').length) + Number(1);
              var ValorParcelado=0;
              var ValoraParcela=document.querySelector('#ValoraParcela').value;
              
           
              if (tableParcela.length > 0) {
                var ValorParcelado=  ValorParcela =$("#parcela-table").find('tbody').find('tr').find('#valueparcela')[0].value;
                  for (var i = 0; i < tableParcela.length; i++) {
                      $("#parcela-table").find('tbody').find('tr').find('#parcela')[i].value = i + 1;
                        ValorParcela =$("#parcela-table").find('tbody').find('tr').find('#valueparcela')[i].value;
                        ValorParcelado=parseFloat(ValorParcela)+parseFloat(ValorParcelado);
                        console.log(ValorParcelado);
                  }
                  ValoraParcela=parseFloat(ValoraParcela)-parseFloat( ValorParcela)
              }
              else
              {
                var ValorParcelado =document.querySelector('#value').value;
                ValorParcela=valor;
                ValoraParcela=parseFloat(ValoraParcela)-parseFloat( ValorParcela)
              }
             
              document.querySelector('#ValoraParcela').value=ValoraParcela;
              document.querySelector('#valorParcelado').value=ValorParcelado;
              let lineTable =
                `<tr>
               cols+=<td ><input name='parcela_id[]' style="border:none" value=" ${numberParcela} " id='parcela' class='parcela_id text-center'></td>
               <td><input name='data_vencimento[]' style="border:none" value="${data_vencimento}" id='data_vencimento' class='data_vencimento text-center'></td>
               <td><input type="text" name='valueparcela[]' style="border:none" class="form-control text-center" value="${valor}" id="valueparcela" step="any" min="0.01" onkeypr ess="return sNumerosVirgula()" max="999999999999999999999999" required></td>
               <td>
               <button class="btn btn-large btn-danger" onclick="RemoveProduct(this)"  data-placement="top" title ="Remover Produto" type="button">Remover</button>
               </td>                              
           </tr>`;
    
           $("#parcela-table > tbody").append(lineTable);
            })
            
    
        })
    
    </script>
  @endsection
  
