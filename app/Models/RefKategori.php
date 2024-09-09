<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefKategori extends Model
{
    use HasFactory;
    protected $table = 'ref_kategori';

    public function ref_peserta()
    {
        return $this->hasMany(RefPeserta::class, 'kategori_id');
    }
}
