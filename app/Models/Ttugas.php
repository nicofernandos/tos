<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ttugas extends Model
{
    protected $connection ='maiadminmedan';
    protected $table = 'Ttugas';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $keyType = 'int';
    protected $fillable = [
        'id',
        'idkelas',
        'idguru',
        'mapel',
        'tglpenugasan',
        'tglpengumpulan',
        'judul',
        'deskripsi',
        'lampiran',
        'tugasFor',
        'createat',
        'createby',
        'updateat',
        'updateby',
    ];

    public function details(){
        return $this->hasMany(Ttugas1::class,'idtugas',id);
    }

}
