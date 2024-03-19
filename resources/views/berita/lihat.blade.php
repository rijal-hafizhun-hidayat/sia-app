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
        @vite(['resources/js/app.js'])
        <style>
            @media (min-width: 576px) {
                .divider{
                    margin-right: 20px;
                }

                img{
                    width: 500px;
                }

                .bg-image{
                    height: 10rem;
                }
                
                .centered {
                    position: absolute;
                    top: 40%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                }

                .divider-nav{
                    margin-right: 20px;
                }
                
                img {
                    display: block;
                    max-width: 80px;
                    height: auto;
                }
                
                .hover-nav{
                    border-radius: 10px;
                }
                .hover-nav:hover{
                    background-color: black;
                    transition: 0.3s ease;
                    color: white;
                }
            }

            @media (max-width: 992px) {
                .divider{
                    margin-bottom: 20px;
                }

                .bg-image{
                    background-image: url("{{ Storage::url($news->cover) }}");
                    background-repeat: no-repeat;
                    background-position: center;
                    background-size: cover;
                    height: 20rem;
                }
                
                img {
                    display: block;
                    max-width: 80px;
                    height: auto;
                }
                
                .centered {
                    position: absolute;
                    top: 40%;
                    left: 50%;
                    transform: translate(-50%, -50%);
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
                    <a class="navbar-brand" href="#">
                        <img width="30" height="30" src="{{ Storage::url('public/home/logo.jpeg') }}" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ms-auto">
                            <a class="nav-link divider-nav hover-nav" aria-current="page" href="{{ route('home.index') }}">Home</a>
                            <a class="nav-link divider-nav hover-nav" href="#footer">Kontak</a>
                            <a class="nav-link divider-nav hover-nav" href="#visi_misi">Profile</a>
                            <a class="nav-link divider-nav" href="#berita-terbaru">Berita</a>
                            <a class="nav-link hover-nav" href="{{ route('login') }}" aria-disabled="true">Login</a>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="bg-image">
                <p class="title text-center fw-bold text-light centered text-dark fs-2" style="color: #FFFF00 !important;">{{ $news->judul }}</p>
            </div>
        </div>

        <div id="content-news" class="mt-5">
            <div class="container">
                <div class="row">
                    <p class="fw-semibold">{{ $news->isi_berita }}</p>
                </div>
            </div>
        </div>

        <div id="footer" class="bg-success text-white">
            <div class="container">
                <footer class="py-2">
                  <div class="row">
                    <div class="col-6 col-md-6">
                      <h5 class="fs-2 fw-bold">Kontak</h5>
                      <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary fw-semibold"><i class="fa-solid fa-envelope" style="color: #ffffff;"></i> Smankerinci@gmail.com</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary fw-semibold"><i class="fa-solid fa-phone" style="color: #ffffff;"></i> 08123456789</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary fw-semibold"><i class="fa-solid fa-location-dot" style="color: #ffffff;"></i> Koto Baru Hiang, Kec. Sitinjau Laut, Kabupaten Kerinci, Jambi 37171</a></li>
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
              
                  <div class="d-flex flex-column flex-sm-row justify-content-between border-top">
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
