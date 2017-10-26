<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Historial;
use Illuminate\Http\Request;
use Session;

class HistorialController extends Controller
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
            $historial = Historial::where('fecha', 'LIKE', "%$keyword%")
				->orWhere('hora', 'LIKE', "%$keyword%")
				->orWhere('descripcionM', 'LIKE', "%$keyword%")
				->orWhere('id_institucion', 'LIKE', "%$keyword%")
				->orWhere('id_documento', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $historial = Historial::paginate($perPage);
        }

        return view('GestionDocumental.historial.index', compact('historial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('GestionDocumental.historial.create');
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
			'fecha' => 'required',
			'hora' => 'required'
		]);
        $requestData = $request->all();
        
        Historial::create($requestData);

        Session::flash('flash_message', 'Historial added!');

        return redirect('historial');
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
        $historial = Historial::findOrFail($id);

        return view('GestionDocumental.historial.show', compact('historial'));
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
        $historial = Historial::findOrFail($id);

        return view('GestionDocumental.historial.edit', compact('historial'));
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
			'fecha' => 'required',
			'hora' => 'required'
		]);
        $requestData = $request->all();
        
        $historial = Historial::findOrFail($id);
        $historial->update($requestData);

        Session::flash('flash_message', 'Historial updated!');

        return redirect('historial');
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
        Historial::destroy($id);

        Session::flash('flash_message', 'Historial deleted!');

        return redirect('historial');
    }
}
