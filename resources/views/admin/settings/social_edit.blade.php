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
                                <option value="fas fa-coins"{{ $social->icon == 'fas fa-coins' ? 'selected':'' }}>Coins</option>
                                <option value="fas fa-hand-holding-usd"{{ $social->icon == 'fas fa-hand-holding-usd' ? 'selected':'' }}>Hand-holding-usd</option>
                                <option value="fas fa-chart-bar"{{ $social->icon == 'fas fa-chart-bar' ? 'selected':'' }}>Chart-bar</option>
                                <option value="fas fa-money-bill"{{ $social->icon == 'fas fa-money-bill' ? 'selected':'' }}>Money-bill</option>
                                <option value="fas fa-money-check-alt"{{ $social->icon == 'fas fa-money-check-alt' ? 'selected':'' }}>wallet</option>
                                <option value="fas fa-ellipsis-v"{{ $social->icon == 'fas fa-ellipsis-v' ? 'selected':'' }} >ellipsis-v</option>
                                <option value="fas fa-ellipsis-h"{{ $social->icon == 'fas fa-ellipsis-h' ? 'selected':'' }}>ellipsis-h</option>
                                <option value="fas fa-bars"{{ $social->icon == 'fas fa-bars' ? 'selected':'' }}>Bars</option>
                                <option value="far fa-comment"{{ $social->icon == 'far fa-comment' ? 'selected':'' }}>Comment</option>
                                <option value="far fa-compass"{{ $social->icon == 'far fa-compass' ? 'selected':'' }}>Compass</option>
                                <option value="fas fa-dollar-sign"{{ $social->icon == 'fas fa-dollar-sign' ? 'selected':'' }}>Doller</option>
                                <option value="fas fa-heart"{{ $social->icon == 'fas fa-heart' ? 'selected':'' }}>Heart</option>
                                <option value="fas fa-walking"{{ $social->icon == 'fas fa-walking' ? 'selected':'' }}>Walking</option>
                                <option value="fas fa-users"{{ $social->icon == 'fas fa-users' ? 'selected':'' }}>Users</option>
                                <option value="fab fa-twitter"{{ $social->icon == 'fab fa-twitter' ? 'selected':'' }}>Twitter</option>
                                <option value="fab fa-linkedin"{{ $social->icon == 'fab fa-linkedin' ? 'selected':'' }}>Linkedin</option>
                                <option value="fab fa-youtube"{{ $social->icon == 'fab fa-youtube' ? 'selected':'' }}>Youtube</option>
                                <option value="fab fa-instagram"{{ $social->icon == 'fab fa-instagram' ? 'selected':'' }}>Instagram</option>

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


