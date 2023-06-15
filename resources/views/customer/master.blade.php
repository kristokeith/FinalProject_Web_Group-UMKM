<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('judul')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="{{ asset('template/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('template/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendors CSS Files -->
    <link href="{{ asset('template/vendors/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendors/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendors/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendors/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendors/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendors/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendors/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('template/css/stile.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/stillee.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: OnePage
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="index.html"></a>
                <a href="#hero" class="logo"><img src="template/img/logo.png" alt="" class="img-fluid"></a>
            </h1>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="/home">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about-video">About</a></li>
                    <li><a class="nav-link scrollto" href="#services">Subsector</a></li>
                    <li><a class="nav-link scrollto" href="/news/detail">News</a></li>
                    <li><a class="nav-link scrollto" href="/contact-us">Contact Us</a></li>
                    @if (Auth::check())
                        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                            <ul class="navbar-nav navbar-nav-right">
                                <li class="nav-item nav-profile dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                        id="profileDropdown">
                                        <img style="width: 50px; height: 50px; border-radius: 100%;"
                                            src="{{ asset('profile/' . Auth::user()->avatar) }}" alt="profile" />
                                        <span class="nav-profile-name">{{ Auth::user()->name }}</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                        aria-labelledby="profileDropdown">
                                        <a class="dropdown-item" href="{{ url('auth/logout') }}">
                                            <i class="mdi mdi-logout text-primary"></i>
                                            Logout
                                        </a>
                                        <a class="dropdown-item" href="{{ route('profile2.index') }}">
                                            <i class="mdi mdi-account text-primary"></i>
                                            Profile
                                        </a>
                                        <a class="nav-link" href="{{ url('/chats') }}">
                                            <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                                            <span class="menu-title">Chat</span>
                                          </a>
                                        <a class="nav-link" href="{{ url('/inboxs') }}">
                                          <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                                          <span class="menu-title">Inbox</span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    @else
                        <li><a class="getstarted scrollto" href="/auth">Get Started</a></li>
                    @endif

                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
        </div>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    @yield('isi')


    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>OnePage</span></strong>. All Rights Reserved
                </div>
                <div class="copyright">
                    &copy; Copyright <strong><span>GroupUMKM By Under Twenty Group</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/ -->
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="https://twitter.com/diskopindagmlg" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="https://www.facebook.com/groups/umkmindonesia.id/" class="facebook"><i
                        class="bx bxl-facebook"></i></a>
                <a href="https://www.instagram.com/umkm.malang/" class="instagram"><i class="bx bxl-instagram"></i></a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendors JS Files -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="{{ asset('template/js/productss.js') }}"></script> --}}
    <script src="{{ asset('template/vendors/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('template/vendors/aos/aos.js') }}"></script>
    <script src="{{ asset('template/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/vendors/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('template/vendors/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('template/vendors/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('template/vendors/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="{{ asset('template/js/main.js') }}"></script>

</body>

</html>
