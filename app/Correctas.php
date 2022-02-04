<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correctas extends Model
{
    protected $table= 'correctas';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'preguntas_id',
        'respuestas_id'
    ];

    protected $guarded =[
        
    ];
}
