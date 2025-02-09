@extends('app')

@section('title')
    E-complaint | Make-Complaint
@endsection
@section('custome-css')
@endsection

@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Make Complaint</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.addComplaint') }}" method="POST">

                                @csrf

                                <label class="form-label" for="title">Title</label>
                                <div class="input-group form-password-toggle mb-2">
                                    <input type="text" class="form-control" id="title" placeholder="Complaint title">

                                </div>

                                <label for="photoes" class="form-label">Photoes</label>
                                <input class="form-control" type="file" name="photoes" id="photoes" multiple="">

                                <label class="form-label mt-1" for="default-select">Department</label>
                                <div class="position-relative" data-select2-id="235">

                                    <select style="text-align: left"
                                        class="select2-icons form-select select2-hidden-accessible" id="default-select"
                                        name="dept_id">
                                        @foreach ($depts as $dept)
                                            <option value="{{ $dept->id }}" {{Auth::user()->dept_id == $dept->id ? 'selected' : ''}}>{{ $dept->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="input-group mt-2">
                                    <span class="input-group-text">Description</span>
                                    <textarea class="form-control" name="description" style="height: 142px;"></textarea>
                                </div>

                                <button type="submit"
                                    class="btn btn-primary me-1 waves-effect waves-float waves-light mt-1">Submit</button>
                            </form>
                        </div>


                </section>
                <!-- Dashboard Ecommerce ends -->

            @section('custome-script')
            @endsection

        </div>
    </div>
</div>
<!-- END: Content-->
@endsection
