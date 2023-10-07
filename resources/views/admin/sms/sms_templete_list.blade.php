@extends('admin.layouts.master')

@section('content')

                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            SMS Templetes
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($templetes as $templete)
                                        <td>{{ $templete->name }}</td>
                                        <td>
                                        @if ($templete->status == 1)
                                        <span class="badge bg-success">Active</span>
                                        @else
                                        <span class="badge bg-danger">Deactivate</span>
                                        @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.sms.templete.edit',$templete->id) }}" class="btn icon btn-primary"><i class="bi bi-pencil"></i></a>
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
