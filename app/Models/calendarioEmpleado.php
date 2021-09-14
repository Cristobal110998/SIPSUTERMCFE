<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class calendarioEmpleado extends Model
{
    use HasFactory;
    protected $table = 'calendario_empleados';
    static $rules=[
        'title'=>'required',
        'descripcion'=>'required',
        'start'=>'required',
         'end'=>'required',
    ];

    protected $fillable=['title','descripcion','start','end'];
}
