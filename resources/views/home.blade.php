@extends('layout.main')
@section('title', 'Home')
@section('menuHome', 'active', 'bold')
@section('content')
@include('sweetalert::alert')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex justify-cntent-center align-items-center">
        <div id="heroCarousel" class="container carousel carousel-fade mb-5" data-bs-ride="carousel" data-bs-interval="5000">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">Selamat Datang di <span>Ruang Belajar</span></h2>
                    <p class="animate__animated animate__fadeInUp">Ruang belajar adalah sebuah platform edukasi online yang
                        menyediakan berbagai macam materi pembelajaran untuk siswa PAUD, SD, dan SMP </p>
                    <a href="#" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">Lorem Ipsum Dolor</h2>
                    <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi
                        ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea
                        voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.
                    </p>
                    <a href="#" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
                </div>
            </div>

            <!-- Slide 3 -->
            {{-- <div class="carousel-item">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">Sequi ea ut et est quaerat</h2>
                    <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                    <a href="#" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
                </div>
            </div> --}}

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
            </a>
        </div>
    </section><!-- End Hero -->

    {{-- Service --}}
    <section class="services">
        <div class="container mt-5">
            <div class="section-title">
                <h2>Manfaat</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
                <div class="icon-box icon-box-green">
                    <div class="icon"><i class="bi bi-book"></i></div>
                    {{-- <h4 class="title"><a href="">Lorem Ipsum</a></h4> --}}
                    <p class="description"> Website ini membantu fasilitas dan menyediakan pendampingan belajar anak dari
                        guru dan tutor yang berpengalaman. </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="icon-box icon-box-cyan">
                    <div class="icon"><i class="bi bi-lightbulb"></i></div>
                    {{-- <h4 class="title"><a href="">Sed ut perspiciatis</a></h4> --}}
                    <p class="description">
                        memberikan ruang untuk siswa dan guru untuk berbagi karya-karya mereka, ide-ide, dan inovasi dalam
                        pembelajaran.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box icon-box-pink">
                    <div class="icon"><i class="bi bi-heart"></i></div>
                    {{-- <h4 class="title"><a href="">Magni Dolores</a></h4> --}}
                    <p class="description">
                        Mendorong siswa agar termotivasi dan bersemangat dalam proses belajar.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box icon-box-blue">
                    <div class="icon"><i class="bi bi-file-earmark-post"></i></div>
                    {{-- <h4 class="title"><a href="">Nemo Enim</a></h4> --}}
                    <p class="description">Memberikan peluang untuk meningkatkan kualitas pembelajaran dengan menyediakan
                        materi yang beragam </p>
                </div>
            </div>

        </div>

        </div>
    </section>
    {{-- END Service --}}

    {{-- Feature --}}
    <!-- ======= Features Section ======= -->
    <section class="features">
        <div class="container">

            <div class="section-title">
                <h2>Features</h2>
                {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
            </div>

            <div class="row" data-aos="fade-up">
                <div class="col-md-5">
                    <img src="assets/img/features-1.svg" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 pt-4">
                    <h2>Sasaran Prioritas</h2>
                    {{-- <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p> --}}
                    <ul>
                        <li><i class="bi bi-check"></i> Pelajar SD </li>
                        <li><i class="bi bi-check"></i> Pelajar SMP</li>
                        <li><i class="bi bi-check"></i> Anak yang rentan tinggal kelas atau putus sekolah</li>
                    </ul>
                </div>
            </div>

            <div class="row" data-aos="fade-up">
                <div class="col-md-5 order-1 order-md-2">
                    <img src="assets/img/features-2.svg" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 pt-5 order-2 order-md-1">
                    <h2>Fasilitator/ Tutor Pendamping</h2>
                    {{-- <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p> --}}
                    <ul>
                        <li><i class="bi bi-check"></i> Guru </li>
                        <li><i class="bi bi-check"></i> Mahasiswa</li>
                        <li><i class="bi bi-check"></i>Relawan Sahabat Kebaikan Kabupaten Pasuruan</li>
                    </ul>
                </div>
            </div>

            <div class="row" data-aos="fade-up">
                <div class="col-md-5">
                    <img src="assets/img/features-3.svg" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 pt-5">
                    <h3 class="fw-bold">Belajar Tanpa Batas di Ruang Belajar</h3>
                    <p>Temukan kemudahan belajar dengan Ruang Belajar. Kami menawarkan berbagai materi pelajaran untuk membantu Anda mencapai prestasi terbaik.</p>
                    <ul>
                        <li><i class="bi bi-check"></i> <span class="fw-bold">Materi Lengkap:</span> Akses berbagai materi pelajaran sesuai kurikulum.</li>
                        <li><i class="bi bi-check"></i> <span class="fw-bold">Terstruktur dan Sistematis:</span> Materi disusun dengan rapi dan mudah dipahami.</li>
                        <li><i class="bi bi-check"></i> <span class="fw-bold">Akses Mudah:</span> Dapat diakses kapan saja dan di mana saja.</li>
                    </ul>
                </div>
            </div>

            {{-- <div class="row" data-aos="fade-up">
                <div class="col-md-5 order-1 order-md-2">
                    <img src="assets/img/features-4.svg" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 pt-5 order-2 order-md-1">
                    <h3>Quas et necessitatibus eaque impedit ipsum animi consequatur incidunt in</h3>
                    <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore
                        magna aliqua.
                    </p>
                    <p>
                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                        sunt in
                        culpa qui officia deserunt mollit anim id est laborum
                    </p>
                </div>
            </div> --}}

        </div>
    </section>
    {{-- END Feature --}}
    {{-- Card --}}
    <div class="container overflow-hidden mt-5">
        <div class="section-title">
            <h2>Materi</h2>
        </div>
        <div class="row gx-5">
            @foreach ($materi as $item)
                <div class="col">
                    <div class="card icon-box-blue" data-aos="fade-up" style="width: 18rem;">
                        @if ($item->thumbnail != null)
                            <img src="{{ asset('materi/thumbnail/' . $item->thumbnail) }}" class="card-img-top" alt="..." style="box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 25px -5px, rgba(0, 0, 0, 0.04) 0px 10px 10px -5px;">
                        @else
                            @if ($item->tipe_materi == 'dokumen')
                                <img src="{{ asset('materi/thumbnail/default/default_dokumen.png') }}" class="card-img-top" alt="..." style="box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 25px -5px, rgba(0, 0, 0, 0.04) 0px 10px 10px -5px;">
                            @elseif ($item->tipe_materi == 'video')
                                <img src="{{ asset('materi/thumbnail/default/dafault_video.png') }}" class="card-img-top" alt="..." style="box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 25px -5px, rgba(0, 0, 0, 0.04) 0px 10px 10px -5px;">
                            @elseif ($item->tipe_materi == 'gambar')
                                <img src="{{ asset('materi/thumbnail/default/default_img.png') }}" class="card-img-top" alt="..." style="box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 25px -5px, rgba(0, 0, 0, 0.04) 0px 10px 10px -5px;">
                            @endif
                        @endif
                        <div class="card-body">
                            @if (strlen($item->nama_materi) > 40)
                                <h5 class="card-title mb-4" style="text-align: center;">{{ substr($item->nama_materi, 0, 40) }} ....</h5>
                            @else
                                <h5 class="card-title mb-4" style="text-align: center;">{{ $item->nama_materi }}</h5>
                            @endif
                            <p class="card-text badge rounded-pill text-bg-info"><small class="text-muted">Tingkat Pendidikan: {{ $item->tingkatan_pendidikan }}</small></p>
                            <p class="card-text badge rounded-pill text-bg-warning"><small class="text-muted">Kelas: {{ $item->kelas }}</small></p>
                            <div>
                                <a tabindex="0" class="card-text badge rounded-pill text-bg-secondary text-decoration-none" role="button" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-title="Keterangan" data-bs-placement="right" data-bs-content="{{ $item->keterangan }}">Dekripsi</a>
                            </div>
                            @if ($item->tipe_materi == 'gambar')
                                <a href="{{ asset('materi/gambar/' . $item->file) }}" class="mt-5 btn btn-outline-success" target="_blank">View Materi</a>
                            @elseif ($item->tipe_materi == 'dokumen')
                                <a href="{{ route('showPDF', $item->id) }}" target="_blank" class="mt-5 btn btn-outline-success">View Materi</a>
                            @elseif ($item->tipe_materi == 'video')
                                <a href="{{ route('showVideo', $item->id) }}" target="_blank" class="mt-5 btn btn-outline-success">View Materi</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            <a href="{{ url('/materis') }}" class="mt-4 text-primary" style="text-align: end">View All</a>
        </div>
    </div>

    <!-- ======= Main Section ======= -->
    <main id="main">
        <!-- Your content goes here -->
    </main><!-- End #main -->

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Initialize Popovers -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
            const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));
        });
    </script>
        <!-- Your content goes here -->
    </main><!-- End #main -->
@endsection
