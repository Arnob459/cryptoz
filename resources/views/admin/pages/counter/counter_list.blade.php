@extends('admin.layouts.master')

@section('content')

@push('button')
<a href="{{ route('admin.counter.create') }}" class="btn btn-warning ">Add New</a>
@endpush

<section class="section">
    <div class="card ">
        <div class="card-header">
            <h4 class="card-title">Counter Section </h4>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.countersection.update') }}" method="post" >
                @csrf
            <div class="row">

                <div class="col-md-4 mb-3">
                    <div class="form-group">
                        <label for="basicInput"> Title</label>
                        <input type="text" name="counter_title" class="form-control form-control-lg" id="basicInput" value="{{ $counter->counter_title }}"  required>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                        <label for="basicInput"> Subtitle</label>
                        <input type="text" name="counter_subtitle" class="form-control form-control-lg" id="basicInput" value="{{ $counter->counter_subtitle }}"  required>
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
                <h4 class="card-title">Counter </h4>
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
                                @foreach ($counters as $level)
                                @php
                                $counter++;
                                @endphp

                                <tr>
                                    <td>{{ $counter }}</td>
                                    <td class="text-bold-500">
                                        <i class="{{ $level->icon }}"></i>
                                    </td>
                                    <td class="text-bold-500">{{ $level->title }}</td>
                                    <td class="text-bold-500">{{ $level->number }}</td>
                                    <td>
                                        <a  href="{{ route('admin.counter.edit',$level->id) }}"  class="btn btn-primary rounded-pill"  ><i class ="bi bi-pencil">Edit</i></a>
                                        <a  href="{{ route('admin.counter.delete',$level->id) }}"  class="btn btn-danger rounded-pill"  ><i class="bi bi-trash" >Delete</i></a>
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
