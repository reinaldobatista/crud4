@extends('layout.appuser')
@section('content') 
@php
 require 'C:\wamp64\crud4\resources\views\ajax\formatado_numerico\formata_inteiro_decimal_br_tela.php';   
@endphp
<div class="painel-image">
  <mainuser>
      <headeruser>
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <a class="navbar-brand" href="#">Loja Crud</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            
              <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="{{route('index.Paginauser')}}">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z"/>
                          <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                      </svg>
                         Home 
                        <span class="sr-only">(current)</span>
                  </a>
                  </li>
                  <li class="nav-item">
                    @php
                    $qtdcarinho=0;
                    @endphp
                    @foreach ($carrinhos as $carrinho)
                      @if (Auth::user()->id===$carrinho->users_id&& $carrinho->carrinho_status_id===1)
                            @php
                            $qtdcarinho=$qtdcarinho+1;
                            @endphp
                      @endif
                    @endforeach
                    <a class="nav-link" href="/carrinho">
                          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart4" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                          </svg>
                        Carrinho
                        <span class="badge badge-success ">{{$qtdcarinho}}</span>
                      </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                      Meus Pedidos
                      </a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-list-ul" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                      </svg>
                      Categorias
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      @foreach ($categorys as $category)
                    <a class="dropdown-item" href="/filtrocategory/{{$selectcategory=$category->category}}">{{$category->category}}</a>
                      @endforeach
                      
                    </div>
                  </li>
                </ul>
                {{-- <form action="{{route('user.products.search')}}" method="post" class="form form-inline">
                  @csrf
                    <input type="text" name="filter" placeholder="Filtrar:" class="form-control" value="{{ $filters['filter'] ?? ''}}">
                    <button type="submit" class="btn btn-info"> Pesquisar </button>
                </form> --}}
              </div>
              
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
            </nav>
            
                
              </headeruser> 
</div>
                      
  </mainuser>

@php
  $totalcomprado=0;
  $totalcancel=0;
  $comprado=0;
  $cancelado=0;
  $number=0;
  $number1=0;
@endphp
@foreach ($pedidoVendas as $pedidoVenda)
    @if (Auth::user()->id === $pedidoVenda->user_id && $pedidoVenda->status_carrinho_id === 2)
          @php
             $comprado=1;
          @endphp
    @endif
    @if (Auth::user()->id === $pedidoVenda->user_id && $pedidoVenda->status_carrinho_id === 3)
          @php
             $cancelado=1;
          @endphp
    @endif
