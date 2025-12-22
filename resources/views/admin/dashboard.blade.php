@extends('admin.layout')
@section('content')

<style>
    .container > * {
        margin-top: 10px; 
        margin-bottom: 50px; 
    }
</style>
<div class="green-background" style = "background-color: #145229; padding: 100px; padding-bottom: 400px">
<div class="container">
<h2 class="card-title text-center text-white" style="font-weight: bold; text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);">
                Data Penyewaan 
            </h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Penyewa</th>
                <th>Total Harga Sewa</th>
                <th>Tanggal Sewa</th>
                <th>Tanggal Kembali</th>
                <th>Lama Sewa (Hari)</th>
                <th>Tanggal Pengembalian Sebenarnya</th>
                <th>Denda</th>
                <th>Detail Barang</th>
                <th>Bukti Penyerahan</th>
                <th>Bukti Pengembalian</th>
                <th>Status/Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rentLogs as $rentLog)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $rentLog->nama_penyewa }}</td>
                <td>Rp {{ number_format($rentLog->total_harga_sewa, 0, ',', '.') }}</td>
                <td>{{ $rentLog->rent_date }}</td>
                <td>{{ $rentLog->return_date }}</td>
                <td>{{ $rentLog->lama_hari }}</td>
                <td>{{ $rentLog->actual_return_date }}</td>
                <td>Rp {{ number_format($rentLog->total_denda, 0, ',', '.') }}</td>
                <td><a href="{{ route('sewa.show', $rentLog->id) }}" class="btn btn-info">Detail</a></td>
                <td>
                    @if($rentLog->bukti_penyerahan)
                        <a href="{{ asset('storage/' . $rentLog->bukti_penyerahan) }}" target="_blank">Lihat Bukti</a>
                    @else
                        Tidak Ada Bukti
                    @endif
                </td>
                <td>
                    @if($rentLog->bukti_pengembalian)
                        <a href="{{ asset('storage/' . $rentLog->bukti_pengembalian) }}" target="_blank">Lihat Bukti</a>
                    @else
                        Tidak Ada Bukti
                    @endif
                </td>  
                <td>
                    @if($rentLog->status == 'pending' || $rentLog->status == 'Pending')
                        <form action="{{ route('admin.rent_logs.approve', $rentLog->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Approve</button>
                        </form>
                    @elseif($rentLog->status == 'dipinjam' || $rentLog->status == 'Pending Pengembalian')
                        <form action="{{ route('admin.rent_logs.approve_return', $rentLog->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Approve Pengembalian</button>
                        </form>
                    @else
                        {{ $rentLog->status }}
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
</div>
</div>

@endsection
