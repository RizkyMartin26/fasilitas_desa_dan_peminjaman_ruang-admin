<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SyaratFasilitas;
use App\Models\FasilitasUmum;

class SyaratFasilitasController extends Controller
{
    public function index()
    {
        $data = SyaratFasilitas::with('fasilitas')->get();
        return view('admin.syarat.index', compact('data'));
    }

    public function create()
    {
        $fasilitas = FasilitasUmum::all();
        return view('admin.syarat.create', compact('fasilitas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fasilitas_id' => 'required',
            'nama_syarat' => 'required',
            'dokumen' => 'nullable|file|mimes:pdf,png,jpg,jpeg|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('dokumen')) {
            $data['dokumen'] = $request->file('dokumen')->store('syarat', 'public');
        }

        SyaratFasilitas::create($data);
        return redirect()->route('admin.syarat.index')->with('success', 'Syarat berhasil ditambahkan');
    }

    public function edit($id)
    {
        $syarat = SyaratFasilitas::findOrFail($id);
        $fasilitas = FasilitasUmum::all();
        return view('admin.syarat.edit', compact('syarat','fasilitas'));
    }

    public function update(Request $request, $id)
    {
        $syarat = SyaratFasilitas::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('dokumen')) {
            $data['dokumen'] = $request->file('dokumen')->store('syarat', 'public');
        }

        $syarat->update($data);
        return redirect()->route('admin.syarat.index')->with('success', 'Syarat berhasil diperbarui');
    }

    public function destroy($id)
    {
        SyaratFasilitas::findOrFail($id)->delete();
        return redirect()->route('admin.syarat.index')->with('success', 'Syarat berhasil dihapus');
    }
}
