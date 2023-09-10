@extends('frontend.master')

@section('content')
<section class="pt-5 pb-5 mt-0 align-items-center d-flex bg-dark">
    <div class="container">
      <div class="row  justify-content-center align-items-center d-flex-row text-center mt-5">

      <div class="col-12 col-md-6 col-lg-6  mt-5">
        <img src="{{ asset('assets/frontend/img/signup.png') }}" class="p-5 img-fluid">
      </div>
        <div class="col-12  col-md-6 col-lg-6 mt-5">
          <div class="card shadow">
            <div class="card-body">
              <h4 class="card-title mt-3 text-center">Create Account</h4>
              <p class="text-center">Get started in the world of many possibilities.</p>
              @if (session()->has('message'))
              <div class="alert alert-danger">
                {{(session()->get('message'))}}
              </div>

              @endif

              @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
                @endif

              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group input-group">


                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fas fa-id-card-alt"></i> </span>
                  </div>
                  <input name="refferal" id="refferal"  class="form-control" placeholder="Referral ID" type="text" value="{{ old('refferal') }}" required>
                </div>
                <div>
                    <ul id="search-results"></ul>
                </div>

                 <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                  </div>
                  <input id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name" type="text" value="{{ old('name') }}" required>

                  @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                  </div>
                  <input id="email" name="email" class="form-control " placeholder="Email address" type="email" value="{{ old('email') }}" required>



                </div>
                <div>
                    <ul id="search-email"></ul>

                </div>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fas fa-phone-alt"></i> </span>
                  </div>
                  <input name="phone" id="phone" class="form-control " placeholder="Phone Number" type="number" value="{{ old('phone') }}" required>

                </div>
                <div>
                    <ul id="search-phone"></ul>

                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block"> Create Account </button>
                </div>
                <p class="text-center mt-2">Have an account?
                  <a href="login.html"><strong>Sign In<strong></a>
                </p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
 </section>

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
@endsection
