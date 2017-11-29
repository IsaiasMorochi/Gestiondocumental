<?php

namespace App\Http\Controllers;

use App\DetalleSuscripcion;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Suscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;
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
    public function create($datos)
    {
  //      return view('GestionDocumental.suscripcion.create');
        echo $datos->path;
    }
    public function suscrib($datos){
        echo json_encode(array("result"=>$datos));
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
    public function subs(Request $req){
        $i = strpos($req->dato,"shares");
        $str=$req->get('dato');
        $c=0;$substring="";
        while ($c<2 && $i>0){
            if($str[$i]=='/') $c++;
            $substring.=$str[$i];
            $i++;
        }
        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $inst = $_SESSION['institucion'];
        $iduser=$_SESSION['id'];
        /*$inst = DB::table('institucions as i')
                ->join('departamentos as d','d.id','=','i.id')
            ->join('users as u','u.id_dpto','=','d.id')
            ->select('i.id')
            ->where('u.id','=',$iduser->id)
            ->first();*/
        //NO QUIERE INSERTAR XQ NO RECUPERA EL ID DE INSTITUCION
        Suscripcion::insertar('activo',$inst->id,$iduser->id);
        DetalleSuscripcion::insertar($inst->id,DB::table('suscripcions')->select('id')->orderBy('id','desc')->first(),$substring);

        return view ('Herramienta.ConsultarBitacora.index',["url"=>$i,"pos"=>$req->dato,"substring"=>$substring]);
    }
    public function edit($datos)
    {
        return view ('Herramienta.ConsultarBitacora.index',["url"=>$datos]);

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
