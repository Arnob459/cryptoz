@extends('admin.layouts.master')

@section('content')

@push('button')
<a href="{{ route('admin.testimonial.create') }}" class="btn btn-warning ">Add New</a>
@endpush

<section class="section">
    <div class="card ">
        <div class="card-header">
            <h4 class="card-title">Testimonial Section</h4>
        </div>
        <hr>

        <div class="card-body">
            <form action="{{ route('admin.testimonialsection.update') }}" method="post" >
                @csrf
            <div class="row">

                <div class="col-md-4 mb-3">
                    <div class="form-group">
                        <label for="basicInput"> Title</label>
                        <input type="text" name="testimonial_title" class="form-control form-control-lg" id="basicInput" value="{{ $testimonial->testimonial_title }}"  required>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                        <label for="basicInput"> Subtitle</label>
                        <input type="text" name="testimonial_subtitle" class="form-control form-control-lg" id="basicInput" value="{{ $testimonial->testimonial_subtitle }}"  required>
                    </div>
                </div>
                <hr>

                <button type="submit" class="btn btn-success me-1 mb-1">Submit</button>

            </form>

            </div>
        </div>
    </section>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Testimonial </h4>
            </div>
            <hr>

            <div class="card-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Avatar</th>
                                    <th>Author</th>
                                    <th>Designation</th>
                                    <th>Actions</th>


                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $counter = 0;
                                @endphp
                                @foreach ($testimonials as $level)
                                @php
                                $counter++;
                                @endphp

                                <tr>
                                    <td>{{ $counter }}</td>
                                    <td class="text-bold-500">
                                        <div class="avatar avatar-xl  ">
                                        <img src="{{ asset('assets/admin/images/testimonial/'.$level->image) }}" >
                                        </div>
                                    </td>
                                    <td class="text-bold-500">{{ $level->name }}</td>
                                    <td class="text-bold-500">{{ $level->designation }}</td>
                                    <td>
                                        <a  href="{{ route('admin.testimonial.edit',$level->id) }}"  class="btn btn-primary rounded-pill"  ><i class ="bi bi-pencil">Edit</i></a>
                                        <a  href="{{ route('admin.testimonial.delete',$level->id) }}"  class="btn btn-danger rounded-pill"  ><i class="bi bi-trash" >Delete</i></a>
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>


                </div>
            </div>
    </div>
</section>

@endsection
