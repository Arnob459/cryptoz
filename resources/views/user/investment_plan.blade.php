
@extends('user.layouts.master')

@section('user')




        <!--=======Offer-Section Stars Here=======-->
        <section class="offer-section padding-top padding-bottom">

            <div class="container text-white mb-3">
                <h3 class="title text-white">Investment Plan</h3>
                <ul class="breadcrumb">
                    <li class="nav-item"><a class="nav-link " href="">Home</a></li>

                    <li> Plan </li>
                </ul>
            </div>

            <div class="ball-group-1" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60"
            data-paroller-type="foreground" data-paroller-direction="horizontal">
                <img src="{{ asset('assets/user/images/balls/ball-group1.png') }}" alt="balls">
            </div>
            <div class="ball-group-2" data-paroller-factor="0.30" data-paroller-factor-lg="-0.30"
            data-paroller-type="foreground" data-paroller-direction="horizontal">
                <img src="{{ asset('assets/user/images/balls/ball-group2.png') }}" alt="balls">
            </div>

            <div class="container">


                <div class="offer-wrapper">

                    @foreach ($plans as $plan)

                    <div class="offer-item">
                        <div class="offer-header">
                            <div class="item-thumb">
                                <h5 class="title">{{ $plan->name }}</h5>

                            </div>
                        </div>
                        <div class="offer-body">
                            <span class="bal-shape"></span>
                            <div class="item first">
                                <div class="item-thumb">
                                    <img src="{{ asset('assets/admin/images/plan/'.$plan->image) }}" alt="offer">
                                </div>

                            </div>
                            <span class="bal-shape"></span>
                            <div class="item">
                                <div class="item-thumb">
                                    @if($plan->min_amount != 0)
                                    <h5 class="title">  Min:{{ $gnl->currency_symbol }}   {{number_format($plan->min_amount)}} - Max:{{  $gnl->currency_symbol  }}  {{number_format($plan->max_amount)}} </h5>
                                   @else
                                   <h5 class="title">  Fixed:{{  $gnl->currency_symbol  }}  {{number_format($plan->fixed_amount)}} </h5>
                                    @endif
                                </div>
                                <div class="item-content">

                                    <h5 class="subtitle"> Hourly / 100 Times </h5>
                                    <br>
                                    <h5 class="title">24/7 Support</h5>

                                </div>
                            </div>

                        </div>
                        <div class="offer-footer">
                            <a href="#0" class="custom-button">invest now</a>
                        </div>
                    </div>

                    @endforeach


                </div>

            </div>

        </section>

        {{-- <div class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
              <div class="toast-body">
                Hello, world! This is a toast message.
              </div>
              <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
          </div> --}}

        <div class="container-fluid sticky-bottom">
            <div class="footer-bottom">
                <div class="footer-bottom-area">
                    <div >
                        <p> Copyright © 2020. All rights reserved</p>
                    </div>
                    <ul class="social-icons">
                        <li>
                            <a href="#0">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#0" class="active">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#0">
                                <i class="fab fa-pinterest-p"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#0">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

@endsection
