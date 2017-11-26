<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Sitio;
use Illuminate\Http\Request;
use Session;

class SitioController extends Controller
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
            $sitio = Sitio::where('nombre', 'LIKE', "%$keyword%")
				->orWhere('id_institucion', 'LIKE', "%$keyword%")
				->orWhere('id_users', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $sitio = Sitio::paginate($perPage);
        }

        return view('SitioCompartido.GestionarSitio.index', compact('sitio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('SitioCompartido.GestionarSitio.create');
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
			'nombre' => 'required|max:60'
		]);
        $requestData = $request->all();
        
        Sitio::create($requestData);

        Session::flash('flash_message', 'Sitio added!');

        return redirect('sitio');
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
        $sitio = Sitio::findOrFail($id);

        return view('GestionDocumental.sitio.show', compact('sitio'));
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
        $sitio = Sitio::findOrFail($id);

        return view('GestionDocumental.sitio.edit', compact('sitio'));
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
			'nombre' => 'required|max:60'
		]);
        $requestData = $request->all();
        
        $sitio = Sitio::findOrFail($id);
        $sitio->update($requestData);

        Session::flash('flash_message', 'Sitio updated!');

        return redirect('sitio');
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
        Sitio::destroy($id);

        Session::flash('flash_message', 'Sitio deleted!');

        return redirect('sitio');
    }
}
