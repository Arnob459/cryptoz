@extends('admin.layouts.master')

@section('content')


<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit plan</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.plan.update',$plan->id) }}" method="post" enctype="multipart/form-data"  >
                @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="basicInput">Plan Name</label>
                        <input type="text" name="name" class="form-control form-control-lg" id="basicInput" value="{{ $plan->name }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Amount Type </label>
                        <div class="selectgroup w-100">
                            <input type="radio" class="btn-check " name="amount_type" id="success-outlined"
                            autocomplete="off"  value="range" {{ $plan->amount_type == 'range' ? 'checked' : '' }} onchange="show()" >
                        <label class="btn btn-outline-success " for="success-outlined">Range</label>

                        <input type="radio" class="btn-check" name="amount_type" id="danger-outlined"
                            autocomplete="off"  value="fixed" {{ $plan->amount_type == 'fixed' ? 'checked' : '' }} onchange="show2()">
                        <label class="btn btn-outline-danger " for="danger-outlined"> Fixed</label>
                        </div>
                    </div>
                </div>
                <div  id="range" style="display: {{ $plan->amount_type === 'range' ? 'block' : 'none' }}">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="basicInput">Minimum Amount </label>
                            <div class="input-group mb-3">
                                <input type="text" name="min_amount" class="form-control form-control-lg" value="{{ $plan->min_amount }}"
                                    aria-label="min_amount" aria-describedby="basic-addon1" >
                                <span class="input-group-text" id="basic-addon1">{{ $gnl->currency_symbol }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="basicInput">Maximum Amount </label>
                            <div class="input-group mb-3">
                                <input type="text" name="max_amount" class="form-control form-control-lg" value="{{ $plan->max_amount }}"
                                    aria-label="max_amount" aria-describedby="basic-addon1" >
                                <span class="input-group-text" id="basic-addon1">{{ $gnl->currency_symbol }}</span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row" id="fixed" style="display: {{ $plan->amount_type === 'fixed' ? 'block' : 'none' }}">
                    <div class="col-md-6" >
                        <label for="basicInput">Fixed Amount </label>
                        <div class="input-group mb-3" >
                            <input type="text"  name="fixed_amount" class="form-control form-control-lg" value="{{ $plan->fixed_amount }}"
                                aria-label="Username" aria-describedby="basic-addon1">
                            <span class="input-group-text" id="basic-addon1">{{ $gnl->currency_symbol }}</span>
                        </div>
                    </div>
                </div>

                <div >
                    <div class="row">
                        <div class="col-md-6">
                            <label for="basicInput">Earning Capasity </label>
                            <div class="input-group mb-3">
                                <input type="text" name="earning_capasity" class="form-control form-control-lg" value="{{ $plan->earning_capasity }}"
                                    aria-label="Username" aria-describedby="basic-addon1" required>
                                <span class="input-group-text" id="basic-addon1">{{ $gnl->currency_symbol }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="basicInput">Daily Earnings  </label>
                            <div class="input-group mb-3">
                                <input type="text" name="daily_earning" class="form-control form-control-lg" value="{{ $plan->daily_earning }}"
                                    aria-label="Username" aria-describedby="basic-addon1" required>
                                <span class="input-group-text" id="basic-addon1">{{ $gnl->currency_symbol }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <div class="selectgroup w-100">
                            <input type="radio" class="btn-check" name="status" id="active"
                            autocomplete="off" value="1" {{ $plan->status == '1' ? 'checked' : '' }}  >
                        <label class="btn btn-outline-success " for="active">Active</label>

                        <input type="radio" class="btn-check" name="status" id="deactive"
                            autocomplete="off" value="0" {{ $plan->status == '0' ? 'checked' : '' }}  >
                        <label class="btn btn-outline-danger " for="deactive"> Deactivate</label>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="col-lg-6  ">Upload Image  <span class="required-label">*</span></label>
                    <div class="form-group ">
                        <img src="{{ asset('assets/admin/images/plan/'.$plan->image) }}" alt="Image Preview" id="image-preview" style="height:40vh" >
                    </div>
                    <div class="col-lg-12 ">
                        <div class="input-file input-file-image">
                            <input type="file" class="form-control " id="image" name="image" accept="image/*" hidden >
                            <label for="image" class="btn btn-primary rounded-pill "><i class="fa fa-file-image"></i> Upload</label>
                        </div>
                    </div>
                    <p class="text-warning mb-0">Image Will Resize 512x512.</p>
                    <p class="text-warning mb-0">Only jpg, jpeg, png image allowed.</p>
                </div>


                <button type="submit" class="btn btn-success custom-button me-1 mb-1">Submit</button>

            </form>

            </div>
        </div>
    </div>
</section>

@endsection

@push('js')
<script type="text/javascript">
    function show(){
        document.getElementById('fixed').style.display = 'none';
        document.getElementById('range').style.display = 'block';

    }
    function show2(){
        document.getElementById('fixed').style.display = 'block';
        document.getElementById('range').style.display = 'none';

    }
</script>
@endpush
@push('js')
{{-- <script src="{{ asset('assets/admin/js/jquery-3.6.0.min.js') }}"></script> --}}
<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#image-preview').attr('src', e.target.result).show();
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#image').on('change', function() {
        previewImage(this);
    });
</script>
@endpush
