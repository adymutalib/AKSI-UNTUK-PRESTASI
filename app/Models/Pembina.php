<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembina extends Model
{
    use HasFactory;
    protected $table = 'pembina';
    protected $fillable = ['nama', 'nip', 'jenis_kelamin', 'ttl', 'no_telp'];

    public function ekstra()
    {
        // return $this->belongsTo(Ekstra::class, 'id_ekstra', 'id_ekstra');
        return $this->hasOne(Ekstra::class);
    }
   

}
