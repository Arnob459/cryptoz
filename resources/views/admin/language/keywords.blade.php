@extends('admin.layouts.master')

@section('content')


<section class="section">
    <div class="card">


        <div class="card-body">
            <form action="{{ route('admin.keyword.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
            <div class="row mb-3">
                <div class="col-md-8">
                    <ul class="">
                        <li class="text-info">Click Add Translatable Add Put Your Key For Translate</li>
                        <li class="text-danger">Add Translatable Key please careful when you entering word or sentences, there shouldn't be any extra space or break.</li>
                        <li class="text-success">If your keywords are perfect but translator doesn't work, don't worry. escape all dynamic keywords and add single word, it'll work.</li>
                    </ul>
                </div>

                {{-- <div class="col-md-4">

                    <div class="input-group mb-3">
                        <button class="btn btn-primary dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Import Keywords</button>
                        <ul class="dropdown-menu">
                            @foreach ($languages as $item)
                            <li><a class="dropdown-item"  href="{{ route('admin.keyword.import', $item->id) }}">{{ $item->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <label class=" text-danger" >If you import keywords from another language, Your present {{ $title }} all keywords will remove.</label>
                </div> --}}

                <hr>
                @foreach ($keywords as $item)
                <div class="col-md-4">

                    <label class=""form-control">{{ $item->key_name }}</label>
                    <div class="input-group mb-3">
                        <input type="text" name="keywords[{{ $item->id }}]" class="form-control"  value="{{ $item->key_value }}" required
                            aria-label="Example text with button addon"
                            aria-describedby="button-addon1">
                        <button type="button" class="btn btn-danger" id="button-addon1" data-toggle="modal" data-target="#deleteModal{{ $item->id }}"><i class ="fa fa-trash"></i></button>

                    </div>
                </div>
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
                                                                                    Are you sure you want to delete this Language?
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                                    <form method="POST" action="{{ route('admin.keyword.destroy', $item->id) }}">
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

                <div class="card-header">
                    <button type="button" value="{{ $id }}" data-bs-toggle="modal" data-bs-target="#editModal" class="btn btn-primary editbtn ">Add New Key</button>

                </div>
                {{-- <button type="submit" class="btn btn-success  me-1 mb-1">Submit</button> --}}
            </form>

            </div>
        </div>

                             <!--Basic Modal -->
                             <div class="modal fade text-left" id="editModal" tabindex="-1" role="dialog"
                             aria-labelledby="myModalLabel" aria-hidden="true">
                             <div class="modal-dialog modal-dialog-scrollable" role="document">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h5 class="modal-title" id="myModalLabel1">Translate </h5>
                                         <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                             aria-label="Close">
                                             <i data-feather="x"></i>
                                         </button>
                                     </div>
                                     <form action="{{ route('admin.keyword.store') }} " method="post">
                                     @csrf

                                     <div class="modal-body">

                                         <input type="hidden" name="language_id" id="language_id" value="{{ $id }}" >

                                         <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="basicInput">English</label>
                                                <input type="text" name="key_name" id="key_name" class="form-control form-control-lg"  required>
                                            </div>
                                        </div>

                                         <div class="col-md-12">
                                             <div class="form-group">
                                                 <label for="basicInput">{{ $title }}</label>
                                                 <input type="text" name="key_value" id="key_value" class="form-control form-control-lg"  required>
                                             </div>
                                         </div>

                                     </div>
                                         <div class="modal-footer">
                                             <button type="button" class="btn" data-bs-dismiss="modal">
                                                 <i class="bx bx-x d-block d-sm-none"></i>
                                                 <span class="d-none d-sm-block">Close</span>
                                             </button>
                                             <button type="submit" class="btn btn-primary ml-1" >
                                                 <i class="bx bx-check d-block d-sm-none"></i>
                                                 <span class="d-none d-sm-block">Add New</span>
                                             </button>
                                         </div>
                                     </form>
                                 </div>
                             </div>
                         </div>
    </div>
</section>

@push('js')
<script src="{{ asset('assets/admin/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
@endpush

@endsection


