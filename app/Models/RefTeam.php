<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RefTeam extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    use HasFactory;
    protected $table = 'ref_team';
    protected $fillable = ['nama_team', 'kategori_id', 'file_berkas', 'file_bukti_pembayaran', 'is_verified'];
    protected $casts = [
        'id' => 'string',
    ];
    protected $keyType = 'string';
    public $incrementing = false;

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

    public function ref_kategori()
    {
        return $this->belongsTo(RefKategori::class, 'kategori_id');
    }
}
