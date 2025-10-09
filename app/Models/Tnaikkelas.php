<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tnaikkelas extends Model
{
    protected $connection   = 'maiadminmedan';
    protected $table        = 'tnaikkelas';
    protected $keyType      = 'int';
    public    $timestamps   = false;
    protected $fillable     = [
        'id',
        'tin',
        'idta',
        'idsis',
        'oldikel',
        'idkel',
        'idkel1',
        'ket',
        'sta',
        'rev',
        'createdby',
        'updatedby',
        'updatedat',
        'updatedby',
    ];
}
