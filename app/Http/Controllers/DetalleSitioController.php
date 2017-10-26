<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\DetalleSitio;
use Illuminate\Http\Request;
use Session;

class DetalleSitioController extends Controller
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
            $detallesitio = DetalleSitio::where('cargo', 'LIKE', "%$keyword%")
				->orWhere('estadoU', 'LIKE', "%$keyword%")
				->orWhere('id_institucion', 'LIKE', "%$keyword%")
				->orWhere('id_comentario', 'LIKE', "%$keyword%")
				->orWhere('id_users', 'LIKE', "%$keyword%")
				->orWhere('id_sitio', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $detallesitio = DetalleSitio::paginate($perPage);
        }

        return view('GestionDocumental.detalle-sitio.index', compact('detallesitio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('GestionDocumental.detalle-sitio.create');
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
			'cargo' => 'required',
			'estadoU' => 'required'
		]);
        $requestData = $request->all();
        
        DetalleSitio::create($requestData);

        Session::flash('flash_message', 'DetalleSitio added!');

        return redirect('detalle-sitio');
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
        $detallesitio = DetalleSitio::findOrFail($id);

        return view('GestionDocumental.detalle-sitio.show', compact('detallesitio'));
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
        $detallesitio = DetalleSitio::findOrFail($id);

        return view('GestionDocumental.detalle-sitio.edit', compact('detallesitio'));
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
			'cargo' => 'required',
			'estadoU' => 'required'
		]);
        $requestData = $request->all();
        
        $detallesitio = DetalleSitio::findOrFail($id);
        $detallesitio->update($requestData);

        Session::flash('flash_message', 'DetalleSitio updated!');

        return redirect('detalle-sitio');
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
        DetalleSitio::destroy($id);

        Session::flash('flash_message', 'DetalleSitio deleted!');

        return redirect('detalle-sitio');
    }
}
