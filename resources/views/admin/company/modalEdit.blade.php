<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
            <form id="formUpdate" class="modal-content" onsubmit="saveData(event)" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" id="eid">
                  <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Edit Company</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
                  <div class="modal-body">
                        <div class="row">
                              <div class="col-md-4">
                                    <div class="form-group">
                                          <label>File upload</label>
                                          <input type="file" name="logo" id="uploadImage" onchange="editAfterSelect(this)" class="file-upload-default">
                                          <div class="input-group col-xs-12 ">
                                                <input type="text" class="form-control file-upload-info d-none" id="logo" disabled placeholder="Upload Image">
                                                <span class="input-group-append border border-dark">
                                                      <!-- <button class="file-upload-browse btn btn-primary" type="button">Upload</button> -->
                                                      <img src="assets/defaults/uploadImage.jpg" class="echangeImage w-100 file-upload-browse" alt="">
                                                </span>
                                          </div>
                                    </div>
                              </div>

                              <div class="col-md-8">
                                    <div class="form-group">
                                          <label for="title">Company Name :</label>
                                          <input type="text" class="form-control" id="ename" name="name" required>
                                    </div>
                                    <div class="form-group">
                                          <label for="title">Details :</label>
                                          <input type="text" class="form-control" id="edetails" name="details" required>
                                    </div>
                                    <div class="form-group">
                                          <label for="title">Copyright :</label>
                                          <input type="text" class="form-control" id="ecopyright" name="copyright" required>
                                    </div>
                                    <div class="form-group">
                                          <label for="title">Address :</label>
                                          <input type="text" class="form-control" id="eaddress" name="address" required>
                                    </div>
                                    <div class="form-group">
                                          <label for="status">Status:</label>
                                          <select name="status" id="estatus" class="custom-select">
                                                <option value="1">Active</option>
                                                <option value="0">Delete</option>
                                          </select>
                                    </div>
                              </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="btn_edit" class="btn btn-primary">Save and Change</button>
                  </div>
            </form>
      </div>
</div>