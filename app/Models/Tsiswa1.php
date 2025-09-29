<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tsiswa1 extends Model
{
    protected $connection = 'maidatmaspusat';
    protected $table = 'Tsiswa1';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $keyType = 'int';
    protected $fillable = [
        'ids',
        'ala',
        'rt',
        'rw',
    ];

    public function siswa()
    {
        return $this->belongsTo(Tsiswa::class,'ids','id');
    }

}
