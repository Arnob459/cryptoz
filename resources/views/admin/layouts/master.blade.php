<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $gnl->site_name }} - {{ $page_title }} </title>

    <link rel="stylesheet" href="{{ asset('assets/admin/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/main/app-dark.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/logo/favicon.svg') }}" type="x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/logo/favicon.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ asset('assets/admin/css/shared/iconly.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/fontawesome-5.15.4/css/all.min.css') }}">


</head>
@include('admin.layouts.sidebar')
<section class="section">
    <div class="card">

        <div class="card-body">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Active</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{  route('admin.profile') }}">My Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{  route('admin.password') }}">settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.logout') }}">Logout</a>
                </li>

            </ul>
        </div>
    </div>
    </section>
    <div id="main">
        @if (session('error'))
        <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i> {{session('error')}}</div>
        @endif

        @if (session('errors'))
        <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i> {{session('errors')}}</div>
        @endif

        @if (session('success'))
            <div class="alert alert-success"><i class="bi bi-check-circle"></i> {{session('success')}}</div>
        @endif

        <div class="page-heading">
            <div class="page-title mb-4">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">

                    @if ($page_title == 'Dashboard')
                    <h3>Welcome back, Admin!</h3>
                    @else
                    <h3>{{ $page_title }}</h3>
                    @endif

                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        @stack('button')
                    </nav>
                </div>
            </div>
            </div>

@yield('content')



<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>2023 &copy; Mazer</p>
        </div>

    </div>
</footer>
</div>
</div>
<script src="{{ asset('assets/admin/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/admin/js/app.js') }}"></script>

@stack('datatable')
@stack('js')
</body>

</html>
