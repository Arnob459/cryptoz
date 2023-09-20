@extends('admin.layouts.master')

@section('content')


<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Social Link </h4>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.social.update',$social->id) }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="row">

                <div class=" col-md-3">
                    <div class="form-group">
                        <label for="iconSelector">Social Icons </label>
                        <div class="col-sm-10">
                            <select name="icon" class="form-select" >
                            <option value="fas fa-hand-holding-usd"@if ($social->icon == 'fas fa-hand-holding-usd') selected @endif>Hand-holding-usd</option>
                            <option value="fas fa-coins"@if ($social->icon == 'fas fa-coins') selected @endif>Coins</option>
                            <option value="fas fa-chart-bar"@if ($social->icon == 'fas fa-chart-bar') selected @endif>Chart-bar</option>
                            <option value="fas fa-money-bill"@if ($social->icon == 'fas fa-money-bill') selected @endif>Money-bill</option>
                            <option value="fas fa-money-check-alt"@if ($social->icon == 'fas fa-money-check-alt') selected @endif>wallet</option>
                            <option value="fas fa-ellipsis-v"@if ($social->icon == 'fas fa-ellipsis-v') selected @endif >ellipsis-v</option>
                            <option value="fas fa-ellipsis-h"@if ($social->icon == 'fas fa-ellipsis-h') selected @endif>ellipsis-h</option>
                            <option value="fas fa-bars"@if ($social->icon == 'fas fa-bars') selected @endif>Bars</option>
                            <option value="far fa-comment"@if ($social->icon == 'far fa-comment') selected @endif>Comment</option>
                            <option value="far fa-compass"@if ($social->icon == 'far fa-compass') selected @endif>Compass</option>
                            <option value="fas fa-dollar-sign"@if ($social->icon == 'fas fa-dollar-sign') selected @endif>Doller</option>
                            <option value="fas fa-heart"@if ($social->icon == 'fas fa-hear') selected @endif>Heart</option>
                            <option value="fas fa-walking"@if ($social->icon == 'fas fa-walking') selected @endif>Walking</option>
                            <option value="fas fa-users"@if ($social->icon == 'fas fa-users') selected @endif>Users</option>
                            <option value="fab fa-twitter"@if ($social->icon == 'fas fa-twitter') selected @endif>Twitter</option>
                            <option value="fab fa-linkedin"@if ($social->icon == 'fas fa-linkedin') selected @endif>Linkedin</option>
                            <option value="fab fa-youtube"@if ($social->icon == 'fas fa-youtube') selected @endif>Youtube</option>
                            <option value="fab fa-instagram"@if ($social->icon == 'fas fa-instagram') selected @endif>Instagram</option>
                            </select>
                        </div>
                    </div>
                </div>


                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="basicInput">URL </label>
                                <input type="text" name="url" class="form-control form-control-lg" id="basicInput" value="{{ $social->url }}" required>
                            </div>
                        </div>


                <button type="submit" class="btn btn-success  me-1 mb-1">Submit</button>

            </form>

            </div>
        </div>
    </div>
</section>

@endsection


