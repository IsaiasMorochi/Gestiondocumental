<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\DirectorioDocumento;
use Illuminate\Http\Request;
use Session;

class DirectorioDocumentoController extends Controller
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
            $directoriodocumento = DirectorioDocumento::where('fecha', 'LIKE', "%$keyword%")
				->orWhere('id_institucion', 'LIKE', "%$keyword%")
				->orWhere('id_directorio', 'LIKE', "%$keyword%")
				->orWhere('id_documento', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $directoriodocumento = DirectorioDocumento::paginate($perPage);
        }

        return view('GestionDocumental.directorio-documento.index', compact('directoriodocumento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('GestionDocumental.directorio-documento.create');
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
        
        DirectorioDocumento::create($requestData);

        Session::flash('flash_message', 'DirectorioDocumento added!');

        return redirect('directorio-documento');
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
        $directoriodocumento = DirectorioDocumento::findOrFail($id);

        return view('GestionDocumental.directorio-documento.show', compact('directoriodocumento'));
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
        $directoriodocumento = DirectorioDocumento::findOrFail($id);

        return view('GestionDocumental.directorio-documento.edit', compact('directoriodocumento'));
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
        
        $directoriodocumento = DirectorioDocumento::findOrFail($id);
        $directoriodocumento->update($requestData);

        Session::flash('flash_message', 'DirectorioDocumento updated!');

        return redirect('directorio-documento');
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
        DirectorioDocumento::destroy($id);

        Session::flash('flash_message', 'DirectorioDocumento deleted!');

        return redirect('directorio-documento');
    }
}
