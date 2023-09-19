@extends('admin.layouts.master')

@section('content')


<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Counter Edit </h4>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.counter.update',$counter->id) }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="row">

                <div class=" col-md-4">
                    <div class="form-group">
                        <label for="iconSelector">Icons </label>
                        <div class="col-sm-10">
                            <select id="iconSelector" class="form-select" name="icon" required>
                            <option value="fas fa-ellipsis-v"@if ($counter->icon == 'fas fa-ellipsis-v') selected @endif >ellipsis-v</option>
                            <option value="fas fa-ellipsis-h"@if ($counter->icon == 'fas fa-ellipsis-h') selected @endif>ellipsis-h</option>
                            <option value="fas fa-bars"@if ($counter->icon == 'fas fa-bars') selected @endif>Bars</option>
                            <option value="far fa-comment"@if ($counter->icon == 'far fa-comment') selected @endif>Comment</option>
                            <option value="far fa-compass"@if ($counter->icon == 'far fa-compass') selected @endif>Compass</option>
                            <option value="fas fa-dollar-sign"@if ($counter->icon == 'fas fa-dollar-sign') selected @endif>Doller</option>
                            <option value="fas fa-heart"@if ($counter->icon == 'fas fa-hear') selected @endif>Heart</option>
                            <option value="fas fa-walking"@if ($counter->icon == 'fas fa-walking') selected @endif>Walking</option>
                            <option value="fas fa-users"@if ($counter->icon == 'fas fa-users') selected @endif>Users</option>
                            <option value="fab fa-twitter"@if ($counter->icon == 'fas fa-twitter') selected @endif>Twitter</option>
                            <option value="fab fa-linkedin"@if ($counter->icon == 'fas fa-linkedin') selected @endif>Linkedin</option>
                            <option value="fab fa-youtube"@if ($counter->icon == 'fas fa-youtube') selected @endif>Youtube</option>
                            <option value="fab fa-instagram"@if ($counter->icon == 'fas fa-instagram') selected @endif>Instagram</option>
                            </select>
                        </div>
                    </div>
                </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Title</label>
                                <input type="text" name="title" class="form-control form-control-lg" id="basicInput" value="{{ $counter->title }}" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Number</label>
                                <input type="text" name="number" class="form-control form-control-lg" id="basicInput" value="{{ $counter->number }}" required>
                            </div>
                        </div>


                <button type="submit" class="btn btn-success  me-1 mb-1">Submit</button>

            </form>

            </div>
        </div>
    </div>
</section>

@endsection


