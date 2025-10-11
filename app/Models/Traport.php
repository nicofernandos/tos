<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Traport extends Model
{
    protected $connection = 'maiadminmedan';
    protected $table = 'traport';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'int';
    protected $fillable = [
        'id',
        'idta',
        'idkel',
        'idk',
        'idsis',
        'tipe',
        'deskripsi',
        'raport',
        'createdat',
        'updatedat',
        'createdby',
        'updatedby',
    ];
}
