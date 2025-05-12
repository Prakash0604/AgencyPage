$(document).ready(function () {
    // Datatable
    function clear() {
        $(".form-control").val("");
        $(".errorMessage").text("");
        $(".form-control").removeClass("is-invalid");
        $("#iconImage").html("");
    }

    var table = $("#fetch-achievement-data").DataTable({
        processing: true,
        serverSide: true,
        ajax: "/admin/achievement",
        order: [[2, "asc"]],
        "lengthMenu":[[10,25,50,100,-1],[10,25,50,100,"All"]],
        columns: [
            {
                data: "DT_RowIndex", name: "DT_RowIndex", orderable: false, searchable: false
            },
             {
                data: "image", name: "image", orderable: false, searchable: false
            }, {
                data: "title", name: "title"
            }, {
                data: "number", name: "number"
            }, {
                data: "status", name: "status", orderable: false, searchable: false
            }, {
                data: "action", name: "action", orderable: false, searchable: false
            }
        ]
    })



    $("#addAchievementBtn").on("click", function () {
        clear();
        $("#formModal").modal("show");
        $(".submitAchievementBtn").show();
        $(".updateAchievementBtn").hide();
        $("#achievementTitle").text("Add Achievement");
        $(".formNotice").attr('id', "addAchievement");
        $("#addAchievement")[0].reset();
    });

    $(document).off("submit", "#addAchievement").on("submit", "#addAchievement", function (event) {
        event.preventDefault();
        let formdata = new FormData(this);
        $(".submitAchievementBtn").prop("disabled", true);
        $.ajax({
            type: "post",
            url: "/admin/achievement",
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
                        text: "Achievement Created Successfully!",
                        showConfirmButton: false,
                        timer: 1000
                    });
                    table.draw();
                    $("#formModal").modal("hide");
                    $("#addAchievement")[0].reset();
                } else {
                    Swal.fire({
                        icon: "warning",
                        title: "Warning!",
                        text: "Something went wrong!",
                    });
                    $(".submitAchievementBtn").prop("disabled", false);
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
                    $(".submitAchievementBtn").prop("disabled", false);
                }
            },
            complete: function () {
                $(".submitAchievementBtn").prop("disabled", false);
            }
        })
    });

    $(document).on("click", ".editAchievementBtn", function () {
        let id = $(this).attr("data-id");
        clear();
        $("#formModal").modal("show");
        $(".submitAchievementBtn").hide();
        $(".updateAchievementBtn").show();
        $("#achievementTitle").text("Edit Achievement");
        $(".formNotice").attr("id", "updateAchievement");
        $("#updateAchievement")[0].reset();
        $.ajax({
            type: "get",
            url: "/admin/achievement/" + id,
            success: function (response) {
                if (response.status == 200) {
                    $("#title").val(response.message.title);
                    if (response.message.icon != null) {
                        let image = response.message.icon ?? '';
                        $("#iconImage").html(`
                             <img src="/storage/${image}" class="img-fluid" height="100" width="100" alt="" />
                            `);
                    }
                    // $("#image_icon").val(response.message.icon);
                    $("#icon_number").val(response.message.number);
                } else {
                    Swal.fire({
                        icon: "warning",
                        title: "Warning!",
                        text: "Something went wrong from success!"
                    });
                }
            },
            error: function (xhr) {
                console.log(xhr);
                Swal.fire({
                    icon: "warning",
                    title: "Warning!",
                    text: "Something went wrong from xhr!"
                });
            }
        });

        $(document).off("submit", "#updateAchievement").on("submit", "#updateAchievement", function (event) {
            event.preventDefault();
            let formdata = new FormData(this);
            formdata.append("_method", "PATCH");
            $(".updateAchievementBtn").prop("disabled", true);
            $.ajax({
                type: "post",
                url: "/admin/achievement/" + id,
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
                            text: "Achievement Updated Successfully!",
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
                        $(".updateAchievementBtn").prop("disabled", false);
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
                        $(".updateAchievementBtn").prop("disabled", false);
                    }
                },
                complete: function () {
                    $(".updateAchievementBtn").prop("disabled", false);
                }
            })
        })
    })

    $(document).on("click", ".deleteAchievementBtn", function () {
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
                    url: "/admin/achievement/" + id,
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    success: function (response) {
                        if (response.status == 200) {
                            Swal.fire({
                                icon: "success",
                                title: "Deleted!",
                                text: "Achievement Deleted Successfully!",
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
                    url: "/admin/achievement/status/" + id,
                    success: function (response) {
                        if (response.success == true) {
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