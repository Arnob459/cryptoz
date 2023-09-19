@extends('admin.layouts.master')

@section('content')

@push('button')
<a href="{{ route('admin.slider.create') }}" class="btn btn-warning ">Add New</a>
@endpush

<section class="section">

    <div class="row">
        @foreach ($sliders as $slider)
        <div class="col-xl-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">

                    <img class="img-fluid w-100" src="{{ asset('assets/admin/images/slider/'.$slider->image) }}" alt="Card image cap">

                    </div>
                </div>
                <hr>

                <div class="card-footer ">
                    <h4 class="card-title"> {{ $slider->title }}</h4>
                    <p> {{ $slider->subtitle }} </p>
                    <a type="submit"  href="{{ route('admin.slider.edit',$slider->id) }}"  class="btn btn-primary rounded-pill"  ><i class ="bi bi-pencil">Edit</i></a>
                    <a type="submit"  href="{{ route('admin.slider.delete',$slider->id) }}"  class="btn btn-danger rounded-pill"  ><i class="bi bi-trash" >Delete</i></a>


                </div>
            </div>
        </div>
    @endforeach

    </div>




</section>

@endsection
