<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tryout extends Model
{
    protected $table = 'tryout';

    protected $fillable = [
        'paket',
        'mapel_id',
        'durasi_menit',
        'mulai',
        'selesai',
        'is_active',
        'created_by'
    ];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }

    public function pembuat()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}