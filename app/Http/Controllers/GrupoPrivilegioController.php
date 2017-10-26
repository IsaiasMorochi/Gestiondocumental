<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\GrupoPrivilegio;
use Illuminate\Http\Request;
use Session;

class GrupoPrivilegioController extends Controller
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
            $grupoprivilegio = GrupoPrivilegio::where('estado', 'LIKE', "%$keyword%")
				->orWhere('id_institucion', 'LIKE', "%$keyword%")
				->orWhere('id_grupo', 'LIKE', "%$keyword%")
				->orWhere('id_privilegio', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $grupoprivilegio = GrupoPrivilegio::paginate($perPage);
        }

        return view('GestionDocumental.grupo-privilegio.index', compact('grupoprivilegio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('GestionDocumental.grupo-privilegio.create');
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
        
        $requestData = $request->all();
        
        GrupoPrivilegio::create($requestData);

        Session::flash('flash_message', 'GrupoPrivilegio added!');

        return redirect('grupo-privilegio');
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
        $grupoprivilegio = GrupoPrivilegio::findOrFail($id);

        return view('GestionDocumental.grupo-privilegio.show', compact('grupoprivilegio'));
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
        $grupoprivilegio = GrupoPrivilegio::findOrFail($id);

        return view('GestionDocumental.grupo-privilegio.edit', compact('grupoprivilegio'));
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
        
        $requestData = $request->all();
        
        $grupoprivilegio = GrupoPrivilegio::findOrFail($id);
        $grupoprivilegio->update($requestData);

        Session::flash('flash_message', 'GrupoPrivilegio updated!');

        return redirect('grupo-privilegio');
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
        GrupoPrivilegio::destroy($id);

        Session::flash('flash_message', 'GrupoPrivilegio deleted!');

        return redirect('grupo-privilegio');
    }
}
