<!-- Tampilan untuk penyewaan bagi client -->

@extends('client.layout')
@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<form method="post" action="{{ route('pembayaran.index') }}">
@csrf
<section class="car_section layout_padding" style = "background-color: #145229; padding: 100px; padding-bottom: 100px">
    <div class="container">
        <div class="heading-container">
            <h2 class="card-title text-center text-white" style="font-weight: bold; text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);">
                Form Penyewaan Peralatan Camping
            </h2><br>
            <div class="card-body">
            <table class="table table-bordered bg-white"> 
                <thead>
                    <tr align="center">
                        <th style="width:10px">No</th>
                        <th>Nama Barang</th>
                        <th>Harga Sewa</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @forelse($cart as $row) 
                    <tr align="center">
                        <td>{{ $i++ }}</td>
                        <td>{{ $row['nama'] }}</td>
                        <td>Rp <span>{{ number_format($row['harga_sewa'], 0, ',', '.') }}</span></td>
                        <td><img src="{{asset('landingpage/'.$row['foto'])}}" width="100" height="100"></td>
                        <input type="hidden" name="harga_sewa[]" class="harga_sewa" value="{{ $row['harga_sewa'] }}">
                        <input type="hidden" name="id_barang[]" value="{{ $row['id_barang'] }}">
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">Data Tidak Ada</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="card mt-2">
                <div class="card-body">                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama_penyewa" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_penyewa" id="nama_penyewa" required>                
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Lama Sewa (Hari)</label>
                                <input type="number" size="20" name="lama_hari" class="form-control lama_hari" min="1" max="30" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Total Bayar</label>
                                <input type="text" name="total_harga_sewa" class="form-control totalBayar" readonly>
                            </div>
                        </div>
                    </div><br>
                    <button type="submit" class="btn btn-primary">Sewa Sekarang</button>                
                </div>
            </div>
        </div>
    </div>
</section>
</form>

<script>
    $(document).ready(function() {
        var total = 0;
        var totalBayar = 0;
        $('.harga_sewa').each(function() {
            var harga_sewa = $(this).val();
            total += parseInt(harga_sewa);
        })
        
        $('.lama_hari').on('change', function() {
            var lama_hari = $(this).val();
            totalBayar = parseInt(lama_hari * total); 

            $('.totalBayar').val(totalBayar);
        });

        
    })
</script>
@endsection