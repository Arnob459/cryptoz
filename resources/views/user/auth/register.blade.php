<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/pages/auth.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/logo/favicon.png') }}" type="image/png">
</head>

<body>
    <div id="auth">

<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <a href=""><img src="{{ asset('assets/admin/images/logo/logo.svg') }}" alt="Logo"></a>
            </div>
            <h1 class="auth-title">Sign Up</h1>
            <p class="auth-subtitle mb-5">Input your data to register to our website.</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text"  name="refferal" id="refferal" class="form-control form-control-xl" placeholder="Referral ID" value="{{ old('refferal') }}" required>
                    <div class="form-control-icon">
                        <i class="bi bi-key"></i>
                    </div>
                </div>
                <div>
                    <ul id="search-results"></ul>
                </div>

                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" id="name" name="name" class="form-control form-control-xl" placeholder="Username" value="{{ old('name') }}" required>
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>

                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="email" id="email" name="email" class="form-control form-control-xl" placeholder="Email" value="{{ old('email') }}" required>
                    <div class="form-control-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                </div>
                <div>
                    <ul id="search-email"></ul>
                </div>



                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="number" name="phone" id="phone" class="form-control form-control-xl" placeholder="Phone Number" value="{{ old('phone') }}" required>
                    <div class="form-control-icon">
                        <i class="bi bi-phone"></i>
                    </div>
                </div>
                <div>
                    <ul id="search-phone"></ul>
                </div>

                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Sign Up</button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
                <p class='text-gray-600'>Already have an account? <a href="auth-login.html" class="font-bold">Log
                        in</a>.</p>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

    </div>
</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $('#refferal').on('keyup', function () {
            var query = $(this).val().trim();
           //  console.log(query);
            if (query !== '') {
                $.ajax({
                    url: "{{ route('checkusername') }}",
                    type: 'GET',
                    data: { query: query },
                    success: function (data) {


                     // $("#refferal").val(data.id);


                if (data.username == query ){
                     $("#search-results").html(data.name);
                }
                else{
                    $("#search-results").html(data.status);
                }
               //  console.log(data.id);

                }

                });
            }
        });
    });
</script>
 <script>
   $(document).ready(function () {
       $('#email').on('keyup', function () {
           var query = $(this).val().trim();
          //  console.log(query);
           if (query !== '') {
               $.ajax({
                   url: "{{ route('checkemail') }}",
                   type: 'GET',
                   data: { query: query },
                   success: function (data) {


                    // $("#refferal").val(data.id);


               if (data.status ){
               console.log(data.status);

                    $("#search-email").html('Email already exists');

               }


               else{
                   $("#search-email").html('');
               }
              //  console.log(data.id);

               }

               });
           }
       });
   });
</script>
<script>
   $(document).ready(function () {
       $('#phone').on('keyup', function () {
           var query = $(this).val().trim();
          //  console.log(query);
           if (query !== '') {
               $.ajax({
                   url: "{{ route('checkphone') }}",
                   type: 'GET',
                   data: { query: query },
                   success: function (data) {

                    if (data.status ){
                    $("#search-phone").html('Phone already exists');
                   }

               else{
                   $("#search-phone").html('');
               }

               }

               });
           }
       });
   });
</script>
