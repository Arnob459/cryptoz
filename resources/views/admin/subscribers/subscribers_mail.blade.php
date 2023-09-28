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
                                <label class="mb-2" for="myNicEditor">Message</label>
                                <textarea type="text" cols="10" rows="10" class="form-control" id="myNicEditor" name="message"  ></textarea>
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


