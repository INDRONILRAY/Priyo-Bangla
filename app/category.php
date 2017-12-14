<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
	protected $table='terms';
    protected $fillable = [
        'name', 'dsc', 'slug','parent'
    ];

}
