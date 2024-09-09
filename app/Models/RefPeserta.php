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
        'foto_profil',
        'nama_pembina',
        'asal_sekolah',
        'file_berkas',
        'team_id',
        'is_ketua'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function ref_gender()
    {
        return $this->belongsTo(RefGender::class, 'gender_id');
    }
    public function ref_kategori()
    {
        return $this->belongsTo(RefKategori::class, 'kategori_id');
    }
    public function ref_team()
    {
        return $this->belongsTo(RefTeam::class, 'team_id');
    }
}
