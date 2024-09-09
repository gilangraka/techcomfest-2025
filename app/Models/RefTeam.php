<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefTeam extends Model
{
    use HasFactory;
    protected $table = 'ref_team';
    protected $fillable = ['nama_team', 'bukti_pembayaran', 'is_verified'];
}
