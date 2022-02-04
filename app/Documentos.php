<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{
    protected $table= 'documentos';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'nombre',
        'tipo',
        'categoria',
        'urlDocumento'
    ];

    protected $guarded =[
        
    ];
}
