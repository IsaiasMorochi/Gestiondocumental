<?php

namespace App\Http\Controllers;

use App\Categorium;
use App\Sitio;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Herramienta.GenerarReporte.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = DB::table('estados')->get();
        return view('Herramienta.GenerarReporte.create',["estados"=>$estados,"categorias"=>Categorium::all(),"sitios"=>Sitio::all()]);
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

    public function docsReport(Request $request,$tipo){
        $url="Herramienta.GenerarReporte.Plantilla";
        $query = DB::table('documentos as doc')
                    ->join('categorias as cat','cat.id','=','doc.id_categoria')
                    ->select('doc.*')
                    ->where('doc.extension','=',$request->get('extension'))
                    ->where('cat.id','=',$request->get('categoria'))
                    ->get();
        $op = PdfController::crearPDF($query,$url,$tipo);
        dd($op);
            return  $op;
    }
}
