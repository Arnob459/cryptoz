@extends('admin.layouts.master')

@section('content')


<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> {{ $title }} </h4>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.keyword.update') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="row">
                @foreach ($keywords as $item)
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="basicInput">{{ $item->key_name }}</label>
                        <input type="text" name="key_value" class="form-control form-control-lg" id="basicInput" value="{{ $item->key_value }}" required>
                    </div>
                </div>
                @endforeach


                <button type="submit" class="btn btn-success  me-1 mb-1">Submit</button>

            </form>

            </div>
        </div>
    </div>
</section>

@endsection


