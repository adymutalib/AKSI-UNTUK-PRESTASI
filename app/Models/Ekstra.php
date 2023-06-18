<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstra extends Model
{
    use HasFactory;
    protected $table = 'ekstra';
    protected $fillable = ['nama_ekstra', 'penjelasan', 'id_pembina','image'];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
    public function prestasi()
    {
        return $this->hasMany(Prestasi::class, 'id_ekstra', 'id_ekstra');
    }

    public function pembina()
    {
        return $this->belongsTo(Pembina::class, 'id_pembina', 'id_pembina');
    }
    public function pendaftar()
    {
        return $this->hasMany(Pendaftaran::class);
    }
   

}
