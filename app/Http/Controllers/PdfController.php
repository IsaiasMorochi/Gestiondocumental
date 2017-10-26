<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PdfController extends Controller
{

    public function index()
    {
       return view('Herramienta.GenerarReporte.index');
    }

    public static function crearPDF($datos,$vistaurl,$tipo)
    {

        $data = $datos;
        $date = date('Y-m-d');
        $view =  \View::make($vistaurl, compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        //$pdf->setPaper('A4', 'portrait');
        if($tipo==1){return $pdf->stream('Reporte');}       //previsualizacion
        if($tipo==2){return $pdf->download('Reporte.pdf');} //descarga del reporte
    }


    public function docsReport(Request $request)
    {
        $url = "Herramienta.GenerarReporte.plantilla";
        $query = DB::table('documentos as doc')
            ->join('categorias as cat', 'cat.id', '=', 'doc.id_categoria')
            ->select('doc.descripcion','doc.extension','cat.descripcion as categoria')
            ->where('doc.extension', '=', $request->get('extension'))
            ->where('cat.id', '=', $request->get('categoria'))
            ->get();
        return PdfController::crearPDF($query, $url, 1);
        //    return json_encode(array("reporte"=>"de mierda"));
    }

}
