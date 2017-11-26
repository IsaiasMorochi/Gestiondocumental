<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Comentario;
use Illuminate\Http\Request;
use Session;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $comentario = Comentario::where('contenido', 'LIKE', "%$keyword%")
				->orWhere('id_institucion', 'LIKE', "%$keyword%")
				->orWhere('id_users', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $comentario = Comentario::paginate($perPage);
        }

        return view('GestionDocumental.comentario.index', compact('comentario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('GestionDocumental.comentario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'contenido' => 'required|max:80'
		]);
        $requestData = $request->all();
        
        Comentario::create($requestData);

        Session::flash('flash_message', 'Comentario added!');

        return redirect('comentario');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $comentario = Comentario::findOrFail($id);

        return view('GestionDocumental.comentario.show', compact('comentario'));
    }

    public function prueba(){
        //$id = $_SESSION['id'];
//        error_reporting(E_ALL and E_NOTICE);
//        session_start();
//        $iduser = $_SESSION['id'];
//        if(!is_dir(public_path().'/files/'.$iduser->id)){
//            mkdir(public_path().'/files/'.$iduser->id);
//            mkdir(public_path().'/files/'.$iduser->id.'/Workflow');
//            mkdir(public_path().'/files/'.$iduser->id.'/Workflow/Workflow Creados');
//            mkdir(public_path().'/files/'.$iduser->id.'/Workflow/Workflow Asignados');
//        }else{
//            return json_encode(array("result"=>"NO".$_SESSION['id']));
//            //
//        }
//        error_reporting(E_ALL and E_NOTICE);
//        session_start();
//        $var = $_SESSION['institucion'];
//        $idcreador = $_SESSION['id'];
        $idasignado=36;$fileName='loq sea';
        //mkdir(public_path().'/files/'.'36'.'/Workflow/Workflow Asignados/Roue');
        //if(copy(public_path().'/files/'.'33'.'/Workflow/Workflow Creados/'.'caratula'.'/'.'CARATULA'.'.docx',public_path().'/files/'.'24'.'/Workflow/Workflow Asignados/'.'caratula'.'/'.'CARATULA'.'-v'.'4'.'.docx')){
        if(!is_dir(public_path().'/files/'.$idasignado.'/Workflow/Workflow Asignados/'.$fileName)){
            mkdir(public_path().'/files/'.$idasignado.'/Workflow/Workflow Asignados/'.$fileName,0777);
            return json_encode(array("result"=>'vacio'));

        }else{
            return json_encode(array("result"=>'lleno'));
        }
//        }else{
//            return json_encode(array("result"=>"NO"));
//        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $comentario = Comentario::findOrFail($id);

        return view('GestionDocumental.comentario.edit', compact('comentario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
			'contenido' => 'required|max:80'
		]);
        $requestData = $request->all();
        
        $comentario = Comentario::findOrFail($id);
        $comentario->update($requestData);

        Session::flash('flash_message', 'Comentario updated!');

        return redirect('comentario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Comentario::destroy($id);

        Session::flash('flash_message', 'Comentario deleted!');

        return redirect('comentario');
    }
}
