<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketingKit extends Model
{
    use HasFactory;

    protected $table = 'list_marketing_kit';
    protected $primaryKey = 'id_marketing_kit';

    protected $fillable = [
        'judul',
        'deskripsi',
        'file_gambar'
    ];

    /**
     * Accessor: URL gambar lengkap
     */
    public function getGambarUrlAttribute()
    {
        if (!$this->file_gambar) {
            return 'https://via.placeholder.com/300x200?text=Marketing+Kit';
        }

        // Jika sudah URL penuh (http/https), kembalikan langsung
        // if (filter_var($this->file_gambar, FILTER_VALIDATE_URL)) {
        //     return $this->file_gambar;
        // }

        // Jika lokal, gabungkan dengan asset()
        return asset('storage/' . $this->file_gambar);
    }
}