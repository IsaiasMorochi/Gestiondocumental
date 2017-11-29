<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Workflow;
use App\WorkflowUsuario;
use App\Documento;
use App\User;
use Illuminate\Http\Request;
use Session;
use DB;
class WorkflowController extends Controller
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
            $workflow = Workflow::where('descripcion', 'LIKE', "%$keyword%")
				->orWhere('porcentaje', 'LIKE', "%$keyword%")
				->orWhere('fechaI', 'LIKE', "%$keyword%")
				->orWhere('fechaF', 'LIKE', "%$keyword%")
				->orWhere('prioridad', 'LIKE', "%$keyword%")
				->orWhere('id_institucion', 'LIKE', "%$keyword%")
				->orWhere('id_documento', 'LIKE', "%$keyword%")
				->orWhere('id_users', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            error_reporting(E_ALL and E_NOTICE);
        session_start();
        $var = $_SESSION['institucion'];
            $workflow = DB::table('workflows as w')
                        ->select('w.*')
                        ->where('w.id_institucion','=',$var->id)
                        ->get();
        }
           
        return view('Documento.GestionarWorkflow.index', compact('workflow'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('Documento.GestionarWorkflow.create',["documentos"=>Documento::all()]);
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
        Workflow::insertar($request);
        return redirect('Documento/GestionarWorkflow');
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
        $workflow = Workflow::findOrFail($id);

        return view('GestionDocumental.workflow.show', compact('workflow'));
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
        $workflow = Workflow::findOrFail($id);

        return view('GestionDocumental.workflow.edit', compact('workflow'));
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
			'porcentaje' => 'required',
			'fechaI' => 'required',
			'fechaF' => 'required',
			'prioridad' => 'required|max:25'
		]);
        $requestData = $request->all();
        
        $workflow = Workflow::findOrFail($id);
        $workflow->update($requestData);

        Session::flash('flash_message', 'Workflow updated!');

        return redirect('Documento/GestionarWorkflow');
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
        Workflow::destroy($id);

        Session::flash('flash_message', 'Workflow deleted!');

        return redirect('workflow');
    }

    public function realizar($id){
        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $var = $_SESSION['institucion'];
        $usuarios = DB::table('users as u')
                    ->join('departamentos as dep','dep.id','=','u.id_dpto')
                    ->join('institucions as i','i.id','=','dep.id_institucion')
                    ->select('u.id','u.nombre','u.apellido')
                    ->where('i.id','=',$var->id)
                    ->get();
        $nameWork = DB::table('workflows as wk')->select('wk.descripcion')->where('wk.id','=',$id)->get();
        return view('Documento.GestionarWorkflow.asignacion',['idworkflow'=>$id,"usuarios"=>$usuarios,"nameWork"=>$nameWork]);
    }


    public function send(Request $request){
        $users = $request->get('usuarios');
        $descripciones = $request->get('descripcion');
        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $var = $_SESSION['institucion'];
        $idcreador = $_SESSION['id'];
        $cont = 0;
        while($cont<count($users)){
            WorkflowUsuario::insertar($descripciones[$cont],$var->id,$request->get('idworkflow'),$users[$cont],$request->get('nameWork'));
            $this->copiarArchivo($request->get('nameWork'),$users[$cont],$idcreador->id);
            $cont++;
        }

        $result = DB::table('users as u')
                ->join('workflow_usuarios as wu','wu.id_users','=','u.id')
                ->select('token')
                ->where('wu.id_workflow','=',$request->get('idworkflow'))
                ->get();
        $tokens = array();

        for ($i=0; $i <sizeof($result) ; $i++) {
            $tokens = array_prepend($tokens,$result[$i]->token);
        }

        $message = array("message"=>"Se le a asignado un nueva tarea");

        $this->send_notification($tokens,$message);


        return Redirect::to('Documento/GestionarWorkflow');
        //return $url;
    }

    public static function send_notification ($tokens, $message){
            $url = 'https://fcm.googleapis.com/fcm/send';
            $fields = array(
                    'registration_ids' => $tokens,
                    'data' => $message
                ); 

            $headers = array(
                    'Authorization:key = AAAA_Ayb9x8:APA91bERsYBDSeWAb7fL_gHAA9W6oEwJ5R6zZAgN5iR8_EjfZmtAs9v-tnavRWHxFGa717ffVeFRODF1IYUNtHPkxBJk6U1PM1K-C4a1yp_YSaQvDh-mygUq7TLQIh8QbLl49GwvcFnM',
                    'Content-Type: application/json'
                );
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

            $result = curl_exec($ch);
            if($result == FALSE){
                die('Curl failed: ' . curl_error($ch));
            }
            
            curl_close($ch);
            return $result;
    }

    public function copiarArchivo($fileName, $idasignado,$idcreador){
        if(!is_dir(public_path().'/files/'.$idasignado)){
            $user = User::findOrFail($idasignado);
            DirectorioController::crearDirPrincipales($idasignado,$user->id_grupo);
        }

        if(!is_dir(public_path().'/files/'.$idasignado.'/Workflow/Workflow Asignados/'.$fileName)){
            mkdir(public_path().'/files/'.$idasignado.'/Workflow/Workflow Asignados/'.$fileName,0777);
        }

        $sw = true; $cont=1;
        while ($sw && $cont>0){
            //if(!file_exists(public_path().'/files/'.$idasignado.'/Workflow/Workflow Asignados/'.$fileName.'/'.$fileName.'-v'.$cont.'.docx')){
            if(!file_exists(public_path().'/files/'.$idasignado.'/Workflow/Workflow Asignados/'.$fileName.'/'.$fileName.'docx')){
                copy(public_path().'/files/'.$idcreador.'/Workflow/Workflow Creados/'.$fileName.'/'.$fileName.'.docx',public_path().'/files/'.$idasignado.'/Workflow/Workflow Asignados/'.$fileName.'/'.$fileName.'-v'.$cont.'.docx');
                $sw=false;
            }
            $cont++;
        }
    }
}
