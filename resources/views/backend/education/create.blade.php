@extends('backend.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add New Education</h4>
                            <form action="{{ route('education.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="institute_name" class="form-label">Institution Name</label>
                                    <input type="text" class="form-control" id="institute_name" name="institute_name">
                                </div>
                                <div class="mb-3">
                                    <label for="degree_name" class="form-label">Degree</label>
                                    <input type="text" class="form-control" id="degree_name" name="degree_name">
                                </div>
                                <div class="mb-3">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="form-control" id="location" name="location">
                                </div>
                                <div class="mb-3">
                                    <label for="start_date" class="form-label">Start Date</label>
                                    <input type="month" class="form-control" id="start_date" name="start_date">
                                </div>
                                <div class="mb-3">
                                    <label for="end_date" class="form-label">End Date</label>
                                    <input type="month" class="form-control" id="end_date" name="end_date">
                                </div>
                                <div class="mb-3">
                                    <label for="current" class="form-label">Current</label>
                                    <input type="checkbox" id="current" name="current" value="1">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
