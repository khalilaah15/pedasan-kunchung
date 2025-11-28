<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    protected $table = 'testimoni';

    protected $fillable = [
        'user_id',
        'pesan',
        'rating',
        'disetujui'
    ];

    protected $casts = [
        'disetujui' => 'boolean'
    ];

    public function user()
    {
        // Tentukan foreign key dan local key yang benar
        return $this->belongsTo(User::class, 'user_id', 'id_user')->withDefault([
            'nama' => 'User Tidak Ditemukan',
            'email' => 'user@tidakditemukan.com'
        ]);
    }

    public function scopeDisetujui($query)
    {
        return $query->where('disetujui', true);
    }

    public function scopeMenunggu($query)
    {
        return $query->where('disetujui', false);
    }
}