<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tsiswafoto extends Model
{
    protected $connection = 'maidatmaspusat';
    protected $table = 'Tsiswafoto';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $keyType = 'int';
    protected $fillable = [
        'id',
        'ids',
        'nmr',
        'nam',
        'img'
    ];

    public function siswa()
    {
        return $this>belongsTo(Tsiswa::class,'ids','id');
    }
}
