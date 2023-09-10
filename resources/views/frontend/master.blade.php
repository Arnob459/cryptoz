<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>AmazeMantra</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link href="{{ asset('assets/frontend/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/frontend/lib/animate/animate.min.css') }}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">



        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="index.html" class="navbar-brand p-0">

                   <img src="{{ asset('assets/frontend/img/logo.png') }}" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="index.html" class="nav-item nav-link">Home</a>
                        <a href="index.html#about" class="nav-item nav-link">About</a>
                        <a href="index.html#brand" class="nav-item nav-link">Brand Promotion</a>
                          <a href="index.html#process" class="nav-item nav-link">Working Process</a>
						     <a href="index.html#voucher" class="nav-item nav-link">Voucher</a>
                        <a href="index.html#contact" class="nav-item nav-link">Contact</a>
                    </div>
                    <a href="{{ route('login') }}" class="btn btn-light rounded-pill  py-2 px-4 ms-lg-5">Sign In</a>
					<a href="{{ route('register') }}" class="btn btn-light rounded-pill  py-2 px-4 ms-lg-5">Sign Up</a>
                </div>
            </nav>


        </div>
        <!-- Navbar & Hero End -->




@yield('content')



 <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 wow fadeIn" data-wow-delay="0.1s" style="margin-top: 6rem;" id="contact">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-12 col-lg-12 text-center">
                        <h5 class="text-white mb-4">Get In Touch</h5>
                        <p class="text-center"><i class="fa fa-map-marker-alt me-3"></i>Flat No. 3, Bhargav Apt 343/B,
Shaniwar Peth, Pune,
Maharashtra - 411030</p>

                         <p class="text-center"><i class="fa fa-envelope me-3"></i>info@amazemantra.com</p>
                        <div class="d-flex justify-content-center align-items-center pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>



                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-12 text-center mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">AmazeMantra</a>, All Right Reserved
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="{{ asset('assets/frontend/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>
</body>

</html>
