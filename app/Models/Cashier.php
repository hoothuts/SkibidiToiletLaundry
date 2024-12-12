<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cashier extends Model
{
    public function pengeluaran(): HasMany {
        return $this->hasMany(pengeluaran::class);
    }
}
