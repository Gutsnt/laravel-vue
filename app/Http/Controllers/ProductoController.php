<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoRequest;
use App\Http\Resources\ProductoResource;
use App\Models\Producto;

class ProductoController extends Controller
{
    // Obtener todos los productos
    public function index()
    {
        $productos = Producto::all();
        
        return response()->json([
            'productos' => ProductoResource::collection($productos),
            'message' => 'Productos obtenidos correctamente',
        ], 200);
    }

    // Crear un nuevo producto
    public function store(ProductoRequest $request)
    {
        $producto = new Producto;
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->referencia = $request->referencia;
        $producto->precio = $request->precio;
        $producto->save();
        return new ProductoResource($producto);
    }

    // Obtener un producto por su ID
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return new ProductoResource($producto);
    }

    // Actualizar un producto por su ID
    public function update(ProductoRequest $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->referencia = $request->referencia;
        $producto->precio = $request->precio;
        $producto->save();
        return new ProductoResource($producto);
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return response()->json(null, 204);
    }
}
