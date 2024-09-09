<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefMulmed extends Model
{
    use HasFactory;
    protected $table = 'ref_mulmed';
    protected $fillable = ['team_id', 'orisinalitas_karya', 'hasil_karya'];

    public function ref_team()
    {
        return $this->belongsTo(RefTeam::class, 'team_id');
    }
}
