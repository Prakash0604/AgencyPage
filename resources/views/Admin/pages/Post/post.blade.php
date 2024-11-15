@extends('Admin.index')
@section('content')
    <div class="container">
        <button class="btn btn-primary addPostBtn mb-4">Add Post</button>
        @include('Admin.pages.Post.postModal')
        <div class="table-responsive">
            <table class="table table-bordered" id="data-post-show">
                <thead>
                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Description</th>
                        <th scope="col">Created By</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            </table>
        </div>

    </div>
    <script>
        $(document).ready(function() {
            $(".summernote").summernote();

            // Data Table
            var table = $("#data-post-show").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.post') }}",
                columns: [{
                        data: "DT_RowIndex",
                        name: "DT_RowIndex"
                    },
                    {
                        data: "image",
                        name: "image"
                    },
                    {
                        data: "title",
                        name: "title"
                    },
                    {
                        data: "category",
                        name: "category"
                    },
                    {
                        data: "description",
                        name: "description"
                    },
                    {
                        data: "created_by",
                        name: "created_by"
                    },
                    {
                        data: "status",
                        name: "status",
                        fetch: function(status) {
                            if (status == 'Active') {
                                return `<span class="badge badge-success">Active</span>`;
                            } else {
                                return `<span class="badge badge-danger">Inactive</span>`;
                            }
                        }
                    }, {
                        data: "action",
                        name: "action",
                        orderable: false,
                        searchable: false
                    }
                ]
            })
            $(document).on("click", ".addPostBtn", function() {
                $("#formModal").modal("show");
                $(".submitBtn").show();
                $(".updateBtn").hide();
                $(".statusdiv").hide();
                $(".form").attr("id", 'addForm');
                $("#addForm")[0].reset();
            });

            $(document).on("submit", "#addForm", function(event) {
                event.preventDefault();
                $(".submitBtn").prop("disabled", true);
                let formdata = new FormData(this);
                $.ajax({
                    type: "post",
                    url: "{{ route('admin.post.store') }}",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                            text: "Post Added Successfully",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                        table.draw();
                        $("#formModal").modal("hide");
                        $("#addForm")[0].reset();
                        $("#post_description").summernote("code","");
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
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

            $(document).on("click", ".deleteData", function() {
                let id = $(this).attr("data-id");
                Swal.fire({
                    icon: "warning",
                    title: "Are you Sure !",
                    text: "You,Won't be able to revert this!",
                    showCancelButton: true,
                    cancelButtonColor: "#d33",
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "Yes,Delete it !"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "get",
                            url: "/admin/post/delete/" + id,
                            success: function(response) {
                                if (response.success == true) {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Success",
                                        text: "Post Deleted Successfully",
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                } else {
                                    Swal.fire({
                                        icon: "warning",
                                        title: "Unable to Delete",
                                        text: "Post Already been commented"
                                    });
                                }

                                table.draw();
                            },
                            error: function() {
                                Swal.fire({
                                    icon: "warning",
                                    title: "Unable to Delete",
                                    text: "Something went wrong!"
                                });
                            }
                        })
                    }
                })
            });
        })
    </script>
@endsection
