<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> {{ $app_name }}</title>

    <link href="{{ asset('css/bootstrap-material-design.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('css/creative.css') }}" rel="stylesheet">
    <link rel="icon" type="icon" href="{{ asset("favicon.ico") }}">
</head>

<body id="page-top">

<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="/"> {{ $app_name }}</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#page-top">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
                </li>

                @guest
                <li class="nav-item "><a class="nav-link js-scroll-trigger" href="{{ route('login') }}"><span
                                class="fa fa-sign-in fa-lg"></span> {{ __('Login') }}</a></li>

                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<header class="masthead text-center text-white d-flex">
    <div class="container my-auto">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="text-uppercase">
                    <strong>"Simplicity is about subtracting the obvious and adding the meaningful."</strong>
                </h1>
                <hr>
            </div>
            <div class="col-lg-8 mx-auto">
                <p>"A lot of companies have chosen to downsize, and maybe that was the right thing for them. We chose a
                    different path. Our belief was that if we kept putting great products in front of customers, they
                    would continue to open their wallets."</p>
                <a class="btn btn-info btn-raised btn-xl js-scroll-trigger" href="#about">Find Out More</a>
            </div>
        </div>
    </div>
</header>

<section class="bg-info" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="section-heading text-white">We've got what you need!</h2>
                <hr class="light my-4">
                <p class="text-faded mb-4">
                    We helps cooperatives and other saving companies to manage their members, money in and out, loans...
                    with the easiest way and friendly. All you have to do is contact us to get provided with management
                    technology!
                </p>
                <a class="btn btn-light btn-raised btn-xl js-scroll-trigger" href="#services" style="color: #03a9f4">Get
                    Started!</a>
            </div>
        </div>
    </div>
</section>

<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Our Services</h2>
                <hr class="my-4">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <i class="fa fa-4x fa-flash text-primary mb-3 sr-icons"></i>
                    <h3 class="mb-3">Quick And Easy</h3>
                    <p class="text-muted mb-0">Our system is easy to use with excellent
                        speed!</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <i class="fa fa-4x fa-paper-plane text-primary mb-3 sr-icons"></i>
                    <h3 class="mb-3">Reliability</h3>
                    <p class="text-muted mb-0">We provide you highest security and 100% accuracy!</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <i class="fa fa-4x fa-newspaper-o text-primary mb-3 sr-icons"></i>
                    <h3 class="mb-3">Up to Date</h3>
                    <p class="text-muted mb-0">We update dependencies to keep things fresh.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <i class="fa fa-4x fa-heart text-primary mb-3 sr-icons"></i>
                    <h3 class="mb-3">Made with Love</h3>
                    <p class="text-muted mb-0">Join more than 100 happy cooperatives and companies today!</p>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="bg-secondary" style="width:100%;">&nbsp;</div>
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="section-heading">Let's Get In Touch!</h2>
                <hr class="my-4">
                <p class="mb-5">Have any question,feedback or want to join? That's great! Give us a call or send us an email
                    and we will get back to you as soon as possible!</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 ml-auto text-center">
                <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
                <p>+250788888888</p>
            </div>
            <div class="col-lg-4 mr-auto text-center">
                <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
                <p>
                    <a href="#">ibimina@gmail.com</a>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Plugin JavaScript -->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{asset('vendor/scrollreveal/scrollreveal.min.js') }}"></script>
<script src="{{asset('vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

<!-- Custom scripts for this template -->
<script src="{{asset('js/creative.min.js') }}"></script>
</body>

</html>
