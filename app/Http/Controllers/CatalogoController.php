<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario_logueado = auth()->user()->name;
        $catalogos = Catalogo::all();
        return view('catalogos.index', ['usuario_logueado' => $usuario_logueado, 'catalogos' => $catalogos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario_logueado = auth()->user()->name;
        return view('catalogos.create', ['usuario_logueado' => $usuario_logueado]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $catalogos = new Catalogo();
        $catalogos->nombre = $request->get('nombre');
        $catalogos->estado = $request->get('estado');

        $catalogos->save();
        return redirect('catalogos');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catalogo  $catalogo
     * @return \Illuminate\Http\Response
     */
    public function show(Catalogo $catalogo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catalogo  $catalogo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catalogo = Catalogo::find($id);
        return view('catalogos.edit')->with('catalogo', $catalogo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catalogo  $catalogo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $catalogo = Catalogo::find($id);
        $catalogo->nombre = $request->get('nombre');
        $catalogo->estado = $request->get('estado');

        $catalogo->save();
        return redirect('catalogos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catalogo  $catalogo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catalogo = Catalogo::find($id);
        $catalogo->delete();
        return redirect('catalogos');
    }
}
