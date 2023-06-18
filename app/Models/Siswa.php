<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $fillable = ['nama', 'nis', 'kelas', 'jabatan', 'id_ekstra'];

    public function ekstra()
    {
        return $this->belongsTo(Ekstra::class, 'id_ekstra', 'id_ekstra');
        
    }
}
