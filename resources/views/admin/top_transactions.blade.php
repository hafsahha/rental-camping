@extends('admin.layout')
@section('content')

<div class="green-background" style = "background-color: #145229; padding: 100px; padding-bottom: 400px">
<div class="container" style="margin-bottom: 110px;" >
<h2 class="card-title text-center text-white" style="font-weight: bold; text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);">
                Top 10 Transaksi 
            </h2><br>

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
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($topTransactions as $index => $transaction)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $transaction->nama_penyewa }}</td>
                    <td>Rp {{ number_format($transaction->total_harga_sewa, 0, ',', '.') }}</td>
                    <td>{{ $transaction->rent_date }}</td>
                    <td>{{ $transaction->return_date }}</td>
                    <td>{{ $transaction->lama_hari }}</td>
                    <td>{{ $transaction->actual_return_date }}</td>
                    <td>{{ $transaction->status }}</td>
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
