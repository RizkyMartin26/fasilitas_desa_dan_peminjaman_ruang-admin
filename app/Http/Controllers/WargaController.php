<?php
namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index(Request $request)
    {
        $data = Warga::query()
        // Filter berdasarkan pencarian nama
            ->when($request->search, function ($query) use ($request) {
                $query->where('nama', 'LIKE', '%' . $request->search . '%');
            })
        // BARU: Filter berdasarkan jenis kelamin
            ->when($request->jenis_kelamin, function ($query) use ($request) {
                $query->where('jenis_kelamin', $request->jenis_kelamin);
            })
            ->paginate(10);

        // Ini penting agar paginasi membawa semua parameter query (search dan jenis_kelamin)
        $data->appends($request->only('search', 'jenis_kelamin'));

        return view('pages.warga.index', compact('data'));
    }

    public function create()
    {
        return view('pages.warga.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_ktp'        => 'required|unique:warga',
            'nama'          => 'required',
            'jenis_kelamin' => 'required',
            'agama'         => 'required',
            'pekerjaan'     => 'nullable',
            'telp'          => 'nullable',
            'email'         => 'nullable|email',
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
            'no_ktp'        => 'required|unique:warga,no_ktp,' . $id . ',warga_id',
            'nama'          => 'required',
            'jenis_kelamin' => 'required',
            'agama'         => 'required',
            'pekerjaan'     => 'nullable',
            'telp'          => 'nullable',
            'email'         => 'nullable|email',
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
