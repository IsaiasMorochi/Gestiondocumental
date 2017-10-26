<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Privilegio;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

class PrivilegioController extends Controller
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
            $privilegio = Privilegio::where('descripcion', 'LIKE', "%$keyword%")
				->orWhere('id_institucion', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $privilegio = Privilegio::paginate($perPage);
        }

        return view('Usuario.GestionarPrivilegio.index', compact('privilegio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('GestionDocumental.privilegio.create');
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
        $insert = $request->get('insert');
        $edit = $request->get('edit');
        $delete = $request->get('delete');
        $idgrupo = $request->get('idgrupo');
        $cont = 0;
        while($cont<count($insert)){
            if(is_null(Privilegio::exist($idgrupo,$insert[$cont]))){
                Privilegio::insI($idgrupo,$insert[$cont]);
            }else{
                Privilegio::updI(Privilegio::exist($idgrupo,$insert[$cont]));
            }
            $cont=$cont+1;
        }
        $cont = 0;
        while($cont<count($edit)){
            if(is_null(Privilegio::exist($idgrupo,$edit[$cont]))){
                Privilegio::insE($idgrupo,$edit[$cont]);
            }else{
                Privilegio::updE(Privilegio::exist($idgrupo,$edit[$cont]));
            }
            $cont=$cont+1;
        }
        $cont = 0;
        while($cont<count($delete)){
            if(is_null(Privilegio::exist($idgrupo,$delete[$cont]))){
                Privilegio::insD($idgrupo,$delete[$cont]);
            }else{
                Privilegio::updD(Privilegio::exist($idgrupo,$delete[$cont]));
            }
            $cont=$cont+1;
        }
        return Redirect::to('Usuario/GestionarGrupo');
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
        $privilegio = Privilegio::findOrFail($id);

        return view('GestionDocumental.privilegio.show', compact('privilegio'));
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
        $privilegio = Privilegio::findOrFail($id);

        return view('GestionDocumental.privilegio.edit', compact('privilegio'));
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
			'descripcion' => 'required|max:180'
		]);
        $requestData = $request->all();
        
        $privilegio = Privilegio::findOrFail($id);
        $privilegio->update($requestData);

        Session::flash('flash_message', 'Privilegio updated!');

        return redirect('privilegio');
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
        Privilegio::destroy($id);

        Session::flash('flash_message', 'Privilegio deleted!');

        return redirect('privilegio');
    }
    public function usuariotema($t,$id){
        $usuario= User::findOrFail($id);
        $usuario->tema=$t;
        $usuario->update();
        User::obteneriduser();
        return redirect('inicio');

    }
    public function usuariobarra($b,$id){
        $usuario= User::findOrFail($id);
        $usuario->cbarra=$b;
        $usuario->update();
        User::obteneriduser();
        return redirect('inicio');

    }
    public function usuarioletra($l,$id){
        $usuario= User::findOrFail($id);
        $usuario->letra=$l;
        $usuario->update();
        User::obteneriduser();
        return redirect('inicio');

    }
}
