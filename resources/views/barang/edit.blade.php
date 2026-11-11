@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Data</h1>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('barang.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>kode barang</label>
                <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror" value="{{ old('kode', $data->kode) }}">
                @error('kode') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>nama barang</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $data->nama) }}">
                @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>kategori</label>
                <select name="relasi_id" class="form-control @error('relasi_id') is-invalid @enderror">
                    @foreach($list_relasi as $item)
                        <option value="{{ $item->id }}" {{ $data->relasi_id == $item->id ? 'selected' : '' }}>
                            {{ $item->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Data</button>
            <a href="{{ route('barang.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection