<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    //
    protected $table = 'comentarios';

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'id_usuario');
    }
}
