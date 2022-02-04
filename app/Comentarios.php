<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    protected $table= 'comentarios';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'preguntas_id',
        'users_id',
        'comentario',
        'orden'
    ];

    protected $guarded =[
        
    ];
}
