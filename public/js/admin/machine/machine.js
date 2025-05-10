$(document).ready(function () {

    $(".description").summernote({
        height: 200
    });
    // Datatable
    function clear() {
        $(".description").summernote("code", "");
        $(".form-control").val("");
        $(".errorMessage").text("");
        $(".form-control").removeClass("is-invalid");
        $("#machineImage").html("");
    }

    var table = $("#fetch-notice-data").DataTable({
        processing: true,
        serverSide: true,
        ajax: "/admin/machine/",
        order: [[1, "asc"]],
        "lengthMenu":[[10,25,50,100,-1],[10,25,50,100,"All"]],
        columns: [
            {
                data: "DT_RowIndex", name: "DT_RowIndex", orderable: false, searchable: false
            }, {
                data: "title", name: "title"
            }, {
                data: "image", name: "image", orderable: false, searchable: false
            }, {
                data: "description", name: "description"
            }, {
                data: "status", name: "status", orderable: false, searchable: false
            }, {
                data: "action", name: "action", orderable: false, searchable: false
            }
        ]
    })



    $("#addMachineBtn").on("click", function () {
        clear();
        $("#formModal").modal("show");
        $(".submitMachineBtn").show();
        $(".updateMachineBtn").hide();
        $("#machineTitle").text("Add Machine");
        $(".formMachine").attr('id', "addMachine");
        $("#addMachine")[0].reset();
    });

    $(document).off("submit", "#addMachine").on("submit", "#addMachine", function (event) {
        event.preventDefault();
        let formdata = new FormData(this);
        $(".submitMachineBtn").prop("disabled", true);
        $.ajax({
            type: "post",
            url: "/admin/machine",
            data: formdata,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.status == 200) {
                    Swal.fire({
                        icon: "success",
                        title: "Created!",
                        text: "Machine Created Successfully!",
                        showConfirmButton: false,
                        timer: 1000
                    });
                    table.draw();
                    $("#formModal").modal("hide");
                    $("#addMachine")[0].reset();
                } else {
                    Swal.fire({
                        icon: "warning",
                        title: "Warning!",
                        text: "Something went wrong!",
                    });
                    $(".submitMachineBtn").prop("disabled", false);
                }
            },
            error: function (xhr) {
                console.log(xhr);
                if (xhr.status == 422) {
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function (data, message) {
                        $("#" + data).addClass("is-invalid");
                        $("#" + data + "-error").text(message[0]);
                    })
                } else {
                    Swal.fire({
                        icon: "warning",
                        title: "Warning!",
                        text: "Something went wrong!",
                    });
                    $(".submitMachineBtn").prop("disabled", false);
                }
            },
            complete: function () {
                $(".submitMachineBtn").prop("disabled", false);
            }
        })
    });

    $(document).on("click", ".editMachineBtn", function () {
        let id = $(this).attr("data-id");
        clear();
        $("#formModal").modal("show");
        $(".submitMachineBtn").hide();
        $(".updateMachineBtn").show();
        $("#machineTitle").text("Edit Machine");
        $(".formMachine").attr("id", "updateMachine");
        $("#updateMachine")[0].reset();
        $.ajax({
            type: "get",
            url: "/admin/machine/" + id,
            success: function (response) {
                if (response.status == 200) {
                    $("#title").val(response.message.title);
                    if (response.message.image != null) {
                        let image = response.message.image ?? '';
                        $("#machineImage").html(`
                             <img src="/storage/${image}" class="img-fluid" height="100" width="100" alt="" />
                            `);
                    }
                    $("#description").summernote("code", response.message.description);
                } else {
                    Swal.fire({
                        icon: "warning",
                        title: "Warning!",
                        text: "Something went wrong!"
                    });
                }
            },
            error: function (xhr) {
                Swal.fire({
                    icon: "warning",
                    title: "Warning!",
                    text: "Something went wrong!"
                });
            }
        });

        $(document).off("submit", "#updateMachine").on("submit", "#updateMachine", function (event) {
            event.preventDefault();
            let formdata = new FormData(this);
            formdata.append("_method", "put");
            $(".updateMachineBtn").prop("disabled", true);
            $.ajax({
                type: "post",
                url: "/admin/machine/" + id,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: formdata,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.status == 200) {
                        Swal.fire({
                            icon: "success",
                            title: "Updated!",
                            text: "Machine Updated Successfully!",
                            showConfirmButton: false,
                            timer: 1000
                        });
                        table.draw();
                        $("#formModal").modal("hide");
                    } else {
                        Swal.fire({
                            icon: "warning",
                            title: "Warning!",
                            text: "Something went Wrong!",
                        });
                        $(".updateMachineBtn").prop("disabled", false);
                    }
                },
                error: function (xhr) {
                    console.log(xhr);
                    if (xhr.status == 422) {
                        let error = xhr.responseJSON.errors;
                        $.each(error, function (data, message) {
                            $("#" + data).addClass("is-invalid");
                            $("#" + data + "-error").text(message[0]);
                        })
                    } else {
                        Swal.fire({
                            icon: "warning",
                            title: "Warning!",
                            text: "Something went Wrong!",
                        });
                        $(".updateMachineBtn").prop("disabled", false);
                    }
                },
                complete: function () {
                    $(".updateMachineBtn").prop("disabled", false);
                }
            })
        })
    })

    $(document).on("click", ".deleteMachineBtn", function () {
        let id = $(this).attr("data-id");
        Swal.fire({
            icon: "warning",
            title: "Are you sure ?",
            text: "You wan't to delete it ?",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Yes, Delete it !",
            cancelButtonColor: "#d33"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "DELETE",
                    url: "/admin/machine/" + id,
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    success: function (response) {
                        if (response.status == 200) {
                            Swal.fire({
                                icon: "success",
                                title: "Deleted!",
                                text: "Machine Deleted Successfully!",
                                showConfirmButton: false,
                                timer: 1000
                            });
                            table.draw();
                        } else {
                            Swal.fire({
                                icon: "warning",
                                title: "Warning!",
                                text: "Something went wrong!",
                            });
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr);
                        Swal.fire({
                            icon: "warning",
                            title: "Warning!",
                            text: "Something went wrong!",
                        });
                    }
                })
            }
        })
    })

    $(document).on("click", ".statusIdData", function () {
        let id = $(this).attr("data-id");
        let checked = $(this);
        checked.prop("disabled", true);
        Swal.fire({
            icon: "warning",
            title: "Are you sure ?",
            text: "You wan't to change it !",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Yes, Change it !",
            cancelButtonColor: "#d33",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "get",
                    url: "/admin/machine/status/" + id,
                    success: function (response) {
                        if (response.status == true) {
                            table.draw();
                            checked.prop("disabled", false);
                        } else {
                            Swal.fire({
                                icon: "warning",
                                title: "Warning",
                                text: "Something went wrong!",
                                showConfirmButton: false,
                                timer: 1000
                            });
                            checked.prop("disabled", false);
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr);
                        Swal.fire({
                            icon: "warning",
                            title: "Warning",
                            text: "Something went wrong!",
                            showConfirmButton: false,
                            timer: 1000
                        });
                        checked.prop("disabled", false);
                    }

                })
            } else {
                checked.prop("disabled", false);
                checked.prop("checked", !checked.prop("checked"));
            }
        })
    })
})