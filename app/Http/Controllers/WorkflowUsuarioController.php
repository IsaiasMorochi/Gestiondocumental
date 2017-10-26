<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\WorkflowUsuario;
use Illuminate\Http\Request;
use Session;

class WorkflowUsuarioController extends Controller
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
            $workflowusuario = WorkflowUsuario::where('descripcion', 'LIKE', "%$keyword%")
				->orWhere('fecha', 'LIKE', "%$keyword%")
				->orWhere('id_institucion', 'LIKE', "%$keyword%")
				->orWhere('id_workflow', 'LIKE', "%$keyword%")
				->orWhere('id_users', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $workflowusuario = WorkflowUsuario::paginate($perPage);
        }

        return view('GestionDocumental.workflow-usuario.index', compact('workflowusuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('GestionDocumental.workflow-usuario.create');
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
			'descripcion' => 'required|max:180',
			'fecha' => 'required'
		]);
        $requestData = $request->all();
        
        WorkflowUsuario::create($requestData);

        Session::flash('flash_message', 'WorkflowUsuario added!');

        return redirect('workflow-usuario');
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
        $workflowusuario = WorkflowUsuario::findOrFail($id);

        return view('GestionDocumental.workflow-usuario.show', compact('workflowusuario'));
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
        $workflowusuario = WorkflowUsuario::findOrFail($id);

        return view('GestionDocumental.workflow-usuario.edit', compact('workflowusuario'));
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
			'descripcion' => 'required|max:180',
			'fecha' => 'required'
		]);
        $requestData = $request->all();
        
        $workflowusuario = WorkflowUsuario::findOrFail($id);
        $workflowusuario->update($requestData);

        Session::flash('flash_message', 'WorkflowUsuario updated!');

        return redirect('workflow-usuario');
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
        WorkflowUsuario::destroy($id);

        Session::flash('flash_message', 'WorkflowUsuario deleted!');

        return redirect('workflow-usuario');
    }
}
