<?php
namespace App\Http\Controllers;

use App\Models\FasilitasUmum;
use App\Models\PetugasFasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Tampilkan daftar petugas.
     */
    public function index()
    {
        $petugas = PetugasFasilitas::with('fasilitas')->get();
        return view('pages.petugas.index', compact('petugas'));
    }

    /**
     * Form tambah petugas baru.
     */
    public function create()
    {
        $fasilitas = FasilitasUmum::all();
        return view('pages.petugas.create', compact('fasilitas'));
    }

    /**
     * Simpan data petugas baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fasilitas_id' => 'required|exists:fasilitas_umum,fasilitas_id',
            'nama_petugas' => 'required|string|max:100',
            'email'        => 'required|email|unique:petugas_fasilitas,email',
            'password'     => 'required|min:6',
            'no_hp'        => 'nullable|string|max:20',
            'alamat'       => 'nullable|string',
        ]);

        PetugasFasilitas::create([
            'fasilitas_id' => $request->fasilitas_id,
            'nama_petugas' => $request->nama_petugas,
            'email'        => $request->email,
            'password'     => Hash::make($request->password),
            'no_hp'        => $request->no_hp,
            'alamat'       => $request->alamat,
        ]);

        return redirect()->route('petugas.index')->with('success', 'Data petugas berhasil ditambahkan!');
    }

    /**
     * Tampilkan detail petugas.
     */
    public function show($id)
    {
        $petugas = PetugasFasilitas::with('fasilitas')->findOrFail($id);
        return view('pages.petugas.index', compact('petugas'));
    }

    /**
     * Form edit petugas.
     */
    public function edit($id)
    {
        $petugas   = PetugasFasilitas::findOrFail($id);
        $fasilitas = FasilitasUmum::all();
        return view('pages.petugas.edit', compact('petugas', 'fasilitas'));
    }

    /**
     * Update data petugas.
     */
    public function update(Request $request, $id)
    {
        $petugas = PetugasFasilitas::findOrFail($id);

        $request->validate([
            'fasilitas_id' => 'required|exists:fasilitas_umum,fasilitas_id',
            'nama_petugas' => 'required|string|max:100',
            'email'        => 'required|email|unique:petugas_fasilitas,email,' . $petugas->petugas_id . ',petugas_id',
            'password'     => 'nullable|min:6',
            'no_hp'        => 'nullable|string|max:20',
            'alamat'       => 'nullable|string',
        ]);

        $data = $request->only(['fasilitas_id', 'nama_petugas', 'email', 'no_hp', 'alamat']);

        // Jika password diisi, update juga
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $petugas->update($data);

        return redirect()->route('petugas.index')->with('success', 'Data petugas berhasil diperbarui!');
    }

    /**
     * Hapus data petugas.
     */
    public function destroy($id)
    {
        $petugas = PetugasFasilitas::findOrFail($id);
        $petugas->delete();

        return redirect()->route('petugas.index')->with('success', 'Data petugas berhasil dihapus!');
    }
}
