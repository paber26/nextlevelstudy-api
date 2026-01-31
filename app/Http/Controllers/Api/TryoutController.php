<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tryout;
use Illuminate\Http\Request;

class TryoutController extends Controller
{
    // 🔹 GET /api/tryout
    public function index()
    {
        $data = Tryout::with(['mapel', 'pembuat'])
            ->latest()
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'judul' => $item->judul,
                    'mapel' => $item->mapel->nama ?? '-',
                    'status' => $item->status,
                    'pembuat' => $item->pembuat->name ?? '-',
                    'created_at' => $item->created_at->format('Y-m-d'),
                ];
            });

        return response()->json($data);
    }
}