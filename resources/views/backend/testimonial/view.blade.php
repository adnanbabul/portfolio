@extends('backend.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">View All Testimonials</h4>
                            <a href="{{ route('testimonial.create') }}" class="btn btn-info btn-sm" style="float: right">+ Add
                                New Testimonial</a>
                            <table class="table table-striped table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Company Name</th>
                                        <th>Description</th>
                                        <th>Project URL</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($testimonials as $key => $testimonial)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $testimonial->name }}</td>
                                            <td>{{ $testimonial->designation }}</td>
                                            <td>{{ $testimonial->company_name }}</td>
                                            <td>{{ $testimonial->description }}</td>
                                            <td>
                                                @if ($testimonial->project_url)
                                                    <a href="{{ $testimonial->project_url }}" target="_blank">View
                                                        Project</a>
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>
                                                @if ($testimonial->image_path)
                                                    <img src="{{ asset($testimonial->image_path) }}" alt="Image"
                                                        style="width: 100px; height: auto;">
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>
                                                @if ($testimonial->status == 1)
                                                    <a href="">
                                                        <p class="text-success">Yes</p>
                                                    </a>
                                                @else
                                                    <a href="">
                                                        <p class="text-info">No</p>
                                                    </a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="javascript:void(0);" class="btn btn-info btn-sm editTestimonialBtn"
                                                    data-id="{{ $testimonial->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#editTestimonialModal">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('testimonial.destroy', $testimonial->id) }}"
                                                    id="delete" class="btn btn-danger btn-sm" title="Delete Data"><i
                                                        class="fas fa-trash-alt"></i></a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
    </div>

    <!-- Edit Testimonial Modal -->
    <div class="modal fade" id="editTestimonialModal" tabindex="-1" aria-labelledby="editTestimonialModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTestimonialModalLabel">Edit Testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Modal form will be dynamically loaded here -->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('.editTestimonialBtn').on('click', function() {
                var testimonialId = $(this).data('id');
                $.ajax({
                    url: '{{ route('testimonial.edit', '') }}/' + testimonialId,
                    method: 'GET',
                    success: function(response) {
                        $('#editTestimonialModal .modal-body').html(response);
                    }
                });
            });
        });
    </script>
@endpush
