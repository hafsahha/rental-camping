<!-- TAMPILAN BARANG UNTUK CLIENT -->

@extends('client.layout')
@section('content')


<!-- List Barang Section -->

  <section class="rent_section layout_padding">
    <h2 class="card-title text-center text-white" style="font-weight: bold; text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);">
      Barang-Barang Kami
    </h2>
    <p class="card-title text-center text-white" style=" text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);">
     Silahkan pilih barangnya dan booking sekarang!
    </p><br>
    <div class="container">
      <div class="rent_container">
        @foreach($data as $row)
        <div class="box">
          <div class="img-box">
            <img src="{{ secure_asset('landingpage/'.$row->foto)}}" alt="" width="200" height="200">
          </div>
          <div class="mt-2">
            <p>
                <span style="font-weight:bold">{{$row->nama}}</span>
                <br>
                <span>Rp {{number_format($row->harga_sewa, 0, ',', '.')}} / Hari</span><br>
                <span>{{ $row->status }}</span> <!-- Tampilkan status barang -->
            </p>
          </div>
          <div class="price">
          @if($row->status == 'tersedia')
      <button type="button" class="btnTambahKeranjang"
        data-id="{{ $row->id }}"
        data-nama="{{ $row->nama }}"
        data-harga_sewa="{{ $row->harga_sewa }}"
        data-foto="{{ $row->foto }}">
        Tambah Ke Keranjang
      </button><br><br>
        <a href="{{ route('barang.show', $row->id) }}" class="btn btn-info">Detail</a><br><br>
    @else
        <button type="button" disabled>Tidak Tersedia</button> <!-- Tombol nonaktif jika barang tidak tersedia --><br><br>
        <a href="{{ route('barang.show', $row->id) }}" class="btn btn-info">Detail</a><br><br>
    @endif
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

<!-- end List Barang section -->

  <script>
    $(document).ready(function() {
        // Setup CSRF token untuk setiap permintaan Ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        // Memproses klik pada setiap tombol dengan kelas .btnTambahKeranjang
        $('.btnTambahKeranjang').each(function() {
            $(this).on('click', function() {
                var id = $(this).data('id'); // Mendapatkan nilai data-id dari tombol yang diklik
                // Permintaan Ajax untuk menambahkan barang ke keranjang
                $.ajax({
                    url: '{{ url("addtocart") }}', // URL endpoint untuk menambahkan ke keranjang
                    method: 'POST', // Metode HTTP POST
                    data: {
                        id_barang: id // Data yang dikirimkan: id_barang yang diambil dari data-id tombol
                    },
                    success: function(response) {
                        alert(response.success); // Alert pesan sukses dari respons server
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText); // Log pesan error jika terjadi kesalahan
                    }
                });
            })
        })
    })
</script>

@endsection
