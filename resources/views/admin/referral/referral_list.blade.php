@extends('admin.layouts.master')

@section('content')

                <section class="section">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">

                                        <!-- Table with outer spacing -->
                                        <div class="table-responsive">
                                            <table class="table table-lg">
                                                <thead>
                                                    <tr>
                                                        <th>NAME</th>
                                                        <th>RATE</th>
                                                        <th>SKILL</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-bold-500">Michael Right</td>
                                                        <td>$15/hr</td>
                                                        <td class="text-bold-500">UI/UX</td>

                                                    </tr>
                                                    <tr>
                                                        <td class="text-bold-500">Morgan Vanblum</td>
                                                        <td>$13/hr</td>
                                                        <td class="text-bold-500">Graphic concepts</td>

                                                    </tr>
                                                    <tr>
                                                        <td class="text-bold-500">Tiffani Blogz</td>
                                                        <td>$15/hr</td>
                                                        <td class="text-bold-500">Animation</td>

                                                    </tr>
                                                    <tr>
                                                        <td class="text-bold-500">Ashley Boul</td>
                                                        <td>$15/hr</td>
                                                        <td class="text-bold-500">Animation</td>

                                                    </tr>
                                                    <tr>
                                                        <td class="text-bold-500">Mikkey Mice</td>
                                                        <td>$15/hr</td>
                                                        <td class="text-bold-500">Animation</td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Manage Commission</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label">Give Commission When Someone Deposit</label>
                                        <div class="selectgroup w-100">
                                            <input type="radio" class="btn-check" name="options-outlined" id="success-outlined"
                                            autocomplete="off" checked>
                                        <label class="btn btn-outline-success" for="success-outlined">Yes</label>

                                        <input type="radio" class="btn-check" name="options-outlined" id="danger-outlined"
                                            autocomplete="off">
                                        <label class="btn btn-outline-danger" for="danger-outlined"> No</label>
                                        </div>
                                    </div>

                                    <p>Give Commission When Someone Invest.</p>
                                    <input type="radio" class="btn-check" name="invest" id="success-invest"
                                        autocomplete="off" >
                                    <label class="btn btn-outline-success" for="success-invest">Yes</label>

                                    <input type="radio" class="btn-check" name="invest" id="danger-invest"
                                        autocomplete="off" checked>
                                    <label class="btn btn-outline-danger" for="danger-invest"> No</label>
                                </div>
                                <a href="#" class="btn btn-primary">Submit</a>
                            </div>


                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Create Your Levels For Invest</h4>
                                </div>
                                <div class="card-body">
                                        <div class="col-md-12 mb-1">
                                            <div class="input-group mb-3">
                                                <input type="number" id="levelCount" min="1" class="form-control"
                                                     aria-describedby="button-addon2">
                                                <button class="btn btn-outline-secondary" type="button"
                                                    id="generateLevels">Create Now</button>
                                            </div>
                                        </div>
                                </div>
                                <a href="#" class="btn btn-primary">Submit</a>
                            </div>

                        </div>

                    </div>
                </section>
            </div>
@endsection

