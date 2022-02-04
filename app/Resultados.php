<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resultados extends Model
{
    protected $table= 'resultados';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'temas_id',
        'users_id',
        'correctas',
        'incorrectas'
    ];

    protected $guarded =[
        
    ];
}
