@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Logo and Favicon </h4>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.logo.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-6">
                        <div class="form-group form-show-validation">
                            <label class="col-lg-4 col-md-3 col-sm-4 mt-sm-2">Upload Logo <span class="required-label">*</span></label>
                            <div class="col-lg-12">
                                <div class="input-file input-file-image">
                                    <img class="img-upload-preview mb-2 " style="height:100px"   src="{{ asset('assets/admin/images/logo/'.$settings->logo) }}" alt="preview">
                                    <input type="file" class="form-control form-control-file" id="uploadImg" name="logo" accept="image/*" hidden >
                                    <label for="uploadImg" class="btn btn-primary btn-round btn-lg"><i class="fa fa-file-image"></i> Upload a Logo</label>
                                </div>
                            </div>
                            <p class="text-warning mb-0 mt-2">Upload 160pxX35px Logo for best quality.</p>
                            <p class="text-warning mb-0">Only jpg, jpeg, png image allowed.</p>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-group form-show-validation">
                            <label class="col-lg-4 col-md-3 col-sm-4 mt-sm-2" >Upload Favicon <span class="required-label">*</span></label>
                            <div class="col-lg-12">
                                <img class="img-upload-preview mb-2 " style="height:100px" src="{{ asset('assets/admin/images/logo/'.$settings->favicon) }}" alt="preview">

                                <div class="input-file input-file-image">
                                    <input type="file" class="form-control form-control-file" id="uploadImgFavicon" name="favicon" accept="image/*" hidden >
                                    <label for="uploadImgFavicon" class="btn btn-primary btn-round btn-lg"><i class="fa fa-file-image"></i> Upload a Favicon</label>
                                </div>
                            </div>
                            <p class="text-warning mb-0 mt-2">Upload 40pxX40px Favicon for best quality.</p>
                            <p class="text-warning mb-0">Only jpg, jpeg, png image allowed.</p>
                        </div>
                    </div>
                </div>

                <div class="card-action">
                    <button type="submit" class="btn btn-success btn-block">Submit</button>
                </div>



            </form>

            </div>
        </div>
    </div>
</section>

@endsection
