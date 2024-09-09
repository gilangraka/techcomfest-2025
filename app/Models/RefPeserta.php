<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefPeserta extends Model
{
    use HasFactory;
    protected $table = 'ref_peserta';
    protected $fillable = [
        'user_id',
        'nik',
        'tgl_lahir',
        'nomor_hp',
        'gender_id',
        'kategori_id',
        'nama_pembina',
        'asal_sekolah',
        'file_berkas',
        'team_id',
        'is_ketua'
    ];
}
