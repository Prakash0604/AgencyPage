@extends('Admin.index')
@section('content')
    <div class="container">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
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
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form id="storeUserData">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p id="validationErrors" class="alert alert-danger d-none"></p>
                            <div class="row">
                                <div class="col-md-6">
                                    @csrf
                                    <label for="" class="form-label">Full Name</label>
                                    <input type="text" name="full_name" id="" class="form-control"
                                        placeholder="" aria-describedby="helpId" />
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label">Position</label>
                                    <input type="text" name="position" id="" class="form-control" placeholder=""
                                        aria-describedby="helpId" />
                                </div>

                                <div class="col-md-6 mt-2 mb-2">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" name="email" id="" class="form-control" placeholder=""
                                        aria-describedby="helpId" />
                                </div>
                                <div class="col-md-6 mt-2 mb-2">
                                    <label for="" class="form-label">Password</label>
                                    <input type="password" name="password" id="" class="form-control"
                                        placeholder="" aria-describedby="helpId" />
                                </div>
                                <div class="col-md-6 mt-2 mb-2">
                                    <label for="" class="form-label">Phone Number</label>
                                    <input type="number" name="phonenumber" id="" class="form-control"
                                        placeholder="" aria-describedby="helpId" />
                                </div>
                                <div class="col-md-6 mt-2 mb-2">
                                    <label for="" class="form-label">Email Link (optional)</label>
                                    <input type="url" name="email_link" id="" class="form-control"
                                        placeholder="" aria-describedby="helpId" />
                                </div>
                                <div class="col-md-6 mt-2 mb-2">
                                    <label for="" class="form-label">Facebook Link (optional)</label>
                                    <input type="url" name="facebook_link" id="" class="form-control"
                                        placeholder="" aria-describedby="helpId" />
                                </div>
                                <div class="col-md-6 mt-2 mb-2">
                                    <label for="" class="form-label">Instagram Link (optional)</label>
                                    <input type="url" name="instagram_link" id="" class="form-control"
                                        placeholder="" aria-describedby="helpId" />
                                </div>
                                <div class="col-md-6 mt-2 mb-2">
                                    <label for="" class="form-label">Twitter Link (optional)</label>
                                    <input type="url" name="twitter_link" id="" class="form-control"
                                        placeholder="" aria-describedby="helpId" />
                                </div>
                                <div class="col-md-6 mt-2 mb-2">
                                    <label for="" class="form-label">Image (optional)</label>
                                    <input type="file" name="image" id="" class="form-control"
                                        placeholder="" aria-describedby="helpId" />
                                </div>

                                <div class="col-md-12 mt-4 mb-2">
                                    <label for="" class="form-label">Notes (optinal)</label>
                                    <textarea class="form-control summernote" name="notes" rows="4"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Add User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Edit Modal --}}
        <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form id="updateUserData">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
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
                                    <input type="text" name="position" id="position" class="form-control"
                                        placeholder="" aria-describedby="helpId" />
                                </div>

                                <div class="col-md-12 mt-2 mb-2">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="" aria-describedby="helpId" />
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
                                    <input type="file" name="image" id="user_image" class="form-control"
                                        placeholder="" aria-describedby="helpId" />
                                        <div id="userImage" class="mt-1"></div>
                                </div>

                                <div class="col-md-12 mt-4 mb-2">
                                    <label for="" class="form-label">Notes (optinal)</label>
                                    <textarea class="form-control summernote" name="notes" id="notes_user" rows="4"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Update User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Edit Modal --}}

        {{-- View Detail Modal --}}
        <div class="modal fade" id="detailModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">View Detail User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h1 class="text-center">User Detail</h1>
                        </div>
                </div>
            </div>
        </div>
        {{-- View Detail Modal --}}

        {{-- Delete Modal --}}
        <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-centered">
                <div class="modal-content">
                    <form id="deleteUserData">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           <h3 class="text-danger">Are you sure you want to delete ?</h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Confirm Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Delete Modal --}}
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

            // Store User Data
            $("#storeUserData").submit(function(event) {
                event.preventDefault();
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
                            $("#staticBackdrop").modal("hide");
                            $("#storeUserData").trigger("reset");

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
                            $('#validationErrors').removeClass('d-none').html(errorMessages);
                        }
                    }
                })
            })
            // Store User Data

            // Edit Users
            $(document).on("click",".editData",function(){
                let id=$(this).attr("data-id");
                $.ajax({
                    type:"get",
                    url:"/admin/user/detail/"+id,
                    success:function(response){
                        console.log(response);

                        $("#full_name").val(response.message.full_name);
                        $("#email").val(response.message.email);
                        $("#position").val(response.message.position);
                        $("#phonenumber").val(response.message.phonenumber);
                        $("#email_link").val(response.message.email_link);
                        $("#facebook_link").val(response.message.facebook_link);
                        $("#twitter_link").val(response.message.twitter_link);
                        $("#instagram_link").val(response.message.instagram_link);
                        $("#notes_user").val(response.message.notes);
                        $("#userImage").html(` <img src="/storage/${response.message.image}" alt="" width="100" height="100"> `);
                    }
                });

                $("#updateUserData").submit(function(event){
                    event.preventDefault();
                    let formdata=new FormData(this);
                    $.ajax({
                        type:"post",
                        url:"/admin/user/update/"+id,
                        data:formdata,
                        processData:false,
                        contentType:false,
                        success:function(response){
                            if(response.success == true){
                                Swal.fire({
                                    icon:"success",
                                    title:"Success",
                                    text:"User Updated Successfully",
                                    showConfirmButton:false,
                                    timer:1500
                                });
                            }
                        },
                        error:function(xhr){

                        }
                    })
                })
            })
            // Edit Users

        });
    </script>
@endsection
