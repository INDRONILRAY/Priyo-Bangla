<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class widget extends Model
{
    protected $table='widgets';
    protected $fillable = array(
        'cat_id', 'position',
    );
}
