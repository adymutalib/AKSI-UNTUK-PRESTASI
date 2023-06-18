@extends('layout.index')

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="500">
            <h1>Selamat Datang di Pusat Informasi Ekstrakulikuler</h1>
            <h2>Website ini bertujuan untuk memberikan informasi tentang Ekstrakurikuler</h2>
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container"><div class="row">
                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
                        <p>
                            Ekstrakurikuler atau 'ekskul' merupakan program tambahan yang diadakan di institusi pendidikan,
                            ekstrakulikuler dilaksanakan di luar jam sekolah atau setelah proses pembelajaran. Dengan
                            beragam kegiatan yang diminati oleh banyak peserta didik, ekstrakurikuler menawarkan manfaat
                            yang banyak. Meskipun kegiatan akademis memegang peranan penting, tak dapat diabaikan bahwa
                            ekstrakurikuler juga memiliki potensi besar dalam mendukung kemajuan akademis seseorang.
                        </p>
                    </div>

                    <div class="col-lg-6">
                      <div class="row g-4 align-items-center">
                          <div class="col-md-6">
                              <div class="row g-4">
                                  <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                                      <div class="text-center rounded py-5 px-4"
                                          style="box-shadow: 0 0 45px rgba(0,0,0,.08); background-color: #609966; color: white">
                                          <p class="mb-0">Menumbuhkan Rasa Percaya Diri</p>
                                      </div>
                                  </div>
                                  <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                                      <div class="text-center rounded py-5 px-4"
                                          style="box-shadow: 0 0 45px rgba(0,0,0,.08); background-color: #609966; color: white">
                                          <p class="mb-0">Mengasah Kemampuan Bersama</p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6 wow fadeIn" data-wow-delay="0.7s">
                              <div class="text-center rounded py-5 px-4" 
                              style="box-shadow: 0 0 45px rgba(0,0,0,.08); background-color: #609966; color: white">
                                  <p class="mb-0">Menyalurkan Kreativitas dan Bakat</p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>


            </div>
        </section><!-- End About Section -->

        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
            <div class="container" data-aos="zoom-in">

                <div class="text-center">
                    <h3>Back To Home</h3>
                    <p>Informasi bukanlah pengetahuan. Satu-satunya sumber pengetahuan adalah pengalaman. <br>- Albert
                        Einstein -</p>
                    <a class="cta-btn" href="#">Back To Home</a>
                </div>

            </div>
        </section><!-- End Cta Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container">

                <div class="section-title">
                    <span>Ekstrakulikuler</span>
                    <h2>Ekstrakulikuler</h2>
                    <p>Silahkan klik salah satu Ekstrakulikuler yang ingin anda ketahui.</p>
                </div>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="150">
                    @foreach ($ekstra as $item)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <img src="{{ asset('storage/app/'. $item->image) }}" class="img-fluid" alt="ekstra">
                        <div class="portfolio-info">
                            <h4>{{$item->nama_ekstra}}</h4> 
                            <a href="{{ asset('storage/app/'. $item->image) }}" alt="ekstraa"></i>
                                <p style="text-align: justify">{{$item->penjelasan}}</p><br>
                                <p style="text-align: justify"><b>Pembina Ekstrakurikuler</b><br> {{$item->pembina->nama}}</p>

                            </a>
                        </div>
                    </div>
                    @endforeach
                  </div>
                </div>

            </div>
        </section>


        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container">

                <div class="section-title">
                    <span>Team</span>
                    <h2>Team</h2>
                    <p>Tim Pengembang</p>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
                        <div class="member">
                            <img src="{{ asset('assets/img/adymutalib.png') }}" alt="ady">
                            <h4>Ady Mutalib</h4>
                            <span>2110131120001</span>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
                        <div class="member">
                            <img src="{{ asset('assets/img/erlyn.png') }}" alt="erlyn">
                            <h4>Adelia Erlyn Nor Candra Prasetyana</h4>
                            <span>2110131320010</span>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
                        <div class="member">
                            <img src="{{ asset('assets/img/iifalifah.png') }}" alt="iif">
                            <h4>Iif Alifah</h4>
                            <span>2110131220013</span>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Team Section -->

    </main><!-- End #main -->
    
@endsection
