<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioCampania extends Model
{
    /**
     * Tabla en base de datos
     *
     * @var string
     */
    protected $table = 'usuarios_campanias';

    /**
     * Obtiene la ciudad del usuario
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * @author ybarrantes <2020-02-18>
     */
    public function ciudad() {
        return $this->hasOne('App\Ciudad');
    }
}
