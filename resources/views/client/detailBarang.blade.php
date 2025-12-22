<!-- resources/views/barang/show.blade.php -->

@extends('client.layout')
@section('content')


<div class="green-background" style = "background-color: #145229; padding: 100px; padding-bottom: 10px">
<div class="container mt-4" style="margin-bottom: 150px;">
<h2 class="card-title text-center text-white" style="font-weight: bold; text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);">
                Detail Barang
            </h2><br>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    @if($barang->foto)
                        <img src="{{ asset('landingpage/' . $barang->foto) }}" alt="{{ $barang->nama }}" class="img-fluid">
                    @else
                        <p>Tidak ada foto yang tersedia.</p>
                    @endif
                </div>
                <div class="col-md-8">
                    <h3 style="font-weight: bold;" class="card-title">{{ $barang->nama }}</h3><br>
                    <p class="card-text"><strong>Harga Sewa:<br></strong> Rp {{ number_format($barang->harga_sewa, 0, ',', '.') }}</p>
                    <p class="card-text"><strong>Status:<br></strong> {{ $barang->status }}</p>
                    <p class="card-text"><strong>Deskripsi:<br></strong> {{ $barang->deskripsi }}</p>
                </div>
            </div>
        </div>
    </div>
        <br>
        <a href="{{ url('barang') }}" class="btn btn-primary">Kembali</a>
</div>
</div>

@endsection
