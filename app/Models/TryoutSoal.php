<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TryoutSoal extends Model
{
    protected $table = 'tryout_soal';

    protected $fillable = [
        'tryout_id',
        'banksoal_id',
        'urutan',
    ];

    /**
     * Relasi ke Tryout
     */
    public function tryout()
    {
        return $this->belongsTo(Tryout::class, 'tryout_id');
    }

    /**
     * Relasi ke BankSoal
     */
    public function banksoal()
    {
        return $this->belongsTo(BankSoal::class, 'banksoal_id');
    }
}