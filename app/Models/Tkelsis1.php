<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tkelsis1 extends Model
{
    protected   $connection = 'maiadminmedan';
    protected   $table      = 'Tkelsis1';
    protected   $keyType    = 'int';
    protected   $primaryKey = 'id';
    public      $timestamps = false;
    protected   $fillable   = [
        'id',
        'tin',
        'idta',
        'ids',
        'idkel',
        'sta',
        'idmen',
        'idtra',
        'createdat',
        'updatedat',
        'createdby',
        'updatedby',
    ];

    public function siswa()
    {
        return $this->belongsTo(Tsiswa::class,'ids','id');
    }

    public function kelas()
    {
        return $this->belongsTo(Tkelass::class,'idkel','id');
    }
   
    

}
