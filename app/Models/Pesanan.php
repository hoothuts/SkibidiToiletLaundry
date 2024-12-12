<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pesanan extends Model
{

    protected $table = 'pesanan';

    protected $fillable = [
        'order_id', 'cust_id', 'nama', 'jenis', 'layanan', 'berat', 'tanggal_masuk', 'status_pembayaran', 'progress', 'biaya'
    ];

    public function cust(): BelongsTo{
        return $this->belongsTo(Cust::class);
    }

    public function pengeluaran(): HasMany {
        return $this->hasMany(pengeluaran::class);
    }
}
