@extends('Admin.index')
@section('content')
    <div class="container">
        <button class="btn btn-primary addPostBtn mb-4">Add Post</button>
        @include('Admin.pages.Post.postModal')
        <div
            class="table-responsive"
        >
            <table
                class="table table-bordered"
                id="data-post-show"
            >
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
        $(document).ready(function(){
            $(".summernote").summernote();

            // Data Table
            var table=$("#data-post-show").DataTable({
                processing:true,
                serverSide:true,
                ajax:"{{ route('admin.post') }}",
                columns:[
                    {
                        data:"DT_RowIndex", name:"DT_RowIndex"
                    },
                    {
                        data:"image", name:"image"
                    },
                    {
                        data:"title", name:"title"
                    },
                    {
                        data:"category", name:"category"
                    },
                    {
                        data:"description", name:"description"
                    },
                    {
                        data:"created_by", name:"created_by"
                    },
                    {
                        data:"status", name:"status",fetch:function(status){
                            if(status == 'Active'){
                                return `<span class="badge badge-success">Active</span>`;
                            }else{
                                return `<span class="badge badge-danger">Inactive</span>`;
                            }
                        }
                    },{
                        data:"action", name:"action", orderable:false, searchable:false
                    }
                ]
            })
            $(document).on("click",".addPostBtn",function(){
                $("#formModal").modal("show");
                $(".submitBtn").show();
                $(".updateBtn").hide();
                $(".statusdiv").hide();
                $(".form").attr("id",'addForm');
                $("#addForm")[0].reset();
            });

            $(document).on("submit","#addForm",function(event){
                event.preventDefault();
                $(".submitBtn").prop("disabled",true);
                let formdata=new FormData(this);
                $.ajax({
                    type:"post",
                    url:"{{ route('admin.post.store') }}",
                    data:formdata,
                    processData:false,
                    contentType:false,
                    success:function(response){
                        Swal.fire({
                            icon:"success",
                            title:"Success",
                            text:"Post Added Successfully",
                            showConfirmButton:false,
                            timer:1500,
                        });
                        table.draw();
                        $("#formModal").modal("hide");
                        $("#addForm")[0].reset();
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
        })
    </script>
@endsection
