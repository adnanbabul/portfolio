@extends('backend.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">View All Education</h4>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#EducationModal" style="float: right">+ Add New Education</button>
                            <table class="table table-striped table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Institute Name</th>
                                        <th>Degree Name</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Current</th>
                                        <th>Location</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_education as $key => $education)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $education->institute_name }}</td>
                                            <td>{{ $education->degree_name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($education->start_date)->format('Y M') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($education->end_date)->format('Y M') }}</td>
                                            <td>{{ $education->current ? 'Yes' : 'No' }}</td>
                                            <td>{{ $education->location }}</td>
                                            <td>
                                                <a href="javascript:void(0);" class="btn btn-info sm editEducationBtn"
                                                    data-id="{{ $education->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#editEducationModal">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('education.destroy', $education->id) }}" id="delete"
                                                    class="btn btn-danger sm" title="Delete Data">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
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


    <!-- Add Education Modal -->
    <div class="modal fade" id="EducationModal" tabindex="-1" aria-labelledby="EducationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EducationModalLabel">Add New Education</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('education.store') }}">
                        @csrf
                        <!-- Institute Name -->
                        <div class="mb-3">
                            <label for="institute_name" class="form-label">Institute Name</label>
                            <input type="text" class="form-control" id="institute_name" name="institute_name" required>
                        </div>
                        <!-- Degree Name -->
                        <div class="mb-3">
                            <label for="degree_name" class="form-label">Degree Name</label>
                            <input type="text" class="form-control" id="degree_name" name="degree_name" required>
                        </div>
                        <!-- Start Date -->
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="month" class="form-control" id="start_date" name="start_date" required>
                        </div>
                        <!-- End Date -->
                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="month" class="form-control" id="end_date" name="end_date">
                        </div>
                        <!-- Current -->
                        <div class="mb-3">
                            <label for="current" class="form-label">Current</label>
                            <input type="checkbox" id="current" name="current" value="1">
                        </div>
                        <!-- Location -->
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" name="location">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Edit Education Modal -->
    <div class="modal fade" id="editEducationModal" tabindex="-1" role="dialog" aria-labelledby="editEducationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editEducationModalLabel">Edit Education</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editEducationForm" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Institute Name -->
                        <div class="form-group">
                            <label for="edit_institute_name">Institute Name</label>
                            <input type="text" class="form-control" id="edit_institute_name" name="institute_name">
                        </div>

                        <!-- Degree Name -->
                        <div class="form-group">
                            <label for="edit_degree_name">Degree Name</label>
                            <input type="text" class="form-control" id="edit_degree_name" name="degree_name">
                        </div>

                        <!-- Start Date -->
                        <div class="form-group">
                            <label for="edit_start_date">Start Date</label>
                            <input type="month" class="form-control" id="edit_start_date" name="start_date">
                        </div>

                        <!-- End Date -->
                        <div class="form-group">
                            <label for="edit_end_date">End Date</label>
                            <input type="month" class="form-control" id="edit_end_date" name="end_date">
                        </div>

                        <!-- Current -->
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="edit_current" name="current">
                            <label class="form-check-label" for="edit_current">Current</label>
                        </div>

                        <!-- Location -->
                        <div class="form-group">
                            <label for="edit_location">Location</label>
                            <input type="text" class="form-control" id="edit_location" name="location">
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Update Education</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Open Edit Modal
            $('.editEducationBtn').click(function() {
                var educationId = $(this).data('id');
                var route_education = '{{ route('education.edit', ':id') }}'.replace(':id',
                    educationId);

                $.get(route_education, function(response) {
                    var education = response.education;
                    // Clear previous data and errors
                    $('#editEducationForm').trigger('reset').find('.is-invalid').removeClass(
                        'is-invalid');
                    $('.error-message').remove();
                    // Populate the modal with the retrieved data
                    $('#edit_institute_name').val(education.institute_name);
                    $('#edit_degree_name').val(education.degree_name);
                    $('#edit_start_date').val(education.start_date);
                    $('#edit_end_date').val(education.end_date);
                    $('#edit_current').prop('checked', education.current);
                    $('#edit_grade').val(education.grade);
                    $('#edit_location').val(education.location);
                    // Set the form action
                    $('#editEducationForm').attr('action',
                        '{{ route('education.update', ':id') }}'.replace(':id', educationId));
                    // Show the modal
                    $('#editEducationModal').modal('show');
                }).fail(function(xhr) {
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        $.each(xhr.responseJSON.errors, function(field, messages) {
                            var inputField = $('#editEducationForm [name="' + field +
                                '"]');
                            inputField.addClass('is-invalid').after(
                                '<span class="error-message text-danger">' + messages
                                .join(', ') + '</span>');
                        });
                    }
                });
            });

            // Handle form submission with AJAX
            $('#editEducationForm').submit(function(e) {
                e.preventDefault();
                var form = $(this);
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        $('#editEducationModal').modal('hide');
                        location.reload();
                    },
                    error: function(xhr) {
                        // Handle validation errors
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            $('.error-message').remove();
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(field, messages) {
                                var inputField = $('#editEducationForm [name="' +
                                    field + '"]');
                                inputField.addClass('is-invalid');
                                inputField.after(
                                    '<span class="error-message text-danger">' +
                                    messages.join(', ') + '</span>');
                            });
                        }
                    }
                });
            });
        });
    </script>
@endpush
