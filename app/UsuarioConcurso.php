<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsuarioConcurso extends Model
{
    use SoftDeletes;

    /**
     * Tabla en base de datos
     *
     * @var string
     */
    protected $table = 'usuarios_concurso';

    /**
     * Modificar el nombre a mayusculas
     *
     * @param string $value
     * @return string
     * @author ybarrantes <2020-02-18>
     */
    public function getNombreAttribute($value) {
        return mb_strtoupper($value);
    }

    /**
     * Modificar el apellido a mayusculas
     *
     * @param string $value
     * @return string
     * @author ybarrantes <2020-02-18>
     */
    public function getApellidoAttribute($value) {
        return mb_strtoupper($value);
    }

    /**
     * Modificar el email a minusculas
     *
     * @param string $value
     * @return string
     * @author ybarrantes <2020-02-18>
     */
    public function getCorreoAttribute($value) {
        return mb_strtolower($value);
    }

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
