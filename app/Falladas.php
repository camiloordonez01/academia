<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Falladas extends Model
{
    protected $table= 'falladas';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'preguntas_id',
        'users_id'
    ];

    protected $guarded =[
        
    ];
}
