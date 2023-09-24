@extends('admin.layouts.master')

@section('content')


<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> Add Social Link </h4>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.social.store') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="row">

                <div class=" col-md-4">
                    <div class="form-group">
                        <label for="iconSelector">Icons </label>
                        <div class="col-sm-10">
                            <select id="iconSelector" class="form-select " name="icon" required>
                            <option value="">Select New icon</option>
                            <option value="fas fa-hand-holding-usd">Hand-holding-usd</option>
                            <option value="fas fa-coins">Coins</option>
                            <option value="fas fa-chart-bar">Chart-bar</option>
                            <option value="fas fa-money-bill">Money-bill</option>
                            <option value="fas fa-money-check-alt">wallet</option>
                            <option value="fas fa-ellipsis-v">ellipsis-v</option>
                            <option value="fas fa-ellipsis-h">ellipsis-h</option>
                            <option value="fas fa-bars">Bars</option>
                            <option value="far fa-comment">Comment</option>
                            <option value="far fa-compass">Compass</option>
                            <option value="fas fa-dollar-sign">Doller</option>
                            <option value="fas fa-heart">Heart</option>
                            <option value="fas fa-walking">Walking</option>
                            <option value="fas fa-users">Users</option>
                            <option value="fab fa-twitter">Twitter</option>
                            <option value="fab fa-linkedin">Linkedin</option>
                            <option value="fab fa-youtube">Youtube</option>
                            <option value="fab fa-instagram">Instagram</option>
                            </select>
                        </div>
                    </div>
                </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Url</label>
                                <input type="text" name="url" class="form-control form-control-lg" id="basicInput" placeholder="Enter Url of your social media account" required>
                            </div>
                        </div>

                <button type="submit" class="btn btn-success  me-1 mb-1">Submit</button>

            </form>

            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Social Links </h4>
        </div>

        <div class="card-body">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-lg">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Icon</th>
                                <th>Url</th>
                                <th>Actions</th>


                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $counter = 0;
                            @endphp
                            @foreach ($socials as $item)
                            @php
                            $counter++;
                            @endphp

                            <tr>
                                <td>{{ $counter }}</td>
                                <td class="text-bold-500">
                                    <i class="{{ $item->icon }}"></i>
                                </td>
                                <td class="text-bold-500">{{ $item->url }}</td>
                                <td>
                                    <a  href="{{ route('admin.social.edit',$item->id) }}"  class="btn btn-primary rounded-pill"  ><i class ="bi bi-pencil">Edit</i></a>
                                    <button type="button" class="btn btn-danger rounded-pill" data-toggle="modal" data-target="#deleteModal{{ $item->id }}"><i class ="fa fa-trash"></i>Delete</button>
                                    </td>

                                </tr>
                                {{-- Delete modal --}}
                                        <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">Are You sure?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete this item?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <form method="POST" action="{{ route('admin.social.destroy', $item->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    {{-- modal --}}
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>


            </div>
        </div>
</div>
</section>

@endsection

@push('js')
<script src="{{ asset('assets/admin/js/jquery-3.6.0.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
@endpush

