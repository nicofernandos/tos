<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tnilai extends Model
{
    protected $connection = 'maiadminmedan';
    protected $table = 'tnilai';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'int';
    protected $fillable = [
        'id',
        'idta',  //tahunajaran
        'idk', //idguru
        'idkel', //idkelas
        'idsis',
        'idpel',
        'nilai',
        'ket',
        'createdt',
        'createdby',
        'updatedat',
        'updatedby',    
    ];

    public function scopeAktif($query)
    {
        return $query->where('idta',function($sub)
        {
            $sub->select('id')
            ->from('ttahunajaran')
            ->where('staakt',1)
            ->limit(1);
        });
    }

}
