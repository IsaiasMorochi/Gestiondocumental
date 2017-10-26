<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PermisoDepartamento;
use Illuminate\Http\Request;
use Session;

class PermisoDepartamentoController extends Controller
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
            $permisodepartamento = PermisoDepartamento::where('estado', 'LIKE', "%$keyword%")
				->orWhere('id_institucion', 'LIKE', "%$keyword%")
				->orWhere('id_departamento', 'LIKE', "%$keyword%")
				->orWhere('id_permiso', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $permisodepartamento = PermisoDepartamento::paginate($perPage);
        }

        return view('GestionDocumental.permiso-departamento.index', compact('permisodepartamento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('GestionDocumental.permiso-departamento.create');
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
        
        PermisoDepartamento::create($requestData);

        Session::flash('flash_message', 'PermisoDepartamento added!');

        return redirect('permiso-departamento');
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
        $permisodepartamento = PermisoDepartamento::findOrFail($id);

        return view('GestionDocumental.permiso-departamento.show', compact('permisodepartamento'));
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
        $permisodepartamento = PermisoDepartamento::findOrFail($id);

        return view('GestionDocumental.permiso-departamento.edit', compact('permisodepartamento'));
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
        
        $permisodepartamento = PermisoDepartamento::findOrFail($id);
        $permisodepartamento->update($requestData);

        Session::flash('flash_message', 'PermisoDepartamento updated!');

        return redirect('permiso-departamento');
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
        PermisoDepartamento::destroy($id);

        Session::flash('flash_message', 'PermisoDepartamento deleted!');

        return redirect('permiso-departamento');
    }
}
