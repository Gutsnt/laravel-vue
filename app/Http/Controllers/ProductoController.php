<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoRequest;
use App\Http\Resources\ProductoResource;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Obtener todos los productos
    public function index()
    {
        $productos = Producto::with('variaciones')->get();
        return response()->json([
            'productos' => $productos,
            'message' => 'Productos obtenidos correctamente',
        ], 200);
    }

    // Crear un nuevo producto
    public function store(Request $request)
    {
        $producto = new Producto;
        $producto->nombre = $request->name;
        $producto->descripcion = $request->descripcion;
        $producto->referencia = $request->referencia;
        $producto->precio = $request->precio;
        $producto->save();

        return response()->json([
            'producto' => ($producto),
            'message' => 'Productos obtenidos correctamente',
        ], 200);
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
        
        return response()->json([
            'producto' => ($producto),
            'message' => 'Productos actualizado',
        ], 200);
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return response()->json(null, 204);
    }
}
