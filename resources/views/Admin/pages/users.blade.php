@extends('Admin.index')
@section('content')
    <div class="container">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-3 addUserButton" data-action="add">
            Add User
        </button>

        {{-- Table --}}
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="show-user-data">
                            <thead>
                                <tr>
                                    <th> S.N </th>
                                    <th> Image </th>
                                    <th> Full Name </th>
                                    <th> Email </th>
                                    <th> Position </th>
                                    <th> Phone Number </th>
                                    <th> Role </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- Table --}}

        <!-- Modal -->
        <div class="modal fade" id="formModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form id="formId" class="form">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="">Add User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p id="validationErrors" class="alert alert-danger d-none"></p>
                            <div class="row">
                                <div class="col-md-6">
                                    @csrf
                                    <label for="" class="form-label">Full Name</label>
                                    <input type="text" name="full_name" id="full_name" class="form-control"
                                        placeholder="" aria-describedby="helpId" />
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label">Position</label>
                                    <input type="text" name="position" id="position" class="form-control" placeholder=""
                                        aria-describedby="helpId" />
                                </div>

                                <div class="col-md-6 mt-2 mb-2">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder=""
                                        aria-describedby="helpId" />
                                </div>
                                <div class="col-md-6 mt-2 mb-2 labelPassword">
                                    <label for="" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="" aria-describedby="helpId" />
                                    Show Password <input type="checkbox" name="" id="checkbox">
                                </div>
                                <div class="col-md-6 mt-2 mb-2">
                                    <label for="" class="form-label">Phone Number</label>
                                    <input type="number" name="phonenumber" id="phonenumber" class="form-control"
                                        placeholder="" aria-describedby="helpId" />
                                </div>
                                <div class="col-md-6 mt-2 mb-2">
                                    <label for="" class="form-label">Email Link (optional)</label>
                                    <input type="url" name="email_link" id="email_link" class="form-control"
                                        placeholder="" aria-describedby="helpId" />
                                </div>
                                <div class="col-md-6 mt-2 mb-2">
                                    <label for="" class="form-label">Facebook Link (optional)</label>
                                    <input type="url" name="facebook_link" id="facebook_link" class="form-control"
                                        placeholder="" aria-describedby="helpId" />
                                </div>
                                <div class="col-md-6 mt-2 mb-2">
                                    <label for="" class="form-label">Instagram Link (optional)</label>
                                    <input type="url" name="instagram_link" id="instagram_link" class="form-control"
                                        placeholder="" aria-describedby="helpId" />
                                </div>
                                <div class="col-md-6 mt-2 mb-2">
                                    <label for="" class="form-label">Twitter Link (optional)</label>
                                    <input type="url" name="twitter_link" id="twitter_link" class="form-control"
                                        placeholder="" aria-describedby="helpId" />
                                </div>
                                <div class="col-md-6 mt-2 mb-2">
                                    <label for="" class="form-label">Image (optional)</label>
                                    <input type="file" name="image" id="image" class="form-control"
                                        placeholder="" aria-describedby="helpId" />
                                    <div id="userImage"> </div>
                                </div>

                                <div class="col-md-12 mt-4 mb-2">
                                    <label for="" class="form-label">Notes (optinal)</label>
                                    <textarea class="form-control summernote" id="notes_user" name="notes" rows="4"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success submitBtn" data-action="">Submit</button>
                            <button type="submit" class="btn btn-success updateBtn" data-action="edit">Update
                                User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>

    <script>
        $(document).ready(function() {
            // Summer note
            $('.summernote').summernote();

            // Data Table
            var table = $("#show-user-data").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.user') }}",
                columns: [{
                        data: "DT_RowIndex",
                        name: "DT_RowIndex"
                    },
                    {
                        data: "image",
                        name: "image"
                    }, {
                        data: "full_name",
                        name: "full_name"
                    },
                    {
                        data: "email",
                        name: "email"
                    }, {
                        data: "position",
                        name: "position"
                    }, {
                        data: "phonenumber",
                        name: "phonenumber"
                    }, {
                        data: "role",
                        name: "role"
                    },
                    {
                        data: "action",
                        name: "action",
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            $("#checkbox").on("change", function() {
                if ($("#password").prop("type") == 'password') {
                    $("#password").prop("type", "text");
                } else {
                    $("#password").prop("type", "password");
                }
            })



            // New User Add and Edit
            $(document).on("click", ".addUserButton", function() {
                // let action=$(this).data("action");
                $(".submitBtn").show();
                $(".updateBtn").hide();
                $('.form').attr('id', 'storeForm');
                $('#storeForm')[0].reset();
                $("#formModal").modal("show");
                // $('#password').attr('required', true);
            });

            $(document).off('submit').on("submit", "#storeForm", function(event) {
                event.preventDefault();
                $(".submitBtn").prop("disabled", true);
                $('#validationErrors').addClass('d-none').html('');
                let formdata = new FormData(this);
                $.ajax({
                    type: "post",
                    url: "{{ route('admin.store') }}",
                    data: formdata,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.success == true) {
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "User Added Successfully",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            table.draw();

                            $("#formModal").modal("hide");
                            $('#storeForm')[0].reset();
                            // $("#storeUserData").trigger("reset");

                        }
                    },
                    error: function(response) {
                        if (response.status === 422) {
                            let errors = response.responseJSON.errors;
                            let errorMessages = '<ul>';
                            $.each(errors, function(key, value) {
                                errorMessages += '<li>' + value[0] +
                                    '</li>'; // Display the first error for each field
                            });
                            errorMessages += '</ul>';
                            $('#validationErrors').removeClass('d-none').html(
                                errorMessages);
                        }
                    },
                    complete: function() {
                        $(".submitBtn").prop("disabled", false);
                    }
                })
            });


            $(document).on("click", ".editUserButton", function() {
                $(".submitBtn").hide();
                $(".labelPassword").hide();
                // $("#password").hide();
                $(".updateBtn").show();
                $('.form').attr('id', 'updateForm');
                $('#updateForm')[0].reset();
                $("#formModal").modal("show");
                let id = $(this).data("id");

                // $('#password').attr('required', false);
                // Fetch User Data

                $.ajax({
                    type: "get",
                    url: "/admin/user/detail/" + id,
                    success: function(response) {
                        $("#full_name").val(response.message.full_name);
                        $("#email").val(response.message.email);
                        $("#position").val(response.message.position);
                        $("#phonenumber").val(response.message.phonenumber);
                        $("#email_link").val(response.message.email_link);
                        $("#facebook_link").val(response.message.facebook_link);
                        $("#twitter_link").val(response.message.twitter_link);
                        $("#instagram_link").val(response.message.instagram_link);
                        $("#notes_user").summernote('code', response.message.notes);

                        $("#userImage").html(
                            `<img src="/storage/${response.message.image}" alt="User Image" width="100" height="100">`
                        );
                    }
                });

                // Submit Form
                $("#updateForm").submit(function(event) {
                    event.preventDefault();
                    $("#password").prop("disabled", true);

                    let formdata = new FormData(this);
                    $(".updateBtn").prop("disabled", true);
                    // console.log(formdata);
                    $.ajax({
                        type: "post",
                        url: "/admin/user/update/" + id,
                        data: formdata,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            Swal.fire({
                                icon: "success",
                                title: "Updated",
                                text: "User Updated Successfully",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $("#formModal").modal("hide");
                            table.draw();
                        },
                        error: function(response) {
                            if (response.status === 422) {
                                let errors = response.responseJSON.errors;
                                let errorMessages = '<ul>';
                                $.each(errors, function(key, value) {
                                    errorMessages += '<li>' + value[0] +
                                        '</li>'; // Display the first error for each field
                                });
                                errorMessages += '</ul>';
                                $('#validationErrors').removeClass('d-none').html(
                                    errorMessages);
                            }
                        },
                        complete: function() {
                            $(".updateBtn").prop("disabled", false);
                        }

                    })
                })
            })



            // Delete User
            $(document).on('click', '.deleteData', function() {
                var itemId = $(this).attr('data-id');
                // console.log(itemId);
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/admin/user/delete/' + itemId,
                            type: 'get',
                            success: function(response) {
                                if (response.success == true) {

                                    Swal.fire(
                                        'Deleted!',
                                        'User has been deleted!',
                                        'success'
                                    );
                                    table.draw();
                                } else {
                                        Swal.fire({
                                            icon: "warning",
                                            title: "Warning",
                                            text: "User Already Tagged in anothe menu",
                                            showConfirmButton: false,
                                            timer: 1500
                                        });
                                }
                            },
                            error: function() {
                                Swal.fire(
                                    'Error!',
                                    'An error occurred while deleting the item.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });

        });
    </script>
@endsection
