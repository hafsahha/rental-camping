@extends('client.layout')

@section('content')

<div class="green-background" style = "background-color: #145229; padding: 20px; padding-bottom: 10px">
    <div class="container mt-4" style="padding-top: 50px;">
    <h2 class="card-title text-center text-white" style="font-weight: bold; text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);">
        Data Penyewaan
    </h2><br>
    @if(session('success_penyewaan'))
                    <div class="alert alert-success">
                        {{ session('success_penyewaan') }}
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
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
                                <th>Bukti Penyerahan</th>
                                <th>Bukti Pengembalian</th>
                                <th>Status</th>
                                <th>Detail</th>
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
                                    <td>{{ $rentLog->status }}</td>
                                    <td><a href="{{ route('sewa.show', $rentLog->id) }}" class="btn btn-info">Detail</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="container mt-4">
        <h2 class="card-title text-center text-white" style="font-weight: bold; text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);">
            QRIS
        </h2><br>
        
            <div class="text-center">
                <img src="{{ asset('landingpage/images/qris.jpg') }}" class="img-fluid" alt="QRIS Payment">
            </div>
        
    </div><br><br>


    <div class="container mt-4">
    <h2 class="card-title text-center text-white" style="font-weight: bold; text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);">
                Unggah Bukti Penyerahan & Pembayaran
            </h2><br>
        <div class="card">
            <div class="card-body">
                <p>Pembayaran Melalui QRIS di atas</p>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('pembayaran.upload') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="rentLog_id" class="form-label">Pilih Penyewaan</label>
                        <select class="form-control" name="rentLog_id" required>
                            <option value="">Pilih Penyewaan</option>
                            @foreach($rentLogs as $rentLog)
                                <option value="{{ $rentLog->id }}">{{ $rentLog->nama_penyewa }} - {{ $rentLog->rent_date }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="bukti_penyerahan" class="form-label">Unggah Bukti Penyerahan</label>
                        <input type="file" class="form-control" name="bukti_penyerahan" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Unggah</button>
                </form>
            </div>
        </div>
    </div>
    <br>

    <div class="container mt-4">
    <h2 class="card-title text-center text-white" style="font-weight: bold; text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);">
                Submit Tanggal Pengembalian
            </h2><br>
        <div class="card">
            <div class="card-body">
                @if(session('success_actual_return_date'))
                    <div class="alert alert-success">
                        {{ session('success_actual_return_date') }}
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('submit.actual_return_date') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="rentLog_id_return" class="form-label">Pilih Penyewaan</label>
                        <select class="form-control" name="rentLog_id_return" required>
                            <option value="">Pilih Penyewaan</option>
                            @foreach($rentLogs as $rentLog)
                                <option value="{{ $rentLog->id }}">{{ $rentLog->nama_penyewa }} - {{ $rentLog->rent_date }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="actual_return_date" class="form-label">Tanggal Pengembalian Sebenarnya</label>
                        <input type="date" class="form-control" name="actual_return_date" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Tanggal Pengembalian</button>
                </form>
            </div>
        </div>
    </div>
<br>
    <div class="container mt-4">
    <h2 class="card-title text-center text-white" style="font-weight: bold; text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);">
                Unggah Bukti Penyerahan & Pembayaran Denda
            </h2><br>
        <div class="card">
            <div class="card-body">
            <p>Pembayaran Melalui QRIS di atas</p>
                @if(session('success_return'))
                    <div class="alert alert-success">
                        {{ session('success_return') }}
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('pengembalian.upload') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="rentLog_id_return" class="form-label">Pilih Penyewaan</label>
                        <select class="form-control" name="rentLog_id_return" required>
                            <option value="">Pilih Penyewaan</option>
                            @foreach($rentLogs as $rentLog)
                                <option value="{{ $rentLog->id }}">{{ $rentLog->nama_penyewa }} - {{ $rentLog->rent_date }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="bukti_pengembalian" class="form-label">Unggah Bukti Pengembalian</label>
                        <input type="file" class="form-control" name="bukti_pengembalian" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Unggah</button>
                </form>
            </div>
        </div>
    </div><br><br>
</div>
@endsection
