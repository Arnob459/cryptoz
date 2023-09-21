@extends('admin.layouts.master')

@section('content')


<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Mail To Subscribers</h4>
        </div>
        <hr>

        <div class="card-body">
            <form action="{{ route('admin.subscribers.mail.send') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="row">


                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label class="mb-2" for="basicInput">Subject</label>
                                <input type="text" name="subject" class="form-control form-control-lg"  id="basicInput" required >
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="mb-2" for="editor">Message</label>
                                <textarea type="text" cols="10" rows="10" class="form-control" id="editor" name="message"  required ></textarea>
                            </div>
                        </div>


                <button type="submit" class="btn btn-success  me-1 mb-1">Submit</button>

            </form>

            </div>
        </div>
    </div>
</section>

{{-- <script src="https://cdn.tiny.cloud/1/YOUR_API_KEY/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
    tinymce.init({
        selector: '#editor',
        plugins: 'autolink link image lists print preview',
        toolbar: 'undo redo | bold italic | alignleft aligncenter alignright',
    });
</script> --}}


{{-- @push('nicEdit') --}}
{{-- <script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script>
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
    </script> --}}

{{-- @endpush --}}



@endsection


