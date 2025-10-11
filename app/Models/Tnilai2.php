<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tnilai2 extends Model
{
    protected $connection = 'maiadminmedan';
    protected $table      = 'tnilai2';
    protected $primaryKey = 'id';
    public $timestamps    = false;
    public $incrementing  = false;
    protected $keyType    = 'int';

    protected $fillable = [
        'id',
        'idnil1',
        'kat',
        'predi',
        'ket',
        'createdat',
        'createdby',
        'updatedat',
        'updatedby',
    ];
}
