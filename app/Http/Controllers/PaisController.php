<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $paises = DB::table('tb_pais')
            ->join('tb_municipio', 'tb_pais.capi_codi', '=', 'tb_municipio.muni_codi')
            ->select('tb_pais.*', 'tb_municipio.muni_nomb')
            ->get();
        return view("pais.index", ['paises' => $paises]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $capitales = DB::table('tb_municipio')
            ->orderBy('muni_nomb')
            ->get();
        return view('pais.new', ['capitales' => $capitales]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pais = new Pais();
        $pais->pais_nomb = $request->name;
        $pais->capi_codi = $request->code;
        $pais->save();

        $paises = DB::table('tb_pais')
            ->join('tb_municipio', 'tb_pais.capi_codi', '=', 'tb_municipio.muni_codi')
            ->select('tb_pais.*', 'tb_municipio.muni_nomb')
            ->get();
        return view("pais.index", ['paises' => $paises]);
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
        $pais = Pais::find($id);
        $capitales = DB::table('tb_municipio')
            ->orderBy('muni_nomb')
            ->get();
        return view('pais.edit', ['pais' => $pais, 'capitales' => $capitales]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pais = Pais::find($id);

        $pais->pais_nomb = $request->name;
        $pais->capi_codi = $request->code;
        $pais->save();

        $paises = DB::table('tb_pais')
            ->join('tb_municipio', 'tb_pais.capi_codi', '=', 'tb_municipio.muni_codi')
            ->select('tb_pais.*', 'tb_municipio.muni_nomb')
            ->get();

        return view("pais.index", ['paises' => $paises]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pais = Pais::find($id);
        $pais->delete();

        $paises = DB::table('tb_pais')
            ->join('tb_municipio', 'tb_pais.capi_codi', '=', 'tb_municipio.muni_codi')
            ->select('tb_pais.*', 'tb_municipio.muni_nomb')
            ->get();

        return view("pais.index", ['paises' => $paises]);
    }
}
