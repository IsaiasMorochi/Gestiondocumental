<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Permiso;
use Illuminate\Http\Request;
use Session;

class PermisoController extends Controller
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
            $permiso = Permiso::where('descripcion', 'LIKE', "%$keyword%")
				->orWhere('id_institucion', 'LIKE', "%$keyword%")
				->orWhere('id_documento', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $permiso = Permiso::paginate($perPage);
        }

        return view('GestionDocumental.permiso.index', compact('permiso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('GestionDocumental.permiso.create');
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
        
        Permiso::create($requestData);

        Session::flash('flash_message', 'Permiso added!');

        return redirect('permiso');
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
        $permiso = Permiso::findOrFail($id);

        return view('GestionDocumental.permiso.show', compact('permiso'));
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
        $permiso = Permiso::findOrFail($id);

        return view('GestionDocumental.permiso.edit', compact('permiso'));
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
        
        $permiso = Permiso::findOrFail($id);
        $permiso->update($requestData);

        Session::flash('flash_message', 'Permiso updated!');

        return redirect('permiso');
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
        Permiso::destroy($id);

        Session::flash('flash_message', 'Permiso deleted!');

        return redirect('permiso');
    }
}
