<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>SMAN 1 KERINCI</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <style>
            @media (min-width: 576px) {
                .divider{
                    margin-right: 20px;
                }

                img{
                    width: 500px;
                }

                .bg-image{
                    background-image: url("{{ Storage::url('public/home/bg-image.jpeg') }}");
                    background-repeat: no-repeat;
                    background-position: center;
                    background-size: cover;
                    height: 30rem;
                }

                .divider-nav{
                    margin-right: 20px;
                }
            }

            @media (max-width: 992px) {
                .divider{
                    margin-bottom: 20px;
                }

                .bg-image{
                    background-image: url("{{ Storage::url('public/home/bg-image.jpeg') }}");
                    background-repeat: no-repeat;
                    background-position: center;
                    background-size: cover;
                    height: 20rem;
                }
            }
        </style>

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    </head>
    <body>
        <div id="nav">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container">
                    <a class="navbar-brand" href="#">Sman 1 kerinci</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ms-auto">
                            <a class="nav-link divider-nav" aria-current="page" href="#">Home</a>
                            <a class="nav-link divider-nav" href="#">Kontak</a>
                            <a class="nav-link divider-nav" href="#">Profile</a>
                            <a class="nav-link" href="{{ route('login') }}" aria-disabled="true">Login</a>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="bg-image">
                <p class="title text-center fw-bold fs-3 text-light">Selamat Datang <br> SMAN 1 KERINCI</p>
            </div>
        </div>

        <div class="bg-warning">
            <div class="p-5">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-sm-3 divider rounded p-3 bg-white">
                            <div class="row">
                                <div class="col-sm-5 img-lamp">
                                    <img class="img-fluid" src="{{ Storage::url('public/home/symbol-design-of-abstract-people-in-a-bulb-vector-PNG.png') }}" alt="">
                                </div>
                                <div class="col-sm-7">
                                    <p class="fw-bold">Siswa Laki-laki</p>
                                    <p>Menciptakan lulusan berkarakter, cerdas dan berprestasi ...</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 divider rounded p-3 bg-white">
                            <div class="row">
                                <div class="col-sm-5">
                                    <img class="img-fluid" src="{{ Storage::url('public/home/symbol-design-of-abstract-people-in-a-bulb-vector-PNG.png') }}" alt="">
                                </div>
                                <div class="col-sm-7">
                                    <p class="fw-bold">Siswa Perempuan</p>
                                    <p>Lorem ipsum dolor sit amet consectetur ...</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 rounded p-3 bg-white">
                            <div class="row">
                                <div class="col-sm-5">
                                    <img class="img-fluid" src="{{ Storage::url('public/home/symbol-design-of-abstract-people-in-a-bulb-vector-PNG.png') }}" alt="">
                                </div>
                                <div class="col-sm-7">
                                    <p class="fw-bold">Tenaga Pengajar</p>
                                    <p>Sekolah menengah atas negeri 1 kerinci merupakan sekolah ...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="berita-terbaru" class="p-5">
            <div class="container">
                <p class="text-center fs-3 fw-bold my-5">Berita Terkini</p>
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-4">
                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Lihat Berita</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Lihat Berita</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Lihat Berita</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="footer" class="bg-success text-white">
            <div class="container">
                <footer class="py-5">
                  <div class="row">
                    <div class="col-6 col-md-2 mb-3">
                      <h5 class="fs-2 fw-bold">Kontak</h5>
                      <ul class="nav flex-column mt-3">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Email</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">08123456789</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Alamat</a></li>
                      </ul>
                    </div>
              
                    {{-- <div class="col-md-5 offset-md-1 mb-3">
                      <form>
                        <h5>Subscribe to our newsletter</h5>
                        <p>Monthly digest of what's new and exciting from us.</p>
                        <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                          <label for="newsletter1" class="visually-hidden">Email address</label>
                          <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                          <button class="btn btn-primary" type="button">Subscribe</button>
                        </div>
                      </form>
                    </div> --}}
                  </div>
              
                  <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                    <p>© 2023 SMAN 1 KERINCI, Inc. All rights reserved.</p>
                    <ul class="list-unstyled d-flex">
                      <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
                      <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
                      <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
                    </ul>
                  </div>
                </footer>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    </body>
</html>
