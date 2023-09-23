@extends('admin.layouts.master')

@section('content')


<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> {{ $title }} </h4>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.keyword.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
            <div class="row mb-3">
                @foreach ($keywords as $item)
                <div class="col-md-4">
                    <div class="form-group">
                        {{-- <input type="hidden" name="id" class="form-control form-control-lg" id="basicInput" value="{{ $item->id }}" > --}}
                        <label for="basicInput">{{ $item->key_name }}</label>
                        <input type="text" name="keywords[{{ $item->id }}]" class="form-control form-control-lg" id="basicInput" value="{{ $item->key_value }}" required>
                    </div>
                </div>
                @endforeach


                <div class="card-header">
                    <button type="button" value="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#editModal" class="btn btn-primary editbtn ">Add New Key</button>

                </div>


                <button type="submit" class="btn btn-success  me-1 mb-1">Submit</button>

            </form>

            </div>
        </div>

                             <!--Basic Modal -->
                             <div class="modal fade text-left" id="editModal" tabindex="-1" role="dialog"
                             aria-labelledby="myModalLabel" aria-hidden="true">
                             <div class="modal-dialog modal-dialog-scrollable" role="document">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h5 class="modal-title" id="myModalLabel1">Edit </h5>
                                         <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                             aria-label="Close">
                                             <i data-feather="x"></i>
                                         </button>
                                     </div>
                                     <form action="{{ route('admin.keyword.store') }} " method="post">
                                     @csrf

                                     <div class="modal-body">

                                         <input type="hidden" name="language_id" id="language_id" value="{{ $item->language_id }}" >

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
                                                 <span class="d-none d-sm-block">Update</span>
                                             </button>
                                         </div>
                                     </form>
                                 </div>
                             </div>
                         </div>
    </div>
</section>

@endsection


