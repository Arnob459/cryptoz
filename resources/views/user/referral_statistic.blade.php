
@extends('user.layouts.master')

@section('user')

        <!--=======Banner-Section Starts Here=======-->
        <div class="dashboard-hero-content text-white">
            <h3 class="title">Referral Statistic</h3>
            <ul class="breadcrumb">
                <li>
                    <a href="">Home</a>
                </li>
                <li>
                    Referral Statistic
                </li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <div class="partners">
            <h3 class="main-title">Referral Link</h3>
            <div class="referral-group">
                <div class="refers">
                    <div class="referral-links">
                        <div class="oh">
                            <div class="referral-left">
                                <span class="left-icon">
                                    <i class="fas fa-link"></i>
                                </span>
                                <h6>Referral Link:</h6>
                                <div class="copy-button">
                                    <a href="#0" class="custom-button" id="copy">Copy Link</a>
                                </div>
                                <input type="text" id="copyLinks" readonly value="https://hyipland.com/?ref={{ $user->name }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="partners ">
            <div class="d-flex justify-content-center row mb-30-none">

                <div class="col-lg-10 mb-30">

                    <div class="create_wrapper mw-100">

                        <h5 class="subtitle">Referral Statistic </h5>
                        <div class="row">

                        <div class="col-md-4">
                            <div class="earn-thumb">
                                <img src="{{ asset('assets/user/images/dashboard/earn/03.png') }}" alt="dashboard-earn">
                            </div>
                        </div>

                            <div class="col-md-8">
                            <ul >
                                <li>
                                  <h5> {{ $user->name }}</h5>
                                </li>
                            </ul>

                                <ul >
                                    @foreach($user->children as $child)
                                        <li class="ml-3">
                                            {{ $child->name }}
                                            @if(count($child->children))
                                                @include('manageChild',['children' => $child->children])
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
