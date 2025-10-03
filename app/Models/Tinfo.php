<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tinfo extends Model
{
    protected $connection = 'maiadminmedan';
    protected $table = 'tinfo';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $keyType = 'int';
    protected $fillable = [ 
        'id',
        'idkelas',
        'tglinfo',
        'deskripsi',
        'createat',
        'createby',
        'updateat',
        'updateby',
    ];  
}
