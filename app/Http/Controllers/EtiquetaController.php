<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Etiqueta;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEtiquetaRequest;
use App\Http\Requests\UpdateEtiquetaRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class EtiquetaController extends Controller
{
    /* lo copiamos de EtiquetaController  */
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $etiquetasFilteredAndPaginated = Etiqueta::paginate();
        return view('dashboard.admin.etiquetas.index', [
            'data' => $etiquetasFilteredAndPaginated
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.etiquetas.create', [
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEtiquetaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEtiquetaRequest $request)
    {
        $input = array_filter($request->all());
        $etiqueta = Etiqueta::create($input);
        return redirect()->route('admin.etiquetas.index')->with('status', 'Etiqueta creado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etiqueta  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Etiqueta $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etiqueta  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Etiqueta $etiqueta)
    {
        return view('dashboard.admin.etiquetas.edit', [
            'data' => $etiqueta
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEtiquetaRequest  $request
     * @param  \App\Models\Etiqueta  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEtiquetaRequest $request, Etiqueta $etiqueta)
    {
        $input = array_filter($request->all());
        $etiqueta->update($input);
        $etiqueta->save();
        return redirect()->route('admin.etiquetas.index')->with('status', 'Etiqueta actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etiqueta  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etiqueta $etiqueta)
    {
        $etiqueta->delete();
        return redirect()->route('admin.etiquetas.index')->with('status', 'Etiqueta eliminado!');
    }
}
