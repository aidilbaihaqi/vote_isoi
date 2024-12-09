<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class LogPemilihan extends Model
{
    protected $guarded = ['id'];

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'pemilih_id');
    }
}
