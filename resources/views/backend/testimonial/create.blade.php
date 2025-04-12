@extends('backend.layouts.app')
@section('content')
    <style type="text/css">
        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: #b70000;
            font-weight: 700;
        }

        .checkbox-wrapper-19 {
            box-sizing: border-box;
            --background-color: #fff;
            --checkbox-height: 25px;
        }

        @-moz-keyframes dothabottomcheck-19 {
            0% {
                height: 0;
            }

            100% {
                height: calc(var(--checkbox-height) / 2);
            }
        }

        @-webkit-keyframes dothabottomcheck-19 {
            0% {
                height: 0;
            }

            100% {
                height: calc(var(--checkbox-height) / 2);
            }
        }

        @keyframes dothabottomcheck-19 {
            0% {
                height: 0;
            }

            100% {
                height: calc(var(--checkbox-height) / 2);
            }
        }

        @keyframes dothatopcheck-19 {
            0% {
                height: 0;
            }

            50% {
                height: 0;
            }

            100% {
                height: calc(var(--checkbox-height) * 1.2);
            }
        }

        @-webkit-keyframes dothatopcheck-19 {
            0% {
                height: 0;
            }

            50% {
                height: 0;
            }

            100% {
                height: calc(var(--checkbox-height) * 1.2);
            }
        }

        @-moz-keyframes dothatopcheck-19 {
            0% {
                height: 0;
            }

            50% {
                height: 0;
            }

            100% {
                height: calc(var(--checkbox-height) * 1.2);
            }
        }

        .checkbox-wrapper-19 input[type=checkbox] {
            display: none;
        }

        .checkbox-wrapper-19 .check-box {
            height: var(--checkbox-height);
            width: var(--checkbox-height);
            background-color: transparent;
            border: calc(var(--checkbox-height) * .1) solid #000;
            border-radius: 5px;
            position: relative;
            display: inline-block;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            -moz-transition: border-color ease 0.2s;
            -o-transition: border-color ease 0.2s;
            -webkit-transition: border-color ease 0.2s;
            transition: border-color ease 0.2s;
            cursor: pointer;
        }

        .checkbox-wrapper-19 .check-box::before,
        .checkbox-wrapper-19 .check-box::after {
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            position: absolute;
            height: 0;
            width: calc(var(--checkbox-height) * .2);
            background-color: #34b93d;
            display: inline-block;
            -moz-transform-origin: left top;
            -ms-transform-origin: left top;
            -o-transform-origin: left top;
            -webkit-transform-origin: left top;
            transform-origin: left top;
            border-radius: 5px;
            content: " ";
            -webkit-transition: opacity ease 0.5;
            -moz-transition: opacity ease 0.5;
            transition: opacity ease 0.5;
        }

        .checkbox-wrapper-19 .check-box::before {
            top: calc(var(--checkbox-height) * .72);
            left: calc(var(--checkbox-height) * .41);
            box-shadow: 0 0 0 calc(var(--checkbox-height) * .05) var(--background-color);
            -moz-transform: rotate(-135deg);
            -ms-transform: rotate(-135deg);
            -o-transform: rotate(-135deg);
            -webkit-transform: rotate(-135deg);
            transform: rotate(-135deg);
        }

        .checkbox-wrapper-19 .check-box::after {
            top: calc(var(--checkbox-height) * .37);
            left: calc(var(--checkbox-height) * .05);
            -moz-transform: rotate(-45deg);
            -ms-transform: rotate(-45deg);
            -o-transform: rotate(-45deg);
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
        }

        .checkbox-wrapper-19 input[type=checkbox]:checked+.check-box,
        .checkbox-wrapper-19 .check-box.checked {
            border-color: #34b93d;
        }

        .checkbox-wrapper-19 input[type=checkbox]:checked+.check-box::after,
        .checkbox-wrapper-19 .check-box.checked::after {
            height: calc(var(--checkbox-height) / 2);
            -moz-animation: dothabottomcheck-19 0.2s ease 0s forwards;
            -o-animation: dothabottomcheck-19 0.2s ease 0s forwards;
            -webkit-animation: dothabottomcheck-19 0.2s ease 0s forwards;
            animation: dothabottomcheck-19 0.2s ease 0s forwards;
        }

        .checkbox-wrapper-19 input[type=checkbox]:checked+.check-box::before,
        .checkbox-wrapper-19 .check-box.checked::before {
            height: calc(var(--checkbox-height) * 1.2);
            -moz-animation: dothatopcheck-19 0.4s ease 0s forwards;
            -o-animation: dothatopcheck-19 0.4s ease 0s forwards;
            -webkit-animation: dothatopcheck-19 0.4s ease 0s forwards;
            animation: dothatopcheck-19 0.4s ease 0s forwards;
        }
    </style>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-muted font-size-18"><b>Create A New Testimonial</b></h4>

                        <div class="p-4">
                            <form method="POST" action="{{ route('testimonial.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-4 row">
                                    <label for="name" class="col-sm-2 col-form-label">Name <samp
                                            class="text-danger">*</samp></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Name" value="{{ old('name') }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="designation" class="col-sm-2 col-form-label">Designation <samp
                                            class="text-danger">*</samp></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="designation" id="designation" class="form-control"
                                            placeholder="Designation" value="{{ old('designation') }}">
                                        @error('designation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="company_name" class="col-sm-2 col-form-label">Company Name <samp
                                            class="text-danger">*</samp></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="company_name" id="company_name" class="form-control"
                                            placeholder="Company Name" value="{{ old('company_name') }}">
                                        @error('company_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="description" class="col-sm-2 col-form-label">Description Message <samp
                                            class="text-danger">*</samp></label>
                                    <div class="col-sm-10">
                                        <textarea name="description" id="description" class="form-control" placeholder="Description">{{ old('description') }}</textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="project_url" class="col-sm-2 col-form-label">Project URL</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="project_url" id="project_url" class="form-control"
                                            placeholder="Project URL" value="{{ old('project_url') }}">
                                        @error('project_url')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="image_path" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-6">
                                        <input id="image_path" name="image_path" class="form-control" type="file">
                                        @error('image_path')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-6">
                                        <img id="showImage" class="rounded avatar-lg"
                                            src="{{ url('image/No_Image_Available.jpg') }}" alt="Preview Image">
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="image_path" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <div class="checkbox-wrapper-19 mt-2">
                                            <input type="checkbox" id="cbtest-19" name="status" value="1" />
                                            <label for="cbtest-19" class="check-box"></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-info btn-sm waves-effect waves-light" type="submit">+ Add
                                            Testimonial</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#image_path').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>
@endpush
