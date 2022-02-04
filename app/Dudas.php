<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dudas extends Model
{
    protected $table= 'dudas';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'mensaje',
        'categoria'
    ];

    protected $guarded =[
        
    ];
}
