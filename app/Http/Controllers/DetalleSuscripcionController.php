<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\DetalleSuscripcion;
use Illuminate\Http\Request;
use Session;

class DetalleSuscripcionController extends Controller
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
            $detallesuscripcion = DetalleSuscripcion::where('estado', 'LIKE', "%$keyword%")
				->orWhere('id_institucion', 'LIKE', "%$keyword%")
				->orWhere('id_suscripcion', 'LIKE', "%$keyword%")
				->orWhere('id_documento', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $detallesuscripcion = DetalleSuscripcion::paginate($perPage);
        }

        return view('GestionDocumental.detalle-suscripcion.index', compact('detallesuscripcion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('GestionDocumental.detalle-suscripcion.create');
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
        
        DetalleSuscripcion::create($requestData);

        Session::flash('flash_message', 'DetalleSuscripcion added!');

        return redirect('detalle-suscripcion');
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
        $detallesuscripcion = DetalleSuscripcion::findOrFail($id);

        return view('GestionDocumental.detalle-suscripcion.show', compact('detallesuscripcion'));
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
        $detallesuscripcion = DetalleSuscripcion::findOrFail($id);

        return view('GestionDocumental.detalle-suscripcion.edit', compact('detallesuscripcion'));
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
        
        $detallesuscripcion = DetalleSuscripcion::findOrFail($id);
        $detallesuscripcion->update($requestData);

        Session::flash('flash_message', 'DetalleSuscripcion updated!');

        return redirect('detalle-suscripcion');
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
        DetalleSuscripcion::destroy($id);

        Session::flash('flash_message', 'DetalleSuscripcion deleted!');

        return redirect('detalle-suscripcion');
    }
}
