<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefTeam extends Model
{
    use HasFactory;
    protected $table = 'ref_team';
    protected $fillable = ['nama_team', 'bukti_pembayaran', 'is_verified'];

    public function ref_peserta()
    {
        return $this->hasMany(RefPeserta::class, 'team_id');
    }

    public function ref_mulmed()
    {
        return $this->hasOne(RefMulmed::class, 'team_id');
    }

    public function ref_network()
    {
        return $this->hasOne(RefNetwork::class, 'team_id');
    }

    public function ref_software()
    {
        return $this->hasOne(RefSoftware::class, 'team_id');
    }
}
