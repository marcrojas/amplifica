<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{

    public function listado_productos(){

        return view("productos.listado_productos");

    }


    public function modal_productos(){


        return view("productos.modal_productos");
    }


}
