<?php
namespace App\Http\Controllers;

use App\Models\FasilitasUmum;
use App\Models\PeminjamanFasilitas;
use App\Models\Warga;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index(Request $request)
{
    $data = PeminjamanFasilitas::with(['warga', 'fasilitas'])
                ->when($request->search, function ($query) use ($request) {
                    $query->whereHas('warga', function ($q) use ($request) {
                        $q->where('nama', 'LIKE', '%' . $request->search . '%');
                    });
                })
                ->paginate(10);

    return view('pages.peminjaman.index', compact('data'));
}


    public function create()
    {
        $fasilitas = FasilitasUmum::all();
        $warga     = Warga::all();

        return view('pages.peminjaman.create', compact('fasilitas', 'warga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'warga_id'     => 'required',
            'fasilitas_id' => 'required',
            'tgl_pinjam'   => 'required|date',
            'tgl_kembali'  => 'nullable|date',
            'tujuan'       => 'required',
            'status'       => 'required',
            'total_biaya'  => 'required|numeric',
        ]);

        PeminjamanFasilitas::create($request->all());

        return redirect()->route('peminjaman.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = PeminjamanFasilitas::findOrFail($id);

        return view('pages.peminjaman.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = PeminjamanFasilitas::findOrFail($id);

        $request->validate([
            'status' => 'required',
        ]);

        $data->update([
            'status' => $request->status,
        ]);

        return redirect()->route('peminjaman.index')
            ->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        PeminjamanFasilitas::findOrFail($id)->delete();

        return redirect()->route('peminjaman.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
