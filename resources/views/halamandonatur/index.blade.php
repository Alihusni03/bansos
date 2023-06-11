<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Style Css -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Css Reponsive -->
    <link rel="stylesheet" href="css/reponsive.css">

    <!-- icon -->
    <link rel="icon" href="img/icon.svg" type="image/x-icon">
    
    <!-- Title -->
    <title>Bansos PA | Home</title>

</head>
<body>

    <!-- Navbar Start -->
    @include('partials.navbar')
    <!-- Navbar End -->

    <!-- Hero Start -->
    <section id=hero>
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-md-6 hero-tagline my-auto">
                    <h1>Selamat Datang di Bantuan Sosial Panti Asuhan</h1>
                    <p><span class="fw-bold">Bansos PA</span> hadir untuk membantu meningkatkan kesejahteraan Panti Asuhan di wilayah Kabupaten Tegal dan sekitarnya dalam bentuk uang, barang dan pelatihan/pendidikan.</p>
                    <button onclick="" class="button-lg-primary">Temukan Panti Asuhan</button>
                    <a href="#fitur">
                        <img src="img/arrow.svg" alt="">
                    </a>
                </div>
            </div>
            <img src="img/hero banner.svg" class="position-absolute end-0 bottom-0 img-hero" alt="">
            <img src="img/accsent.svg" class="h-100 position-absolute start-0 top-0 accsent-img" alt="">
        </div>
    </section>
    <!-- Hero End -->

    <!-- Layanan Start -->
    <section id="layanan">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>Layanan Kami</h2>
                    <span class="sub-title">BanSos PA hadir menjadi Solusi bagi kamu</span>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-4 text-center">
                    <div class="card-layanan">
                        <div class="circle-icon position-relative mx-auto">
                            <img src="img/panti.svg" alt="" class="position-absolute top-50 start-50 translate-middle">
                        </div>
                        <h3 class="mt-4">Panti Asuhan</h3>
                        <p class="mt-3">Panti Asuhan sebagai rumah tempat memelihara dan merawat anak yatim piatu.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="card-layanan">
                        <div class="circle-icon position-relative mx-auto">
                            <img src="img/panti.svg" alt="" class="position-absolute top-50 start-50 translate-middle">
                        </div>
                        <h3 class="mt-4">Relawan</h3>
                        <p class="mt-3">Panti Asuhan sebagai rumah tempat memelihara dan merawat anak yatim piatu.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="card-layanan">
                        <div class="circle-icon position-relative mx-auto">
                            <img src="img/panti.svg" alt="" class="position-absolute top-50 start-50 translate-middle">
                        </div>
                        <h3 class="mt-4">Donasi</h3>
                        <p class="mt-3">Panti Asuhan sebagai rumah tempat memelihara dan merawat anak yatim piatu.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Layanan End -->

    <!-- Fitur Start -->
    <section id="fitur" class="mt-5 overflow-hidden">
        <div class="container mt-5">
            <div class="row p-4">
                <div class="col-lg-9 col-md-12 text-center text-lg-start">
                    <h2>Panti Asuhan</h2>
                </div>
                <div class="col-lg-3 col-md-12">
                    <button class="button-fitur">Lihat Semua.. <img src="img/arrow fitur.svg" alt="" class="ms-4"></button>
                </div>
            </div>
            <div class="container position-relative">
                <div class="row">
                    <div class="col-12 d-flex justify-content-start">
                        @foreach ($users as $user)
                            @if ($user->role_id == 2)
                                <div class="card-fitur me-3 position-relative">
                                    <img src="img/fitur 1.svg" class="rounded-2" alt="">
                                    <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100 rounded-2">
                                        <div class="position-absolute top-50 start-50 translate-middle text-center w-100">
                                            <h5>p</h5>
                                            <span>Penjelasan singkat darul farroh</span>
                                            <button onclick="window.location.href='{{ route('pantiasuhan.show', ['pantiasuhan' => $user->id]) }}'">Lihat Panti</button>
                                            <button onclick="window.location.href='/donasi'">Donasi</button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <button class="button-arrow-left position-absolute top-50 start-0"><img src="img/arrow s fitur.svg" alt=""></button>
                <button class="button-arrow-right position-absolute top-50 end-0"><img src="img/arrow e fitur.svg" alt=""></button>
            </div>
        </div>
    </section>
    <!-- Fitur End -->

    <!-- Contact Start -->
    <Section id="contact">
        <div class="container-fluid overlay h-100 class="mb-3"">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Butuh Konsultasi..? Silahkan kontak kami Kami Siap Membantu</h3>
                        <div class="kontak">
                            <h6>Kontak</h6>
                            <div class="mb-lg-3 me-1 d-flex align-items-center">
                                <div>
                                    <img src="img/alamat kontak.svg" alt="">
                                </div>
                                <a href="https://goo.gl/maps/EWCVw723ydgnJ96o8">Jl. Mbah Santri Harjosari Kidul Adiwerna Tegal Jawa Tengah Indonesia</a>
                            </div>
                            <div class="mb-lg-3 me-1 d-flex align-items-center">
                                <div>
                                    <img src="img/telepon kontak.svg" alt="">
                                </div>
                                <a href="https://wa.me/+6281226437296">+62 812-2643-7296</a>
                            </div>
                            <div class="mb-lg-3 me-1 d-flex align-items-center">
                                <div>
                                    <img src="img/email kontak.svg" alt="">
                                </div>
                                <a href="#">pantiasuhan@gmail.com</a>
                            </div>
                        </div>
                        <h6>Sosial Media</h6>
                        <a href="https://www.facebook.com/al.fau.7505/" class="me-3"><img src="img/fb.svg" alt=""></a>
                        <a href="https://www.twitter.com/Alihsnf1212/" class="me-3"><img src="img/tw.svg" alt=""></a>
                        <a href="https://www.instagram.com/_alihusni_/" class="me-3"><img src="img/ig.svg" alt=""></a>
                        <a href="#" class="me-3 link-panti-asuhan">Panti Asuhan</a>
                    </div>
                    <div class="col-md-6">
                        <div class="card-contact w-100">
                            <form action="#">
                                <h2>ada pertanyaan..?</h2>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput" class="d-flex align-items-center">Masukan email anda disini...</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput" class="d-flex align-items-center">Pertanyaan Anda..</label>
                                </div>
                                <button type="submit" class="button-kontak">Kirim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center ">
                <p>
                Akhmad Ali Husni Fauzan
                </p>
            </div>
        </div>
    </Section>
    <!-- Contact End -->

    <!-- Js Reponsive -->
    <script src="js/script.js"></script>
    <!-- Bundle Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>