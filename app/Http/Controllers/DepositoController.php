<?php

namespace App\Http\Controllers;

use App\Http\Models\ModelCategory;
use App\Http\Models\ModelDeposito;
use App\Http\Models\ModelProduct;
use App\Http\Models\ModelStory;
use App\Http\Requests\DepositoRequest;
use Illuminate\Http\Request;

class DepositoController extends Controller
{
    private $objUser;
    private $repository;
    private $repositoryuser;
    private $repositorycategory;
    private $repositorystory;
    private $repositorycarrinho;
    private $repositorydeposito;
    private $repositorypedidoVenda;
    private $objProduct;
    private $objCategory;
    private $objDeposito;
    private $objStory;
    private $objPedidovenda;
    private $objCarrinho;
    protected $request;
    public function __construct(Request $request, ModelProduct $product, ModelCategory $category,ModelStory $story,ModelDeposito $deposito)
    {
        $this->repository=$product;
        $this->repositorystory=$story;
        $this->repositorycategory=$category;
        $this->repositorydeposito=$deposito;
        $this->objProduct=new ModelProduct();
        $this->objCategory=new ModelCategory();
        $this->objStory=new ModelStory();
        $this->objDeposito=new ModelDeposito();
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
        $storys=$this->objStory->all();
        $depositos= ModelDeposito::paginate();
        return view('ajax.deposito.visualizarDeposito', [
            'depositos'=>$depositos,
            'storys'=>$storys,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $depositos=$this->objDeposito->all();
       
        $categorys= $this->objCategory->all();
        
        $storys= $this->objStory->all();
        
        $products=$this->objProduct->all();
       
        return view('ajax.deposito.adicaoEstoque',[
            'depositos'=>$depositos,
            'products'=>$products,
            'categorys'=>$categorys,
            'storys'=>$storys,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepositoRequest $request)
    {
        $data= $request->only('story_id','products_id','qtd','category_id');
        $this->repositorydeposito->updateOrCreate(['products_id'=>$data['products_id'],'story_id'=>$data['story_id']],$data);
        return redirect( route( 'index.deposito' ) )->with( 'success', 'Produto adicionado ao deposito com sucesso!' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function FilterSelect(Request $request, $id){
        if($request->ajax()){
            $product=$this->repository->find($id);
            $towns[]=$this->repositorycategory->find($product->category_id);
            }
            return response()->json($towns);
        }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        if(!$deposito= $this->repositorydeposito->find($id))
        return redirect()->back();

      return view('ajax.deposito.editDepositoProduto',compact('deposito'));
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
        if(!$deposito=  $this->repositorydeposito->find($id))
        return redirect()->back();

        $data=$request->all();
        $deposito->update($data);
        return redirect(route('index.deposito'))->with( 'success', 'Editado com sucesso!' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deposito=  $this->repositorydeposito->where('id',$id)->first();
        if(!$deposito)
        {
            return redirect()->back();
        }
        try {
            $deposito->delete();
            return redirect(route('index.deposito'))->with('success','Deposito deletado com sucesso');
        } catch (\Throwable $th) {
           if($th->getCode()==23000)
           {
            return redirect()->back()->with('error','Existe algum cadastro com esse Produto no deposito');
           }
            throw $th;
        }
    }
    public function search(Request $request)
    {
        $filters=$request->except('_token');
        $storys= ModelStory::paginate(1000);
        $depositos= ModelDeposito::paginate(1000);
        $depositos=$this->repositorydeposito->search($request->filter,$request->filter1);

      return view('ajax.deposito.visualizarDeposito', [
        'storys'=>$storys,
        'depositos'=>$depositos,
        'filters'=>$filters,
        ]);
    }
}
