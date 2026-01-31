<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tryout extends Model
{
    protected $table = 'tryouts';

    protected $fillable = [
        'judul',
        'mapel_id',
        'deskripsi',
        'status',
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