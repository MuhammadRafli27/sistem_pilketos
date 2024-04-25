<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>E-Pilketos | SKANIC</title>
    {{-- @vite('resources/css/app.css') --}}
    <link rel="preload" as="style" href="/build/assets/app-be08eb3d.css" />
    <link rel="stylesheet" href="/build/assets/app-be08eb3d.css" />
    <!-- Favicons -->
    <link rel="shortcut icon" href="/img/logoskanic.png" />

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/main/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/main/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/main/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/main/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/main/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/main/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/main/assets/css/style.css" rel="stylesheet">

    <style>
        .text-misi {
            height: 7em;
            /* Sesuaikan tinggi elemen dengan kebutuhan Anda */
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 5;
            /* Sesuaikan jumlah baris teks yang ingin ditampilkan */
            -webkit-box-orient: vertical;
        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="/" class="logo d-flex align-items-center">
                <img src="/main/assets/img/logofix.png" alt="">
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="getstarted scrollto" href="/login">Sign In</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center" style="margin-top: 10%">
                    <h1 data-aos="fade-up">Sistem Informasi <br>Pemilihan Ketua Osis</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Sistem Informasi ini dibuat untuk memudahkan siswa dalam
                        pemilihan ketua osis</h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="#values"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Selengkapnya</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200" style="margin-top: 10%">
                    <img src="/main/assets/img/hero-img.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= Values Section ======= -->
        <section id="values" class="values">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <p>Daftar Kandidat</p>
                    <p>Calon Pemilihan Ketua Osis Periode 2022/2023</p>
                </header>

                <div class="flex flex-wrap justify-center items-center">
                    <div class="w-full max-w-6xl mx-auto px-4">
                        <div class="flex flex-wrap justify-between my-6">
                            @foreach ($kandidats as $item)
                                <div class="w-full md:w-1/2 lg:w-1/3 px-3 mb-6">
                                    <div
                                        class="bg-white font-semibold text-center rounded-3xl border-2 ring-1 shadow-xl p-8">
                                        <img class="mx-auto mb-2 w-32 h-32 rounded-full shadow-lg"
                                            src="{{ asset('storage/' . $item->foto_kandidat) }}"
                                            alt="{{ $item->nama_kandidat }}">

                                        <h1 class="text-lg text-gray-900 capitalize">{{ $item->nama_kandidat }}</h1>
                                        <h3 class="text-sm text-gray-700">{{ $item->kelas_kandidat }}</h3>
                                        <p class="text-xs text-gray-400 mt-2 text-misi">
                                            {{ Str::limit($item->misi_kandidat, $limit = 220, $end = '...') }}</p>

                                        <div class="mt-4">
                                            <a href="/login"
                                                class="bg-indigo-600 px-8 py-2 rounded-xl text-center text-gray-100 font-bold uppercase tracking-wide">
                                                Vote
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <footer id="footer" class="footer">
            <div class="container">
                <div class="copyright">
                    <strong><span>&copy; Create with By Muhammad Rafli Febrian Absen 21</span></strong>
                </div>
            </div>
        </footer><!-- End Footer -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="/main/assets/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="/main/assets/vendor/aos/aos.js"></script>
        <script src="/main/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/main/assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="/main/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="/main/assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="/main/assets/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="/main/assets/js/main.js"></script>
    </main>
</body>


</html>
