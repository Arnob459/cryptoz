@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Manage Contact</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.contact.update') }}" method="post">
                @csrf
            <div class="row">


                <div class="col-md-12">
                    <div class="form-group">
                        <label for="helperText"> Contact email </label>
                        <input type="text" name="email" id="helperText" class="form-control form-control-lg" value="{{ $contact->email }}" required >
                        <p><small class="text">this email will use in contact form</small></p>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="helperText"> Contact phone</label>
                        <input type="text" name="phone" id="helperText" class="form-control form-control-lg" value="{{ $contact->phone }}" required >
                        <p><small class="text">this phone will use in header top</small></p>
                    </div>
                </div>


                <button type="submit" class="btn btn-success me-1 mb-1">Submit</button>



            </form>

            </div>
        </div>
    </div>
</section>

@endsection
