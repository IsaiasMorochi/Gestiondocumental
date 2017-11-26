<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Directorio;
use Illuminate\Http\Request;
use Session;

class DirectorioController extends Controller
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
            $directorio = Directorio::where('nombre', 'LIKE', "%$keyword%")
				->orWhere('id_institucion', 'LIKE', "%$keyword%")
				->orWhere('id_directorio', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $directorio = Directorio::paginate($perPage);
        }

        return view('GestionDocumental.directorio.index', compact('directorio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('GestionDocumental.directorio.create');
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
        
        Directorio::create($requestData);

        Session::flash('flash_message', 'Directorio added!');

        return redirect('directorio');
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
        $directorio = Directorio::findOrFail($id);

        return view('GestionDocumental.directorio.show', compact('directorio'));
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
        $directorio = Directorio::findOrFail($id);

        return view('GestionDocumental.directorio.edit', compact('directorio'));
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
        
        $directorio = Directorio::findOrFail($id);
        $directorio->update($requestData);

        Session::flash('flash_message', 'Directorio updated!');

        return redirect('directorio');
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
        Directorio::destroy($id);

        Session::flash('flash_message', 'Directorio deleted!');

        return redirect('directorio');
    }

    public static function crearDirPrincipales($id){
        mkdir(public_path().'/files/'.$id);
        mkdir(public_path().'/files/'.$id.'/Workflow');
        mkdir(public_path().'/files/'.$id.'/Workflow/Workflow Creados');
        mkdir(public_path().'/files/'.$id.'/Workflow/Workflow Asignados');
    }
}
