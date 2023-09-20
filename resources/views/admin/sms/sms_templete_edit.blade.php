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
                                    <td> @{{trx}}</td>
                                    <td> Transaction Number</td>
                                </tr>
                                <tr>
                                    <td> @{{amount}}</td>
                                    <td> Request Amount By user</td>
                                </tr>
                                <tr>
                                    <td> @{{charge}}</td>
                                    <td> Gateway Charge</td>
                                </tr>
                                <tr>
                                    <td> @{{currency}}</td>
                                    <td> Site Currency</td>
                                </tr>
                                <tr>
                                    <td> @{{method_name}}</td>
                                    <td> Conversion Rate</td>
                                </tr>
                                <tr>
                                    <td> @{{method_currency}}</td>
                                    <td> Deposit Method Currency</td>
                                </tr>
                                <tr>
                                    <td> @{{method_amount}}</td>
                                    <td> Deposit Method Amount After Conversion</td>
                                </tr>
                                <tr>
                                    <td> @{{post_balance}}</td>
                                    <td> Users Balance After this operation</td>
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

                <div class="card-header">
                    <h4 class="card-title">{{ $templete->name }} </h4>
                </div>

        <div class="card-body">
            <form action="{{ route('admin.sms.templete.update',$templete->id) }}" method="post" >
                @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-check">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox"
                                class="form-check-input form-check-success form-check-glow" value="1"@if ($templete->status == '1') checked  @endif
                                name="status" id="customColorCheck3">
                            <label class="form-check-label" for="customColorCheck3">Success<span class="required-label">*</span></label>
                        </div>
                    </div>
            </div>


                <div class="col-md-12">
                    <div class="form-group">
                        <label for="basicInput">Message<span class="required-label">*</span></label>
                        <textarea type="text" cols="10" rows="10" class="form-control" id="basicInput" name="message" required >{{ $templete->message }}</textarea>


                    </div>
                </div>
                <hr>

                <button type="submit" class="btn btn-success me-1 mb-1">Submit</button>

            </form>

            </div>
        </div>
    </section>

@endsection
