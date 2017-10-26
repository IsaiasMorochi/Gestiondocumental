<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Grupo;
use Illuminate\Http\Request;
use Session;
use DB;
class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $institucion= $_SESSION['institucion'];
        $institucion->id;
        $grupos = DB::table('grupos as g')->where('g.id','>','1')
            ->where('g.id_institucion','=',$institucion->id)
            ->get();
        $casos = DB::table('cu')->get();

        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $grupo = DB::table('users')
            ->select('users.id_grupo as g')
            ->where('users.email','=',$_SESSION['email'])
            ->first();

        if($grupo->g == 1){

            $grupos = DB::table('grupos as g')->where('g.id','>','1')->get();
            $casos = DB::table('cu')->get();
        } else{

            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $institucion= $_SESSION['institucion'];
            $institucion->id;
            $grupos = DB::table('grupos as g')->where('g.id','>','1')
                ->where('g.id_institucion','=',$institucion->id)
                ->get();
            $casos = DB::table('cu')->get();
        }

        return view('Usuario.GestionarGrupo.index', compact('grupos','casos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('Usuario.GestionarGrupo.create');
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
			'descripcion' => 'required|max:80'
		]);
        $requestData = $request->all();
        
        Grupo::create($requestData);

        Session::flash('flash_message', 'Grupo added!');


        return redirect('grupo');
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
        $grupo = Grupo::findOrFail($id);

        return view('Usuario.GestionarGrupo.show', compact('grupo'));
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
        $grupo = Grupo::findOrFail($id);

        return view('Usuario.GestionarGrupo.edit', compact('grupo'));
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
			'descripcion' => 'required|max:80'
		]);
        $requestData = $request->all();
        
        $grupo = Grupo::findOrFail($id);
        $grupo->update($requestData);

        Session::flash('flash_message', 'Grupo updated!');

        return redirect('grupo');
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
        Grupo::destroy($id);

        Session::flash('flash_message', 'Grupo deleted!');

        return redirect('grupo');
    }
}
