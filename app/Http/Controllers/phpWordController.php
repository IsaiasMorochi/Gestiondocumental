<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Reader\Word2007;
use PhpOffice\PhpWord\TemplateProcessor;

class phpWordController extends Controller
{
    public static function makeWord(Request $request,$iduser){
        $docWord = new PhpWord();
        $newSection = $docWord->addSection();
        $parrafo4 = $request->get('textArea');
        $parrafo4 = strip_tags($parrafo4);
        $newSection->addText($parrafo4);
        $objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($docWord,"Word2007");
        try{
            //$objectWriter->save(public_path('testFile.docx'));
            if(!is_dir(public_path().'/files/'.$iduser.'/Workflow/Workflow Creados/'.$request->get('descripcion'))){
                mkdir(public_path().'/files/'.$iduser.'/Workflow/Workflow Creados/'.$request->get('descripcion'),0777);
            }
            $objectWriter->save(public_path().'/files/'.$iduser.'/Workflow/Workflow Creados/'.$request->get('descripcion').'/'.$request->get('descripcion').'.docx');
        }catch (Exception $e){

        }

        return response()->download(public_path('testFile.docx'));
        //return json_encode(array("value"=>$parrafo4));
    }

    public static function makeWithTemplate(Request $request,$iduser){
        $template = new TemplateProcessor('plantillaWord.docx');
        $titulo = "Titulo del Documento";
        $fecha = "26/11/2017";
        $subtitulo = "Subtitulo del documento";
        $encabezado = "Encabezado del documento Encabezado del documento Encabezado del documento Encabezado del documento";
        $parrafo1 = "Encabezado del documento Encabezado del documento Encabezado del documento Encabezado del documento";
        $parrafo4 = $request->get('textArea');
        $parrafo2 = strip_tags($parrafo4);
        $footer = "Santa Cruz-Bolivia";
        $template->setValue('titulo',$titulo);
        $template->setValue('fecha',$fecha);
        $template->setValue('subtitulo',$subtitulo);
        $template->setValue('encabezado',$encabezado);
        $template->setValue('parrafo1',$parrafo1);
        $template->setValue('parrafo2',$parrafo2);
        $template->setValue('footer',$footer);
        $template->saveAs(public_path().'/files/'.$iduser.'/Documento2.docx');
        //return json_encode(array("result"=>"Lupe te Extranio, Maldito Yimmy"));

    }
}
