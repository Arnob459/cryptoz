
@extends('frontend.master')

@section('content')
<section class="pt-5 pb-5 mt-0 align-items-center d-flex bg-dark">
    <div class="container">
      <div class="row  justify-content-center align-items-center d-flex-row text-center mt-5">


        <div class="col-12  col-md-6 col-lg-6 mt-5">
          <div class="card shadow">
            <div class="card-body">
              <h4 class="card-title mt-3 text-center">Create new Password</h4>
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

              <form method="POST" action="{{ route('new.pass') }}">
                @csrf

                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fas fa-id-card-alt"></i> </span>
                  </div>
                  <input id="password" name="password" type="text" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Enter New Password" >
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> <i class="fas fa-id-card-alt"></i> </span>
                    </div>
                    <input id="confirmpassword" name="confirmpassword" type="text" class="form-control @error('confirmpassword') is-invalid @enderror" value="{{ old('confirmpassword') }}" placeholder="Enter Confirm Password" >
                    @error('confirmpassword')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
            </div>
            <input type="hidden" value="{{ $data }}" name="user_id">



            </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block"> Confirm </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
 </section>
@endsection
