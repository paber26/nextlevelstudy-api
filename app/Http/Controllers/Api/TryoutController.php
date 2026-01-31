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
                    'paket' => $item->paket,
                    'mapel' => $item->mapel->nama ?? '-',
                    'status' => $item->is_active ? 'Aktif' : 'Draft',
                    'pembuat' => $item->pembuat->name ?? '-',
                    'created_at' => $item->created_at->format('Y-m-d'),
                ];
            });

        return response()->json($data);
    }

    // 🔹 POST /api/tryout
    public function store(Request $request)
    {
        $data = $request->validate([
            'paket'        => 'required|string|max:255',
            'mapel_id'     => 'required|integer',
            'durasi_menit' => 'required|integer',
            'mulai'        => 'required|date',
            'selesai'      => 'required|date',
            'is_active'    => 'boolean',
            ]);
            
        $tryout = Tryout::create([
            'paket'        => $data['paket'],
            'mapel_id'     => $data['mapel_id'],
            'durasi_menit' => $data['durasi_menit'],
            'mulai'        => $data['mulai'],
            'selesai'      => $data['selesai'],
            'is_active'    => $data['is_active'] ?? 0,
            'created_by'   => $request->user()?->id ?? 1,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Tryout berhasil dibuat',
            'data'    => $tryout
        ], 201);
    }

}