<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Ciudad;
use Illuminate\Support\Facades\Validator;
use App\UsuarioConcurso;

class UsuarioConcursoController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = [
            'success' => false,
            'message' => '',
            'data' => null,
            'errors' => [],
        ];

        try {
            $nameValidationRule = 'regex:/^[a-zA-ZÀ-ÿ]+((\s)+([a-zA-ZÀ-ÿ])+)*$/';
            if(empty($request->email)) {
                $request->email = null;
            }
            // establecemos las reglas de validación
            $rules = [
                'cedula' => ['required', 'unique:App\UsuarioConcurso,cedula', 'digits_between:5,12'],
                'nombre' => ['required', $nameValidationRule, 'between:3,20'],
                'apellido' => ['required', $nameValidationRule, 'between:3,20'],
                'ciudad' => ['required', 'integer', 'exists:ciudades,id'],
                'celular' => ['required', 'digits_between:7,10'],
                'email' => ['email', 'nullable'],
                'habeas_data' => ['required', 'accepted'],
            ];
            // realizamos las validaciones respectivas
            $validator = Validator::make($request->all(), $rules);

            // evaluamos el resultado de la validacion
            if($validator->fails()) {
                $result['errors'] = $validator->errors();
                throw new \Exception('Error de validación de datos', -911);
            }

            // si las validaciones funcionan, creamos una instancia del modelo
            $model = new UsuarioConcurso;
            $model->cedula = $request->cedula;
            $model->nombre = $request->nombre;
            $model->apellido = $request->apellido;
            $model->celular = $request->celular;
            $model->correo = $request->email;
            $model->ciudad_id = $request->ciudad;
            $model->habeas_data = $request->habeas_data;

            // guardamos el modelo
            $model->save();

            $result['success'] = true;
        } catch (\Exception $e) {
            Log::error($e);
            // evaluamos el codigo -911 (mensajes controlados) de lo contrarios enviamos un mensaje generico a interfaz
            $result['message'] = ($e->getCode() == -911) ? $e->getMessage() : 'Ocurrió un error inesperado, por favor intente mas tarde.';
            $result['success'] = false;
        }

        return response()->json($result);
    }

    public function ganador() {
        $result = [
            'success' => false,
            'message' => '',
            'data' => null,
            'errors' => [],
        ];

        try {
            // obtenemos los concursantes
            $listado = UsuarioConcurso::all();

            // evaluamos la cantidad de participantes
            if($listado->count() < 5) {
                throw new \Exception("No hay suficientes usuarios para realizar el sorteo", -911);
            }

            // seleccionamos al ganador
            $ganador = $listado->random();
            // liberamos memoria
            unset($listado);

            $data = [
                'cedula' => $ganador->cedula,
                'nombre' => $ganador->nombre,
                'apellido' => $ganador->apellido,
                'celular' => $ganador->celular,
            ];

            // liberamos memoria
            unset($ganador);

            // preparamos la salida
            $result['success'] = true;
            $result['data'] = $data;
        } catch (\Exception $e) {
            Log::error($e);
            // evaluamos el codigo -911 (mensajes controlados) de lo contrarios enviamos un mensaje generico a interfaz
            $result['message'] = ($e->getCode() == -911) ? $e->getMessage() : 'Ocurrió un error inesperado, por favor intente mas tarde.';
            $result['success'] = false;
        }

        return response()->json($result);
    }

}
