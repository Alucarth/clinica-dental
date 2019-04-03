<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cita extends Model
{
    //

    public function odontologo()
    {
        return $this->belongsTo('App\Odontologo');
    }
    public function paciente()
    {
        return $this->belongsTo('App\Paciente');
    }
}
