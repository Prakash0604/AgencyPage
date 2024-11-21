$(document).ready(function() {
    // Data Table

    var table = $("#show-category-data").DataTable({
        processing: true,
        serverSide: true,
        ajax: "/admin/category",
        columns: [{
                data: "DT_RowIndex",
                name: "DT_RowIndex"
            }, {
                data: "title",
                name: "title"
            },
            {
                data: "status",
                name: "status",
            },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false
            }
        ]
    });


    // Add Category
    $(document).on("click", ".addCategoryBtn", function() {
        $("#formModal").modal("show");
        $(".updateBtn").hide();
        $(".submitBtn").show();
        $(".form").attr("id", 'addForm');
        $("#addForm")[0].reset();

        // unbinding using off submit
        $(document).off('submit').on("submit", "#addForm", function(event) {
            event.preventDefault();
            $(".submitBtn").prop("disabled", true);
            let formdata = new FormData(this);
            $.ajax({
                type: "post",
                url: "{{ route('admin.category.store') }}",
                data: formdata,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire({
                        icon: "success",
                        title: "Success",
                        text: "Category Added Successfully",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    table.draw();
                    $("#addForm")[0].reset();
                    $("#formModal").modal("hide");
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: "warning",
                        title: "Warning!",
                        text: xhr.responseJSON.message,
                        showConfirmButton: false,
                        timer: 1500
                    });

                },
                complete: function() {
                    $(".submitBtn").prop("disabled", false);
                }
            })
        });
    });

    // Edit Category
    $(document).on("click", ".editUserButton", function() {
        let id = $(this).attr("data-id");
        $("#formModal").modal("show");
        $(".updateBtn").show();
        $(".submitBtn").hide();
        $(".form").attr("id", "updateForm");
        $("#updateForm")[0].reset();
        $("#categoryTitle").text("Edit Category");

        $.ajax({
            type: "get",
            url: "/admin/category/detail/" + id,
            success: function(response) {
                $("#categorytitleData").val(response.message.title);
                $("#categoryStatus").val(response.message.status);
            },
            error: function(xhr) {
                console.log(xhr);
            }
        });

        $(document).off("submit").on("submit", "#updateForm", function(event) {
            event.preventDefault();
            $(".updateBtn").prop("disabled", true);
            let formdata = new FormData(this);
            $.ajax({
                type: "post",
                url: "/admin/category/update/" + id,
                data: formdata,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire({
                        icon: "success",
                        title: "Success",
                        text: "Category Updated Successfully",
                        showConfirmButton: false,
                        timer: 1500
                    })
                    table.draw();
                    $("#formModal").modal("hide");
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: "warning",
                        title: "Warning",
                        text: xhr.responseJSON.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
                complete: function() {
                    $(".updateBtn").prop("disabled", false);
                }
            })

        })
    });

    // Status Toggle
    $(document).on("change", ".statusIdData", function() {
        let id = $(this).data("id");
        // console.log(id);
        $.ajax({
            type: "get",
            url: "/admin/category/status/" + id,
            success: function(response) {
                // console.log(response);
                table.draw();
            },
            error: function(xhr) {
                console.log(xhr.responseJSON.message);
            }
        })

    })

    // Delete Category
    $(document).on("click", ".deleteData", function() {
        let id = $(this).attr("data-id");
        Swal.fire({
            icon: "warning",
            title: "Are you sure ?",
            text: "You won't be able to rever this !",
            showCancelButton: true,
            cancelButtonColor: "#d33",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Yes,Delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "get",
                    url: "/admin/category/delete/" + id,
                    success: function(response) {
                        if (response.message == true) {

                            Swal.fire({
                                icon: "success",
                                title: "Sucess",
                                text: "Category Deleted Successfully",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            table.draw();
                        } else {
                            Swal.fire({
                                icon: "warning",
                                title: "Unable to Delete",
                                text: "Already Tagged in another menu",
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: "warning",
                            title: "Warning",
                            text: "Something went wrong !",
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                })
            }
        })
    })
})
