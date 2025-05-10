<div class="modal fade" id="formModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="formId" class="formMachine">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="machineTitle">Add Machine</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="validationErrors" class="alert alert-danger d-none"></p>
                    <div class="row">
                        <span class="mt-2 mb-4"><span class="text-danger">Note:</span> (<span class="text-danger">*</span>) symbol represent that the field is required</span>
                        <div class="col-md-6">
                            <label for="" class="form-label">Title<span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control" placeholder=""
                                aria-describedby="helpId" />
                                <small id="title-error" class="text-danger errorMessage"></small>
                        </div>

                        <div class="col-md-6">
                            <label for="" class="form-label">Image<span class="text-danger">*</span></label>
                            <input type="file" name="image" id="image" class="form-control" placeholder=""
                                aria-describedby="helpId" />
                                <small id="image-error" class="text-danger errorMessage"></small>
                            <div id="machineImage"> </div>
                        </div>
                        <div class="col-md-12 mt-4 mb-2">
                            <label for="" class="form-label">Description</label>
                            <textarea class="form-control description" id="description" name="description" rows="4"></textarea>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success submitMachineBtn" data-action="">Submit</button>
                    <button type="submit" class="btn btn-success updateMachineBtn" data-action="edit">Update
                        Machine</button>
                </div>
            </form>
        </div>
    </div>
</div>
