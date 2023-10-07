<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $gnl->site_name }}</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/user/css/bootstrap.min.css') }}"> --}}


    <link rel="stylesheet" href="{{ asset('assets/user/bootstrap5/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/owl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/fontawesome-5.15.4/css/all.min.css') }}">
    <script src="{{ asset('assets/admin/extensions/jquery/jquery.min.js') }}"></script>
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <link rel="shortcut icon" href="{{ asset('assets/admin/images/logo/'.$gnl->favicon) }}" type="image/x-icon">
</head>
        @if(session()->has('toastr'))
        {!! session('toastr') !!}
        @endif

<body>
    <div class="main--body dashboard-bg">
        <!--========== Preloader ==========-->
        <div class="loader">
            <div class="loader-inner">
                <div class="loader-line-wrap">
                    <div class="loader-line"></div>
                </div>
                <div class="loader-line-wrap">
                    <div class="loader-line"></div>
                </div>
                <div class="loader-line-wrap">
                    <div class="loader-line"></div>
                </div>
                <div class="loader-line-wrap">
                    <div class="loader-line"></div>
                </div>
                <div class="loader-line-wrap">
                    <div class="loader-line"></div>
                </div>
            </div>
        </div>
        <div class="overlay"></div>
        <!--========== Preloader ==========-->


        <!--=======SideHeader-Section Starts Here=======-->
        <div class="notify-overlay"></div>
        <section class="dashboard-section">
            <div class="side-header oh">
                <div class="cross-header-bar d-xl-none">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="site-header-container">
                    <div class="side-logo mt-2">
                        <a href="">
                            <img src="{{ asset('assets/admin/images/logo/'.$gnl->logo) }}" alt="logo">
                        </a>
                    </div>
                    <ul class="dashboard-menu">
                        <li class="nav-item"><a class="nav-link {{ Route::is('user.home') ? 'active' : '' }}" href="{{ route('user.home') }}"><i class="flaticon-man"></i>Dashboard</a></li>

                        <li class="nav-item"> <a class="nav-link {{ Route::is('user.investment.plan') ? 'active' : '' }}" href="{{ route('user.investment.plan') }}" ><i class="flaticon-interest"></i>Investment Plan</a> </li>

                        <li class="nav-item"><a class="nav-link " href=""><i class="fas fa-book"></i>Return Log</a></li>

                        <li class="nav-item"><a class="nav-link " href="deposit.html"><i class="fas fa-coins"></i>Deposit Now</a>
                        </li>

                        <li class="nav-item"><a class="nav-link " href="deposit.html"><i class="flaticon-exchange"></i>Deposit History</a>
                        </li>

                        <li class="nav-item"><a class="nav-link "href="withdraw.html"><i class="flaticon-atm"></i>Withdraw</a>
                        </li>

                        <li class="nav-item"><a class="nav-link " href="partners.html"><i class="flaticon-exchange"></i>Withdraw History</a>
                        </li>

                        <li class="nav-item"><a class="nav-link " href="ticket.html"><i class="flaticon-deal"></i>Transactions</a>
                        </li>

                        <li class="nav-item"><a class="nav-link {{ Route::is('user.referral.statistic') ? 'active' : '' }}" href="{{ route('user.referral.statistic') }}"><i class="fas fa-users"></i>Referral Statistic</a>
                        </li>

                        <li class="nav-item"><a class="nav-link " href="promotional-metarials.html"><i class="fas fa-coins"></i>Referral Commissions</a>
                        </li>

                        <li class="nav-item"><a class="nav-link " href="promotional-metarials.html"><i class="fas fa-user"></i>Profile </a>
                        </li>

                        <li class="nav-item"><a class="nav-link " href="{{ route('user.logout') }}"><i class="flaticon-right-arrow"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="dasboard-body">
                <div class="dashboard-hero">


                        <div class="header-bottom">
                            <div class="container">
                                <div class="header-area">
                                    <div class="logo">
                                        <a href="index.html">
                                            <img src="{{ asset('assets/admin/images/logo/'.$gnl->logo) }}" alt="logo">
                                        </a>
                                    </div>
                                    <ul class="menu">

                                        <li class="nav-item"><a class="nav-link" href="{{ route('user.home') }}">Dashboard</a></li>


                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">Investment</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href=" /investment-plans">Investment plans</a></li>
                                                <li><a class="dropdown-item" href=" /invest-return">Investment return</a></li>
                                                <li><a class="dropdown-item" href=" /invest-return/history">Investment return history</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">Deposit</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href=" /deposit">Deposit now</a></li>
                                                <li><a class="dropdown-item" href=" /deposit/history">Deposit history</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">Withdraw</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href=" /withdraw">Withdraw now</a></li>
                                                <li><a class="dropdown-item" href=" /withdraw/history">Withdraw history</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">Referral</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href=" /referral-statistic">Referral statistic</a></li>
                                                <li><a class="dropdown-item" href=" /referral-commission">Referral commissions</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="nav-item"><a class="nav-link" href="">Transactions</a></li>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                                            <ul class="dropdown-menu last">
                                                <li><a class="dropdown-item" href=" /profile">Profile</a></li>
                                                <li><a class="dropdown-item" href=" /change-password">Change Password</a></li>
                                                <li><a class="dropdown-item" href=" /support">Support</a></li>
                                                <li><a class="dropdown-item" href=" /g2fa">2Fa Security</a></li>
                                                <li><a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a></li>

                                            </ul>
                                        </li>

                                    </ul>
                                    <div class="header-bar d-lg-none">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @yield('user')
                        <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{ asset('assets/user/js/jquery-3.3.1.min.js') }}"></script>
                        <script src="{{ asset('assets/user/js/modernizr-3.6.0.min.js') }}"></script>
                        <script src="{{ asset('assets/user/js/plugins.js') }}"></script>
                        {{-- <script src="{{ asset('assets/user/js/bootstrap.min.js') }}"></script> --}}
                        <script src="{{ asset('assets/user/bootstrap5/js/bootstrap.min.js') }}"></script>

                        <script src="{{ asset('assets/user/js/magnific-popup.min.js') }}"></script>
                        <script src="{{ asset('assets/user/js/jquery-ui.min.js') }}"></script>
                        <script src="{{ asset('assets/user/js/wow.min.js') }}"></script>
                        <script src="{{ asset('assets/user/js/odometer.min.js') }}"></script>
                        <script src="{{ asset('assets/user/js/viewport.jquery.js') }}"></script>
                        <script src="{{ asset('assets/user/js/nice-select.js') }}"></script>
                        <script src="{{ asset('assets/user/js/owl.min.js') }}"></script>
                        <script src="{{ asset('assets/user/js/paroller.js') }}"></script>
                        <script src="{{ asset('assets/user/js/chart.js') }}"></script>
                        <script src="{{ asset('assets/user/js/circle-progress.js') }}"></script>
                        <script src="{{ asset('assets/user/js/main.js') }}"></script>

                        <script>
                            @if (Session::has('success'))
                                toastr.options = {
                                    "progressBar": true,
                                }
                                toastr.success("{{ Session('success') }}");
                            @endif
                        </script>

                    </body>


                    <!-- Mirrored from pixner.net/hyipland/demo/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Sep 2023 12:11:00 GMT -->
                    </html>
