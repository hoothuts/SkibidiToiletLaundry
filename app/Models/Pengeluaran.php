<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengeluaran extends Model
{
    protected $table = 'pengeluaran';

    protected $guarded = [];

    public function pesanan(): BelongsToMany {
        return $this->belongsToMany(pesanan::class);
    }

    public function cashier():BelongsTo {
        return $this->belongsTo(cashier::class);
    }
}
