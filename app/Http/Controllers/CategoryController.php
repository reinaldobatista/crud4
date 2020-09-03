<?php

namespace App\Http\Controllers;

use App\Http\Models\ModelCategory;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Stmt\TryCatch;

use function GuzzleHttp\Promise\all;

class CategoryController extends Controller
{
    private $repositorycategory;
    private $objCategory;
    protected $request;
    public function __construct(Request $request, ModelCategory $category)
    {
        $this->repositorycategory=$category;
        $this->objCategory=new ModelCategory();
    
    //    coloca autenticação em tudo
        $this->middleware('auth') ;

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
        $categorys= ModelCategory::paginate(20);
        return view('ajax.categoria.visualizarCategoria', [
            'categorys'=>$categorys,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ajax.categoria.CadastraCategoria');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= $request->only('category');
        $this->repositorycategory->create($data);
        return redirect( route( 'index.category' ) )->with( 'success', 'Categoria adicionada com sucesso!' );
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
        if(!$category= $this->repositorycategory->find($id))
        return redirect()->back();

       return view('ajax.categoria.editCategoria',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        if(!$category=  $this->repositorycategory->find($id))
        return redirect()->back();

        $data=$request->all();
        $category->update($data);
        return redirect(route('index.category'))->with( 'success', 'Categoria Editado com sucesso!' );;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=  $this->repositorycategory->where('id',$id)->first();
        if(!$category)
        {
            return redirect()->back();
        }
        try {
            $category->delete();
            return redirect(route('index.category'))->with('success','Categoria deletada com sucesso');
        } catch (\Throwable $th) {
            // $code=$th->code;
           if($th->getCode()==23000)
           {
            return redirect()->back()->with('error','Existe algum produto cadastro com essa categoria');
           }
            throw $th;
        }
    }
    public function search(Request $request)
    {
        $filters=$request->except('_token');
        $categorys= ModelCategory::paginate(10);
        $categorys=$this->repositorycategory->search($request->filter);

      return view('ajax.categoria.visualizarCategoria', [
        'filters'=>$filters,
        'categorys'=>$categorys,
        ]);
    }
}
