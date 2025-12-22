@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Daftar Barang</h2>

        <!-- Tambah Barang Form -->
        <div class="mb-3">
            <h4>Tambah Barang</h4>
            <form action="{{ route('admin.barang.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="harga_sewa">Harga Sewa</label>
                    <input type="number" class="form-control" id="harga_sewa" name="harga_sewa" required>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="tersedia">Tersedia</option>
                        <option value="tidak tersedia">Tidak Tersedia</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>

        <!-- Daftar Barang -->
        <div>
            <h4>Daftar Barang</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Harga Sewa</th>
                        <th>Status</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($barang as $barang)
                    <tr>
                        <td>{{ $barang->nama }}</td>
                        <td>{{ $barang->harga_sewa }}</td>
                        <td>{{ $barang->status }}</td>
                        <td>{{ $barang->deskripsi }}</td>
                        <td>
                            <a href="{{ route('admin.barang.edit', $barang->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.barang.destroy', $barang->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
