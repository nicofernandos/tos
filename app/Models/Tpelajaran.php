<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tpelajaran extends Model
{
    protected   $connection     =  'maiadminmedan';
    protected   $table          =  'tpelajaran';
    protected   $primaryKey     =  'id';
    protected   $keyType        =  'int';
    public      $timestamps     =  false;
    protected   $fillable       = [
        'id',
        'tin',
        'idta',
        'nam',
        'jen',
        'idk',
        'ket',
        'sta',
        'rev'
    ];

    public function kelas()
    {
        return $this->belongsTo(Tkelas::class,'idk','id');
    }

}
