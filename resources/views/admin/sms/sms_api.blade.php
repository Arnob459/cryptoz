@extends('admin.layouts.master')

@section('content')

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">SMS API </h4>
            </div>

            <div class="card-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>Short Code</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> @{{number}}</td>
                                    <td> Number</td>
                                </tr>
                                <tr>
                                    <td> @{{message}}</td>
                                    <td> Message</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

                </div>
            </div>
    </div>
</section>

<section class="section">
    <div class="card ">

        <div class="row">
            <div class="col-12 col-md-9 ">
                <div class="card-header">
                    <h4 class="card-title">SMS API </h4>
                </div>
            </div>
            <div class="col-12 col-md-3 ">
                <div class="card-header">
                    <a href="" class="btn btn-warning ">Send Test SMS</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.sms.api.update') }}" method="post" >
                @csrf
            <div class="row">

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="basicInput">SMS Api<span class="required-label">*</span></label>
                        <input type="text" name="sms_api" class="form-control form-control-lg" id="basicInput" value="{{ $api->sms_api }}"  required>

                    </div>
                </div>
                <hr>

                <button type="submit" class="btn btn-success me-1 mb-1">Submit</button>

            </form>

            </div>
        </div>
    </section>

@endsection
