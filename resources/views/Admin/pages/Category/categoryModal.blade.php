<div class="modal fade" id="formModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formId" class="form">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="categoryTitle">Add Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="validationErrors" class="alert alert-danger d-none"></p>
                    <div class="row">
                        <div class="col-md-12">
                            @csrf
                            <label for="" class="form-label">Title</label>
                            <input type="text" name="title" id="categorytitleData" class="form-control" placeholder=""
                                aria-describedby="helpId" />
                        </div>

                        <div class="mb-3 statusdiv">
                            <label for="" class="form-label">Status</label>
                            <select class="form-select" name="status" id="categoryStatus">
                                <option value="">Select one</option>
                                <option selected value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success submitBtn" data-action="">Submit</button>
                    <button type="submit" class="btn btn-success updateBtn" data-action="edit">Update
                        Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
