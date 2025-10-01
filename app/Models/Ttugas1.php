<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ttugas1 extends Model
{
    protected $connection = 'maiadminmedan';
    protected $table = 'Ttugas1',
    protected $primaryKey = 'id',
    public $timestamps = false;
    protected $keyType = 'int',
    protected $fillable = [
        'idtiugas',
        'idsiswa',
        'status',
        'nilai',
        'catatan',
        'createat',
        'createby',
        'updateat',
        'updateby',
    ];

    public function tugas(){
        return $this->belongsTo(Ttugas::class, 'idtugas','id');
    }

    public function siswa()
    {
        return $this->setConnection('maidatmaspusat')
            ->belongsTo(Tsiswa::class,'idsiswa','id');
    }

}
