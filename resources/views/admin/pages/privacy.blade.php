@extends('admin.layouts.master')

@section('content')


<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">privacy & policy</h4>
        </div>
        <hr>

        <div class="card-body">
            <form action="{{ route('admin.privacy.update') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="row">


                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basicInput">privacy & policy Title<span class="required-label">*</span></label>
                                <input type="text" name="privacy_title" class="form-control form-control-lg" value="{{ $privacy->privacy_title }}" id="basicInput" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="myNicEditor">privacy & policy Description<span class="required-label">*</span></label>
                                <textarea type="text" cols="20" rows="20" class="form-control" id="myNicEditor" name="privacy_description" >{{ $privacy->privacy_description }}</textarea>
                            </div>
                        </div>


                <button type="submit" class="btn btn-success  me-1 mb-1">Submit</button>

            </form>

            </div>
        </div>
    </div>
</section>

@push('nicEdit')
<script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script>
<!-- Include NicEdit from a CDN -->


<script type="text/javascript">
    //<![CDATA[
    bkLib.onDomLoaded(function() {
        nicEditors.editors.push(
            new nicEditor().panelInstance(
                document.getElementById('myNicEditor')
            )
        );
    });
    //]]>
    </script>

@endpush

@endsection


