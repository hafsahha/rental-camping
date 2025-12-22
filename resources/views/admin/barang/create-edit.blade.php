@extends('admin.layout')

@section('content')
<div style = "background-color: #145229; padding: 100px; padding-bottom: 400px">

    <div class="container">
        <h2 class="card-title text-center text-white" style="font-weight: bold; text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);">{{ isset($barang) ? 'Edit Barang' : 'Tambah Barang' }}</h2>
        <form action="{{ isset($barang) ? route('admin.barang.update', $barang->id) : route('admin.barang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($barang))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="nama" style= "color: white">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ isset($barang) ? $barang->nama : '' }}" required>
            </div>
            <div class="form-group">
                <label for="harga_sewa" style= "color: white">Harga Sewa</label>
                <input type="number" class="form-control" id="harga_sewa" name="harga_sewa" value="{{ isset($barang) ? $barang->harga_sewa : '' }}" required>
            </div>
            <div class="form-group">
                <label for="status" style= "color: white">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="tersedia" {{ isset($barang) && $barang->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="tidak tersedia" {{ isset($barang) && $barang->status == 'tidak tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
                </select>
            </div>
            <div class="form-group" style= "color: white">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi">{{ isset($barang) ? $barang->deskripsi : '' }}</textarea>
            </div>
            <div class="form-group" style= "color: white">
                <label for="foto">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
            </div>
            <button type="submit" class="btn btn-primary btn-block">{{ isset($barang) ? 'Update' : 'Simpan' }}</button>

            
        </form><br>
        <a href="{{ url('/admin/barang/index') }}" class="btn btn-primary">Kembali</a>
    </div>
</div>


@endsection
