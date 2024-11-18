@extends('Admin.index')
@section('content')
    <div class="container-fluid">
        <button class="btn btn-primary addPostBtn mb-4">Add Post</button>
        @include('Admin.pages.Post.postModal')
        <div class="table-responsive">
            <table class="table table-striped custom-table" id="data-post-show">
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
            $(".summernote").summernote({
                height: 300
            });


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
                ],
                pageLength: 10, // Set default limit
                lengthMenu: [5, 10, 25, 50],
            })

            function clearModal() {
                $("#validationErrors").addClass('d-none').html("");
                $("#post_description").summernote("code", "");
                $(".postImageData").html("");
            }

            // Show Multiple Image Modal
            $(document).on("click", ".imageListPopup", function() {
                $("#imageModal").modal("show");
                let id = $(this).data('id');
                // console.log(id);
                $.ajax({
                    tyoe: "get",
                    url: "/admin/post/detail/" + id,
                    // success: function(response) {
                    //     // console.log(response);

                    //     if (response.message === true) {
                    //         $(".fetch-post-image-data").html("");

                    //         if (response.images && response.images.length > 0) {
                    //             response.images.forEach((image, index) => {

                    //                 let imageUrl = '/storage/' + image.replace("//",
                    //                     '/');


                    //                 $(".fetch-post-image-data").append(`
                //                 <div class="carousel-item ${index === 0 ? 'active' : ''}">
                //                     <img src="${imageUrl}" class="d-block w-100" alt="...">
                //                 </div>
                //                 `);
                    //             });
                    //         } else {
                    //             $(".fetch-post-image-data").html(
                    //                 '<div class="carousel-item active"><p>No images available</p></div>'
                    //             );
                    //         }
                    //     } else {
                    //         console.log("Error :" + response.message);

                    //     }
                    // }


                    // test
                    success: function(response) {
                        if (response.success === true) {
                            $("#postImageTitle").text(response.message.title);
                            $(".fetch-post-image-data").html(
                                ""); // Clear existing carousel items

                            if (response.images && response.images.length > 0) {
                                response.images.forEach((image, index) => {
                                    // Normalize the image URL
                                    let imageUrl = '/storage/' + image.replace('//',
                                        '/');

                                    // Append carousel items
                                    $(".fetch-post-image-data").append(`
                                      <div class="carousel-item ${index === 0 ? 'active' : ''}">
                                          <img src="${imageUrl}" class="d-block w-100" alt="Image">
                                      </div>
                                        `);
                                });
                            } else {
                                // Handle case with no images
                                $(".fetch-post-image-data").html(
                                    '<div class="carousel-item active"><p>No images available</p></div>'
                                );
                            }
                        } else {
                            console.log("Error: " + response
                                .message); // Log error for unsuccessful response
                        }
                    }

                })

            })

            // Add Post
            $(document).on("click", ".addPostBtn", function() {
                clearModal();
                $("#formModal").modal("show");
                $(".submitBtn").show();
                $(".updateBtn").hide();
                $(".statusdiv").hide();
                $(".form").attr("id", 'addForm');
                $("#addForm")[0].reset();
            });

            $(document).off("submit", "#addForm").on("submit", "#addForm", function(event) {
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
                        $("#post_description").summernote("code", "");
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

            // Edit Post

            $(document).on("click", ".editUserButton", function() {
                clearModal();
                let id = $(this).attr("data-id");
                $("#formModal").modal("show");
                $("#postTitle").text("Edit Post");
                $(".submitBtn").hide();
                $(".updateBtn").show();
                $(".form").attr('id', 'updateForm');
                $("#updateForm")[0].reset();

                $.ajax({
                    url: "/admin/post/detail/" + id,
                    type: "get",
                    success: function(response) {
                        console.log(response);
                        $("#posttitleData").val(response.message.title);
                        $("#category_id").val(response.message.category_id);
                        $(".postImageData").html(
                            `<img src="/storage/${response.message.image}" height="100" width="100">`
                        );
                        $("#post_description").summernote('code', response.message
                            .description);
                        $("#post_status").val(response.message.status);
                    }
                });

                $(document).off("submit", "#updateForm").on("submit", "#updateForm", function(event) {
                    event.preventDefault();
                    // $("#post_image").prop("disabled", true);
                    $(".updateBtn").prop("disabled", true);
                    let formdata = new FormData(this);
                    $.ajax({
                        type: "post",
                        url: "/admin/post/edit/" + id,
                        data: formdata,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            Swal.fire({
                                icon: "success",
                                title: "Updated",
                                text: "Post Updated Successfully",
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
                                        '</li>';
                                });
                                errorMessages += '</ul>';
                                $('#validationErrors').removeClass('d-none').html(
                                    errorMessages);
                            }
                        },
                        complete: function() {
                            $("#post_image").prop("disabled", false);
                            $(".updateBtn").prop("disabled", false);
                        }
                    })
                })
            })

            // Delete Post

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
                                        text: response.message
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
