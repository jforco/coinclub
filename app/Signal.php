<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signal extends Model
{
    //
    protected $table = 'Signals';
    protected $hidden = ['id', 'updated_at', 'deleted_at'];
}
