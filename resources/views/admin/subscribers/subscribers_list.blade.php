@extends('admin.layouts.master')

@section('content')

                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Subscribers
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Email</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($subscribers as $user)
                                        <td>{{ $user->id }}</td>
                                        <td >{{ $user->email }}</td>
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
