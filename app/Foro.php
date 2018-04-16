<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foro extends Model
{
    //
    protected $table = 'foros';

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'id_usuario');
    }

    public function comentarios()
    {
        return $this->hasMany('App\Comentario', 'id_foro', 'id');
    }
}
