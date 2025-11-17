<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database.
     *
     * @var string
     */
    protected $table = 'detail_transaksi';

    /**
     * Primary key custom.
     *
     * @var string
     */
    protected $primaryKey = 'id_detail_transaksi';

    /**
     * Kolom yang bisa diisi mass assignment.
     *
     * @var array
     */
    protected $fillable = [
    'id_transaksi',
    'id_katalog',
    'qty',
    'harga_satuan',
    'subtotal'
];

    /**
     * Tipe casting untuk atribut.
     *
     * @var array
     */
    protected $casts = [
        'harga_satuan' => 'decimal:2',
        'subtotal' => 'decimal:2',
        'jumlah' => 'integer',
    ];

    /**
     * Relasi: detail transaksi → transaksi (one-to-many inverse)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi', 'id_transaksi');
    }

    /**
     * Relasi: detail transaksi → katalog (one-to-many inverse)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function katalog()
    {
        return $this->belongsTo(Katalog::class, 'id_katalog', 'id_katalog');
    }

    /**
     * Mutator: otomatis hitung subtotal saat disimpan
     */
    protected static function booted()
    {
        static::creating(function ($detail) {
            if ($detail->harga_satuan && $detail->jumlah) {
                $detail->subtotal = $detail->harga_satuan * $detail->jumlah;
            }
        });

        static::updating(function ($detail) {
            if ($detail->harga_satuan && $detail->jumlah) {
                $detail->subtotal = $detail->harga_satuan * $detail->jumlah;
            }
        });
    }

    /**
     * Accessor: format subtotal ke Rupiah
     */
    public function getSubtotalFormatAttribute()
    {
        return 'Rp ' . number_format($this->subtotal, 0, ',', '.');
    }

    /**
     * Accessor: format harga satuan ke Rupiah
     */
    public function getHargaSatuanFormatAttribute()
    {
        return 'Rp ' . number_format($this->harga_satuan, 0, ',', '.');
    }
}