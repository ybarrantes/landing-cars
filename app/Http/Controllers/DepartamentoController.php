<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Departamento;
use Illuminate\Support\Facades\Log;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return response()->json(Departamento::all());
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(null);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            return response()->json(Departamento::find($id));
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(null);
        }
    }

    public function ciudades($id) {
        try {
            return response()->json(Departamento::find($id)->ciudades);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(null);
        }
    }

}
