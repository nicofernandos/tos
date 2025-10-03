<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tkelas extends Model
{
    protected $connection = 'maiadminmedan';
    protected $table = 'tkelas';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $keyType = 'int';
    protected $fillable = [
        'tin',
        'idta',
        'nam',
        'jen',
        'lev',
        'qty',
        'idk',
    ];

    public function jumlahsiswa()
    {
        return $this->hasMany(Tsiswa::class, 'kel', 'nam');
    }

    public function tahunajaran()
    {
        return $this->belongsTo(Ttahunajaran::class, 'idta', 'id');
    }


} 
