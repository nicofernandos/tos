<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tjenisraport extends Model
{
    protected $connection = 'maiadminmedan';
    protected $table      = 'tjenisraport';
    protected $primaryKey = 'id';
    public $timestamps    = false;
    protected $keyType    = 'int';
    protected $fillable = [
        'id',
        'nam',
        'ket',
        'createdby',
        'updatedby',
        'createdat',
        'updatedat',
    ];
}
