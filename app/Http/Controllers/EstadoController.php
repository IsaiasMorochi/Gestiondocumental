<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Estado;
use Illuminate\Http\Request;
use Session;

class EstadoController extends Controller
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
            $estado = Estado::where('descripcion', 'LIKE', "%$keyword%")
				->orWhere('id_institucion', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $estado = Estado::paginate($perPage);
        }

        return view('GestionDocumental.estado.index', compact('estado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('GestionDocumental.estado.create');
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
			'descripcion' => 'required|max:180'
		]);
        $requestData = $request->all();
        
        Estado::create($requestData);

        Session::flash('flash_message', 'Estado added!');

        return redirect('estado');
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
        $estado = Estado::findOrFail($id);

        return view('GestionDocumental.estado.show', compact('estado'));
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
        $estado = Estado::findOrFail($id);

        return view('GestionDocumental.estado.edit', compact('estado'));
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
        
        $estado = Estado::findOrFail($id);
        $estado->update($requestData);

        Session::flash('flash_message', 'Estado updated!');

        return redirect('estado');
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
        Estado::destroy($id);

        Session::flash('flash_message', 'Estado deleted!');

        return redirect('estado');
    }
}
