<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuestas extends Model
{
    protected $table= 'respuestas';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'respuesta',
        'preguntas_id'
    ];

    protected $guarded =[
        
    ];
}
