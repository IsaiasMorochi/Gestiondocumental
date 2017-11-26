<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Institucion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class InstitucionController extends Controller
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
            $institucion = Institucion::where('nombre', 'LIKE', "%$keyword%")
                ->orWhere('nit', 'LIKE', "%$keyword%")
                ->orWhere('estado', 'LIKE', "%$keyword%")
                ->orWhere('tipo', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $institucion = Institucion::paginate($perPage);
        }

        return view('AdmGeneral.GestionarInstitucion.index', compact('institucion'));
        //$pass = bcrypt("123456");
        //return json_encode(array("pass"=>$pass));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('AdmGeneral.GestionarInstitucion.create');
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
            'nombre' => 'required|max:80',
            'nit' => 'required'
        ]);
        $requestData = $request->all();
        
        Institucion::create($requestData);

        Session::flash('flash_message', 'Institucion added!');

        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $grupo = DB::table('users')
            ->select('users.id_grupo as g')
            ->where('users.email','=',$_SESSION['email'])
            ->first();
        if($grupo->g == 1){
            return redirect('SitioCompartido/GestionarDepartamento/create');
        } else {
            return redirect('AdmGeneral/GestionarInstitucion');
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
        $institucion = Institucion::findOrFail($id);

        return view('AdmGeneral.GestionarInstitucion.show', compact('institucion'));
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
        $institucion = Institucion::findOrFail($id);

        return view('AdmGeneral.GestionarInstitucion.edit', compact('institucion'));
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
            'nombre' => 'required|max:80',
            'nit' => 'required'
        ]);
        $requestData = $request->all();
        
        $institucion = Institucion::findOrFail($id);
        $institucion->update($requestData);

        Session::flash('flash_message', 'Institucion updated!');

        return redirect('AdmGeneral/GestionarInstitucion');
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
        Institucion::destroy($id);

        Session::flash('flash_message', 'Institucion deleted!');

        return redirect('AdmGeneral/GestionarInstitucion');
    }
}
