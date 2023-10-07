@extends('admin.layouts.master')

@section('content')



<section class="section">
    <div class="card">

        <div class="card-header">
            <h4 class="card-title">Manage Footer Section</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.footer.update') }}" method="post">
                @csrf
            <div class="row">


                <div class="col-md-12">
                    <div class="form-group">
                        <label for="helperText"> Footer Text<span class="required-label">*</span></label>
                        <input type="text" name="footer" id="helperText" class="form-control form-control-lg" value="{{ $footer->footer }}" required >
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="helperText"> Copyright Text<span class="required-label">*</span></label>
                        <input type="text" name="copyright" id="helperText" class="form-control form-control-lg" value="{{ $footer->copyright }}" required >
                    </div>
                </div>


                <button type="submit" class="btn btn-success me-1 mb-1">Submit</button>



            </form>

            </div>
        </div>
    </div>
</section>

@endsection


