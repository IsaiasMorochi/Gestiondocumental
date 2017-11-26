<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('inicio', 'UserController@inicio');
Route::post('docsReport','PdfController@docsReport');

Route::resource('AdmGeneral/GestionarInstitucion', 'InstitucionController');
Route::resource('AdmGeneral/GestionarAdministrador', 'InstitucionController');
Route::resource('AdmGeneral/UsuarioG', 'UserController');


Route::resource('Usuario/AsignarPrivilegio', 'PrivilegioController');
Route::resource('Usuario/GestionarUsuario', 'UserController');
Route::resource('Usuario/GestionarGrupo', 'GrupoController');

Route::resource('admin/GenerarReporte', 'ReporteController');
Route::resource('admin/ConsultarBitacora', 'BitacoraController');



Route::get('Documento/asignacion/{id}', 'WorkflowController@realizar');
Route::post('Documento/sendnotificacion', 'WorkflowController@send');
Route::resource('Documento/GestionarWorkflow', 'WorkflowController');


Route::resource('SitioCompartido/GestionarDepartamento', 'DepartamentoController');


Route::resource('categoria', 'CategoriaController');
Route::resource('estado', 'EstadoController');

Route::resource('grupo', 'GrupoController');



Route::resource('permiso-departamento', 'PermisoDepartamentoController');
Route::resource('permiso', 'PermisoController');

Route::resource('historial', 'HistorialController');
Route::resource('directorio', 'DirectorioController');

Route::resource('detalle-suscripcion', 'DetalleSuscripcionController');



//Route::resource('SitioCompartido/GestionarSitio', 'SitioController');
Route::resource('comentario', 'ComentarioController');
Route::resource('detalle-sitio', 'DetalleSitioController');
Route::resource('detalle-contenido', 'DetalleContenidoController');
Route::resource('documento', 'DocumentoController');
Route::resource('grupo-privilegio', 'GrupoPrivilegioController');
Route::resource('suscripcion', 'SuscripcionController');
Route::resource('directorio-documento', 'DirectorioDocumentoController');
Route::resource('workflow-usuario', 'WorkflowUsuarioController');


Route::resource('privilegio','PrivilegioController');
Route::resource('iniciodesesion', 'LoginController');

Route::get('usuariot/{t}/{id}', 'PrivilegioController@usuariotema');
Route::get('usuariob/{b}/{id}', 'PrivilegioController@usuariobarra');
Route::get('usuariol/{l}/{id}', 'PrivilegioController@usuarioletra');

Route::get('actualizar', 'LoginController@act');

Route::group(['prefix'=>'report'],function() {
    Route::post('docs', ['uses' => 'ReporteController@docsReport']);
    Route::post('sitio', ['uses' => 'ReporteController@sitioReport']);
    Route::post('user', ['uses' => 'ReporteController@userReport']);
    Route::post('work', ['uses' => 'ReporteController@workReport']);
});


Route::get('admin/reporte','PdfController@index');

Route::get('admin/GenerarReporte/{tipo}','ReporteController@docsReport');


    Route::get('/SitioCompartido/GestionarSitio', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
    Route::post('/SitioCompartido/GestionarSitio/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload');
    // list all lfm routes here...


/////////////////////rutas android////////////////////////////
Route::group(['prefix'=>'apirest'],function(){
    Route::group(['prefix'=>'login'],function(){
        Route::get('{datos}',['uses'=>'AndroidController@login']);
    });
    Route::group(['prefix'=>'regtokenuser'],function(){
        Route::get('{datos}',['uses'=>'AndroidController@regToken']);
    });
    Route::group(['prefix'=>'workflow'],function(){
        Route::get('{id}',['uses'=>'AndroidController@getWorkflow']);
    });
});

Route::get('prueba','ComentarioController@prueba'); //puede borrar en cualquier momento

