@extends('admin.layouts.master')

@section('content')


<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit plan</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.reward.update',$reward->id) }}" method="post">
                @csrf
            <div class="row">

                <div class="col-md-5">
                    <div class="form-group">
                        <label for="basicInput">Reward Name</label>
                        <input type="text" name="name" class="form-control form-control-lg" id="basicInput" value="{{ $reward->name }}" required>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Set Time Limit </label>
                        <div class="selectgroup w-100">
                            <input type="radio" class="btn-check " name="time_limit" id="success-outlined"
                            autocomplete="off"  value="1" {{ $reward->time_limit == '1' ? 'checked' : '' }} onchange="show()" >
                        <label class="btn btn-outline-success " for="success-outlined">In hours</label>

                        <input type="radio" class="btn-check" name="time_limit" id="danger-outlined"
                            autocomplete="off"  value="0" {{ $reward->time_limit == '0' ? 'checked' : '' }} onchange="show2()">
                        <label class="btn btn-outline-danger " for="danger-outlined"> Lifetime</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="basicInput">Hours</label>
                        <input type="text" name="hours" class="form-control form-control-lg" id="basicInput" value="{{ $reward->hours }}" required>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="contact-info-vertical">Status</label>
                        <select name="status"  class="form-select" >
                            <option value="1"@if ($reward->status == '1') selected @endif>Active</option>
                            <option value="0"@if ($reward->status == '0') selected @endif>Deactivate</option>

                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-success custom-button me-1 mb-1">Submit</button>

            </form>

            </div>
        </div>
    </div>
</section>

@endsection

@push('js')
<script type="text/javascript">
    function show(){
        document.getElementById('fixed').style.display = 'none';
        document.getElementById('range').style.display = 'block';

    }
    function show2(){
        document.getElementById('fixed').style.display = 'block';
        document.getElementById('range').style.display = 'none';

    }
</script>
@endpush
