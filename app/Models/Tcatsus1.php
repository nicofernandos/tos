<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tcatsus1 extends Model
{
    protected $connection = 'maiadminmedan';
    protected $table = 'tcatsus1';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $keyType = 'int';
    protected $fillable = [
        'tcatsus_id',
        'detail',
        'keterangan',
        'createat',
        'updateat',
        'createby',
        'updateby',
    ];


    public function tcatsus()
    {
        return $this->belongsTo(Tcatsus::class,'tcatsus_id','id');
    }


}
