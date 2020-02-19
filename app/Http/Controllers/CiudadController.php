<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ciudad;
use Illuminate\Support\Facades\Log;

class CiudadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return response()->json(Ciudad::all());
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
            return response()->json(Ciudad::find($id));
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(null);
        }
    }
}
