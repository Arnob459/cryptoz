@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Banner Update</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.banner.update') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="row">

                <div class="col-md-12 mb-2">
                    <div class="form-group">
                        <label for="basicInput">Enter Title</label>
                        <input type="text" name="banner_title" class="form-control form-control-lg" id="basicInput" value="{{ $banner->banner_title }}"  required>
                    </div>
                </div>

                <div class="col-md-12 mb-2">
                    <div class="form-group">
                        <label for="basicInput">Enter Sub-Title</label>
                        <input type="text" name="banner_subtitle" class="form-control form-control-lg" id="basicInput" value="{{ $banner->banner_subtitle }}"  required>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="col-lg-6 ">Upload Background Image  <span class="required-label">*</span></label>
                    <div class="col-lg-12">
                        <img class="img-upload-preview mb-2 " style="height:200px"   src="{{ asset('assets/admin/images/banner/'.$banner->banner_bg_img) }}" alt="preview">
                        <div class="input-file input-file-image">

                            <input type="file" class="form-control " id="uploadbgImg" name="banner_bg_img" accept="image/*" hidden >
                            <label for="uploadbgImg" class="btn btn-primary rounded-pill "><i class="fa fa-file-image"></i> Upload a Image</label>
                        </div>
                    </div>
                    <p class="text-warning mb-0">Banner Will Resize 1920x1120.</p>
                    <p class="text-warning mb-0">Only jpg, jpeg, png image allowed.</p>
                </div>

                <div class="form-group col-md-6">
                    <label class="col-lg-4 col-md-3 col-sm-4 mt-sm-2">Upload Image  <span class="required-label">*</span></label>
                    <div class="col-lg-12">
                        <img class="img-upload-preview mb-2 " style="height:150px"   src="{{ asset('assets/admin/images/banner/'.$banner->banner_img) }}" alt="preview">
                        <div class="input-file input-file-image">

                            <input type="file" class="form-control " id="uploadImg" name="banner_img" accept="image/*" hidden >
                            <label for="uploadImg" class="btn btn-primary rounded-pill "><i class="fa fa-file-image"></i> Upload a Image</label>
                        </div>
                    </div>
                    <p class="text-warning mb-0">Banner Will Resize 950x7320.</p>
                    <p class="text-warning mb-0">Only jpg, jpeg, png image allowed.</p>

                </div>

                <button type="submit" class="btn btn-success me-1 mb-1">Submit</button>



            </form>

            </div>
        </div>
    </div>
</section>

@endsection
