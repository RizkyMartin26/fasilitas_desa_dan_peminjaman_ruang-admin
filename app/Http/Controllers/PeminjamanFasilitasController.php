<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanFasilitas;
use Illuminate\Http\Request;

class PeminjamanFasilitasController extends Controller
{
    public function index()
    {
        return PeminjamanFasilitas::with(['warga','fasilitas'])->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'warga_id' => 'required|exists:warga,warga_id',
            'fasilitas_id' => 'required|exists:fasilitas,fasilitas_id',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'nullable|date',
            'status' => 'in:pending,setuju,tolak'
        ]);

        return PeminjamanFasilitas::create($validated);
    }

    public function show($id)
    {
        return PeminjamanFasilitas::with(['warga','fasilitas'])
            ->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $data = PeminjamanFasilitas::findOrFail($id);

        $validated = $request->validate([
            'warga_id' => 'sometimes|exists:warga,warga_id',
            'fasilitas_id' => 'sometimes|exists:fasilitas,fasilitas_id',
            'tgl_pinjam' => 'sometimes|date',
            'tgl_kembali' => 'nullable|date',
            'status' => 'in:pending,setuju,tolak'
        ]);

        $data->update($validated);

        return $data;
    }

    public function destroy($id)
    {
        return PeminjamanFasilitas::destroy($id);
    }
}
