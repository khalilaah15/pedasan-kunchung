<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'id_user',
        'nama_penerima',
        'alamat_pengiriman',
        'nomor_telepon',
        'total_harga',
        'status',
        'catatan'
    ];

    protected $casts = [
        'total_harga' => 'decimal:2',
        'status' => 'string',
    ];

    // Accessor untuk status badge (opsional)
    public function getStatusBadgeAttribute()
    {
        return [
            'Pending' => ['class' => 'status-pending', 'text' => 'Pending'],
            'Processing' => ['class' => 'status-processing', 'text' => 'Processing'],
            'Completed' => ['class' => 'status-completed', 'text' => 'Completed'],
            'Cancelled' => ['class' => 'status-cancelled', 'text' => 'Cancelled']
        ][$this->status] ?? ['class' => '', 'text' => $this->status];
    }

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    // Relasi ke DetailTransaksi
    public function getFormattedTotalAttribute()
    {
        return 'Rp ' . number_format($this->total_harga, 0, ',', '.');
    }

    public function detail()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_transaksi', 'id_transaksi');
    }
}