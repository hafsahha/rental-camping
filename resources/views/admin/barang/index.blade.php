@extends('admin.layout')

@section('content')
<div style = "background-color: #145229; padding: 100px; padding-bottom: 400px">
    <div class="container">


        <!-- Tambah Barang Form -->
        <div class="mb-3">
        <h2 class="card-title text-center text-white" style="font-weight: bold; text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);">
                Tambah Barang 
            </h2>
            <form action="{{ route('admin.barang.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama" style= "color: white">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="harga_sewa" style= "color: white">Harga Sewa</label>
                    <input type="number" class="form-control" id="harga_sewa" name="harga_sewa" required>
                </div>
                <div class="form-group">
                    <label for="status" style= "color: white">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="tersedia">Tersedia</option>
                        <option value="tidak tersedia">Tidak Tersedia</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="deskripsi" style= "color: white">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                </div>
                <div class="form-group" style= "color: white">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button><br>
            </form>
        </div><br><br>

        <!-- Daftar Barang -->
<div>
<h2 class="card-title text-center text-white" style="font-weight: bold; text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);">
                Update atau Delete Barang
            </h2>
    <br>
    <div class="table-responsive">
        <table class="table table-bordered table-striped bg-white">
            <thead >
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga Sewa</th>
                    <th scope="col">Status</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barang as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->harga_sewa }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('admin.barang.edit', $item->id) }}" class="btn btn-sm btn-warning mr-2">Edit</a>
                            <form action="{{ route('admin.barang.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</button>
                            </form>
                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

    </div>
</div>
@endsection
