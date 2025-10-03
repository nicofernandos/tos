<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tcatsus extends Model
{
    protected $connection = 'maiadminmedan';
    protected $table = 'tcatsus';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $keyType = 'int';
    protected $fillable = [
        'tanggal',
        'namaguru',
        'idguru',
        'deskripsi',
        'jumlahpoin',
        'kelas',
        'idkelas',
        'idsiswa',
        'createat',
        'updateat',
        'createby',
        'updateby',
    ];


  public function details()
  {
    return $this->hasMany(Tcatsus1::class, 'tcatsus_id','id');
  }
    
}
