<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefNetwork extends Model
{
    use HasFactory;
    protected $table = 'ref_network';
    protected $fillable = ['team_id', 'file_rar'];

    public function ref_team()
    {
        return $this->belongsTo(RefTeam::class, 'team_id');
    }
}
