<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index()
    {
        $data = Warga::all();
        return view('pages.warga.index', compact('data'));
    }

    public function create()
    {
        return view('pages.warga.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'no_ktp' => 'required|unique:warga',
        'nama' => 'required',
        'jenis_kelamin' => 'required',
        'agama' => 'required',
        'pekerjaan' => 'nullable',
        'telp' => 'nullable',
        'email' => 'nullable|email',
    ]);

    Warga::create($validated);
    return redirect()->route('warga.index')->with('success', 'Data warga berhasil ditambahkan!');
}


    public function edit($id)
    {
        $data = Warga::findOrFail($id);
        return view('pages.warga.edit', compact('data'));
    }

    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'no_ktp' => 'required|unique:warga,no_ktp,' . $id . ',warga_id',
        'nama' => 'required',
        'jenis_kelamin' => 'required',
        'agama' => 'required',
        'pekerjaan' => 'nullable',
        'telp' => 'nullable',
        'email' => 'nullable|email',
    ]);

    $warga = Warga::findOrFail($id);
    $warga->update($validated);

    return redirect()->route('warga.index')->with('success', 'Data warga berhasil diperbarui!');
}

    public function destroy($id)
    {
        Warga::destroy($id);
        return redirect()->route('warga.index')->with('success', 'Data Warga berhasil dihapus!');
    }
}
