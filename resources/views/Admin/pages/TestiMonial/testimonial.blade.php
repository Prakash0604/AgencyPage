@extends('Admin.index')
@section('content')
    <div class="container">
        <button class="btn btn-primary addTestimonialBtn mb-4 mt-4">Add Testimonial</button>
        @include('Admin.pages.TestiMonial.testimonialModal')

        <div class="table-responsive">
            <table class="table table-bordered" id="show-testimonial-data">
                <thead>
                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Description</th>
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
            var table = $("#show-testimonial-data").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.testimonial') }}",
                columns: [{
                    data: "DT_RowIndex",
                    name: "DT_RowIndex",
                }, {
                    data: "image",
                    name: "image"
                }, {
                    data: "name",
                    name: "name"
                }, {
                    data: "address",
                    name: "address"
                }, {
                    data: "designation",
                    name: "designation",
                }, {
                    data: "description",
                    name: "description"
                }, {
                    data: "action",
                    name: "action"
                }]
            })
            $(document).on("click", ".addTestimonialBtn", function() {
                $("#formModal").modal("show");
                $(".submitBtn").show();
                $(".updateBtn").hide();
                $(".form").attr("id", "addForm");
                $(".activeStatus").hide();
                $("#addForm")[0].reset();
            });

            $(document).on("submit", "#addForm", function(event) {
                event.preventDefault();
                $(".submitBtn").prop("disabled", true);
                let formdata = new FormData(this);
                $.ajax({
                    type: "post",
                    url: "{{ route('admin.testimonial.store') }}",
                    data: formdata,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                            text: "Testimonial Created Successfully",
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

            $(document).on("click", ".deleteData", function() {
                let id = $(this).attr("data-id");
                Swal.fire({
                    icon: "warning",
                    title: "Are you Sure ?",
                    text: "You won't be able to revert this!",
                    showCancelButton: true,
                    confirmButtonText: "Yes, Delete it !",
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "get",
                            url: "/admin/testimonial/delete/" + id,
                            success: function(response) {
                                Swal.fire({
                                    icon: "success",
                                    title: "Testimonial Deleted Successfully",
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                table.draw();
                            },
                            error: function(response) {
                                Swal.fire({
                                    icon:"warning",
                                    title:"Something went wrong !",
                                    showConfirmButton:false,
                                    timer:1500
                                });
                            },
                        })
                    }
                })
            })
        });
    </script>
@endsection
