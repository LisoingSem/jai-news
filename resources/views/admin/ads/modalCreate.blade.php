<div class="modal fade" id="createModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
            <form id="formCreate" class="modal-content" enctype="multipart/form-data" onsubmit="insertData(event)">
                  @csrf
                  <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Create new Ad</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
                  <div class="modal-body">
                        <div class="row">
                              <div class="col-md-6">
                                    <div class="form-group">
                                          <label for="title">Link :</label>
                                          <input type="text" class="form-control" id="link" name="link">
                                    </div>
                                    <div class="form-group">
                                          <label for="title">Order :</label>
                                          <input type="text" class="form-control" id="order" name="order">
                                    </div>
                                    <div class="form-group">
                                          <label for="status">Location:</label>
                                          <select name="location" id="location" class="custom-select">
                                                <option value="" disabled selected>Select Location</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                          </select>
                                    </div>
                                    <div class="form-group">
                                          <label for="status">Status:</label>
                                          <select name="status" id="status" class="custom-select">
                                                <option value="" disabled selected>Select Status</option>
                                                <option value="1">Active</option>
                                                <option value="0">Disable</option>
                                          </select>
                                    </div>
                              </div>
                              <div class="col-md-6">
                                    <div class="form-group">
                                          <label>File upload</label>
                                          <input type="file" name="thumbnail" id="uploadImage" onchange="doAfterSelect(this)" class="file-upload-default">
                                          <div class="input-group col-xs-12 ">
                                                <input type="text" class="form-control file-upload-info d-none" id="thumbnail" disabled placeholder="Upload Image">
                                                <span class="input-group-append border border-dark">
                                                      <!-- <button class="file-upload-browse btn btn-primary" type="button">Upload</button> -->
                                                      <img src="assets/defaults/uploadImage.jpg" class="changeImage w-100 file-upload-browse" alt="">
                                                </span>
                                          </div>
                                    </div>
                              </div>

                        </div>

                  </div>
                  <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="btn_save" class="btn btn-primary">Save</button>
                  </div>
            </form>
      </div>
</div>