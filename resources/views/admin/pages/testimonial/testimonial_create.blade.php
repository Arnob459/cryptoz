@extends('admin.layouts.master')

@section('content')


<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Testimonial Create</h4>
        </div>
        <hr>

        <div class="card-body">
            <form action="{{ route('admin.testimonial.store') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="row">

                <div class="form-group col-md-4 mb-3">
                    <label class="col-lg-6 mb-2 ">Upload icon  <span class="required-label">*</span></label>
                    <div class="col-lg-12 mb-3">
                        <div class="input-file input-file-image">

                            <input type="file" class="form-control " id="uploadbgImg" name="image" accept="image/*" hidden >
                            <label for="uploadbgImg" class="btn btn-primary rounded-pill "><i class="fa fa-file-image"></i> Upload </label>
                        </div>
                    </div>
                    <p class="text-warning mb-0">Image Will Resize 200x200 px</p>
                    <p class="text-warning mb-0">Only jpg, jpeg, png image allowed.</p>
                </div>


                <div class="col-md-8">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basicInput">Enter Author Name</label>
                                <input type="text" name="name" class="form-control form-control-lg" id="basicInput" placeholder="Enter Author" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basicInput">Designation</label>
                                <input type="text" name="designation" class="form-control form-control-lg" id="basicInput" placeholder="Enter Designation" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basicInput">Quote</label>
                                <textarea type="text" cols="5" rows="5" class="form-control" id="basicInput" name="quote" required ></textarea>
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


