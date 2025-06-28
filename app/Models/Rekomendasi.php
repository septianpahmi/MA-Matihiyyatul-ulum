<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rekomendasi extends Model
{
    protected $fillable = [
        'user_id',
        'perkembangan_id',
        'catatan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function perkembangan()
    {
        return $this->belongsTo(Perkembangan::class, 'perkembangan_id');
    }
}
