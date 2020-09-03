 <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                      <h5 class="modal-title" id="staticBackdropLabel">Confirma Exclusão</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body bg-danger text-white">
                      Você tem Certeza que Deseja Excluir este Registro?
                    </div>
                    <div class="modal-footer bg-danger text-white">
                      {!! Form::open(['route' => ['products.destroy', $product->id]]) !!}
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-success" >Apagar</button>
                      {!! Form::close() !!}
                      {{-- <form action="{{route('products.destroy',$product->id)}}" method="post" >
                          
                      </form> --}}
                      <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                    </div>
                  </div>
                </div>
 </div>