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
     * Obtiene el departamento de la ciudad
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * @author ybarrantes <2020-02-18>
     */
    public function departamento() {
        return $this->hasOne('App\Departamento');
    }
}
