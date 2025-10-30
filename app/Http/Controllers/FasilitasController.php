<?php

namespace App\Http\Controllers;

use App\Models\FasilitasUmum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    public function index()
    {
        $data = FasilitasUmum::all();
        return view('admin.fasilitas.index', compact('data'));
    }

    public function create()
    {
        return view('admin.fasilitas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'alamat' => 'required',
            'kapasitas' => 'integer|nullable',
            'media' => 'image|mimes:png,jpg,jpeg|max:2048|nullable'
        ]);

        $filename = null;
        if ($request->hasFile('media')) {
            $filename = time().'_'.$request->media->getClientOriginalName();
            $request->media->storeAs('public/media', $filename);
        }

        FasilitasUmum::create([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'kapasitas' => $request->kapasitas,
            'deskripsi' => $request->deskripsi,
            'media' => $filename
        ]);

        return redirect()->route('fasilitas.index')->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $item = FasilitasUmum::findOrFail($id);
        return view('admin.fasilitas.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = FasilitasUmum::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'alamat' => 'required',
            'media' => 'image|mimes:png,jpg,jpeg|max:2048|nullable'
        ]);

        $filename = $item->media;
        if ($request->hasFile('media')) {
            if ($filename && Storage::exists('public/media/'.$filename)) {
                Storage::delete('public/media/'.$filename);
            }
            $filename = time().'_'.$request->media->getClientOriginalName();
            $request->media->storeAs('public/media', $filename);
        }

        $item->update([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'kapasitas' => $request->kapasitas,
            'deskripsi' => $request->deskripsi,
            'media' => $filename
        ]);

        return redirect()->route('fasilitas.index')->with('success', 'Data fasilitas berhasil diupdate.');
    }

    public function destroy($id)
    {
        $item = FasilitasUmum::findOrFail($id);

        if ($item->media && Storage::exists('public/media/'.$item->media)) {
            Storage::delete('public/media/'.$item->media);
        }

        $item->delete();
        return redirect()->route('fasilitas.index')->with('success', 'Data fasilitas berhasil dihapus.');
    }
}
