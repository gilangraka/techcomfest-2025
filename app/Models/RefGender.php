<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefGender extends Model
{
    use HasFactory;
    protected $table = 'ref_gender';
    public $timestamps = false;

    public function ref_peserta()
    {
        return $this->hasMany(RefPeserta::class, 'gender_id');
    }
}
