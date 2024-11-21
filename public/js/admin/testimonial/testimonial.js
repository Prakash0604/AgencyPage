$(document).ready(function() {
    $(".summernote").summernote({
        height: 300
    });
    // Data Table
    var table = $("#show-testimonial-data").DataTable({
        processing: true,
        serverSide: true,
        ajax: "/admin/testimonial",
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
            },
            {
                data: "status",
                name: "status",
            }, {
                data: "action",
                name: "action"
            }
        ]
    })

    function clearModal() {
        $("#testimonialImage").html("");
        $("#validationErrors").addClass("d-none").html("");
        $("#testimonialDescription").summernote("code", "");
    }
    $(document).on("click", ".addTestimonialBtn", function() {
        clearModal();
        $("#formModal").modal("show");
        $(".submitBtn").show();
        $(".updateBtn").hide();
        $(".form").attr("id", "addForm");
        $("#addForm")[0].reset();
    });

    $(document).off("submit", "#addForm").on("submit", "#addForm", function(event) {
        event.preventDefault();
        $(".submitBtn").prop("disabled", true);
        let formdata = new FormData(this);
        $.ajax({
            type: "post",
            url: "/admin/testimonial/store",
            data: formdata,
            contentType: false,
            processData: false,
            success: function(response) {
                Swal.fire({
                    icon: "success",
                    position: "top-end",
                    title: "Success",
                    text: "Testimonial Created Successfully",
                    showConfirmButton: false,
                    timer: 1000
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

    // Edit and Update
    $(document).on("click", ".editUserButton", function() {
        clearModal();
        $("#formModal").modal("show");
        $(".submitBtn").hide();
        $(".updateBtn").show();
        $(".form").attr("id", "updateForm");
        // $("#updateForm")[0].reset();

        var id = $(this).attr("data-id");
        $.ajax({
            type: "get",
            url: "/admin/testimonial/detail/" + id,
            success: function(response) {
                console.log(response);
                $("#name").val(response.message.name);
                $("#designation").val(response.message.designation);
                $("#address").val(response.message.address);
                $("#testimonialDescription").summernote('code', response.message
                    .description);
                if (response.message.image != null) {
                    $("#testimonialImage").html(
                        `<img src="/storage/${response.message.image}" alt="User Image" width="100" height="100"> `
                    );
                }

            }
        });

        $("#updateForm").off("submit").on("submit", function(event) {
            event.preventDefault();
            $(".updateBtn").prop("disabled", true);
            let formdata = new FormData(this);
            $.ajax({
                type: "post",
                url: "/admin/testimonial/update/" + id,
                data: formdata,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire({
                        icon: "success",
                        title: "Success",
                        text: "Testimonial Updated Successfully",
                        showConfirmButton: false,
                        timer: 1000
                    });
                    table.draw();
                    $("#formModal").modal("hide");
                },
                error: function(xhr) {
                    console.log(xhr);
                    Swal.fire({
                        icon: "warning",
                        title: "Something went wrong!",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $(".updateBtn").prop("disabled", false);
                },
                complete: function() {
                    $(".updateBtn").prop("disabled", false);
                }
            })
        })
    })

    // Status Update Toggle Button
    $(document).on("change", ".statusIdData", function() {
        let id = $(this).data("id");
        // console.log(id);
        $.ajax({
            type: "get",
            url: "/admin/testimonial/status/" + id,
            success: function() {
                // console.log(response);
                table.draw();
            },
            error: function(xhr) {
                console.log(xhr.responseJSON.message);
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
                        console.log(response);
                        Swal.fire({
                            icon: "warning",
                            title: "Something went wrong !",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    },
                })
            }
        })
    })
});
