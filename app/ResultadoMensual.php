<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResultadoMensual extends Model
{
    protected $table= 'resultado_mensual';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'users_id',
        'correctas',
        'incorrectas',
        'mes'
    ];

    protected $guarded =[
        
    ];
}
