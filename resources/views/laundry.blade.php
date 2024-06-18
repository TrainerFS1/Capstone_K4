<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Cucian.id</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/templatemo-digimedia-v3.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animated.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
.floating-btn {
  z-index: 10000000000000000000000;
  position: fixed;
  bottom: 20px;
  right: 20px;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  background-color: #fe639c;
  color: #fff;
  border: solid 1px white;
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

.floating-btn1 {
  z-index: 10000000000000000000000;
  position: fixed;
  bottom: 100px;
  right: 20px;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  background-color: #fe639c;
  color: #fff;
  border: solid 1px white;
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

.floating-btn:hover {
  background-color: #0056b3;
}

.floating-btn .fas {
  font-size: 20px;
}
</style>

  </head>

<body>
  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>


  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="#top" class="logo">
              <img src="{{ asset('images/logo-v3fix.png') }}" alt="Logo" style="height: 50px; width: auto;">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="#about">tracking</a></li>
              <li class="scroll-to-section"><a href="#portfolio">service</a></li>
              <li class="scroll-to-section"><a href="#services">reviews</a></li>
              <li class="scroll-to-section"><a href="#location">location</a></li>
              <li class="scroll-to-section">
              {{-- <li class="scroll-to-section"><div class="border-first-button"><a href="#contact">Login/Register</a></div></li> --}}
              
            </ul>
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>

        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->
  <a href="{{route('createReport')}}">
  <button type="button" class="floating-btn btn btn-primary">
    <i class="fas bi bi-envelope"></i>
  </button>
  </a>
  <a href="https://wa.me/+6282110000000">
  <button type="button" class="floating-btn1 btn btn-success" data-toggle="modal" data-target="#staticBackdrop">
    <image src="{{ asset('images/whatsapp.svg') }}" alt="Logo" style="height: 20px; width: 20;">
  </button>
  </a>

  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-6 align-self-center">
            <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
              <div class="row">
                <div class="col-lg-16">
                  <h6>Ayo, Cuci di Cucian.id!</h6>
                  <h2>Cucian Bersih, Hidup Berkilau</h2>
                  <p>Cucian.id adalah layanan laundry modern yang mengutamakan kualitas dan kemudahan. Dengan teknologi terkini dan perhatian pada detail, Cucian.id menawarkan pencucian pakaian yang cepat, efisien, dan terpercaya, memastikan hasil yang bersih, harum, dan rapi untuk meningkatkan kenyamanan dan kepercayaan diri Anda.</p>
                </div>
                <div class="col-lg-5">
                  <div class="border-first-button scroll-to-section">
                    <a href="#contact">Request Pickup</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
              <img src="{{ asset('images/slider-dec-v3fix.png') }}" alt="dec" style="height: 500px; width: auto;">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="about" class="about section">
  <div id="free-quote" class="free-quote">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 offset-lg-12">
          <div class="section-heading wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
            <h6>Apakah sudah selesai Laundry kamu?</h6>
            <h4> Cek No ID Cucian.id</h4>
            <div class="line-dec"></div>
          </div>
        </div>
        <div class="col-lg-8 offset-lg-2 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
            <form id="search" action="{{ route('searchTransaction') }}" method="GET">
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <fieldset>
                            <input name="keyword" type="search" class="form-control" id="keyword" placeholder="No ID Cucian.id....." aria-label="Search">
                        </fieldset>
                    </div>
                    <div class="col-lg-8 col-sm-6">
                        <fieldset>
                            <button type="submit" class="main-button">Cek Sekarang</button>
                        </fieldset>
                    </div>
                </div>
            </form>
            
        </div>
      </div>
    </div>
  </div>
</div>

  <div id="portfolio" class="our-portfolio section">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
            <h4>Layanan Laundry di <em>Cucian.id</em></h4>
            <div class="line-dec"></div>
          </div>
        </div>
      </div>
    </div>
    

    <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
      <div class="row">
        <div class="col-lg-12">
          <div class="loop owl-carousel">
            
            @if(isset($packages) && $packages->count() > 0)
            @foreach($packages as $package)
                <div class="item">
                    <a href="#">
                        <div class="portfolio-item">
                            <div class="thumb">
                                <img src="{{ asset('storage/packages/' . $package->packageGambar) }}" alt="{{ $package->packageName }}">
                            </div>
                            <div class="down-content">
                                <h4>{{ $package->packageName }}</h4>
                                <span>{!! $package->packageDeskripsi !!}</span>
                                
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        @else
            <p>Tidak ada paket yang tersedia.</p>
        @endif

          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="services" class="services section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                    <h6>Ulasan Pelanggan</h6>
                    <h4>Apa Kata <em>Pelanggan Kami</em></h4>
                    <div class="line-dec"></div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="naccs">
                    <div class="grid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="menu">
                                    <div class="first-thumb active">
                                        <div class="thumb">
                                            <span class="icon"><img src="{{ asset('images/demo-2.jpg') }}" alt=""></span>
                                            John Doe
                                        </div>
                                    </div>
                                    <div>
                                        <div class="thumb">
                                            <span class="icon"><img src="{{ asset('images/demo-2.jpg') }}" alt=""></span>
                                            Jane Smith
                                        </div>
                                    </div>
                                    <div>
                                        <div class="thumb">
                                            <span class="icon"><img src="{{ asset('images/demo-2.jpg') }}" alt=""></span>
                                            Michael Johnson
                                        </div>
                                    </div>
                                    <div>
                                        <div class="thumb">
                                            <span class="icon"><img src="{{ asset('images/demo-2.jpg') }}" alt=""></span>
                                            Emily Davis
                                        </div>
                                    </div>
                                    <div class="last-thumb">
                                        <div class="thumb">
                                            <span class="icon"><img src="{{ asset('images/demo-2.jpg') }}" alt=""></span>
                                            Sarah Wilson
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <ul class="nacc">
                                    <li class="active">
                                        <div>
                                            <div class="thumb">
                                                <div class="row">
                                                    <div class="col-lg-6 align-self-center">
                                                        <div class="left-text">
                                                            <h4>John Doe</h4>
                                                            <p>
                                                    "Cucian.ID adalah solusi sempurna untuk laundry Anda. Kualitas pencucian yang luar biasa, proses pemesanan yang mudah, dan layanan pelanggan yang responsif. Antar-jemput tepat waktu dan harga yang terjangkau. Sangat merekomendasikan! Terima kasih, Cucian.ID!"</p>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 align-self-center">
                                                        <div class="right-image">
                                                            <img src="{{ asset('images/demo-2.jpg') }}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <div class="thumb">
                                                <div class="row">
                                                    <div class="col-lg-6 align-self-center">
                                                        <div class="left-text">
                                                            <h4>Jane Smith</h4>
                                                            <p>
                                            "Cucian.ID adalah solusi sempurna untuk laundry Anda. Kualitas pencucian yang luar biasa, proses pemesanan yang mudah, dan layanan pelanggan yang responsif. Antar-jemput tepat waktu dan harga yang terjangkau. Sangat merekomendasikan! Terima kasih, Cucian.ID!"</p>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 align-self-center">
                                                        <div class="right-image">
                                                            <img src="{{ asset('images/demo-2.jpg') }}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <div class="thumb">
                                                <div class="row">
                                                    <div class="col-lg-6 align-self-center">
                                                        <div class="left-text">
                                                            <h4>Michael Johnson</h4>
                                                            <p>
                                            "Cucian.ID adalah solusi sempurna untuk laundry Anda. Kualitas pencucian yang luar biasa, proses pemesanan yang mudah, dan layanan pelanggan yang responsif. Antar-jemput tepat waktu dan harga yang terjangkau. Sangat merekomendasikan! Terima kasih, Cucian.ID!"</p>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 align-self-center">
                                                        <div class="right-image">
                                                            <img src="{{ asset('images/demo-3.jpg') }}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <div class="thumb">
                                                <div class="row">
                                                    <div class="col-lg-6 align-self-center">
                                                        <div class="left-text">
                                                            <h4>Emily Davis</h4>
                                                            <p>
                                                             "Cucian.ID adalah solusi sempurna untuk laundry Anda. Kualitas pencucian yang luar biasa, proses pemesanan yang mudah, dan layanan pelanggan yang responsif. Antar-jemput tepat waktu dan harga yang terjangkau. Sangat merekomendasikan! Terima kasih, Cucian.ID!"</p>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 align-self-center">
                                                        <div class="right-image">
                                                            <img src="{{ asset('images/demo-2.jpg') }}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <div class="thumb">
                                                <div class="row">
                                                    <div class="col-lg-6 align-self-center">
                                                        <div class="left-text">
                                                            <h4>Sarah Wilson</h4>
                                                            <p>
                                                            "Cucian.ID adalah solusi sempurna untuk laundry Anda. Kualitas pencucian yang luar biasa, proses pemesanan yang mudah, dan layanan pelanggan yang responsif. Antar-jemput tepat waktu dan harga yang terjangkau. Sangat merekomendasikan! Terima kasih, Cucian.ID!"</p>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 align-self-center">
                                                        <div class="right-image">
                                                            <img src="{{ asset('images/demo-1.jpg') }}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="add-review">
                                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reviewModal">
                                        Tambahkan Ulasan
                                    </button> --}}
                                </div>
                                {{-- <div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="reviewModalLabel">Tambah Ulasan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="form-group">
                                                        <label for="reviewerName">Nama</label>
                                                        <input type="text" class="form-control" id="reviewerName" placeholder="Masukkan nama Anda">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="reviewText">Ulasan</label>
                                                        <textarea class="form-control" id="reviewText" rows="3" placeholder="Tulis ulasan Anda di sini"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="reviewImage">Gambar</label>
                                                        <input type="file" class="form-control-file" id="reviewImage">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                   <!-- Bootstrap CSS -->
                    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
                    <!-- jQuery -->
                    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                    <!-- Bootstrap JS -->
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
            <h6>location</h6>
            <h4>Get In Touch With Us <em>Now</em></h4>
            <div class="line-dec"></div>
          </div>
        </div>
        <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <form id="contact" action="" method="post">
            <div class="row">
              <div class="col-lg-12">
                <div class="contact-dec">
                  <img src="{{ asset('images/contact-dec-v3.png') }}" alt="">
                </div>
              </div>
              <div class="col-lg-5">
    <div id="map">
        <iframe src="https://maps.google.com/maps?q=Jl.%20Kalisombo%20No.18,%20Salatiga,%20Kec.%20Sidorejo,%20Kota%20Salatiga,%20Jawa%20Tengah%2050711&t=&z=13&ie=UTF8&iwloc=&output=embed" width="250%" height="636px" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
            {{-- </div>
                        <div class="col-lg-7">
                            <div class="fill-form">
                            <div class="row">
                                <div class="col-lg-4">
                                <div class="info-post">
                                    <div class="icon">
                                    <img src="assets/images/phone-icon.png" alt="">
                                    <a href="#">010-020-0340</a>
                                    </div>
                                </div>
                                </div>
                                <div class="col-lg-4">
                                <div class="info-post">
                                    <div class="icon">
                                    <img src="assets/images/email-icon.png" alt="">
                                    <a href="#">our@email.com</a>
                                    </div>
                                </div>
                                </div>
                                <div class="col-lg-4">
                                <div class="info-post">
                                    <div class="icon">
                                    <img src="assets/images/location-icon.png" alt="">
                                    <a href="#">123 Rio de Janeiro</a>
                                    </div>
                                </div>
                                </div> --}}

                            </div>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
     </div>

    <footer>
        <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <p>Copyright © 2024 cucian.id.
            <br><a href="https://www.gamelab.id/" target="_parent" title="free css templates">Kelompok 4 Capstone</a></p>
            </div>
        </div>
        </div>
    </footer>


  <!-- Scripts -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
  <script src="{{ asset('assets/js/animation.js') }}"></script>
  <script src="{{ asset('assets/js/imagesloaded.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  <script src="{{ asset('js/sweetalert.min.js') }}"></script>
</body>
</html>
