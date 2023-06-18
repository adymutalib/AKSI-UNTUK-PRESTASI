<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $table = 'pendaftaran';
    protected $fillable = ['nama', 'nis', 'jenis_kelamin', 'ttl', 'kelas', 'id_ekstra', 'alasan', 'image'];

    public function ekstra()
    {
        return $this->belongsTo(Ekstra::class, 'id_ekstra', 'id_ekstra');
        
    }
}
