<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IqTest extends Model
{
    protected $fillable = [
        'siswa_id',
        'aspek',
        'nilai',
        'catatan',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
