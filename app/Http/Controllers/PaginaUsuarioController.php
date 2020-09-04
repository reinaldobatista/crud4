<?php

namespace App\Http\Controllers;

use App\Http\Models\ModelCarrinho;
use App\Http\Models\ModelCategory;
use App\Http\Models\ModelDeposito;
use App\Http\Models\ModelLancamentoGerencial;
use App\Http\Models\ModelParcelas_lacamentogerencial;
use App\Http\Models\ModelpedidoVenda;
use App\Http\Models\ModelProduct;
use App\Http\Models\ModelStory;
use App\User;
use Illuminate\Http\Request;

class PaginaUsuarioController extends Controller
{
    private $objUser;
    private $repository;
    private $repositoryuser;
    private $repositorycategory;
    private $repositorystory;
    private $repositorycarrinho;
    private $repositorydeposito;
    private $repositorypedidoVenda;
    private $repositorylancamento;
    private $repositoryparcela;
    private $objProduct;
    private $objCategory;
    private $objDeposito;
    private $objStory;
    private $objPedidovenda;
    private $objCarrinho;
    private $objLancamento;
    private $objParcela;
    protected $request;
    public function __construct(Request $request, ModelProduct $product,User $user, ModelCategory $category,
    ModelStory $story,ModelCarrinho $carrinho,ModelDeposito $deposito, ModelParcelas_lacamentogerencial $parcela,
    ModelpedidoVenda $pedidoVenda, ModelLancamentoGerencial $lancamento)
    {
        $this->repository=$product;
        $this->repositoryuser=$user;
        $this->repositorycarrinho=$carrinho;
        $this->repositorystory=$story;
        $this->repositorycategory=$category;
        $this->repositorystory=$story;
        $this->repositorydeposito=$deposito;
        $this->repositorypedidoVenda=$pedidoVenda;
        $this->repositorylancamento=$lancamento;
        $this->repositoryparcela=$parcela;
        $this->objUser=new User();
        $this->objProduct=new ModelProduct();
        $this->objCategory=new ModelCategory();
        $this->objStory=new ModelStory();
        $this->objCarrinho=new ModelCarrinho();
        $this->objPedidovenda=new ModelpedidoVenda();
        $this->objDeposito=new ModelDeposito();
        $this->objLancamento=new ModelLancamentoGerencial();
        $this->objParcela=new ModelParcelas_lacamentogerencial();
       // $this->middleware('auth'); coloca autenticação em tudo

      /* $this->middleware('auth')->only([
            'create','store'
       ]);*///coloca autenticação nas selecionadas

       //$this->middleware('auth')->except('index'); coloca autenticação em todas exceto as selecionadas
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $selectcategory=null;
        $categorys= ModelCategory::paginate(10);
        $products= ModelProduct::paginate(30);
        $carrinhos=$this->objCarrinho->all();
        return view('indexUsuario', [
            'products'=>$products,
            'categorys'=>$categorys,
            'carrinhos'=>$carrinhos,
            'selectcategory'=>$selectcategory,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function carrinhoStore(Request $request)
    {
        $data= $request->all();
        $confere=0;
        $carid=0;
        $carqtd=0;
        foreach ($carrinhos=$this->objCarrinho->all() as $car => $carrinho) {
            if($carrinho['users_id']==$data['users_id'] && $carrinho['products_car_id']==$data['products_car_id'] )
            {
                $confere=1;
                $carid=$carrinho['id'];
                $carqtd=$carrinho['qtd'];
            }
        }
        if($confere==1)
        {
            $carrinho=$this->repositorycarrinho->find($carid);
            $carqtd=$carrinho['qtd'];
            $data['qtd']= $carqtd+$data['qtd'];
            $carrinho->update($data);
            return redirect()->back();
        }
        else
        {
            $this->repositorycarrinho->create($data);
            return redirect()->back()->with( 'success', 'Produto adicionado ao carrinho com sucesso!' );
        }
      
      
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $selectcategory=null;
        $categorys= ModelCategory::paginate(10);
        $product=$this->repository->find($id);
        $depositos=$this->objDeposito->all();
        $carrinhos=$this->objCarrinho->all();
        return view('show',[
            'product'=>$product,
            'depositos'=>$depositos,
            'categorys'=>$categorys,
            'carrinhos'=>$carrinhos,
            'selectcategory'=>$selectcategory,
        ]);
    }
    public function Showfilter($id,$selectcategorys)
    {
        $product=$this->repository->find($id);
        $depositos=$this->objDeposito->all();
        $selectcategory=null;
        $carrinhos=$this->objCarrinho->all();
        $categorys= ModelCategory::paginate(10);
        return view('showfilter',[
            'product'=>$product,
            'selectcategorys'=>$selectcategorys,
            'categorys'=>$categorys,
            'carrinhos'=>$carrinhos,
            'selectcategory'=>$selectcategory,
            'depositos'=>$depositos,
        ]);
    }
    public function carrinhoShow()
    {
         // if(!$product=  $this->repository->find($id))
        //   return redirect()->back();
        $user=$this->objUser->all();
        $carrinhos=$this->objCarrinho->all();
        $selectcategory=null;
        $categorys= ModelCategory::paginate(10);
        $products=$this->objProduct->all();
        return view('carrinho', [
            'products'=>$products,
            'categorys'=>$categorys,
            'selectcategory'=>$selectcategory,
            'carrinhos'=>$carrinhos,
            'user'=>$user,
            ]);
    }
    public function pedidoVendaShow()
    {
        $user=$this->objUser->all();
        $carrinhos=$this->objCarrinho->all();
        $selectcategory=null;
        $categorys= ModelCategory::paginate(10);
        $products=$this->objProduct->all();
        $pedidoVendas=$this->objPedidovenda->all();
        $lancamentos=$this->objLancamento->all();
        $parcelas=$this->objParcela->all();
        return view('ajax.pedidoVenda.pedidoVenda', [
            'products'=>$products,
            'categorys'=>$categorys,
            'selectcategory'=>$selectcategory,
            'carrinhos'=>$carrinhos,
            'lancamentos'=>$lancamentos,
            'parcelas'=>$parcelas,
            'user'=>$user,
            'pedidoVendas'=>$pedidoVendas,
            ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!$carrinho=  $this->repositorycarrinho->find($id))
        {
            return redirect()->back();
        }
        $data=$request->all();
        if( $data['qtd']<=0)
        {
            $data['qtd']=1;
        }
        $carrinho->update($data);
        return redirect()->back();
    }
    public function updatecarrinhocomprado(Request $request, $id)
    { 
        if(!$carrinho=  $this->repositorycarrinho->find($id))
        {
            return redirect()->back();
        }
        $request=$request->all();
        $request=$request['carrinho_id'];
        $number=$this->objPedidovenda->all();
        $numbers=0;
        $numbermax=-1;
        foreach($number as $numbers) 
        {
            $numbers=$numbers->getattributes();
            if($numbermax<$numbers['numberPedido'])
            {
                $numbermax=$numbers['numberPedido'];
            }
        }
        $numbermax=$numbermax+1;
        foreach ($request as $requests) {
            $carrinho=  $this->repositorycarrinho->find($requests);
            $request=$carrinho->getattributes();
            $data=[
                'products_id'=> $request['products_car_id'],
                'numberPedido'=>$numbermax,
                'status_carrinho_id'=>'2',
                'qtd'=> $request['qtd'],
                'value'=> $request['value'],
                'user_id'=> $request['users_id'],
                'status_pedido_venda_id'=>1,
                ];
             $this->repositorypedidoVenda->create($data);
            $carrinho->delete();
        }
        return redirect()->back();
    }
    public function updatecarrinhocancelar(Request $request, $id)
    { 
        $id1=0;
        $id2=0;
        if(!$carrinho=$this->repositorypedidoVenda->find($id))
        {
            return redirect()->back();
        }
        $request=$request->all();
        $request=$request['carrinho_id'];
        foreach ($request as $requests=>$id1) {
         $pedidoVenda=  $this->repositorypedidoVenda->find($id1);
            $id2=$pedidoVenda->getattributes();
            $id2['status_carrinho_id']=3;
            $id2['status_pedido_venda_id']=4;
            $pedidoVenda->update( $id2);
        }
        
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carrinho=  $this->repositorycarrinho->where('id',$id)->first();
        if(!$carrinho)
        {
            return redirect()->back();
        }

        $carrinho->delete();

        return redirect()->route('carrinho.show');
    }
    public function filterCategory($selectcategorys)
    {
        $selectcategory=null;
        $categorys= ModelCategory::paginate(10);
        $carrinhos=$this->objCarrinho->all();
        $products= ModelProduct::paginate(15);
        return view('ajax.filtros.filtrocategorias', [
            'products'=>$products,
            'categorys'=>$categorys,
            'carrinhos'=>$carrinhos,
            'selectcategory'=>$selectcategory,
            'selectcategorys'=>$selectcategorys,
        ]);
    }
    public function search(Request $request)
    {
        $filters=$request->except('_token');
      $selectcategory=null;
      $categorys= ModelCategory::paginate(10);
      $carrinhos=$this->objCarrinho->all();
      $products=$this->repository->search1($request->filter);

      return view('indexUsuario', [
        'products'=>$products,
        'filters'=>$filters,
        'categorys'=>$categorys,
        'carrinhos'=>$carrinhos,
        'selectcategory'=>$selectcategory,
        ]);
    }
}
