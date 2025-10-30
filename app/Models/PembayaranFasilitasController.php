<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PembayaranFasilitas;
use App\Models\PeminjamanFasilitas;

class PembayaranFasilitasController extends Controller
{
    public function index()
    {
        $data = PembayaranFasilitas::with('peminjaman')->latest()->get();
        return view('admin.pembayaran.index', compact('data'));
    }

    public function create()
    {
        $peminjaman = PeminjamanFasilitas::all();
        return view('admin.pembayaran.create', compact('peminjaman'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pinjam_id' => 'required',
            'tanggal' => 'required|date',
            'jumlah' => 'required|numeric',
            'metode' => 'required',
            'bukti_bayar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('bukti_bayar')) {
            $data['bukti_bayar'] = $request->file('bukti_bayar')->store('bukti', 'public');
        }

        PembayaranFasilitas::create($data);
        return redirect()->route('admin.pembayaran.index')->with('success','Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pembayaran = PembayaranFasilitas::findOrFail($id);
        $peminjaman = PeminjamanFasilitas::all();
        return view('admin.pembayaran.edit', compact('pembayaran', 'peminjaman'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pinjam_id' => 'required',
            'tanggal' => 'required|date',
            'jumlah' => 'required|numeric',
            'metode' => 'required',
        ]);

        $pembayaran = PembayaranFasilitas::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('bukti_bayar')) {
            $data['bukti_bayar'] = $request->file('bukti_bayar')->store('bukti', 'public');
        }

        $pembayaran->update($data);
        return redirect()->route('admin.pembayaran.index')->with('success','Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        PembayaranFasilitas::findOrFail($id)->delete();
        return redirect()->route('admin.pembayaran.index')->with('success','Data berhasil dihapus');
    }
}
