@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">About US</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.about.update') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="row">



                <div class="form-group col-md-4">
                    <label class="col-lg-6 ">About Image  <span class="required-label">*</span></label>
                    <div class="col-lg-12">
                        <img class="img-upload-preview mb-2 " style="height:200px"   src="{{ asset('assets/admin/images/about/'.$about->about_image) }}" alt="preview">
                        <div class="input-file input-file-image">

                            <input type="file" class="form-control " id="uploadbgImg" name="about_image" accept="image/*" hidden >
                            <label for="uploadbgImg" class="btn btn-primary rounded-pill "><i class="fa fa-file-image"></i> Upload </label>
                        </div>
                    </div>
                    <p class="text-warning mb-0">Image Will Resize 626X626.</p>
                    <p class="text-warning mb-0">Only jpg, jpeg, png image allowed.</p>
                </div>

                <div class="form-group col-md-8">
                <div class="row">

                    <div class="col-md-12 mb-2">
                        <div class="form-group">
                            <label for="basicInput">Enter Title</label>
                            <input type="text" name="about_title" class="form-control form-control-lg" id="basicInput" value="{{ $about->about_title }}"  required>
                        </div>
                    </div>

                    <div class="col-md-12 mb-2">
                        <div class="form-group">
                            <label for="basicInput">Description</label>
                            <textarea type="text" cols="10" rows="10" class="form-control" id="basicInput" name="about_description" required >{{ $about->about_description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

                <button type="submit" class="btn btn-success me-1 mb-1">Submit</button>

            </form>

            </div>
        </div>
    </div>
</section>

@endsection
