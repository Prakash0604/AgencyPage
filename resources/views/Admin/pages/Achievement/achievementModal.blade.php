<div class="modal fade" id="formModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formId" class="formNotice">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="achievementTitle">Add Achievements</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="validationErrors" class="alert alert-danger d-none"></p>
                    <div class="row">
                        <span class="mt-2 mb-4"><span class="text-danger">Note:</span> (<span class="text-danger">*</span>) symbol represent that the field is required</span>
                        <div class="col-md-12">
                            <label for="" class="form-label">Title<span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control" placeholder=""
                                aria-describedby="helpId" />
                                <small id="title-error" class="text-danger errorMessage"></small>
                        </div>

                        <div class="col-md-12">
                            <label for="" class="form-label">Icon Image<span class="text-danger">*</span></label>
                            <input type="file" name="icon" id="image_icon" class="form-control" placeholder=""
                                aria-describedby="helpId" />
                                <small id="icon-error" class="text-danger errorMessage"></small>
                            <div id="iconImage"> </div>
                        </div>
                        <div class="col-md-12">
                            <label for="" class="form-label">Number of Achievement<span class="text-danger">*</span></label>
                            <input type="number" name="number" id="icon_number" class="form-control" placeholder=""
                                aria-describedby="helpId" />
                                <small id="number-error" class="text-danger errorMessage"></small>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success submitAchievementBtn" data-action="">Submit</button>
                    <button type="submit" class="btn btn-success updateAchievementBtn" data-action="edit">Update
                        Achievement</button>
                </div>
            </form>
        </div>
    </div>
</div>
