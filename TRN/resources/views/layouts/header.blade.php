@stack('title')
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Favicons -->
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('icons\apple-touch-icon.png')}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('icons\android-chrome-192x192.png')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('icons\android-chrome-512x512.png')}}">

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https:
    //fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<link href="{{url('/')}}\assets/vendor/aos/aos.css" rel="stylesheet">
<link href="{{url('/')}}\assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
<link href="{{url('/')}}\assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<!-- Template Main CSS File -->
<link href={{asset('assets\main.css')}} rel="stylesheet">
<link rel="stylesheet" href={{asset('cssfiles\w3.css')}}>

<!-- ======= Header ======= -->
<section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope d-flex align-items-center"><a
                    href="mailto:contact@example.com">techrevolutionnepal@gmail.com</a></i>
            <i class="bi bi-phone d-flex align-items-center ms-4"><span>+977 9825915122</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
        </div>
    </div>
</section><!-- End Top Bar -->

<header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="{{url('/')}}" class="logo d-flex align-items-center">
            <h1>TRN<span>.</span></h1>
        </a>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{url('/')}}#about">About</a></li>
                <li><a href="{{url('/')}}#services">Services</a></li>
                <li><a href="{{url('/')}}#portfolio">Portfolio</a></li>
                <li><a href="{{url('/')}}#team">Team</a></li>
                <!-- <li><a href="blog.html">Blog</a></li> -->
                <li class="dropdown"><a href="#"><span>Drop Down</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="#">Drop Down 1</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i
                                    class="bi bi-chevron-down dropdown-indicator"></i></a>
                            <ul>
                                <li><a href="#">Deep Drop Down 1</a></li>
                                <li><a href="#">Deep Drop Down 2</a></li>
                                <li><a href="#">Deep Drop Down 3</a></li>
                                <li><a href="#">Deep Drop Down 4</a></li>
                                <li><a href="#">Deep Drop Down 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Drop Down 2</a></li>
                        <li><a href="#">Drop Down 3</a></li>
                        <li><a href="#">Drop Down 4</a></li>
                    </ul>
                </li>
                <li><a href="{{url('/')}}#contact">Contact</a></li>
                <li><a href="{{url('/login')}}">Login</a></li>
            </ul>
        </nav><!-- .navbar -->

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
</header><!-- End Header -->
<!-- End Header -->