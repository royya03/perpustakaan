<?php

namespace App\Http\Controllers;

use App\Models\KoleksiPribadi;
use Illuminate\Http\Request;

class KoleksiPribadiiiController extends Controller
{
    /**
     * Tampilkan daftar semua koleksi pribadi.
     */
    public function index()
    {
        // Mengambil semua data koleksi pribadi
        $koleksi = KoleksiPribadi::all();
        return view('koleksipribadi.index', compact('koleksi'));
    }

    /**
     * Tampilkan formulir untuk membuat koleksi baru.
     */
    public function create()
    {
        // Mengembalikan tampilan untuk membuat koleksi baru
        return view('koleksipribadi.create');
    }

    /**
     * Simpan koleksi baru ke dalam penyimpanan.
     */
    public function store(Request $request)
    {
        // Validasi dan simpan koleksi baru
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tahun' => 'required|integer',
        ]);

        KoleksiPribadi::create($request->all());
        return redirect()->route('koleksipribadi.index')->with('success', 'Koleksi berhasil ditambahkan.');
    }

    /**
     * Tampilkan koleksi pribadi yang ditentukan.
     */
    public function show(string $id)
    {
        // Cari koleksi berdasarkan ID
        $koleksi = KoleksiPribadi::findOrFail($id);
        return view('koleksipribadi.show', compact('koleksi'));
    }

    /**
     * Tampilkan formulir untuk mengedit koleksi yang ditentukan.
     */
    public function edit(string $id)
    {
        // Cari koleksi yang akan diedit
        $koleksi = KoleksiPribadi::findOrFail($id);
        return view('koleksipribadi.edit', compact('koleksi'));
    }

    /**
     * Perbarui koleksi yang ditentukan di dalam penyimpanan.
     */
    public function update(Request $request, string $id)
    {
        // Validasi dan perbarui koleksi
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tahun' => 'required|integer',
        ]);

        $koleksi = KoleksiPribadi::findOrFail($id);
        $koleksi->update($request->all());
        return redirect()->route('koleksipribadi.index')->with('success', 'Koleksi berhasil diperbarui.');
    }

    /**
     * Hapus koleksi yang ditentukan dari penyimpanan.
     */
    public function destroy(string $id)
    {
        // Hapus koleksi yang ditentukan
        $koleksi = KoleksiPribadi::findOrFail($id);
        $koleksi->delete();
        return redirect()->route('koleksipribadi.index')->with('success', 'Koleksi berhasil dihapus.');
    }
}
