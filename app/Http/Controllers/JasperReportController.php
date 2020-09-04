<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JasperPHP\JasperPHP;
use PhpParser\Node\Expr\New_;

class JasperReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexUser()
    {
        return view('ajax.relatorios.relatorioUser');
    }
    public function indexProduct()
    {
        return view('ajax.relatorios.relatorioProdutos');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getDatabaseConfig()
    {
        $jdbc_dir='C:\wamp64\crud4\vendor\cossou\jasperphp\src\JasperStarter\jdbc';
        return [
            'driver'=> env('DB_CONNECTION'),
            'host'=>env('DB_HOST'),
            'port'=>env('DB_PORT'),
            'username'=>env('DB_USERNAME'),
            'password'=>env('DB_PASSWORD'),
            'database'=>env('DB_DATABASE'),
            'jbc_driver'=>'com.mysql.jdbc.Driver',
            'jbc_url'=>'jdbc:mysql://127.0.0.1:3006;databasename='.env('DB_DATABASE').'',
            'jdbc_dir'=>$jdbc_dir,
        ];
    }
    public function generateReportUser(Request $request,$name)
    {
        // dd($name);
        $data= $request->all();
        $filtro=$data['filtroNome'];
        $filtro1=$data['filtroEmail'];
        $jasper= new JasperPHP;
        $extensao='pdf';
        $nome=$name;
        $filename= $nome.time();
        $output=base_path('public/reports/'.$filename);

    //     $output =$jasper->list_parameters (
    //         base_path("public/relatorios/$name.jasper")
    //    )->execute();

      $jasper->compile(storage_path('app/public').`/relatorio/$name.jrxml`)->execute();
        $jasper->process(
           base_path("public/Relatorios/$name.jrxml"),
            $output,
            array($extensao),
            array('descriptionName'=>"$filtro",
                    'descriptionEmail'=>"$filtro1"),
            $this->getDatabaseConfig(),
            "pt_br",
        )->execute();
        $file=$output .'.'.$extensao;

        if(!file_exists($file))
        {
            abort(404);
        }
        if($extensao=='xls')
        {
            header('Content-Description: Arquivo Excel');
            header('ontent-Type: application/x-mexcel');
            header('COntent-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires:0');
            header('Cache-Control:must-revalidate');
            header('Pragma:public');
            header('Content-Lenght'.filesize($file));
            flush();
            readfile($file);
            unlink($file);
            die();
        }
        else if($extensao=='pdf')
        {
            return response()->file($file)->deleteFileAfterSend();
        }
    }
    public function generateReportProdutos(Request $request,$name)
    {
        // dd($name);
        $data= $request->all();
        $filtro=$data['filtroNome'];
        $jasper= new JasperPHP;
        $extensao='pdf';
        $nome=$name;
        $filename= $nome.time();
        $output=base_path('public/reports/'.$filename);
        $jasper->compile(storage_path('app/public').`/relatorios/$name.jrxml`)->execute();
        $jasper->process(
           base_path("public/Relatorios/$name.jrxml"),
            $output,
            array($extensao),
            array('descriptionName'=>"$filtro"),
            $this->getDatabaseConfig(),
            "pt_br",
        )->execute();
        // dd($jasper);
        $file=$output .'.'.$extensao;

        if(!file_exists($file))
        {
            abort(404);
        }
        if($extensao=='xls')
        {
            header('Content-Description: Arquivo Excel');
            header('ontent-Type: application/x-mexcel');
            header('COntent-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires:0');
            header('Cache-Control:must-revalidate');
            header('Pragma:public');
            header('Content-Lenght'.filesize($file));
            flush();
            readfile($file);
            unlink($file);
            die();
        }
        else if($extensao=='pdf')
        {
            return response()->file($file)->deleteFileAfterSend();
        }
    }
}
