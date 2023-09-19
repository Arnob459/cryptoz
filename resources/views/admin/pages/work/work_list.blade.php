@extends('admin.layouts.master')

@section('content')

@push('button')
<a href="{{ route('admin.work.create') }}" class="btn btn-warning ">Add New</a>
@endpush

<section class="section">
    <div class="card ">
        <div class="card-header">
            <h4 class="card-title">Add How It's Work </h4>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.worksection.update') }}" method="post" >
                @csrf
            <div class="row">

                <div class="col-md-4 mb-3">
                    <div class="form-group">
                        <label for="basicInput"> Title</label>
                        <input type="text" name="work_title" class="form-control form-control-lg" id="basicInput" value="{{ $work->work_title }}"  required>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                        <label for="basicInput"> Subtitle</label>
                        <input type="text" name="work_subtitle" class="form-control form-control-lg" id="basicInput" value="{{ $work->work_subtitle }}"  required>
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
                <h4 class="card-title">How it's Work </h4>
            </div>

            <div class="card-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Icon</th>
                                    <th>Title</th>
                                    <th>Number</th>
                                    <th>Actions</th>


                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $counter = 0;
                                @endphp
                                @foreach ($works as $level)
                                @php
                                $counter++;
                                @endphp

                                <tr>
                                    <td>{{ $counter }}</td>
                                    <td class="text-bold-500">
                                        <i class="{{ $level->icon }}"></i>
                                    </td>
                                    <td class="text-bold-500">{{ $level->title }}</td>
                                    <td class="text-bold-500">{{ $level->subtitle }}</td>
                                    <td>
                                        <a  href="{{ route('admin.work.edit',$level->id) }}"  class="btn btn-primary rounded-pill"  ><i class ="bi bi-pencil">Edit</i></a>
                                        <a  href="{{ route('admin.work.delete',$level->id) }}"  class="btn btn-danger rounded-pill"  ><i class="bi bi-trash" >Delete</i></a>
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
