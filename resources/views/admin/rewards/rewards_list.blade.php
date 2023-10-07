@extends('admin.layouts.master')

@section('content')



                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Manage Rewards
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Rewards Name</th>
                                        <th>Image</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rewards as $reward)

                                    <tr>
                                        <td>{{ $reward->id }}</td>
                                        <td>
                                            {{ $reward->name }}</td>
                                        <td>
                                            <div class="avatar avatar-xl  ">
                                            <img src="{{ asset('assets/admin/images/rewards/'.$reward->image) }}" alt="" srcset="">
                                            </div>
                                        </td>
                                        <td>
                                            @if ($reward->time_limit == 1)
                                            {{ $reward->hours }} hours
                                            @else
                                            Lifetime
                                            @endif
                                            </td>
                                        <td>
                                            @if ($reward->status == 1)
                                            <span class="badge bg-success">Active</span>
                                            @else
                                            <span class="badge bg-danger">Deactivate</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.reward.level.list',$reward->id) }}" class="btn icon btn-info" ><i class="fa fa-eye" ></i></a>
                                            <a href="{{ route('admin.reward.edit',$reward->id) }}" class="btn icon btn-primary"><i class="bi bi-pencil"></i></a>

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
