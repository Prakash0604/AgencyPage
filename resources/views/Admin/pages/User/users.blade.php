@extends('Admin.index')
@section('content')
    <div class="container-fluid">
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
      @include('Admin.pages.User.usermodal')
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
