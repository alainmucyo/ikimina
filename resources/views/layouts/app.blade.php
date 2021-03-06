<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <title>@yield('title') </title>

    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description" content="#">
    <meta name="keywords"
          content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">

    <link rel="icon" href="https://colorlib.com//polygon/adminty/files/assets/images/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('files/bower_components/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('files/assets/icon/themify-icons/themify-icons.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('files/assets/icon/icofont/css/icofont.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('files/assets/icon/feather/css/feather.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('files/assets/pages/prism/prism.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('files/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('files/assets/css/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('files/assets/css/pcoded-horizontal.min.css') }}">

    <link rel="stylesheet" type="text/css"
          href="{{ asset('files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('files/assets/pages/data-table/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('files/assets/pages/data-table/extensions/responsive/css/responsive.dataTables.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('files/assets/pages/data-table/extensions/buttons/css/buttons.dataTables.min.css') }}">
    <script type="text/javascript" src="{{ asset('files/bower_components/jquery/js/jquery.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('files/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('files/assets/css/jquery.mCustomScrollbar.css') }}">

</head>

<body>
<div class="theme-loader">
    <div class="ball-scale">
        <div class='contain'>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
        </div>
    </div>
</div>
<div id="pcoded" class="pcoded">
    <div class="pcoded-container">
        <nav class="navbar header-navbar pcoded-header">
            <div class="navbar-wrapper">
                <div class="navbar-logo">
                    <a class="mobile-menu" id="mobile-collapse" href="#!">
                        <i class="feather icon-menu"></i>
                    </a>
                    <a href="{{ url('/') }}">
                        {{ $app_name }}
                    </a>
                    <a class="mobile-options">
                        <i class="feather icon-more-horizontal"></i>
                    </a>
                </div>
                <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                        <li class="header-search">
                            <div class="main-search morphsearch-search">
                                <div class="input-group">
                                    <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                                    <input type="text" class="form-control">
                                    <span class="input-group-addon search-btn"><i
                                                class="feather icon-search"></i></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#!" onclick="javascript:toggleFullScreen()">
                                <i class="feather icon-maximize full-screen"></i>
                            </a>
                        </li>
                    </ul>
                    @guest
                    <ul class="nav-right">
                        <li class="nav-item ">
                            <a href="{{ route('login') }}">Login</a>
                        </li>
                    </ul>
                    @else
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <span>{{ Auth::user()->name }}</span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="#"
                                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>
                                        </li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        @endguest
                </div>
            </div>
        </nav>
        <div class="pcoded-main-container">
            <nav class="pcoded-navbar">
                <div class="pcoded-inner-navbar">
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="members">
                            <a href="{{ url('/members') }}">
                                <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                                <span class="pcoded-mtext">Members</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="create">
                            <a href="{{ url('/members/create') }}">
                                <span class="pcoded-micon"><i class="feather icon-user-plus"></i></span>
                                <span class="pcoded-mtext">Create Members</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="contribution">
                            <a href="{{ url('/contribution') }}">
                                <span class="pcoded-micon"><i class="feather icon-award"></i></span>
                                <span class="pcoded-mtext">Late Contributions</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="expenses">
                            <a href="{{ url('/expenses') }}">
                                <span class="pcoded-micon"><i class="feather icon-activity"></i></span>
                                <span class="pcoded-mtext">Expenses</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="income">
                            <a href="{{ url('/income') }}">
                                <span class="pcoded-micon"><i class="feather icon-inbox"></i></span>
                                <span class="pcoded-mtext">Income</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="pcoded-hasmenu loans">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="feather icon-cast"></i></span>
                                <span class="pcoded-mtext">Loans</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="{{ url('/loan?status=unpayed') }}">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext">Unpayed Loans</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{ url('/loan?status=payed') }}">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext">Payed Loans</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="statistics">
                            <a href="{{ url('/statistics2') }}">
                                <span class="pcoded-micon"><i class="feather icon-bar-chart-2"></i></span>
                                <span class="pcoded-mtext">Statistics</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <br><br>

            <div class="pcoded-wrapper">
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">
                                <div class="page-body">
                                    <div class="row"><br>
                                        <div class="col-lg-12">
                                            @yield('content')
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div>

    <script type="text/javascript" src="{{ asset('files/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('files/bower_components/popper.js/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('files/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>

    <script src="{{ asset('files/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('files/assets/pages/data-table/js/jszip.min.js')}}"></script>
    <script src="{{ asset('files/assets/pages/data-table/js/pdfmake.min.js')}}"></script>
    <script src="{{ asset('files/assets/pages/data-table/js/vfs_fonts.js')}}"></script>
    <script src="{{ asset('files/assets/pages/data-table/extensions/buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('files/assets/pages/data-table/extensions/buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{ asset('files/assets/pages/data-table/extensions/buttons/js/jszip.min.js')}}"></script>
    <script src="{{ asset('files/assets/pages/data-table/extensions/buttons/js/vfs_fonts.js')}}"></script>
    <script src="{{ asset('files/assets/pages/data-table/extensions/buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{ asset('files/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('files/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

    <script src="{{ asset('files/assets/pages/form-masking/inputmask.js')}}"></script>
    <script src="{{ asset('files/assets/pages/form-masking/jquery.inputmask.js')}}"></script>
    <script src="{{ asset('files/assets/pages/form-masking/autoNumeric.js')}}"></script>
    <script src="{{ asset('files/assets/pages/form-masking/form-mask.js')}}"></script>
    <script src="{{ asset('files/assets/pages/data-table/extensions/responsive/js/responsive-custom.js') }}"></script>

    <script src="{{ asset('files/assets/pages/data-table/extensions/buttons/js/extension-btns-custom.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>

    <script type="text/javascript" src="{{ asset('files/bower_components/modernizr/js/modernizr.js')}}"></script>
    <script type="text/javascript" src="{{ asset('files/bower_components/modernizr/js/css-scrollbars.js')}}"></script>

    <script type="text/javascript" src="{{ asset('files/assets/pages/prism/custom-prism.js')}}"></script>

    <script type="text/javascript" src="{{ asset('files/bower_components/i18next/js/i18next.min.js')}}"></script>
    <script type="text/javascript"
            src="{{ asset('files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js')}}"></script>
    <script type="text/javascript"
            src="{{ asset('files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js')}}"></script>
    <script type="text/javascript"
            src="{{ asset('files/bower_components/jquery-i18next/js/jquery-i18next.min.js')}}"></script>

    <script src="{{ asset('files/assets/js/pcoded.min.js')}}"></script>
    <script src="{{ asset('files/assets/js/horizontal-layout.min.js')}}"></script>
    <script src="{{ asset('files/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('files/assets/js/script.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.formatCurrency-1.4.0.min.js')}}"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.noty.packaged.js') }}"></script>

@if(session('success'))
    <script>
        $.noty.defaults.killer = true;
        noty({
            text: '{{ session('success') }}!',
            layout: 'topCenter',
            type: 'success'
        });
    </script>
@endif
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script type="text/javascript">
        $(function () {
            $(".@yield('active')").addClass('active');
        })
    </script>
    <script type="text/javascript">
        $(function () {
            $(".currency").formatCurrency({symbol: ''})
        })
    </script>
</div>
</body>

</html>
</div>