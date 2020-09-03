<?php

namespace App\Http\Controllers;

use App\Http\Models\ModelCategory;
use App\Http\Models\ModelProduct;
use App\Http\Models\ModelProducts;
use App\Http\Models\ModelStory;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private $repository;
    private $repositorycategory;
    private $objProduct;
    private $objCategory;
    protected $request;
    public function __construct(Request $request,  ModelProduct $product, ModelCategory $category)
    {
        $this->repository=$product;
        $this->repositorycategory=$category;
        $this->objProduct=new ModelProduct();
        $this->objCategory=new ModelCategory();
        // coloca autenticação em tudo
        $this->middleware('auth'); 
      

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
        $products=$this->objProduct->all();
        $categorys=$this->repositorycategory;
        return view('ajax.produto.visualizarProduto', [
            'products'=>$products,
            'categorys'=>$categorys,
        ]);
    }
    public function Menu()
    {
        $products=ModelProduct::paginate(10000);
        $categorys= ModelCategory::paginate(10000);
        $storys= ModelStory::paginate(10000);
        $users= User::paginate(10000);
        return view('index', [
            'products'=>$products,
            'categorys'=>$categorys,
            'storys'=>$storys,
            'users'=>$users,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys=ModelCategory::paginate(10);
        $category=$this->objCategory->all();
        return view('ajax.produto.cadastraProduto',[
            'categorys'=>$categorys
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $source = array('.', ',');
        $replace = array('', '.');
        $data= $request->only('name','description','price','category_id');
        $valor = str_replace($source, $replace, $data['price']);
        $data['price']= $valor;
        if ($request->hasFile('image') && $request->image->isValid()) {
            // $nameFile=$request->name . '.' . $request->image->extension();
            $imagePath1= $request->image->store('public/products');
            $imagePath= $request->image->store('products');
            $data['image']= $imagePath;
        }
        $this->repository->create($data);

        return redirect( route( 'index' ) )->with( 'success','produto adicionado com sucesso!' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorys= $this->objCategory->all();
        $category=$this->objCategory->all();
        if(!$product=  $this->repository->find($id))
        return redirect()->back();

      return view('ajax.produto.editProduto',[
          'product'=>$product,
          'categorys'=>$categorys
         
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $source = array('.', ',');
        $replace = array('', '.');
        $valor = str_replace($source, $replace, $request->price);
        if(!$product=  $this->repository->find($id))
        return redirect()->back();

        $data=$request->all();
        $data['price']= $valor;
        if ($request->hasFile('image') && $request->image->isValid()) {
            if ($product->image && Storage::exists($product->image))
            {
                    Storage::delete($product->image);
            }
            $imagePath= $request->image->store('products');
            
            $data['image']= $imagePath;
        }

        $product->update($data);

        return redirect(route('index'))->with( 'success', 'Produto Editado com sucesso!' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=  $this->repository->where('id',$id)->first();
        if(!$product)
        {
            return redirect()->back();
        }
        if ($product->image && Storage::exists($product->image))
        {
             Storage::delete($product->image);
        }
        try {
            $product->delete();
            return redirect(route('index'))->with('success','Produto deletado com sucesso');
        } catch (\Throwable $th) {
           if($th->getCode()==23000)
           {
            return redirect()->back()->with('error','Existe algum cadastro com esse Produto');
           }
            throw $th;
        }
    }
    public function search(Request $request)
    {
        $filters=$request->except('_token');
        $selectcategory=null;
        $categorys= ModelCategory::paginate(10);
        $products=$this->repository->search($request->filter,$request->filter1);

      return view('ajax.produto.visualizarProduto', [
        'products'=>$products,
        'filters'=>$filters,
        'categorys'=>$categorys,
        'selectcategory'=>$selectcategory,
        ]);
    }
}
