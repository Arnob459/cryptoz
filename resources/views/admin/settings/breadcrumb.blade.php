@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Breadcrumb </h4>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.breadcrumb.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-row justify-content-center">
                    <div class="form-group ">
                        <div class="form-group form-show-validation">
                            <label class="">Upload Breadcrumb <span class="required-label">*</span></label>
                            <div class="col-lg-12">
                                <div class="input-file input-file-image">
                                    <img class="img-upload-preview mb-2 " style="height:400px; width:1000px"   src="{{ asset('assets/admin/images/breadcrumb/'.$breadcrumb->breadcrumb) }}" alt="preview">
                                    <input type="file" class="form-control form-control-file" id="uploadImg" name="breadcrumb" accept="image/*" hidden >
                                    <label for="uploadImg" class="btn btn-primary rounded-pill btn-lg"><i class="fa fa-file-image"></i> Upload a Breadcrumb</label>
                                </div>
                            </div>
                            <p class="text-warning mb-0 mt-2">Breadcrumb Will Resize 1920pxX350px or upload 1920pxX350px Breadcrumb for best quality.</p>
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
