<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tkelasjenis extends Model
{
    protected $connection = 'maiadminmedan';
    protected $table = 'Tkelasjenis';
    protected $primaryKey = 'id';
    public $timestamp = false ;
    protected $keyType = 'int';
    protected $fillable = [
        'id',
        'tin',
        'nam',
        'tip',
        'lev',
        'ket',
        'sta',
    ];

    public function kelas(){
        return $this->hasMany(Tkelas::class,'tin','tin');
    }

    public function kelasbytin(){
        return $this->hasMany(Tkelas::class,'tin','tin');
    }

}
