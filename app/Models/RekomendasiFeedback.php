<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekomendasiFeedback extends Model
{
    protected $fillable = [
        'rekomendasi_id',
        'user_id',
        'catatan',
    ];

    public function rekomendasi()
    {
        return $this->belongsTo(Rekomendasi::class, 'rekomendasi_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
