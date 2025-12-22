<!-- Tampilan untuk halaman utama atau home bagi client -->

@extends('client.layout')
@section('content')

<!-- slider section -->

<section class=" slider_section position-relative">
      <div class="slider_container">
        <div class="img-box">
          <img src="{{asset('landingpage/images/hero-img.jpg')}}" alt="">
        </div>
        <div class="detail_container">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="detail-box">
                  <h1>
                    Rental <br>
                    Peralatan <br>
                    Camping
                  </h1>
                  <a href="{{ url('barang') }}">
                    Booking Sekarang!
                  </a>
                </div>
              </div>
              <div class="carousel-item">
                <div class="detail-box">
                  <h1>
                    Mudah <br>
                    Cepat <br>
                    Nyaman
                  </h1>
                  <a href="{{ url('barang') }}">
                  Booking Sekarang!
                  </a>
                </div>
              </div>
              <div class="carousel-item">
                <div class="detail-box">
                  <h1>
                    Let's <br>
                    Camping! <br>
                  </h1>
                  <a href="{{ url('barang') }}">
                  Booking Sekarang!
                  </a>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="sr-only">Next</span>
            </a>
          </div>

        </div>
      </div>
    </section>
  </div>

  <!-- end slider section -->
 

  <!-- Info section -->

  <section class="car_section layout_padding2-top layout_padding-bottom">
    <div class="container">
      <div class="heading_container">
        <h2>
          Cari peralatan untuk camping kamu.
        </h2>
        <p>
          Tersedia berbagai macam barang yang siap dirental!.
        </p>
      </div>
      <div class="car_container">
        <div class="box">
          <div class="img-box">
            <img src="{{asset('landingpage/images/c-1.png')}}" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Pilih Barang
            </h5>
            <p>
              Pilih barang-barang untuk kegiatan camping anda!
            </p>
            
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="{{asset('landingpage/images/c-2.png')}}" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Rental Barang
            </h5>
            <p>
              Lakukan booking dan pembayaran.
            </p>
            
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="{{asset('landingpage/images/c-3.png')}}" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Enjoy Camping
            </h5>
            <p>
              Nikmati camping anda dengan peralatan camping dari kami.
            </p>
            
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end Info section -->

  <!-- best section -->

  <section class="best_section">
    <div class="container">
      <div class="book_now">
        <div class="detail-box">
          <h2>
            Barang-Barang Kami
          </h2>
          <p>
            Terdapat Sepatu, Ransel, Tenda, dll.
          </p>
        </div>
        <div class="btn-box">
          <a href="{{ url('barang') }}">
          Booking Sekarang!
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- end best section -->

 <!-- List Barang-Barang section -->

<section class="rent_section layout_padding">
  <div class="container">
    <div class="rent_container">
      @php
        $barang = DB::table('barang')->get();
      @endphp

      @foreach ($barang as $item)
        <div class="box">
          <div class="img-box">
            <img src="{{ asset('landingpage/'.$item->foto) }}" alt="{{ $item->nama }}" width="200" height="200">
          </div>
          <div class="mt-2">
            <p>
              <span style="font-weight: bold">{{ $item->nama }}</span>
            </p>
          </div>
          <div class="price">
            <div class="btnTambahKeranjang"
                 data-id="{{ $item->id }}"
                 data-nama="{{ $item->nama }}"
                 data-foto="{{ $item->foto }}">
            </div>
          </div>
        </div>
      @endforeach

    </div>
    <div class="btn-box">
      <a href="{{ url('barang') }}">
        See More
      </a>
    </div>
  </div>
</section><br>

<!-- end List Barang-Barang section -->


 <!-- us section -->
<section class="us_section">
  <div class="container">
    <div class="heading_container">
      <h2>Kenapa Memilih Kami?</h2>
      <p>Beberapa alasan mengapa harus memilih kami</p>
    </div>
  </div>
  <div class="us_container layout_padding2">
    <div class="content_box">
      <div class="box">
        <div class="img-box">
          <img src="{{asset('landingpage/images/u-1.png')}}" alt="">
        </div>
        <div class="detail-box">
          <h5>Mudah</h5>
        </div>
      </div>
      <div class="box">
        <div class="img-box">
          <img src="{{asset('landingpage/images/u-2.png')}}" alt="">
        </div>
        <div class="detail-box">
          <h5>Aman</h5>
        </div>
      </div>
      <div class="box">
        <div class="img-box">
          <img src="{{asset('landingpage/images/u-3.png')}}" alt="">
        </div>
        <div class="detail-box">
          <h5>Nyaman</h5>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end us section -->



<!-- Testimoni section -->
<section class="client_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>Testimoni Pelanggan</h2>
            <p>Kami sangat mengharapkan pesan, kritik, maupun saran dari anda agar kami bisa terus lebih baik!</p>
        </div>
        <div class="layout_padding2-top">
            <div class="carousel-wrap">
                <div class="owl-carousel">
                    @foreach($testimonials as $testimonial)
                    <div class="item">
                        <div class="box">
                            <div class="detail-box">
                                <p>{{ $testimonial->message }}</p>
                            </div>
                            <div class="client_id">
                                <div class="name">
                                    <h6>{{ $testimonial->name }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end Testimoni section -->

<!-- Flash Message for Success -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


<!-- Isi testimoni section -->
<section class="contact_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>Beri Ulasan</h2>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="form_container">
                    <form method="POST" action="{{ route('submitTestimonial') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="phone" class="form-control" placeholder="Phone">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <input type="email" name="email" class="form-control" placeholder="Email id">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="message" class="form-control" placeholder="Message" required>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="contact_items">
            <!-- Your contact items and social media icons here -->
        </div>
    </div>
</section>

<!-- end Isi Testimoni section -->

  
@endsection