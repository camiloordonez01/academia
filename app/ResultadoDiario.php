<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResultadoDiario extends Model
{
    protected $table= 'resultado_diario';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'users_id',
        'correctas',
        'incorrectas',
        'fecha'
    ];

    protected $guarded =[
        
    ];
}
