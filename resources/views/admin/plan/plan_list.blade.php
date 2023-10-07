@extends('admin.layouts.master')

@section('content')

@push('button')
<a href="{{ route('admin.plan.create') }}" class="btn btn-warning ">Add New Plan</a>
@endpush

                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Manage Plan
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Plan Name</th>
                                        <th>Invest Amount</th>
                                        <th>Earning Capasity</th>
                                        <th>Daily Earnings</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plans as $plan)
                                    <tr>
                                        <td>{{ $plan->name }} </td>
                                        <td>
                                            @if($plan->min_amount != 0)
                                             Min:{{ $gnl->currency_symbol }}   {{number_format($plan->min_amount)}} - Max:{{  $gnl->currency_symbol  }}  {{number_format($plan->max_amount)}}
                                            @else
                                            Fixed:{{  $gnl->currency_symbol  }}  {{number_format($plan->fixed_amount)}}

                                            @endif
                                        </td>
                                        <td>{{number_format($plan->earning_capasity)}}</td>
                                        <td>{{number_format($plan->daily_earning)}}</td>
                                        <td>
                                            @if ($plan->status == 1)
                                            <span class="badge bg-success">Active</span>

                                            @else
                                            <span class="badge bg-danger">Deactivate</span>

                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.plan.edit',$plan->id) }}" class="btn icon btn-primary"><i class="bi bi-pencil"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            </div>
@push('datatable')
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="{{ asset('assets/admin/js/pages/datatables.js') }}"></script>
@endpush

@endsection
