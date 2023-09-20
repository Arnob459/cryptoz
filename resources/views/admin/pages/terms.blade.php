@extends('admin.layouts.master')

@section('content')


<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Terms & Conditions</h4>
        </div>
        <hr>

        <div class="card-body">
            <form action="{{ route('admin.terms.update') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="row">


                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basicInput">Terms & Conditions Title<span class="required-label">*</span></label>
                                <input type="text" name="terms_title" class="form-control form-control-lg" value="{{ $terms->terms_title }}" id="basicInput" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="editor">Terms & Conditions Description<span class="required-label">*</span></label>
                                <textarea type="text" cols="20" rows="20" class="form-control" id="editor" name="terms_description"  required >{{ $terms->terms_description }}</textarea>
                            </div>
                        </div>


                <button type="submit" class="btn btn-success  me-1 mb-1">Submit</button>

            </form>

            </div>
        </div>
    </div>
</section>



@endsection


