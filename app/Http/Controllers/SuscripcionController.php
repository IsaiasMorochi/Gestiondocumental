<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Suscripcion;
use Illuminate\Http\Request;
use Session;

class SuscripcionController extends Controller
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
            $suscripcion = Suscripcion::where('descripcion', 'LIKE', "%$keyword%")
				->orWhere('id_institucion', 'LIKE', "%$keyword%")
				->orWhere('id_users', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $suscripcion = Suscripcion::paginate($perPage);
        }

        return view('GestionDocumental.suscripcion.index', compact('suscripcion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('GestionDocumental.suscripcion.create');
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
        
        Suscripcion::create($requestData);

        Session::flash('flash_message', 'Suscripcion added!');

        return redirect('suscripcion');
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
        $suscripcion = Suscripcion::findOrFail($id);

        return view('GestionDocumental.suscripcion.show', compact('suscripcion'));
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
        $suscripcion = Suscripcion::findOrFail($id);

        return view('GestionDocumental.suscripcion.edit', compact('suscripcion'));
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
        
        $suscripcion = Suscripcion::findOrFail($id);
        $suscripcion->update($requestData);

        Session::flash('flash_message', 'Suscripcion updated!');

        return redirect('suscripcion');
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
        Suscripcion::destroy($id);

        Session::flash('flash_message', 'Suscripcion deleted!');

        return redirect('suscripcion');
    }
}
