@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Basic Settings</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.basic.update') }}" method="post">
                @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="basicInput">Site Name</label>
                        <input type="text" name="site_name" class="form-control" id="basicInput" value="{{ $settings->site_name }}" required>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="helpInputTop"> Check Currency</label>
                        <input type="text" name="currency" class="form-control" id="helpInputTop" value="{{ $settings->currency }}" required>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="helpInputTop"> Currency Symbol</label>
                        <input type="text" name="currency_symbol" class="form-control" id="helpInputTop" value="{{ $settings->currency_symbol }}" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Email Verification</label>
                        <div class="selectgroup w-100">
                            <input type="radio" class="btn-check" name="ev" id="success-outlined"
                            autocomplete="off"  value="1" {{ ($settings->ev) ? 'checked' : '' }}  >
                        <label class="btn btn-outline-success btn-lg" for="success-outlined">Enable</label>

                        <input type="radio" class="btn-check" name="ev" id="danger-outlined"
                            autocomplete="off" value="0" {{ ($settings->ev) ? 'checked' : '' }}  >
                        <label class="btn btn-outline-danger btn-lg" for="danger-outlined"> Disable</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Email Notification</label>
                        <div class="selectgroup w-100">
                            <input type="radio" class="btn-check" name="en" id="en"
                            autocomplete="off" value="1" {{ ($settings->en) ? 'checked' : '' }}  >
                        <label class="btn btn-outline-success btn-lg" for="en">Enable</label>

                        <input type="radio" class="btn-check" name="en" id="enn"
                        autocomplete="off" value="0" {{ ($settings->en) ? 'checked' : '' }}  >
                        <label class="btn btn-outline-danger btn-lg" for="enn"> Disable</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">User Registration</label>
                        <div class="selectgroup w-100">
                            <input type="radio" class="btn-check" name="ur" id="ur"
                            autocomplete="off" value="1" {{ ($settings->ur) ? 'checked' : '' }}  >
                        <label class="btn btn-outline-success btn-lg" for="ur">Enable</label>

                        <input type="radio" class="btn-check" name="ur" id="urr"
                            autocomplete="off" value="0" {{ ($settings->ur) ? 'checked' : '' }}  >
                        <label class="btn btn-outline-danger btn-lg" for="urr"> Disable</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">User Login</label>
                        <div class="selectgroup w-100">
                            <input type="radio" class="btn-check" name="ul" id="ul"
                            autocomplete="off" value="1" {{ ($settings->ul) ? 'checked' : '' }}  >
                        <label class="btn btn-outline-success btn-lg" for="ul">Enable</label>

                        <input type="radio" class="btn-check" name="ul" id="ull"
                            autocomplete="off" value="0" {{ ($settings->ul) ? 'checked' : '' }}  >
                        <label class="btn btn-outline-danger btn-lg" for="ull"> Disable</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="helperText"> User Registration Off Message</label>
                        <input type="text" name="ur_message" id="helperText" class="form-control" value="{{ $settings->ur_message }}" required >
                        <p><small class="text">If user registration off message is null, there is a default message</small></p>
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="helperText"> User Login Off Message</label>
                        <input type="text" name="ul_message" id="helperText" class="form-control" value="{{ $settings->ul_message }}" required >
                        <p><small class="text">If user login off message is null, there is a default message</small></p>
                    </div>
                </div>


                <button type="submit" class="btn btn-success me-1 mb-1">Submit</button>



            </form>

            </div>
        </div>
    </div>
</section>

@endsection
