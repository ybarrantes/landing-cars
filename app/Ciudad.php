<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    /**
     * Tabla en base de datos
     *
     * @var string
     */
    protected $table = 'ciudades';

    /**
     * Campos ocultos
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * Obtiene el departamento de la ciudad
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * @author ybarrantes <2020-02-18>
     */
    public function departamento() {
        return $this->hasOne('App\Departamento');
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
