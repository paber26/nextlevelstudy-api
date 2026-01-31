<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpsiJawaban extends Model
{
    use HasFactory;

    protected $table = 'opsi_jawaban';

    protected $fillable = [
        'soal_id',
        'label',
        'teks',
        'poin',
        'is_correct'
    ];

    public function bankSoal()
    {
        return $this->belongsTo(BankSoal::class, 'soal_id');
    }
}