<!-- Layout for detailed rental information -->

@extends('client.layout')
@section('content')

<div style="background-color: #145229; min-height: 100vh; display: flex; flex-direction: column;">
<br><br>

    <!-- Main Content Section -->
    <main style="flex: 1;">
        <div class="container" style="margin-bottom: 100px; padding-top: 50px; color: white">
            <h2 style="font-weight: bold; text-align: center; text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);">Detail Penyewaan</h2><br>
            <div class="card" style="background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Harga Sewa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detailRentLogs as $detail)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $detail->barang->nama }}</td>
                            <td>Rp {{ number_format($detail->harga_sewa, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    <a href="{{ url('pembayaran') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </main>

</div>
@endsection
