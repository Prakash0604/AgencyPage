$(document).ready(function() {
    $(".summernote").summernote({
        height: 300
    });

    // Data Tables
    var table = $("#show-homeSlide-data").DataTable({
        processing: true,
        serverSide: true,
        ajax: "/admin/home-slide",
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

    // Status Update Toggle Button
    $(document).on("change", ".statusIdData", function() {
        let id = $(this).data("id");
        console.log(id);
        $.ajax({
            type: "get",
            url: "/admin/home-slide/status/" + id,
            success: function(response) {
                // console.log(response);
                table.draw();
            },
            error: function(xhr) {
                console.log(xhr.responseJSON.message);
            }
        })

    })
})
