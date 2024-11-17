@extends('Admin.index')
@section('content')
    <div class="container-fluid">
        <button class="btn btn-primary addHomeSlideBtn mb-2">Add HomeSlide</button>
        @include('Admin.pages.HomeSlide.homeSlideModal')

        <div class="table-responsive">
            <table class="table table-striped" id="show-homeSlide-data">
                <thead>
                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">status</th>
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

            // Data Tables
            var table = $("#show-homeSlide-data").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.homeslide') }}",
                columns: [{
                        data: "DT_RowIndex",
                        name: "DT_RowIndex",
                    }, {
                        data: "image",
                        name: "image",
                    }, {
                        data: "title",
                        name: "title",
                    }, {
                        data: "shortdesc",
                        name: "shortdesc"
                    },
                    {
                        data: "status",
                        name: "status",
                        render: function($data) {
                            if ($data == 'Active') {
                                return `<span class="badge badge-success">Active</span>`;
                            } else {
                                return `<span class="badge badge-danger">Inactive</span>`;

                            }
                        }
                    },

                    {
                        data: "action",
                        name: "action"
                    }
                ]
            })

            function clearModal() {
                $("#homeSliderDescription").summernote("code", "");
                $("#homeSlideImage").html("");
                $("#validationErrors").addClass("d-none").html('');
            }

            $(document).on("click", ".addHomeSlideBtn", function() {
                clearModal();
                $("#formModal").modal("show");
                $(".updateBtn").hide();
                $(".submitBtn").show();
                $(".form").attr("id", "addForm");
                $(".statusdiv").hide();
                $('#addForm')[0].reset();
            });

            $(document).off("submit", "#addForm").on("submit", "#addForm", function(event) {
                event.preventDefault();
                $(".submitBtn").prop("disabled", true);
                let formdata = new FormData(this);
                $.ajax({
                    type: "post",
                    url: "{{ route('admin.homeslide.store') }}",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // console.log(response);
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                            text: "HomeSlide Added Successfully",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        table.draw();
                        $("#addForm")[0].reset();
                        $("#formModal").modal("hide");

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
            })


            // Edit
            $(document).on("click", ".editUserButton", function() {
                clearModal();
                let id = $(this).attr("data-id");
                $("#formModal").modal("show");
                $(".updateBtn").show();
                $(".submitBtn").hide();
                $(".form").attr("id", "updateForm");
                $("#updateForm")[0].reset();
                $(".statusdiv").show();
                $("#homeSlideTitle").text("Edit Home Slide ");

                $.ajax({
                    type: "get",
                    url: "/admin/home-slide/detail/" + id,
                    success: function(response) {
                        console.log(response);
                        $("#title_home").val(response.message.title);
                        if (response.message.image != null) {
                            $("#homeSlideImage").html(`
                        <img src="/storage/${response.message.image}" width="100" height="100">
                        `);
                        }
                        $("#status").val(response.message.status);
                        $("#homeSliderDescription").summernote('code', response.message
                            .shortdesc);

                    }
                });

                // Update
                $(document).off("submit", "#updateForm").on("submit", "#updateForm", function(event) {
                    event.preventDefault();
                    // clearModal();
                    let formdata = new FormData(this);
                    $(".updateBtn").prop("disabled", true);
                    $.ajax({
                        type: "post",
                        url: "/admin/home-slide/update/" + id,
                        data: formdata,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Home Slide Updated Successfully",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            table.draw();
                            $("#formModal").modal('hide');
                        },
                        error: function(xhr) {
                            Swal.fire({
                                icon: "warning",
                                title: "Something went wrong",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $(".updateBtn").prop("disabled", false);
                        },
                        complete: function() {
                            $(".updateBtn").prop("disabled", false);
                        }
                    });
                });
            })



            // Delete Record

            $(document).on("click", ".deleteData", function() {
                let id = $(this).attr("data-id");
                Swal.fire({
                    icon: "warning",
                    title: "Are you sure ?",
                    text: "You won't be able to revert this!",
                    showCancelButton: true,
                    confirmButtonText: "Yes,Delete it!",
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "get",
                            url: "/admin/home-slide/delete/" + id,
                            success: function(response) {
                                Swal.fire({
                                    icon: "success",
                                    title: "Home Slide Deleted Successfully",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                table.draw();
                            },
                            error: function(response) {
                                Swal.fire({
                                    icon: "warning",
                                    title: "Something went wrong!",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            }
                        });
                    }
                })
            })







        })
    </script>
@endsection
