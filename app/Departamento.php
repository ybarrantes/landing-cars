<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    /**
     * Tabla en base de datos
     *
     * @var string
     */
    protected $table = 'departamentos';

    /**
     * Campos ocultos
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * Obtiene las ciudades del departamento
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * @author ybarrantes <2020-02-18>
     */
    public function ciudades() {
        return $this->hasMany('App\Ciudad');
    }

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
}
