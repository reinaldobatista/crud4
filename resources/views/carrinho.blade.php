@extends('layout.appuser')
@section('content') 
@php
 require 'C:\wamp64\crud4\resources\views\ajax\formatado_numerico\formata_inteiro_decimal_br_tela.php';   
@endphp
<div class="painel-image">
  <mainuser>
          <nav class="navbar navbar-expand navbar-white navbar-light">
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
                    <a class="nav-link" href="#">
                          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart4" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                          </svg>
                        Carrinho
                      </a>
                  </li>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/pedidovenda">
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
                {{-- <form action="{{route('products.search')}}" method="post" class="form form-inline">
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
                       <i class="fas fa-sign-out-alt"></i> Sair
                    </a>
  
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            </nav>
</div>
                      
  </mainuser>

@php
  $total=0;
  $totalcomprado=0;
  $totalcancel=0;
  $aguardando=0;
  $comprado=0;
  $cancelado=0;
@endphp
@foreach ($carrinhos as $carrinho)
    @if (Auth::user()->id===$carrinho->users_id&& $carrinho->carrinho_status_id===1)
          @php
             $aguardando=1;
          @endphp
    @endif
@endforeach
@if ( $aguardando===1)
<section class="content col-lg-12 ">
  <div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
      <!-- Custom tabs (Charts with tabs)-->

      <div class="card direct-chat direct-chat-primary">
        <div class="card-header bg-primary">
          <h3 class="card-title">Meu carrinho</h3>

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
                <th scope="col">Preço</th>
                <th scope="col">Qtd</th>
                <th scope="col">Subtotal</th>
                <th  scope="col">Ações</th>
              </tr>
            </thead>
                @foreach ($carrinhos as $carrinho)

                    @if (Auth::user()->id===$carrinho->users_id&& $carrinho->carrinho_status_id===1)
                  
                        <tbody >
                          @php
                              $products=$carrinho->find($carrinho->id)->relProduct;
                              $preco=inteiro_decimal_br($products->price);
                          @endphp
                          <td > 
                            @if ($products->image)
                            <img src={{ url("storage/{$products->image}")}} alt="{{$products->name}}" style="max-width:100px">
                            @endif
                          </td>
                          <td>{{$products->name}}</td>
                          <td>R$ {{  $preco}}</td>
                          <td style="max-width: 100px">
                            <form action="{{route('carrinho.update',$carrinho->id)}}" method="POST" enctype="multipart/form-data"  >
                              @csrf
                              @method('PUT')
                              <input  class="form-control text-center" type="number" onchange="atulizacarrinho(this)" name="qtd" id="qtd" value="{{$carrinho->qtd}}">
                              <input class="form-control" type="hidden" name="users_id" value="{{$user_name=Auth::user()->id }}">
                              <input class="form-control" type="hidden" name="products_car_id" value="{{$carrinho->products_car_id}}">
                              <input class="form-control"  type="hidden" name="value" value="{{$products->price}}"> 
                              <input class="form-control"  type="hidden" name="carrinho_status_id" value="1"> 
                            </form>
                          </td>
                              @php
                                  $subtotal=$carrinho->value*$carrinho->qtd;
                                  $subtota=inteiro_decimal_br($subtotal);
                              @endphp
                          <td>R$ {{$subtota}}</td>
                          @php
                          $total=$subtotal+$total
                          @endphp
                          <td>
                              <form class="form-danger" id="{{$carrinho->id}}" action="{{route('destroy.carrinho',$carrinho->id)}}"  method="POST">
                                @csrf
                                @method('DELETE')
                                <button  type="submit" class="btn btn-danger"  data-toggle="modal" data-target="">
                                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                  </svg>
                              </button>  
                              </form> 
                          </td> 
                        </tbody>
                           
                              
                    @endif
                    @endforeach
                    <td>Total </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    @php
                        $total=inteiro_decimal_br($total)
                    @endphp
                    <td>R$ {{$total}}</td>
          </table>
            @foreach ($carrinhos as $carrinho)
                      
                @if (Auth::user()->id===$carrinho->users_id&& $carrinho->carrinho_status_id===1)
                      @php
                          $products=$carrinho->find($carrinho->id)->relProduct;
                      @endphp
                      <form action="{{route('Carrinho.updatecomprado',$carrinho->id)}}" method="POST" enctype="multipart/form-data" name="form-carrinho" >
                            @csrf
                            @method('PUT')
                            <input type="number" name="carrinho_id[]" value="{{$carrinho->id}}" hidden>
                @endif
            @endforeach
                  <div class="butons">
                    <button  type="submit" class="btn btn-success"  data-toggle="modal" data-target="">
                      Compra
                    </button>
                  </div>
                      </form> 
            @else
              <h1 class="text-center" style="padding-top: 250px">Nenhum item adicionado ao carrinho</h1> 
            @endif
        </div>
      </div>
    </section>
  </div>
</section>
@endsection
<script>
  function atulizacarrinho(e)
  {
    $(document).ready(function(){
            $(e).closest("form").submit();
        })
      
  }
</script>