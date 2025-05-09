@extends('backend.layouts.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">




            <div class="col-lg-12">
                <div class="card">
                    <header class="p-3">
                        <h2>
                            {{ __('Website Settings Section') }}
                        </h2>

                        <p>
                            {{ __('Update your Website information.') }}
                        </p>
                    </header>
                    <hr>
                    <div class="p-3">
                        <form method="POST" action="{{ route('website_settings_data.update') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $website_setting->id }}">
                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Website Name</label>
                                <div class="col-sm-10">
                                    <input name="website_name" class="form-control" type="text"
                                        value="{{ $website_setting->website_name ?? 'Null' }}">
                                </div>
                            </div>


                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Phone Number 1</label>
                                <div class="col-sm-10">
                                    <input id="phone_one" name="phone_one" class="form-control" type="text"
                                        value="{{ $website_setting->phone_one ?? 'Null' }}">
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Phone Number 2</label>
                                <div class="col-sm-10">
                                    <input id="phone_two" name="phone_two" class="form-control" type="text"
                                        value="{{ $website_setting->phone_two ?? 'Null' }}">
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Main E-mail</label>
                                <div class="col-sm-10">
                                    <input id="main_email" name="main_email" class="form-control" type="text"
                                        value="{{ $website_setting->main_email ?? 'Null' }}">
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Support E-mail</label>
                                <div class="col-sm-10">
                                    <input id="support_email" name="support_email" class="form-control" type="text"
                                        value="{{ $website_setting->support_email ?? 'Null' }}">
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input id="address" name="address" class="form-control" type="text"
                                        value="{{ $website_setting->address ?? 'Null' }}">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" name="description" class="form-control" rows="5">{!! $website_setting->description ?? 'Null' !!}</textarea>

                                </div>
                            </div>

                            <!-- About Image -->
                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">About Image</label>
                                <div class="col-sm-10">
                                    <input id="favicon" name="favicon" class="form-control" type="file">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg"
                                        src="{{ !empty($website_setting->favicon) ? url($website_setting->favicon) : url('image/No_Image_Available.jpg') }}"
                                        alt="Card image cap">
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Job Title</label>
                                <div class="col-sm-10">
                                    <input name="job_title" class="form-control" type="text" required>
                                </div>
                            </div>

                            <!-- Profile Image -->
                            <div class="mb-4 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
                                <div class="col-sm-10">
                                    <input id="profileImage" name="profile_image" class="form-control" type="file"
                                        required>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                <div class="col-sm-10">
                                    <img id="showProfileImage" class="rounded avatar-lg"
                                        src="{{ !empty($website_setting->profile_image) ? url($website_setting->profile_image) : url('image/No_Image_Available.jpg') }}"
                                        alt="Profile image">
                                </div>
                            </div>


                            <div class="form-group row mt-3 pt-1">
                                <div class="col-12">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Update Website
                                        Settings</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#favicon').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });

            $('#profileImage').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showProfileImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
