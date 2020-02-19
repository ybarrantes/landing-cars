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
     * Obtiene las ciudades del departamento
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * @author ybarrantes <2020-02-18>
     */
    public function ciudades() {
        return $this->hasMany('App\Ciudad');
    }
}
