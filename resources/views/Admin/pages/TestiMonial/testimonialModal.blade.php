<div class="modal fade" id="formModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="formId" class="form">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="homeSlideTitle">Add Testimonial</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="validationErrors" class="alert alert-danger d-none"></p>
                    <div class="row">
                        <div class="col-md-6">
                            @csrf
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder=""
                                aria-describedby="helpId" />
                        </div>

                        <div class="col-md-6">
                            <label for="" class="form-label">Designation</label>
                            <input type="text" name="designation" id="designation" class="form-control" placeholder=""
                                aria-describedby="helpId" />
                            <div id="homeSlideImage"> </div>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Address</label>
                            <input type="text" name="address" id="address" class="form-control" placeholder=""
                                aria-describedby="helpId" />
                        </div>
                         <div class="col-md-6">
                            <label for="" class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control" placeholder=""
                                aria-describedby="helpId" />
                            <div id="testimonialImage"> </div>
                        </div>

                        <div class="mb-3 activeStatus">
                            <label for="" class="form-label">Status</label>
                            <select
                                class="form-select"
                                name="status"
                                id="status"
                            >
                                <option value="">Select one</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>


                        <div class="col-md-12 mt-4 mb-2">
                            <label for="" class="form-label">Description</label>
                            <textarea class="form-control summernote" id="testimonialDescription" name="description" rows="4"></textarea>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success submitBtn" data-action="">Submit</button>
                    <button type="submit" class="btn btn-success updateBtn" data-action="edit">Update
                        Testimonial</button>
                </div>
            </form>
        </div>
    </div>
</div>