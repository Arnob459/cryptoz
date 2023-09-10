@extends('frontend.master')

@section('content')
<section class="pt-5 pb-5 mt-0 align-items-center d-flex bg-dark">
    <div class="container">
      <div class="row  justify-content-center align-items-center d-flex-row text-center mt-5">

      <div class="col-12 col-md-6 col-lg-6  mt-5">
        <img src="{{ asset('assets/frontend/img/login.png') }}" class="p-5 img-fluid">
      </div>
        <div class="col-12  col-md-6 col-lg-6 mt-5">
          <div class="card shadow">
            <div class="card-body">
              <h4 class="card-title mt-3 text-center">Sign In</h4>
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

              <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fas fa-id-card-alt"></i> </span>
                  </div>
                  <input id="username" name="username" type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" placeholder="User ID" >
                  @error('username')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
                </div>


                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fas fa-lock"></i> </span>
                  </div>
                  <input id="password" name="password" class="form-control @error('password') is-invalid @enderror"  placeholder="Password" type="password">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block"> Sign In </button>
                </div>
                <p class="text-center mt-2">forget password?
                  <a href="{{ route('forgot.password') }}"><strong>forget password<strong></a>
                </p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
 </section>
@endsection

