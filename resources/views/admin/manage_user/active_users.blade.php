@extends('admin.layouts.master')

@section('content')

                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            All Users
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Avatar</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Deposit wallet</th>
                                        <th>Interest wallet</th>
                                        <th>Status</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($active_users as $user)
                                        <td></td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td >{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                        @if ($user->status == 1)
                                        <span class="badge bg-success">Active</span>
                                        @elseif ($user->status == 2)
                                        <span class="badge bg-warning">Pending</span>
                                        @elseif ($user->status == 3)
                                        <span class="badge bg-danger">Blocked</span>
                                        @else
                                        <span class="badge bg-danger">Deactivate</span>
                                        @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.user.edit',$user->id) }}" class="btn icon btn-primary"><i class="bi bi-pencil"></i></a>
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
            <script src="{{ asset('assets/admin/extensions/jquery/jquery.min.js') }}"></script>
            <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
            <script src="{{ asset('assets/admin/js/pages/datatables.js') }}"></script>
            @endpush
@endsection
