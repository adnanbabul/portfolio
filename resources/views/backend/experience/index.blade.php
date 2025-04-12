@extends('backend.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">View All Experience</h4>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#ExperienceModal" style="float: right">+ Add New Experience</button>
                            <table class="table table-striped table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Job Title</th>
                                        <th>Company</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Current</th>
                                        <th>Location</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_experience as $key => $experience)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $experience->job_title }}</td>
                                            <td>{{ $experience->company }}</td>
                                            <td>{{ \Carbon\Carbon::parse($experience->start_date)->format('Y M') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($experience->end_date)->format('Y M') }}</td>
                                            <td>{{ $experience->current ? 'Yes' : 'No' }}</td>
                                            <td>{{ $experience->location }}</td>
                                            <td>
                                                <a href="javascript:void(0);" class="btn btn-info sm editExperienceBtn"
                                                    data-id="{{ $experience->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#editExperienceModal">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('experience.destroy', $experience->id) }}" id="delete"
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


    <!-- Add Experience Modal -->
    <div class="modal fade" id="ExperienceModal" tabindex="-1" aria-labelledby="ExperienceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ExperienceModalLabel">Add New Experience</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('experience.store') }}">
                        @csrf
                        <!-- Job Title -->
                        <div class="mb-3">
                            <label for="job_title" class="form-label">Job Title</label>
                            <input type="text" class="form-control" id="job_title" name="job_title" required>
                        </div>
                        <!-- Company -->
                        <div class="mb-3">
                            <label for="company" class="form-label">Company</label>
                            <input type="text" class="form-control" id="company" name="company" required>
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
                        <!-- Responsibilities -->
                        <div class="mb-3">
                            <label for="responsibilities" class="form-label">Responsibilities</label>
                            <textarea class="form-control" id="responsibilities" name="responsibilities" rows="3" required></textarea>
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

    <!-- Edit Experience Modal -->
    <div class="modal fade" id="editExperienceModal" tabindex="-1" role="dialog"
        aria-labelledby="editExperienceModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editExperienceModalLabel">Edit Experience</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editExperienceForm" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Job Title Field -->
                        <div class="form-group">
                            <label for="edit_job_title">Job Title</label>
                            <input type="text" class="form-control" id="edit_job_title" name="job_title">
                        </div>

                        <!-- Company Field -->
                        <div class="form-group">
                            <label for="edit_company">Company</label>
                            <input type="text" class="form-control" id="edit_company" name="company">
                        </div>

                        <!-- Start Date Field -->
                        <div class="form-group">
                            <label for="edit_start_date">Start Date</label>
                            <input type="text" class="form-control" id="edit_start_date" name="start_date">
                        </div>

                        <!-- End Date Field -->
                        <div class="form-group">
                            <label for="edit_end_date">End Date</label>
                            <input type="text" class="form-control" id="edit_end_date" name="end_date">
                        </div>

                        <!-- Current Field -->
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="edit_current" name="current">
                            <label class="form-check-label" for="edit_current">Current</label>
                        </div>

                        <!-- Responsibilities Field -->
                        <div class="form-group">
                            <label for="edit_responsibilities">Responsibilities</label>
                            <textarea class="form-control" id="edit_responsibilities" name="responsibilities"></textarea>
                        </div>

                        <!-- Location Field -->
                        <div class="form-group">
                            <label for="edit_location">Location</label>
                            <input type="text" class="form-control" id="edit_location" name="location">
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Update Experience</button>
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
            $('.editExperienceBtn').click(function() {
                var experienceId = $(this).data('id');
                var route_experience = '{{ route('experience.edit', ':id') }}'.replace(':id',
                    experienceId);

                $.get(route_experience, function(response) {
                    var experience = response.experience;
                    // Clear previous data and errors
                    $('#editExperienceForm').trigger('reset').find('.is-invalid').removeClass(
                        'is-invalid');
                    $('.error-message').remove();
                    // Populate the modal with the retrieved data
                    $('#edit_job_title').val(experience.job_title);
                    $('#edit_company').val(experience.company);
                    $('#edit_start_date').val(experience.start_date);
                    $('#edit_end_date').val(experience.end_date);
                    $('#edit_current').prop('checked', experience.current);
                    $('#edit_responsibilities').val(experience.responsibilities);
                    $('#edit_location').val(experience.location);
                    // Set the form action
                    $('#editExperienceForm').attr('action',
                        '{{ route('experience.update', ':id') }}'.replace(':id', experienceId));
                    // Show the modal
                    $('#editExperienceModal').modal('show');
                }).fail(function(xhr) {
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        $.each(xhr.responseJSON.errors, function(field, messages) {
                            var inputField = $('#editExperienceForm [name="' + field +
                                '"]');
                            inputField.addClass('is-invalid').after(
                                '<span class="error-message text-danger">' + messages
                                .join(', ') + '</span>');
                        });
                    }
                });
            });

            // Handle form submission with AJAX
            $('#editExperienceForm').submit(function(e) {
                e.preventDefault();
                var form = $(this);
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        $('#editExperienceModal').modal('hide');
                        location.reload();
                    },
                    error: function(xhr) {
                        // Handle validation errors
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            $('.error-message').remove();
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(field, messages) {
                                var inputField = $('#editExperienceForm [name="' +
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
