<?php

namespace App\Listeners;

use App\Events\Prueba;
use Illuminate\Queue\InteractsWithQueue;
use App\Categorium;
use App\Directorio;

use App\Institucion;
use Illuminate\Contracts\Queue\ShouldQueue;

class crearcategoria
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Prueba  $event
     * @return void
     */
    public function handle(Prueba $event)
    {
        $institucion= new Institucion();
        $institucion->nombre=$event->directorio->nombre;
        $institucion->nit=1000;
        $institucion->estado='bien';
        $institucion->tipo='todooooooo';

        $myfile = fopen(public_path()."/"."prueba".".json", "a") or die("Unable to open file!");
        fwrite($myfile, (json_encode(array($institucion))."\r\n"));

        $institucion->save();

    }
}
