<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUsuarioRequest;
use App\Http\Requests\UsuarioRequest;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Stmt\TryCatch;

use function GuzzleHttp\Promise\all;

class UserController extends Controller
{
    private $objUser;
    private $repositoryuser;
    protected $request;
    public function __construct(Request $request,User $user)
    {
        $this->repositoryuser=$user;
        $this->objUser=new User();
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
        $users= User::paginate(1000);
        return view('ajax.usuario.visualizarUsuario', [
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
        return view('ajax.usuario.CadastraUsuario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
        $data= $request->only('name','email','password');
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        return redirect( route( 'index.user' ) )->with( 'success', 'Usuario adicionado com sucesso!' );
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
        if(!$user=  $this->repositoryuser->find($id))
        return redirect()->back();

      return view('ajax.usuario.editUsuario',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsuarioRequest $request, $id)
    {
        if(!$user=  $this->repositoryuser->find($id))
        return redirect()->back();

        $data= $request->only('name','email','password');
      
        if($data['password']==null)
        {
            $user->update([
                'name' => $data['name'],
                'email' => $data['email'],
            ]);
        }
        else
        {
            $user->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        }
        return redirect(route('index.user'))->with( 'success', 'Usuario editado  com sucesso!' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=  $this->repositoryuser->where('id',$id)->first();
        if(!$user)
        {
            return redirect()->back();
        }
        try {
            $user->delete();
            return redirect(route('index.user'))->with('success','Usuario deletado com sucesso');
        } catch (\Throwable $th) {
           if($th->getCode()==23000)
           {
            return redirect()->back()->with('error','Existe algum cadastrado feito por esse usuario');
           }
            throw $th;
        }   
    }
    public function search(Request $request)
    {
        $filters=$request->except('_token');
        $users= User::paginate(100);
        $users=$this->repositoryuser->search($request->filter,$request->filter1);

      return view('ajax.usuario.visualizarUsuario', [
        'users'=>$users,
        'filters'=>$filters,
        ]);
    }
}
