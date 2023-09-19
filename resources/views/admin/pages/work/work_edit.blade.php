@extends('admin.layouts.master')

@section('content')


<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">How it's Work Edit </h4>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.work.update',$work->id) }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="row">

                <div class=" col-md-4">
                    <div class="form-group">
                        <label for="iconSelector">Icons </label>
                        <div class="col-sm-10">
                            <select id="iconSelector" class="form-select" name="icon" required>
                            <option value="fas fa-ellipsis-v"@if ($work->icon == 'fas fa-ellipsis-v') selected @endif >ellipsis-v</option>
                            <option value="fas fa-ellipsis-h"@if ($work->icon == 'fas fa-ellipsis-h') selected @endif>ellipsis-h</option>
                            <option value="fas fa-bars"@if ($work->icon == 'fas fa-bars') selected @endif>Bars</option>
                            <option value="far fa-comment"@if ($work->icon == 'far fa-comment') selected @endif>Comment</option>
                            <option value="far fa-compass"@if ($work->icon == 'far fa-compass') selected @endif>Compass</option>
                            <option value="fas fa-dollar-sign"@if ($work->icon == 'fas fa-dollar-sign') selected @endif>Doller</option>
                            <option value="fas fa-heart"@if ($work->icon == 'fas fa-hear') selected @endif>Heart</option>
                            <option value="fas fa-walking"@if ($work->icon == 'fas fa-walking') selected @endif>Walking</option>
                            <option value="fas fa-users"@if ($work->icon == 'fas fa-users') selected @endif>Users</option>
                            <option value="fab fa-twitter"@if ($work->icon == 'fas fa-twitter') selected @endif>Twitter</option>
                            <option value="fab fa-linkedin"@if ($work->icon == 'fas fa-linkedin') selected @endif>Linkedin</option>
                            <option value="fab fa-youtube"@if ($work->icon == 'fas fa-youtube') selected @endif>Youtube</option>
                            <option value="fab fa-instagram"@if ($work->icon == 'fas fa-instagram') selected @endif>Instagram</option>
                            </select>
                        </div>
                    </div>
                </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Title</label>
                                <input type="text" name="title" class="form-control form-control-lg" id="basicInput" value="{{ $work->title }}" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Short Text</label>
                                <input type="text" name="subtitle" class="form-control form-control-lg" id="basicInput" value="{{ $work->subtitle }}" required>
                            </div>
                        </div>


                <button type="submit" class="btn btn-success  me-1 mb-1">Submit</button>

            </form>

            </div>
        </div>
    </div>
</section>

@endsection


