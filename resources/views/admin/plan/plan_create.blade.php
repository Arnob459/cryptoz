@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add New Plan</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.plan.store') }}" method="post">
                @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="basicInput">Plan Name</label>
                        <input type="text" name="name" class="form-control form-control-lg" id="basicInput" placeholder="Enter Plan Name" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Amount Type </label>
                        <div class="selectgroup w-100">
                            <input type="radio" class="btn-check" name="amount_type" id="success-outlined"
                            autocomplete="off"  >
                        <label class="btn btn-outline-success btn-lg" for="success-outlined">Range</label>

                        <input type="radio" class="btn-check" name="amount_type" id="danger-outlined"
                            autocomplete="off"  >
                        <label class="btn btn-outline-danger btn-lg" for="danger-outlined"> Fixed</label>
                        </div>
                    </div>
                </div>
                <div class="row" id="range">
                    <div class="col-md-4">
                        <label for="basicInput">Minimum Amount </label>
                        <div class="input-group mb-3">
                            <input type="text" name="min_amount" class="form-control form-control-lg" placeholder="Minimum Amount"
                                aria-label="min_amount" aria-describedby="basic-addon1" >
                            <span class="input-group-text" id="basic-addon1">{{ $gnl->currency_symbol }}</span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="basicInput">Maximum Amount </label>
                        <div class="input-group mb-3">
                            <input type="text" name="max_amount" class="form-control form-control-lg" placeholder="Maximum Amount"
                                aria-label="max_amount" aria-describedby="basic-addon1" >
                            <span class="input-group-text" id="basic-addon1">{{ $gnl->currency_symbol }}</span>
                        </div>
                    </div>
                </div>

                {{-- <div class="row" id="fixed">
                    <div class="col-md-4">
                        <label for="basicInput">Fixed Amount </label>
                        <div class="input-group mb-3">
                            <input type="text" name="fixed_amount" class="form-control form-control-lg" placeholder="Fixed Amount"
                                aria-label="Username" aria-describedby="basic-addon1">
                            <span class="input-group-text" id="basic-addon1">{{ $gnl->currency_symbol }}</span>
                        </div>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-md-4">
                        <label for="basicInput">Yearly Capitals </label>
                        <div class="input-group mb-3">
                            <input type="text" name="yearly_capitals" class="form-control form-control-lg" placeholder="Yearly Capitals"
                                aria-label="Username" aria-describedby="basic-addon1" required>
                            <span class="input-group-text" id="basic-addon1">{{ $gnl->currency_symbol }}</span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="basicInput">Daily Earnings  </label>
                        <div class="input-group mb-3">
                            <input type="text" name="daily_earning" class="form-control form-control-lg" placeholder="Daily Earnings"
                                aria-label="Username" aria-describedby="basic-addon1" required>
                            <span class="input-group-text" id="basic-addon1">{{ $gnl->currency_symbol }}</span>
                        </div>
                    </div>
                </div>


                <button type="submit" class="btn btn-success me-1 mb-1">Submit</button>

            </form>

            </div>
        </div>
    </div>
</section>

@endsection
