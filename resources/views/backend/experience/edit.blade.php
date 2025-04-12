@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Experience</h2>
        <form method="POST" action="{{ route('experience.update', $experience->id) }}">
            @csrf
            @method('PUT')

            <!-- Job Title -->
            <div class="mb-3">
                <label for="job_title" class="form-label">Job Title</label>
                <input type="text" class="form-control" id="job_title" name="job_title"
                    value="{{ old('job_title', $experience->job_title) }}" required>
            </div>

            <!-- Company -->
            <div class="mb-3">
                <label for="company" class="form-label">Company</label>
                <input type="text" class="form-control" id="company" name="company"
                    value="{{ old('company', $experience->company) }}" required>
            </div>

            <!-- Location -->
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" id="location" name="location"
                    value="{{ old('location', $experience->location) }}" required>
            </div>

            <!-- Start Date -->
            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="month" class="form-control" id="start_date" name="start_date"
                    value="{{ old('start_date', $experience->start_date) }}" required>
            </div>

            <!-- End Date -->
            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="month" class="form-control" id="end_date" name="end_date"
                    value="{{ old('end_date', $experience->end_date) }}">
            </div>

            <!-- Current -->
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="current" name="current"
                    {{ old('current', $experience->current) ? 'checked' : '' }}>
                <label for="current" class="form-check-label">Current</label>
            </div>

            <!-- Responsibilities -->
            <div class="mb-3">
                <label for="responsibilities" class="form-label">Responsibilities</label>
                <textarea class="form-control" id="responsibilities" name="responsibilities" rows="3" required>{{ old('responsibilities', $experience->responsibilities) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('experience.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
