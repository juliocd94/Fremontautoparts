<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario_logueado = auth()->user()->name;
        $productos = Producto::all();
        return view('productos.index', ['usuario_logueado' => $usuario_logueado, 'productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario_logueado = auth()->user()->name;
        return view('productos.create')->with('usuario', $usuario_logueado);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $estado = $request->estado;
        $stok = $request->stok;
        $image = $request->file('image');
        $imageName = time(). '.' .$image->extension();
        $image->move(public_path('images'),$imageName);

        $producto = new Producto();
        $producto->name= $name;
        $producto->image = $imageName;
        $producto->estado = $estado;
        $producto->stok = $stok;
        $producto->save();
        return redirect('productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        return view('productos.edit')->with('producto', $producto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        // $request = 
        // $request->validate([
        //     'name' => 'required', 'stock' => 'required', 'estado' => 'estado'
        // ]);
        // $prod = $request->all();
        // if($image $request->file('image')){
        //     $rutaGuardarImg = 'image/';
        //     $imageProducto = date('YmdHis'). "." . $image->getClientOriginalExtension();
        //     $image->move(public_path('images'),$imageName);
        //     $prod[ímage] = "imagenProducto";
        // }else{
        //     unset($prod['image']);
        // }
        // $producto->update($prod);
        // return redirect()->route('productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        return redirect('productos');
    }
}
