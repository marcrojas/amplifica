<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosAPIController extends Controller
{

    public function index()
    {
        return response()->json(Productos::orderBy('id', 'desc')->paginate(10));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'peso'   => 'required|numeric|min:0',
            'ancho'  => 'required|numeric|min:0',
            'alto'   => 'required|numeric|min:0',
            'largo'  => 'required|numeric|min:0',
            'stock'  => 'required|integer|min:0',
        ]);

        $product = Productos::create($data);
        return response()->json($product, 201);
    }


    public function show(Productos $producto)
    {
        return response()->json($producto);
    }


    public function update(Request $request, Productos $producto)
    {
        $data = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'precio' => 'sometimes|required|numeric|min:0',
            'peso'   => 'sometimes|required|numeric|min:0',
            'ancho'  => 'sometimes|required|numeric|min:0',
            'alto'   => 'sometimes|required|numeric|min:0',
            'largo'  => 'sometimes|required|numeric|min:0',
            'stock'  => 'sometimes|required|integer|min:0',
        ]);

        $producto->update($data);
        return response()->json($producto);
    }


    public function destroy(Productos $producto)
    {
        $producto->delete();
        return response()->noContent();
    }

}
