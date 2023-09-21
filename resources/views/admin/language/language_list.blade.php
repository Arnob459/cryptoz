@extends('admin.layouts.master')

@section('content')

@push('button')
<button type="button" data-bs-toggle="modal"
data-bs-target="#createModal" class="btn btn-warning ">Add New Language</button>
@endpush

                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Language Manager
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th> Name</th>
                                        <th>Code</th>
                                        <th>Status</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($languages as $language)

                                    <tr>
                                        <td>{{ $language->id }}</td>
                                        <td>{{ $language->name }}</td>
                                        <td style="font-size: 22px;">{{ $language->code }}</td>
                                        <td>
                                            @if ($language->status == 1)
                                            Default
                                            @else
                                            -
                                            @endif
                                        </td>
                                        <td>
                                            @if ($language->name == 'English')
                                            <button type="button" value="{{ $language->id }}" data-bs-toggle="modal" data-bs-target="#editModal" class="btn btn-primary editbtn "><i class="fas fa-edit"></i></button>
                                            @else
                                            <a href="{{ route('admin.keyword.edit',$language->id) }}" class="btn icon btn-primary"><i class="fas fa-code"></i></a>
                                            <button type="button" value="{{ $language->id }}" data-bs-toggle="modal" data-bs-target="#editModal" class="btn btn-primary editbtn "><i class="fas fa-edit"></i></button>
                                            <a href="{{ route('admin.language.delete',$language->id) }}" class="btn icon btn-danger"><i class="fas fa-trash"></i></a>

                                            @endif

                                        </td>
                                    </tr>
                                    @endforeach




                                </tbody>
                            </table>
                        </div>
                    </div>

                                         <!--Basic Modal -->
                                         <div class="modal fade text-left" id="createModal" tabindex="-1" role="dialog"
                                         aria-labelledby="myModalLabel1" aria-hidden="true">
                                         <div class="modal-dialog modal-dialog-scrollable" role="document">
                                             <div class="modal-content">
                                                 <div class="modal-header">
                                                     <h5 class="modal-title" id="myModalLabel1">Edit </h5>
                                                     <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                                         aria-label="Close">
                                                         <i data-feather="x"></i>
                                                     </button>
                                                 </div>
                                                 <form action="{{ route('admin.language.store') }} " method="post">
                                                 @csrf

                                                 <div class="modal-body">


                                                     <div class="col-md-12">
                                                         <div class="form-group">
                                                             <label for="basicInput">Language Name<span class="required-label">*</span></label>
                                                             <input type="text" name="name" id="name" class="form-control form-control-lg"  placeholder="e.g. japaneese,portuguese" required>
                                                         </div>
                                                     </div>

                                                         <div class="col-md-12">
                                                             <div class="form-group">
                                                                 <label for="basicInput">Language Code<span class="required-label">*</span></label>
                                                                 <input type="text" name="code" id="code" class="form-control form-control-lg"  placeholder="e.g. jp" required>
                                                             </div>
                                                         </div>

                                                         <div class="col-md-12">
                                                            <div class="form-group">
                                                                    <label class="form-check-label" >Default Language<span class="required-label">*</span></label>

                                                                    <input type="checkbox"
                                                                        class="form-check-input form-check-success form-check-glow" value="1" name="status"  >
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
                                <form action="{{ route('admin.language.update') }} " method="post">
                                @csrf
                                @method('put')

                                <div class="modal-body">

                                    <input type="hidden" name="language_id" id="language_id" value="{{ $language->id }}">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <label class="form-check-label" >Default Language<span class="required-label">*</span></label>

                                                <input type="checkbox"
                                                    class="form-check-input form-check-success form-check-glow" id="language_status"  name="language_status" value="1"@if ($language->status == '1') checked  @endif >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="basicInput">Language Name</label>
                                            <input type="text" name="language_name" id="language_name" class="form-control form-control-lg"  value="{{ $language->name }}" required>
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

                </section>
            </div>



@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.editbtn', function() {
            var language_id = $(this).val();
            // alert(language_id);
            $('editModal').modal('show');
                $.ajax({
                type: 'GET',
                url: "/admin/language/edit/" + language_id,
                    success: function(response) {
                        // console.log(response);
                        $('#language_id').val(response.language.id);
                        $('#language_name').val(response.language.name);
                        $('#language_status').val(response.language.status);


                    }
                });
        });
    });
</script>
