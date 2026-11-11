@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Inventaris</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('barang.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Lokasi</th>
                    <th>Stok</th>
                    <th>Kondisi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $index => $row)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $row->kode }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->kategori }}</td>
                    <td>{{ $row->lokasi }}</td>
                    <td>{{ $row->stok }}</td>
                    <td>
                        <a href="{{ route('barang.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        
                        <form action="{{ route('barang.destroy', $row->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">Data kosong.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection