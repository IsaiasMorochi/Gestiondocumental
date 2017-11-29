<?php

namespace Unisharp\Laravelfilemanager\controllers;

use App\WorkflowUsuario;
use Unisharp\Laravelfilemanager\traits\LfmHelpers;

/**
 * Class LfmController.
 */
class LfmController extends Controller
{
    use LfmHelpers;

    protected static $success_response = 'OK';

    public function __construct()
    {
        $this->applyIniOverrides();
    }

    /**
     * Show the filemanager.
     *
     * @return mixed
     */
    public function show()
    {
        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $path =$_SESSION['path'];
        if(strlen($path)>0){
           $tok= WorkflowUsuario::verificar($path);
            $_SESSION['path']="";
        }
        return view('laravel-filemanager::index',["dato"=>$tok,"ruta"=>$path]);
        //return $tok;
    }

    public function getErrors()
    {
        $arr_errors = [];

        if (! extension_loaded('gd') && ! extension_loaded('imagick')) {
            array_push($arr_errors, trans('laravel-filemanager::lfm.message-extension_not_found'));
        }

        $type_key = $this->currentLfmType();
        $mine_config = 'lfm.valid_' . $type_key . '_mimetypes';
        $config_error = null;

        if (! is_array(config($mine_config))) {
            array_push($arr_errors, 'Config : ' . $mine_config . ' is not a valid array.');
        }

        return $arr_errors;
    }
}
