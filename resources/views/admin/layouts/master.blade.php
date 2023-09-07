<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="stylesheet" href="{{ asset('assets/admin/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/main/app-dark.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/logo/favicon.svg') }}" type="x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/logo/favicon.png') }}" type="image/png">

<link rel="stylesheet" href="{{ asset('assets/admin/css/shared/iconly.css') }}">

</head>
@include('admin.layouts.sidebar')
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

<!-- Need: Apexcharts -->
<script src="{{ asset('assets/admin/extensions/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/pages/dashboard.js') }}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</body>

</html>
