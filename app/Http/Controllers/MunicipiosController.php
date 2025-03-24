<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Municipio;

class MunicipiosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $municipios = DB::table('tb_municipio')
            ->join('tb_municipio', 'tb_departamento.depa_codi', '=', 'tb_municipio.muni_codi')
            ->select('tb_municipio.*', 'tb_municipio.muni_nomb')
            ->get();
        return view("municipio.index", ['municipios' => $municipios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $municipios = DB::table('tb_departamento')
            ->orderBy('depa_nomb')
            ->get();
        return view('municipio.new', ['municipios' => $municipios]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $municipio = new Municipio();
        $municipio->comu_nomb = $request->name;
        $municipio->muni_codi = $request->code;
        $municipio->save();

        $municipios = DB::table('tb_municipio')
            ->join('tb_municipio', 'tb_municipio.muni_codi', '=', 'tb_municipio.muni_codi')
            ->select('tb_municipio.*', 'tb_municipio.muni_nomb')
            ->get();
        return view("municipio.index", ['municipios' => $municipios]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $municipio = Municipio::find($id);
        $departamentos = DB::table('tb_departamento')
            ->orderBy('muni_nomb')
            ->get();
        return view('municipio.edit', ['municipio' => $municipio, 'departamentos' => $departamentos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
