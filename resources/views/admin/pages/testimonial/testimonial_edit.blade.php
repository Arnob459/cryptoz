@extends('admin.layouts.master')

@section('content')


<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> Testimonial Edit</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.testimonial.update',$testimonial->id) }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="row">

                <div class="form-group col-md-4">
                    <label class="col-lg-6  ">Upload Avatar  <span class="required-label">*</span></label>
                    <div class="col-lg-12 ">
                        <img class="img-upload-preview mb-2 " style="height:100px"   src="{{ asset('assets/admin/images/testimonial/'.$testimonial->image) }}" alt="preview">
                        <div class="input-file input-file-image">
                            <input type="file" class="form-control " id="uploadbgImg" name="image" accept="image/*" hidden >
                            <label for="uploadbgImg" class="btn btn-primary rounded-pill "><i class="fa fa-file-image"></i> Upload</label>
                        </div>
                    </div>
                    <p class="text-warning mb-0">Image Will Resize 200x200.</p>
                    <p class="text-warning mb-0">Only jpg, jpeg, png image allowed.</p>
                </div>


                <div class="col-md-8">
                    <div class="row mb-2">
                        <div class="col-md-12 mb-3">
                            <div class="form-group ">
                                <label for="basicInput"> Author Name</label>
                                <input type="text" name="name" class="form-control form-control-lg" id="basicInput" value="{{ $testimonial->name }}" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basicInput"> Designation </label>
                                <input type="text" name="designation" class="form-control form-control-lg" id="basicInput" value="{{ $testimonial->designation }}" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basicInput">Quote</label>
                                <textarea type="text" cols="5" rows="5" class="form-control" id="basicInput" name="quote" required >{{ $testimonial->quote }}</textarea>
                            </div>
                        </div>

                    </div>

                </div>

                <button type="submit" class="btn btn-success  me-1 mb-1">Submit</button>

            </form>

            </div>
        </div>
    </div>
</section>

@endsection


