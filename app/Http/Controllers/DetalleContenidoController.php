<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\DetalleContenido;
use Illuminate\Http\Request;
use Session;

class DetalleContenidoController extends Controller
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
            $detallecontenido = DetalleContenido::where('fecha', 'LIKE', "%$keyword%")
				->orWhere('id_institucion', 'LIKE', "%$keyword%")
				->orWhere('id_documento', 'LIKE', "%$keyword%")
				->orWhere('id_directorio', 'LIKE', "%$keyword%")
				->orWhere('id_sitio', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $detallecontenido = DetalleContenido::paginate($perPage);
        }

        return view('GestionDocumental.detalle-contenido.index', compact('detallecontenido'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('GestionDocumental.detalle-contenido.create');
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
			'fecha' => 'required'
		]);
        $requestData = $request->all();
        
        DetalleContenido::create($requestData);

        Session::flash('flash_message', 'DetalleContenido added!');

        return redirect('detalle-contenido');
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
        $detallecontenido = DetalleContenido::findOrFail($id);

        return view('GestionDocumental.detalle-contenido.show', compact('detallecontenido'));
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
        $detallecontenido = DetalleContenido::findOrFail($id);

        return view('GestionDocumental.detalle-contenido.edit', compact('detallecontenido'));
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
			'fecha' => 'required'
		]);
        $requestData = $request->all();
        
        $detallecontenido = DetalleContenido::findOrFail($id);
        $detallecontenido->update($requestData);

        Session::flash('flash_message', 'DetalleContenido updated!');

        return redirect('detalle-contenido');
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
        DetalleContenido::destroy($id);

        Session::flash('flash_message', 'DetalleContenido deleted!');

        return redirect('detalle-contenido');
    }
}
