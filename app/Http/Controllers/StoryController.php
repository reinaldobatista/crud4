<?php

namespace App\Http\Controllers;

use App\Http\Models\ModelStory;
use App\Http\Requests\StoryRequest;
use App\Http\Requests\UpdateStoryRequest;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    private $repositorystory;
    private $objStory;
    protected $request;
    public function __construct(Request $request,ModelStory $story)
    {
        
        $this->repositorystory=$story;
        $this->objStory=new ModelStory();
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
        $storys= ModelStory::paginate(10);
        return view('ajax.estoque.visualizarEstoque', [
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
        return view('ajax.estoque.cadastraEstoque');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoryRequest $request)
    {
        $data= $request->only('story');
        $this->repositorystory->create($data);
        return redirect( route( 'index.story' ) )->with( 'success', 'Estoque adicionado com sucesso!' );
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
        
        if(!$story=  $this->repositorystory->find($id))
        return redirect()->back();

      return view('ajax.estoque.editEstoque',compact('story'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStoryRequest $request, $id)
    {
        if(!$story=  $this->repositorystory->find($id))
        return redirect()->back();
        $data=$request->all();
        $story->update($data);
        return redirect(route('index.story'))->with( 'success', 'Estoque editado com sucesso!' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $story=$this->repositorystory->where('id',$id)->first();
        if(!$story)
        {
            return redirect()->back();
        }
        try {
            $story->delete();
            return redirect(route('index.story'))->with('success','Estoque deletado com sucesso');
        } catch (\Throwable $th) {
           if($th->getCode()==23000)
           {
            return redirect()->back()->with('error','Existe algum Produto cadastrado nesse Estoque');
           }
            throw $th;
        }
    }
}
