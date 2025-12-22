@extends('admin.layout')
@section('content')


<div class="green-background" style = "background-color: #145229; padding: 100px; padding-bottom: 400px">
<div class="container">
<h2 class="card-title text-center text-white" style="font-weight: bold; text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);">
                Laporan Keuangan 
            </h2><br>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Total Pendapatan</h2>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $totalRevenueFormatted }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Total Denda</h2>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $totalPenaltyFormatted }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

<div class="container" style="margin-bottom: 100px;>
    <div class="table-responsive">
    <div class="card">
    <div class="card-body">
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
                    <th>Status/Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($approvedTransactions as $index => $transaction)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $transaction->nama_penyewa }}</td>
                    <td>Rp {{ number_format($transaction->total_harga_sewa, 0, ',', '.') }}</td>
                    <td>{{ $transaction->rent_date }}</td>
                    <td>{{ $transaction->return_date }}</td>
                    <td>{{ $transaction->lama_hari }}</td>
                    <td>{{ $transaction->actual_return_date }}</td>
                    <td>Rp {{ number_format($transaction->total_denda, 0, ',', '.') }}</td>
                    <td>
                        @if($transaction->status == 'approved')
                            <span>Approved</span>
                        @elseif($transaction->status == 'dipinjam')
                            <span>Dipinjam</span>
                        @elseif($transaction->status == 'dikembalikan')
                            <span>Dikembalikan</span>
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