@endforeach
<div class="painel-show">
  @if ($comprado === 1)
  <div class="titles">
    <h4 class="text-center">Produtos Comprados</h4>
  </div>
  @foreach ($pedidoVendas as $pedidoVenda)
        @if (Auth::user()->id === $pedidoVenda->user_id && $pedidoVenda->status_carrinho_id === 2)
            @if ($pedidoVenda->numberPedido > $number)
                  @php
                  $number=$pedidoVenda->numberPedido;
                  @endphp
                <section class="content col-lg-12 ">
                  <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12 connectedSortable">
                      <!-- Custom tabs (Charts with tabs)-->
        
                      <div class="card direct-chat direct-chat-primary">
                        <div class="card-header bg-success">
                          <h3 class="card-title">Pedido {{$number}}</h3>
          
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-minus"></i>
                            </button>
                          </div>
                        </div>
                    
              
                        <!-- /.card-header -->
                        <div class="card-body">
                                  <table class="table table-bordered " >
                                    <thead class="thead-white">
                                          <tr>
                                            <th scope="col"></th>
                                            <th scope="col">preço</th>
                                            <th scope="col">Qtd</th>
                                            <th scope="col">subtotal</th>
                                          </tr>
                                        </thead>
                                      @foreach ($pedidoVendas as $pedidoVenda)
                                          @if (Auth::user()->id === $pedidoVenda->user_id && $pedidoVenda->status_carrinho_id === 2 && $pedidoVenda->numberPedido===$number)
                                              <tbody>
                                                @php
                                                  $status=$pedidoVenda->status_pedido_venda_id;
                                                  $products=$pedidoVenda->find($pedidoVenda->id)->relproduct;
                                                  $value=inteiro_decimal_br($pedidoVenda->value);
                                                @endphp
                                                @foreach ($lancamentos as $lancamento)
                                                  @if ($pedidoVenda->id==$lancamento->pedido_id)
                                                    @php
                                                        $lancamentoid=$lancamento->id;
                                                    @endphp
                                                  @endif
                                                @endforeach
                                                
                                                @foreach ($parcelas as $parcela)
                                                    @if ($parcela->lancamento_gerencial_id== $lancamentoid)
                                                        @if ($parcela->data_pagamento==null)
                                                          
                                                        @else
                                                            @php
                                                              $data_pagamento=$parcela->data_pagamento;
                                                            @endphp
                                                        @endif
                                                    @endif
                                                @endforeach
                                               
                                                <td > 
                                                
                                                  @if ($products->image)
                                                  <img src={{ url("storage/{$products->image}")}} alt="{{$products->name}}" style="max-width:100px">
                                                  @endif
                                                </td>
                                                <td>R$ {{ $value}}</td>
                                                <td style="max-width: 100px">
                                                  {{$pedidoVenda->qtd}}
                                                </td>
                                                @php
                                                    $subtotal=$pedidoVenda->value*$pedidoVenda->qtd;
                                                    $subtota=inteiro_decimal_br( $subtotal);
                                                @endphp
                                                <td>R$ {{ $subtota}}</td>
                                                @php
                                                $totalcomprado=$subtotal+ $totalcomprado;
                                                @endphp
                                              </tbody>
                                            
                                                
                                              
                                          @endif
                                      @endforeach
                                      @php
                                          $totalcomprado=inteiro_decimal_br( $totalcomprado);
                                      @endphp 
                              <td> Total </td>
                              <td> </td>
                              <td> </td>
                              <td>R$ {{$totalcomprado}}</td>
                              @php
                                  $totalcomprado=0;
                              @endphp
                            </table>
                            <br><br><div class="progress" style="height: 40px">
                              @if ($status==1)
                              <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><i class="fas fa-map-marker">Aguardando Pagamento:</i></div>
                              @endif
                              @if ($status==2)
                              <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><i class="fas fa-map-marker">Aguardando Pagamento:</i></div>
                              <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><i class="fas fa-map-marker">Pago:</i></div>
                              @endif
                              @if ($status==3)
                              <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><i class="fas fa-map-marker">Aguardando Pagamento:</i></div>
                            <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><i class="fas fa-map-marker">Pago:</i>{{$data_pagamento}}</div>
                            <script> 
                              var msg = "<?php print  $data_pagamento; ?>";
                                console.log(msg);
                              </script>
                              <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><i class="fas fa-map-marker">Pedido Enviado:</i></div>
                              @endif
                              @if ($status==5)
                              <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><i class="fas fa-map-marker">Aguardando Pagamento:</i></div>
                              <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><i class="fas fa-map-marker">Pago:</i></div>
                              <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><i class="fas fa-map-marker">Pedido Enviado:</i></div> 
                              <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><i class="fas fa-map-marker">Pedido entregue:</i></div>
                              @endif
                            </div>
                            @foreach ($pedidoVendas as $pedidoVenda)
                                  @if (Auth::user()->id === $pedidoVenda->user_id && $pedidoVenda->status_carrinho_id === 2 && $pedidoVenda->numberPedido===$number)
                                      <form action="{{route('Carrinho.updatecancelado',$pedidoVenda->id)}}" method="POST" enctype="multipart/form-data" name="form-carrinho" >
                                        @csrf
                                        @method('PUT')
                                        <input type="number" name="carrinho_id[]" value="{{$pedidoVenda->id}}" hidden>
                                        
                                  @endif
                            @endforeach
                                    <div class="butons">
                                      <button  type="submit" class="btn btn-default" data-toggle="modal" data-target="">
                                        Cancelar compra
                                      </button>
                                    </div>
                                  </form><br>
                              </div>
                            </div>
                            </section>
                          </div>
                        </section>
                @endif
            @endif
  @endforeach                   
  @endif

  @if ($cancelado === 1)
  <div class="titles2">
    <h4 class="text-center">Produtos Cancelados</h4>
  </div>
  @foreach ($pedidoVendas as $pedidoVenda)
        @if (Auth::user()->id === $pedidoVenda->user_id && $pedidoVenda->status_carrinho_id === 3)
            @if ($pedidoVenda->numberPedido > $number1)
                  @php
                  $number1=$pedidoVenda->numberPedido;
                  @endphp
                <section class="content col-lg-12 ">
                  <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12 connectedSortable">
                      <!-- Custom tabs (Charts with tabs)-->
        
                      <div class="card direct-chat direct-chat-primary">
                        <div class="card-header bg-danger">
                          <h3 class="card-title">Pedido {{$number1}}</h3>
          
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-minus"></i>
                            </button>
                          </div>
                        </div>
                    
              
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table class="table table-light " >
                              <thead class="thead-white">
                                    <tr>
                                      <th scope="col"></th>
                                      <th scope="col"></th>
                                      <th scope="col">preço</th>
                                      <th scope="col">Qtd</th>
                                      <th scope="col">subtotal</th>
                                    </tr>
                                  </thead>
                                @foreach ($pedidoVendas as $pedidoVenda)
                                    @if (Auth::user()->id === $pedidoVenda->user_id && $pedidoVenda->status_carrinho_id === 3 && $pedidoVenda->numberPedido===$number1)
                                        <tbody >
                                          @php
                                            $products=$pedidoVenda->find($pedidoVenda->id)->relproduct;
                                          @endphp
                                          <td > 
                                          
                                            @if ($products->image)
                                            <img src={{ url("storage/{$products->image}")}} alt="{{$products->name}}" style="max-width:100px">
                                            @endif
                                          </td>
                                          <td>{{$pedidoVenda->products_name}} </td>
                                          @php
                                               $value=inteiro_decimal_br($pedidoVenda->value);
                                          @endphp
                                          <td>R$ {{$value}}</td>
                                          <td style="max-width: 100px">
                                            {{$pedidoVenda->qtd}}
                                          </td>
                                          @php
                                            $subtotal=$pedidoVenda->value*$pedidoVenda->qtd;
                                            $subtota=inteiro_decimal_br($subtotal);
                                          @endphp
                                          <td>R$ {{$subtota}}</td>
                                          @php
                                          $totalcomprado=$subtotal+ $totalcomprado
                                          @endphp
                                        </tbody>
                                      
                                          
                                        
                                    @endif
                                @endforeach 
                                <td> Total </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                @php
                                     $totalcomprado=inteiro_decimal_br($totalcomprado);
                                @endphp
                                <td>R$ {{$totalcomprado}}</td>
                                @php
                                    $totalcomprado=0;
                                @endphp
                          </table>
                      </div>
                    </div>
                  </section>
                </div>
              </section>
          @endif
        @endif
  @endforeach    
  @endif
</div>

@endsection