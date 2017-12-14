<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class termtaxomony extends Model
{
    protected $table='term_relations';
    protected $fillable = [
        'news_id', 'term_id',
    ];
}
