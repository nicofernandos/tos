<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tkelas extends Model
{
    protected $connection = 'maiadminmedan';
    protected $table = 'Tkelas';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $keyType = 'int';
    protected $fillable = [
        'id',
        'tin',
        'idta',
        'nam',
        'jen',
        'lev',
        'qty',
        'idk',
    ];

    public function jenis(){
        return $this->belongsTo(Tkelasjenis::class,'id','id');
    }
} 
