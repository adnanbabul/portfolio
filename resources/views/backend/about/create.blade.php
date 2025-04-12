@extends('backend.layouts.app')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-muted font-size-18"><b>About Page</b></h4>

                        <div class="p-4">
                            <form method="POST" action="{{ route('about.store') }}" enctype="multipart/form-data">
                                @csrf

                                <!-- Title -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Title<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input id="title" name="title" class="form-control" type="text"
                                            value="{{ old('title') }}">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Short Title -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Short Title <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input id="short_title" name="short_title" class="form-control" type="text"
                                            value="{{ old('short_title') }}">
                                        @error('short_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Short Description -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Short Description <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <textarea id="short_Description" name="short_Description" class="form-control" rows="5">{{ old('short_Description') }}</textarea>
                                        @error('short_Description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Long Description -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Long Description
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-10">
                                        <textarea id="elm1" name="logn_Description" class="form-control" rows="5">{{ old('logn_Description') }}</textarea>
                                        @error('logn_Description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- About Image -->
                                <div class="mb-4 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">About Image
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input id="about_image" name="about_image" class="form-control" type="file">
                                        @error('about_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Image Preview -->
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-6">
                                        <img id="showImage" class="rounded avatar-lg"
                                            src="{{ !empty($edit_about->about_image) ? url($edit_about->about_image) : url('image/No_Image_Available.jpg') }}"
                                            alt="Card image cap">
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="form-group row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-info btn-sm waves-effect waves-light" type="submit">
                                            Save About Page
                                        </button>
                                    </div>
                                </div>

                            </form>
                            <!-- end form -->
                        </div>
                    </div>
                    <!-- end cardbody -->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#about_image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>
@endpush
