@extends('layout.appuser')
<title>Especificaçoes do produto{{$product->name}}</title>
@section('content')
@php
 require 'C:\wamp64\crud4\resources\views\ajax\formatado_numerico\formata_inteiro_decimal_br_tela.php';   
@endphp
<mainuser>
   <headeruser>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Loja Crud</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
            <a class="nav-link" href="{{url('/carrinho')}}">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart4" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                  </svg>
                Carrinho
                <span class="badge badge-success ">{{$qtdcarinho}}</span>
              </a>
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
              <a class="dropdown-item"  href="/usuario/index">Todos</a>
              @foreach ($categorys as $category)
            <a class="dropdown-item"  href="/filtrocategory/{{$selectcategory=$category->category}}">{{$category->category}}</a>
              @endforeach
              
            </div>
          </li>
        </ul>
        <form action="{{route('user.products.search')}}" method="post" class="form form-inline">
          @csrf
            <input type="text" name="filter" placeholder="Filtrar:" class="form-control" value="{{ $filters['filter'] ?? ''}}">
            <button type="submit" class="btn btn-info"> Pesquisar </button>
        </form>
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
      </div>
    </nav>
             
           </headeruser> 
           <div class="painel-show">
            <section class="content">
              @php
                  $qtdp=0
              @endphp
              @foreach ($depositos as $deposito)
                    @if ($deposito->products_id === $product->id)
                      @php
                          $qtdp=$deposito->qtd+$qtdp
                      @endphp
                    @endif
              @endforeach
                <!-- Default box -->
                <div class="card card-solid">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12 col-sm-6">
                        <h3 class="d-inline-block d-sm-none">{{$product->name}}</h3>
                        <div class="col-12 ">
                          <img src={{ url("storage/{$product->image}")}} alt="{{$product->name}}" class="product-image" alt="Product Image" style=""><br>
                        </div>
                        <div class="col-12 product-image-thumbs">
                          <div class="product-image-thumb"> <img src={{ url("storage/{$product->image}")}} alt="Product Image" id="img1"><br></div>
                          <div class="product-image-thumb"> <img src="../img/crud1.png" alt="Product Image" style=""><br></div>
                          <div class="product-image-thumb"> <img src={{ url("storage/{$product->image}")}} alt="Product Image" style=""><br></div>
                          <div class="product-image-thumb"> <img src="../img/crud1.png" alt="Product Image" style=""><br></div>
                          <div class="product-image-thumb"> <img src={{ url("storage/{$product->image}")}} alt="Product Image" style=""><br></div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-6">
                        <h3 class="my-3 text-center">{{$product->name}}</h3>
                        <hr>
                        <div class="bg-info py-2 px-3 mt-4">
                          <h2 class="mb-0">
                            @php
                              $preco=inteiro_decimal_br($product->price);
                            @endphp
                            R$ {{$preco}}
                          </h2>
                          <h4 class="mt-0">
                            <small>Ex Tax: R$ {{$preco}} </small>
                          </h4>
                        </div>
              
                        <div class="mt-4">
                          <div class="btn btn-lg btn-flat">
                            <form action="{{route('carrinho.store')}}" method="post" enctype="multipart/form-data" name="form-carrinho" onsubmit="return validarCarrinho()">
                              @method('POST')
                              @csrf
                              <input class="form-control" type="hidden" name="id" placeholder="Nome:" value="{{$product->id }}"><br>
                              <input class="form-control" type="hidden" name="users_id" placeholder="Nome:" value="{{$user_name=Auth::user()->id}}"><br>
                              Quantidade Disponivel
                              <input class="form-control"  type="reset" name="qtd_disponivel"   value="{{$qtdp?? old('qtd_disponivel')}}" style="max-width:170px "><br>
                              Quantidade Desejada
                              <input class="form-control text-center"  type="text" name="qtd" placeholder="Quantidade:"  value="{{$qtd=1?? old('qtd')}}" style="max-width:170px ">
                              <div style="color: red"><small id="erro1"></small></div><br>
                               <button class="btn btn-success"> Adiciona ao carrinho</button> <br>
                              <input class="form-control" type="hidden" name="products_car_id" placeholder="Nome:" value="{{$product->id ?? old('user_name')}}"><br>
                              <input class="form-control"  type="hidden" name="value" placeholder="valor:"  value="{{$value=$product->price?? old('qtd')}}"><br>
                              <input class="form-control"  type="hidden" name="carrinho_status_id" value="1"> 
                                
                             </form>
                          </div>
                        <div class="mt-4 product-share">
                          <a href="#" class="text-gray">
                            <i class="fab fa-facebook-square fa-2x"></i>
                          </a>
                          <a href="#" class="text-gray">
                            <i class="fab fa-twitter-square fa-2x"></i>
                          </a>
                          <a href="#" class="text-gray">
                            <i class="fas fa-envelope-square fa-2x"></i>
                          </a>
                          <a href="#" class="text-gray">
                            <i class="fas fa-rss-square fa-2x"></i>
                          </a>
                        </div>
              
                      </div>
                    </div>
                    <div class="row mt-4">
                      <nav class="w-100">
                        <div class="nav nav-tabs" id="product-tab" role="tablist">
                          <a class="nav-item nav-link show  active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Descrição</a>
                          {{-- <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                          <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a> --}}
                        </div>
                      </nav>
                      <div class="tab-content p-3" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">{!! nl2br(e($product->description)) !!}</div>
                        {{-- <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
                        <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div> --}}
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <a href="{{route('products.filter',$selectcategorys)}}">
                  <button class="btn btn-primary">
                  <svg class="bi bi-arrow-left" width="3em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M5.854 4.646a.5.5 0 0 1 0 .708L3.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0z"/>
                      <path fill-rule="evenodd" d="M2.5 8a.5.5 0 0 1 .5-.5h10.5a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg></button>
              </a>
              </section>     
          </div>
</mainuser>


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
@endsection