<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temas extends Model
{
    protected $table= 'temas';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
        'tema',
        'categoria'
    ];

    protected $guarded =[
        
    ];
}
