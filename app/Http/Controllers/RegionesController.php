<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegionesController extends Controller
{

    public function regiones(\App\Services\AmplificaClient $client){

        $regiones = $client->regionalConfig();

        return view("regiones.regiones", compact("regiones"));

    }

}
