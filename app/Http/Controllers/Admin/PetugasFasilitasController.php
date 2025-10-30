<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PetugasFasilitas;
use App\Models\FasilitasUmum;
use Illuminate\Http\Request;

class PetugasFasilitasController extends Controller
{
    public function index()
    {
        $data = PetugasFasilitas::with('fasilitas')->get();
        return view('admin.petugas.index', compact('data'));
    }

    public function create()
    {
        $fasilitas = FasilitasUmum::all();
        return view('admin.petugas.create', compact('fasilitas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fasilitas_id' => 'required',
            'nama_petugas' => 'required',
            'foto' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('petugas', 'public');
        }

        PetugasFasilitas::create($data);
        return redirect()->route('admin.petugas.index')->with('success', 'Berhasil ditambahkan');
    }

    public function edit($id)
    {
        $petugas = PetugasFasilitas::findOrFail($id);
        $fasilitas = FasilitasUmum::all();
        return view('admin.petugas.edit', compact('petugas','fasilitas'));
    }

    public function update(Request $request, $id)
    {
        $petugas = PetugasFasilitas::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('petugas', 'public');
        }

        $petugas->update($data);
        return redirect()->route('admin.petugas.index')->with('success', 'Berhasil diperbarui');
    }

    public function destroy($id)
    {
        PetugasFasilitas::findOrFail($id)->delete();
        return redirect()->route('admin.petugas.index')->with('success', 'Dihapus');
    }
}
