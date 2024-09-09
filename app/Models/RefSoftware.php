<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefSoftware extends Model
{
    use HasFactory;
    protected $table = 'ref_software';
    protected $fillable = ['team_id', 'link_host', 'link_git'];
}
