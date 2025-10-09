<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ttingkat extends Model
{
    protected $connection   ='maiadminmedan';
    protected $table        ='ttingkat';
    protected $primaryKey   ='id';
    public $timestamps      =false;
    protected $keyType      ='int';
    protected $fillable     =[
        'id',
        'nam',
        'kod',
        'maxlev',
        'nextin',
        'ket',
        'sta',
        'createdat',
        'updatedat',
        'createdby',
        'updatedby',
    ];

    public function kelsis()
    {
        return $this->hasMany(Tkelsis::class,'tin','id');
    }



}
