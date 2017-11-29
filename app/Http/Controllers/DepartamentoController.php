<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Bitacora;
use App\Events\llamada;

class DepartamentoController extends Controller
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
            $departamento = Departamento::where('nombre', 'LIKE', "%$keyword%")
				->orWhere('id_institucion', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $grupo = DB::table('users')
                ->select('users.id_grupo as g')
                ->where('users.email','=',$_SESSION['email'])
                ->first();
            if($grupo->g == 1){
                $departamento = Departamento::_getInstitucionSuper();
            } else{
                $departamento = Departamento::_getInstitucion();
            }

        }
        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $institucion= $_SESSION['institucion'];
        $institucion->id;

        $casos = DB::table('cu')
            ->where('id','=',22)
            ->orWhere('id','=',13)->get();

        return view('SitioCompartido.GestionarDepartamento.index', compact('departamento','casos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $grupo = DB::table('users')
            ->select('users.id_grupo as g')
            ->where('users.email','=',$_SESSION['email'])
            ->first();


        if($grupo->g == 1){
         error_reporting(E_ALL and E_NOTICE);
         session_start();
         $institucion= $_SESSION['institucion'];
         $institucion->id;

         $idInstitucion= DB::table('institucions as i')
                ->distinct()
                ->select('i.id as id','i.nombre as nombre')
                ->orderBy('id','desc')
                ->get();
       // return json_encode(array('institucion'=>$idInstitucion));
        } else{
            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $idInstitucion= $_SESSION['institucion'];
        }

        return view('SitioCompartido.GestionarDepartamento.create',compact('idInstitucion','grupo'));
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
			'nombre' => 'required|max:180'
		]);
        $requestData = $request->all();

        $dep = new Departamento();
        $dep->id=(DB::table('departamentos')->select('id')->orderBy('id','desc')->first())->id+1;
        $dep->nombre =$request->get('nombre');
        $dep->id_institucion = $request->get('id_institucion');
        $dep->save();

        Session::flash('flash_message', 'Departamento added!');

        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $grupo = DB::table('users')
            ->select('users.id_grupo as g')
            ->where('users.email','=',$_SESSION['email'])
            ->first();

        error_reporting(E_ALL and E_NOTICE);
        session_start();

        $a = $_SESSION['nombre'];

        $bitacoraf= new Bitacora();
        $bitacoraf->operacion="Insertar";
        $bitacoraf->tabla="departamentos";
        $bitacoraf->usuario=$a->nombre;
        event(new llamada($bitacoraf));
        if($grupo->g == 1){
            return redirect('AdmGeneral/UsuarioG/create');
        } else{
            return redirect('SitioCompartido/GestionarDepartamento');
        }
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
        $departamento = Departamento::findOrFail($id);



        return view('SitioCompartido.GestionarDepartamento.show', compact('departamento'));
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
        error_reporting(E_ALL and E_NOTICE);
        session_start();

        $a = $_SESSION['nombre'];

        $bitacoraf= new Bitacora();
        $bitacoraf->operacion="Modificar";
        $bitacoraf->tabla="departamentos";
        $bitacoraf->usuario=$a->nombre;
        event(new llamada($bitacoraf));

        $departamento = Departamento::findOrFail($id);

        return view('SitioCompartido.GestionarDepartamento.edit', compact('departamento'));
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
			'nombre' => 'required|max:180'
		]);
        $requestData = $request->all();
        
        $departamento = Departamento::findOrFail($id);
        $departamento->update($requestData);

        Session::flash('flash_message', 'Departamento updated!');

        error_reporting(E_ALL and E_NOTICE);
        session_start();

        $a = $_SESSION['nombre'];

        $bitacoraf= new Bitacora();
        $bitacoraf->operacion="Actualizar";
        $bitacoraf->tabla="departamentos";
        $bitacoraf->usuario=$a->nombre;
        event(new llamada($bitacoraf));

        return redirect('SitioCompartido/GestionarDepartamento');
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
        Departamento::destroy($id);

        Session::flash('flash_message', 'Departamento deleted!');

        error_reporting(E_ALL and E_NOTICE);
        session_start();

        $a = $_SESSION['nombre'];

        $bitacoraf= new Bitacora();
        $bitacoraf->operacion="Eliminar";
        $bitacoraf->tabla="departamentos";
        $bitacoraf->usuario=$a->nombre;
        event(new llamada($bitacoraf));

        return redirect('SitioCompartido/GestionarDepartamento');
    }
}
