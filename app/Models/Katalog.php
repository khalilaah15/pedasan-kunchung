<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    use HasFactory;

    protected $table = 'katalog';
    protected $primaryKey = 'id_katalog';
    public $timestamps = true;

    protected $fillable = [
        'nama_katalog',
        'deskripsi_katalog',
        'harga_katalog',
        'stok_katalog',
        'file_katalog'
    ];

    protected $casts = [
        'harga_katalog' => 'decimal:2',
        'stok_katalog' => 'integer'
    ];

    /**
     * Accessor untuk format harga
     */
    public function getHargaFormatAttribute()
    {
        return 'Rp ' . number_format($this->harga_katalog, 0, ',', '.');
    }

    /**
     * Scope untuk katalog yang tersedia (stok > 0)
     */
    public function scopeTersedia($query)
    {
        return $query->where('stok_katalog', '>', 0);
    }

    /**
     * Scope untuk mencari berdasarkan nama
     */
    public function scopeCari($query, $nama)
    {
        return $query->where('nama_katalog', 'like', '%' . $nama . '%');
    }

    public function getGambarUrlAttribute()
    {
        if (!$this->file_katalog) {
            return 'https://via.placeholder.com/300x200?text=No+Image';
        }

        return asset('storage/' . $this->file_katalog);
    }
}