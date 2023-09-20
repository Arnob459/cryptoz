@extends('admin.layouts.master')

@section('content')


<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Why Choose Us Edit </h4>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.choose.update',$choose->id) }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="row">

                <div class=" col-md-4">
                    <div class="form-group">
                        <label for="iconSelector">Icons </label>
                        <div class="col-sm-10">
                            <select id="iconSelector" class="form-select" name="icon" required>
                            <option value="fas fa-hand-holding-usd"@if ($choose->icon == 'fas fa-hand-holding-usd') selected @endif>Hand-holding-usd</option>
                            <option value="fas fa-coins"@if ($choose->icon == 'fas fa-coins') selected @endif>Coins</option>
                            <option value="fas fa-chart-bar"@if ($choose->icon == 'fas fa-chart-bar') selected @endif>Chart-bar</option>
                            <option value="fas fa-money-bill"@if ($choose->icon == 'fas fa-money-bill') selected @endif>Money-bill</option>
                            <option value="fas fa-money-check-alt"@if ($choose->icon == 'fas fa-money-check-alt') selected @endif>wallet</option>
                            <option value="fas fa-ellipsis-v"@if ($choose->icon == 'fas fa-ellipsis-v') selected @endif >ellipsis-v</option>
                            <option value="fas fa-ellipsis-h"@if ($choose->icon == 'fas fa-ellipsis-h') selected @endif>ellipsis-h</option>
                            <option value="fas fa-bars"@if ($choose->icon == 'fas fa-bars') selected @endif>Bars</option>
                            <option value="far fa-comment"@if ($choose->icon == 'far fa-comment') selected @endif>Comment</option>
                            <option value="far fa-compass"@if ($choose->icon == 'far fa-compass') selected @endif>Compass</option>
                            <option value="fas fa-dollar-sign"@if ($choose->icon == 'fas fa-dollar-sign') selected @endif>Doller</option>
                            <option value="fas fa-heart"@if ($choose->icon == 'fas fa-hear') selected @endif>Heart</option>
                            <option value="fas fa-walking"@if ($choose->icon == 'fas fa-walking') selected @endif>Walking</option>
                            <option value="fas fa-users"@if ($choose->icon == 'fas fa-users') selected @endif>Users</option>
                            <option value="fab fa-twitter"@if ($choose->icon == 'fas fa-twitter') selected @endif>Twitter</option>
                            <option value="fab fa-linkedin"@if ($choose->icon == 'fas fa-linkedin') selected @endif>Linkedin</option>
                            <option value="fab fa-youtube"@if ($choose->icon == 'fas fa-youtube') selected @endif>Youtube</option>
                            <option value="fab fa-instagram"@if ($choose->icon == 'fas fa-instagram') selected @endif>Instagram</option>
                            </select>
                        </div>
                    </div>
                </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Title</label>
                                <input type="text" name="title" class="form-control form-control-lg" id="basicInput" value="{{ $choose->title }}" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Short Text</label>
                                <input type="text" name="subtitle" class="form-control form-control-lg" id="basicInput" value="{{ $choose->subtitle }}" required>
                            </div>
                        </div>


                <button type="submit" class="btn btn-success  me-1 mb-1">Submit</button>

            </form>

            </div>
        </div>
    </div>
</section>

@endsection


