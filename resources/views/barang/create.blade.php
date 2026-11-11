@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Tambah Barang</h1>

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('barang.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Kode</label>
        <input type="text" name="kode" class="form-control" value="{{ old('kode') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select name="kategori_id" class="form-control" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach ($kategoris as $k)
                <option value="{{ $k->id }}" @selected(old('kategori_id') == $k->id)>
                    {{ $k->nama }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Lokasi</label>
        <select name="lokasi_id" class="form-control" required>
            <option value="">-- Pilih Lokasi --</option>
            @foreach ($lokasis as $l)
                <option value="{{ $l->id }}" @selected(old('lokasi_id') == $l->id)>
                    {{ $l->nama }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Stok</label>
        <input type="number" name="stok" class="form-control" value="{{ old('stok', 0) }}" min="0" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Kondisi</label>
        <select name="kondisi" class="form-control" required>
            <option value="baik" @selected(old('kondisi')=='baik')>Baik</option>
            <option value="rusak" @selected(old('kondisi')=='rusak')>Rusak</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('barang.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection