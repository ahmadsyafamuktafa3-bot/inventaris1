<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Barang::with(['kategori', 'lokasi'])->latest()->get();
        
        return view('barang.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori=Kategori::all();
        $lokasi=Lokasi::all(); 
        return view('barang.create', compact('kategori', 'lokasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:barangs,kode',
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'lokasi_id' => 'required|exists:lokasis,id',
            'stok' => 'required|integer|min:0',
            'kondisi' => 'required|string',

        ],
        [
            'kode.unique' => 'Kode barang sudah digunakan.',
            'stok.min' => 'Stok tidak boleh kurang dari 0.',
        ]);

        Barang::create($request->all());
        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Kategori::all();
        $lokasi = Lokasi::all();
        $data = Barang::findOrFail($id);
        return view('barang.edit', compact('kategori', 'lokasi', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode' => 'required|unique:barangs,kode',
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'lokasi_id' => 'required|exists:lokasis,id',
            'stok' => 'required|integer|min:0',
            'kondisi' => 'required|string',

        ]);

        $barang->update($request->all());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}
