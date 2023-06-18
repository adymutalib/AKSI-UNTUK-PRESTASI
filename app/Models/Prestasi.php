<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;
    protected $table = 'prestasi';
    protected $fillable = ['Lomba', 'Juara', 'id_ekstra', 'tanggal'];

    public function ekstra()
    {
        return $this->belongsTo(Ekstra::class, 'id_ekstra', 'id_ekstra');
    }

}
