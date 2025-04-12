@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Testimonial</h1>
        <form method="POST" action="{{ route('testimonials.update', $testimonial->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $testimonial->title }}"
                    required>
            </div>
            <div class="form-group">
                <label for="short_title">Short Title</label>
                <input type="text" name="short_title" id="short_title" class="form-control"
                    value="{{ $testimonial->short_title }}" required>
            </div>
            <div class="form-group">
                <label for="video_url">Video URL</label>
                <input type="text" name="video_url" id="video_url" class="form-control"
                    value="{{ $testimonial->video_url }}">
            </div>
            <div class="form-group">
                <label for="image_path">Image</label>
                <input type="file" name="image_path" id="image_path" class="form-control">
                @if ($testimonial->image_path)
                    <img src="{{ asset($testimonial->image_path) }}" width="100" />
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
