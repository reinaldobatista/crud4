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
use Illuminate\Support\Facades\Response;
use Symfony\Component\Console\Input\Input;

class FinanceiroController extends Controller
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
        $users=$this->objUser->all();
        $carrinhos=$this->objCarrinho->all();
        $selectcategory=null;
        $categorys= ModelCategory::paginate(10);
        $products=$this->objProduct->all();
        $lancamentos=$this->objLancamento->all();
        $pedidoVendas=$this->objPedidovenda->all();
        return view('ajax.financeiro.visualizarFinanceiro', [
            'products'=>$products,
            'categorys'=>$categorys,
            'selectcategory'=>$selectcategory,
            'carrinhos'=>$carrinhos,
            'lancamentos'=>$lancamentos,
            'users'=>$users,
            'pedidoVendas'=>$pedidoVendas,
            ]);
    }
    public function indexBaixarLancamento()
    {
        $users=$this->objUser->all();
        $carrinhos=$this->objCarrinho->all();
        $parcelas= ModelParcelas_lacamentogerencial::paginate(10);
        $selectcategory=null;
        $categorys= ModelCategory::paginate(10);
        $products=$this->objProduct->all();
        $pedidoVendas=$this->objPedidovenda->all();
        return view('ajax.financeiro.baixalancamento', [
            'products'=>$products,
            'categorys'=>$categorys,
            'selectcategory'=>$selectcategory,
            'parcelas'=>$parcelas,
            'carrinhos'=>$carrinhos,
            'users'=>$users,
            'pedidoVendas'=>$pedidoVendas,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=$this->objUser->all();
        $carrinhos=$this->objCarrinho->all();
        $selectcategory=null;
        $categorys= ModelCategory::paginate(10);
        $parcelas= ModelParcelas_lacamentogerencial::paginate(10);
        $products=$this->objProduct->all();
        $pedidoVendas=$this->objPedidovenda->all();
        return view('ajax.financeiro.cadastraLancamentoGerencial', [
            'products'=>$products,
            'categorys'=>$categorys,
            'parcelas'=>$parcelas,
            'selectcategory'=>$selectcategory,
            'carrinhos'=>$carrinhos,
            'users'=>$users,
            'pedidoVendas'=>$pedidoVendas,
            ]);
           
    }
    public function createbaixalancamento($id)
    {
        $users=$this->objUser->all();
        $carrinhos=$this->objCarrinho->all();
        $selectcategory=null;
        $categorys= ModelCategory::paginate(10);
        $parcelas= $this->repositoryparcela->find($id);
        $products=$this->objProduct->all();
        $pedidoVendas=$this->objPedidovenda->all();
        if( $parcelas->data_pagamento!==null || $parcelas->valor_recebido!==null)
        {
            return redirect()->back()->with('error','Ja foi dada baixar dessa parcela');
        }
        return view('ajax.financeiro.cadastrabaixalancamento', [
            'products'=>$products,
            'categorys'=>$categorys,
            'parcelas'=>$parcelas,
            'selectcategory'=>$selectcategory,
            'carrinhos'=>$carrinhos,
            'users'=>$users,
            'pedidoVendas'=>$pedidoVendas,
            ]);
           
    }
    public function createFaturamento($id)
    {
        $users=$this->objUser->all();
        $carrinhos=$this->objCarrinho->all();
        $lancamentos=$this->objLancamento->all();
        $selectcategory=null;
        $categorys= ModelCategory::paginate(10);
        $pedido_venda= $this->repositorypedidoVenda->find($id);
        $products=$this->objProduct->all();
        $pedidoVendas=$this->objPedidovenda->all();
        $valor=0;
        foreach ($lancamentos as $key => $lancamento) {
           $pedidos_relacionados[]=$lancamento->pedido_id;
        }
        foreach ($pedidos_relacionados as $key => $pedidos_relacionado) {
            $pedidos_relacionado=$this->repositorypedidoVenda->find($pedidos_relacionado);
            if($pedido_venda->numberPedido==$pedidos_relacionado->numberPedido)
            {
                return redirect()->back()->with('error','Pedido ja faturado');
            }
            if($pedido_venda->status_pedido_venda_id==4)
            {
                return redirect()->back()->with('error','Pedido Cancelado');
            }
           
        }
        foreach ($pedidoVendas as $key => $pedidoVenda) {
            if($pedidoVenda->numberPedido==$pedido_venda->numberPedido)
            {
                $valor=$valor+$pedidoVenda->value;
            }
        }
        return view('ajax.faturamento.cadastraFaturamento', [
            'products'=>$products,
            'categorys'=>$categorys,
            'selectcategory'=>$selectcategory,
            'carrinhos'=>$carrinhos,
            'users'=>$users,
            'valor'=>$valor,
            'pedido_venda'=>$pedido_venda,
            'pedidoVendas'=>$pedidoVendas,
            ]);
           
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->all();
        $source = array('.', ',');
        $replace = array('', '.');
        $valor = str_replace($source, $replace, $request->valueTotal);
        if ($request->description==null ||$request->valueTotal==null || $request->data_compra==null || $request->tipo==null )  
        {
            return redirect()->back()->with('error','Preencha todos os campos');
        }
        else
        {
            $data=[
                "description" => $request->description,
                "value" => $valor,
                "data_compra" => $request->data_compra,
                "cliente_id" => $request->cliente_id,
                "pedido_id" => $request->pedido_id,
                "tipo_id" => $request->tipo,
                "status_pedido_venda_id" => 1,
            ];
            $quantidades=$request->valueparcela;
            $qtd=0;
            $this->repositorylancamento->create($data);
            $lancamentoids=$this->repositorylancamento->all();
            $id=0;
            $data=null;
            foreach ($lancamentoids as $key => $lancamentoid) {
               $lancamentoi=$lancamentoid->getattributes();
               if( $lancamentoi['id'] > $id)
               {
                    $id= $lancamentoi['id'];
               }
            }
            foreach ($quantidades as $key => $quantidade) {
                $qtd++;
            }
            for ($i=0; $i < $qtd; $i++) { 
                $data=[
                    "value"=>str_replace($source, $replace, $request->valueparcela[$i]),
                    "data_vencimento"=>$request->data_vencimento[$i],
                    "number_parcela"=>$request->parcela_id[$i],
                    "lancamento_gerencial_id"=>$id,
                ];
                $this->repositoryparcela->create($data);
            }
            return redirect(route('index.financeiro'))->with('success','Lancamento Cadastrado com sucesso');
        }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $users=$this->objUser->all();
        $carrinhos=$this->objCarrinho->all();
        $lancamentos=$this->objLancamento->all();
        $selectcategory=null;
        $categorys= ModelCategory::paginate(10);
        $products=$this->objProduct->all();
        $pedidoVendas=$this->objPedidovenda->all();
       
        return view('teste',[
            'products'=>$products,
            'categorys'=>$categorys,
            'selectcategory'=>$selectcategory,
            'carrinhos'=>$carrinhos,
            'users'=>$users,
            'pedidoVendas'=>$pedidoVendas,
            ]);
    }

    public function teste(Request $request, $id){
        $products=$this->objProduct->all();
        if($request->ajax()){
            // foreach ($products as $key => $product) {
            //    if($product->category_id==$id)
            //    {
            //     $towns[]=$product;
            //    }
            // }
            $towns=ModelProduct::towns($id);
            return response()->json($towns);
        }
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
        // dd($request);
        $pedidoVendas=$request->pedidovenda;
        $lancamentoid=$request->lacamentoid;
        $dataLancamento=[
            "status_pedido_venda_id"=>2,
        ];
        $dataPedido=[
            "status_pedido_venda_id"=>2,
        ];
       $data=[
           "data_pagamento"=>"$request->data_pagamento",
           "valor_recebido"=>"$request->valor_recebido"
        ];
        $parcela=$this->repositoryparcela->find($id);
        $parcela->update($data);
        $lancamentoid=$this->repositorylancamento->find($lancamentoid);
      
        $lancamentoid->update($dataLancamento);
        foreach ($pedidoVendas as $key => $pedidoVenda) {
            $pedidoVenda=$this->repositorypedidoVenda->find($pedidoVenda);
            if($pedidoVenda->status_pedido_venda_id==1)
            {
                $pedidoVenda->update($dataPedido);
            }
        }
        return redirect(route('indexBaixa.financeiro'))->with('success','Lancamento Cadastrado com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parcelas=$this->objParcela->all();
        $lancamento=  $this->repositorylancamento->where('id',$id)->first();
        if(!$lancamento)
        {
            return redirect()->back();
        }
       
        try {
            $lancamento->delete();
            return redirect(route('index'))->with('success','Produto deletado com sucesso');
        } catch (\Throwable $th) {
           if($th->getCode()==23000)
           {
            return redirect()->back()->with('error','Existe algum cadastro com esse Produto');
           }
            throw $th;
        }
        foreach ($parcelas as $key => $parcela) {
            if($parcela->lacamento_gerencial_id==$lancamento->id)
            {
                try {
                    $parcela->delete();
                } catch (\Throwable $th) {
                   if($th->getCode()==23000)
                   {
                    return redirect()->back()->with('error','Existe algum cadastro com esse Produto');
                   }
                    throw $th;
                }
            }
        }
    }
    public function search(Request $request)
    {
        $filters=$request->except('_token');
        $users=$this->objUser->all();
        $carrinhos=$this->objCarrinho->all();
        $selectcategory=null;
        $categorys= ModelCategory::paginate(10);
        $products=$this->objProduct->all();
        $pedidoVendas=$this->objPedidovenda->all();
        if($request->filter2==null)
        {

        }
        else
        {
            $request->filter2=array($request->filter2." 00:00:00");
            $request->filter2=$request->filter2[0];
        }
        if($request->filter3==null)
        {

        }
        else
        {
            $request->filter3=array($request->filter3." 23:59:59");
            $request->filter3=$request->filter3[0];
        }
        $lancamentos=$this->repositorylancamento->search($request->filter,$request->filter1,$request->filter2,$request->filter3);

      return view('ajax.financeiro.visualizarFinanceiro', [
        'users'=>$users,
        'filters'=>$filters,
        'carrinhos'=>$carrinhos,
        'categorys'=>$categorys,
        'selectcategory'=>$selectcategory,
        'products'=>$products,
        'pedidoVendas'=>$pedidoVendas,
        'lancamentos'=>$lancamentos,

        ]);
    }
    public function searchbaixa(Request $request)
    {
        $filters=$request->except('_token');
        $users=$this->objUser->all();
        $carrinhos=$this->objCarrinho->all();
        $selectcategory=null;
        $lancamentos=$this->objLancamento->all();
        $categorys= ModelCategory::paginate(10);
        $products=$this->objProduct->all();
        $pedidoVendas=$this->objPedidovenda->all();
        if($request->filter3==null)
        {

        }
        else
        {
            $request->filter3=array($request->filter3." 00:00:00");
            $request->filter3=$request->filter3[0];
        }
        if($request->filter4==null)
        {

        }
        else
        {
            $request->filter4=array($request->filter4." 23:59:59");
            $request->filter4=$request->filter4[0];
        }
        $parcelas=$this->repositoryparcela->search($request->filter,$request->filter1,$request->filter2,$request->filter3,$request->filter4);

      return view('ajax.financeiro.baixalancamento', [
        'users'=>$users,
        'filters'=>$filters,
        'carrinhos'=>$carrinhos,
        'categorys'=>$categorys,
        'selectcategory'=>$selectcategory,
        'products'=>$products,
        'pedidoVendas'=>$pedidoVendas,
        'parcelas'=>$parcelas,
        'lancamentos'=>$lancamentos,

        ]);
    }
}
