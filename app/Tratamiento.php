<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    //
    public function dientes()
    {
        // return $this->hasMany('App\Programming','task_id');
        return $this->belongsToMany('App\Diente','tratamiento_dientes','tratamiento_id','diente_id');
    }
    public function odontologo(){
        return $this->belongsTo('App\Odontologo');
    }
}
