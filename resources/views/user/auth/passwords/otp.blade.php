
@extends('frontend.master')

@section('content')
<section class="pt-5 pb-5 mt-0 align-items-center d-flex bg-dark">
    <div class="container">
      <div class="row  justify-content-center align-items-center d-flex-row text-center mt-5">


        <div class="col-12  col-md-6 col-lg-6 mt-5">
          <div class="card shadow">
            <div class="card-body">
              <h4 class="card-title mt-3 text-center">Verify Otp</h4>
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

              <form method="POST" action="{{ route('otp.confirm') }}">
                @csrf

                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fas fa-id-card-alt"></i> </span>
                  </div>
                  <input id="otp" name="otp" type="text" class="form-control @error('otp') is-invalid @enderror" value="{{ old('otp') }}" placeholder="otp" >
                  @error('otp')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block"> verify </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
 </section>
@endsection







{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
