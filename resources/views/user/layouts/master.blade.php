<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pizza - Online Shop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('user/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('user/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    {{-- Bootstrap 5.3.3 CSS CDN Link  --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
    <style>
        .dropdown {
            position: relative;
        }

        .dropdown-menu {
            width: 230px;
            position: absolute;
            left: 0;
            transform: translateX(-20%);
        }
    </style>

</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid bg-danger mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block my-1">
                <a href="" class="text-decoration-none">
                    <div class="logo text-center">
                        <a href="#">
                            <img src="{{ asset('admin/images/icon/logo2.png') }}" class="bg-light rounded-4 p-2"
                                width="200px" height="80px" alt="Pizza logo" />
                        </a>
                    </div>
                </a>
            </div>

            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-danger navbar-dark py-1 py-lg-0 px-0 mt-lg-3 me-2">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <img src="{{ asset('admin/images/icon/logo2.png') }}" class="bg-light rounded-5 p-2"
                            width="200px" height="80px" alt="Pizza logo" />
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">

                        <div class="navbar-nav mr-auto ml-1 py-0 h4">
                            <a href="{{ route('user#home') }}" class="nav-item nav-link active">Home</a>
                            {{-- <a href="{{ route('user#mycart') }}" class="nav-item nav-link">My Cart</a> --}}
                            <a href="#" class="nav-item nav-link">Contact</a>
                        </div>

                        <div class="dropdown">
                            <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user fs-5 me-2"></i>
                                {{ ucfirst(Auth::user()->name) }}
                                <i class="fa-solid fa-caret-down ms-3"></i>
                            </a>

                            <div class="dropdown-menu rounded-0">
                                <a class="dropdown-item my-3 text-danger" href="{{ route('user#viewaccount') }}">
                                    <i class="fas fa-user me-2"></i>
                                    Account
                                </a>
                                <a class="dropdown-item mb-3 text-danger" href="{{ route('user#changepwpage') }}">
                                    <i class="fa-solid fa-arrows-rotate me-2"></i>
                                    Change Password
                                </a>
                                <hr />
                                <span class="dropdown-item my-2">
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger btn-block">
                                            <i class="fa-solid fa-power-off me-2"></i> Logout
                                        </button>
                                    </form>
                                </span>
                            </div>
                        </div>


                    </div>
                </nav>
            </div>

        </div>
    </div>
    <!-- Navbar End -->


    @yield('content')


    <!-- Footer Start -->
    <div class="container-fluid bg-danger text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-5 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                <p class="mb-4">The best way to find yourself is to lose yourself in service of others.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>N0.45, 164st, Tamwe, Yangon,
                    Myanmar.</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>mrharrytw@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+959250290409</p>
            </div>
            <div class="col-lg-7 col-md-12">
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our
                                Shop</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop
                                Detail</a>
                            <a class="text-secondary mb-2" href="#"><i
                                    class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-secondary mb-2" href="#"><i
                                    class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact
                                Us</a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
                        <p>Do you want a 5% discount on your next purchase? Subscribe Now! </p>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Your Email Address">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Subscribe</button>
                                </div>
                            </div>
                        </form>
                        <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
                        <div class="d-flex">
                            <a class="btn btn-primary btn-square mr-2" href="#"><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i
                                    class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-top border-top-5 mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, 0.5) !important;">

            <div class=" d-flex justify-content-center">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; <a class="text-primary" href="#">Domain</a>. All Rights Reserved. Designed
                    by
                    <a class="text-primary" href="https://htmlcodex.com">HTML Codex</a>
                </p>
            </div>

        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('user/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('user/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> --}}

    <!-- Contact Javascript File -->
    <script src="{{ asset('user/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('user/mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('user/js/main.js') }}"></script>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @yield('ajax_Script_Section')

</body>

</html>
