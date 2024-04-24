<div class="modal fade" id="createModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
            <form id="formCreate" class="modal-content" enctype="multipart/form-data" onsubmit="insertData(event)">
                  @csrf
                  <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Create new Article</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
                  <div class="modal-body">
                        <div class="row">
                              <div class="col-md-4">
      
                                    <div class="form-group">
                                          <label>File upload</label>
                                          <input type="file" name="logo" id="uploadImage" onchange="doAfterSelect(this)" class="file-upload-default">
                                          <div class="input-group col-xs-12 ">
                                                <input type="text" class="form-control file-upload-info d-none" id="logo" disabled placeholder="Upload Image">
                                                <span class="input-group-append border border-dark">
                                                      <!-- <button class="file-upload-browse btn btn-primary" type="button">Upload</button> -->
                                                      <img src="assets/defaults/uploadImage.jpg" class="changeImage w-100 file-upload-browse" alt="">
                                                </span>
                                          </div>
                                    </div>
                              </div>

                              <div class="col-md-8">
                                    <div class="form-group">
                                          <label for="title">Company Name :</label>
                                          <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="form-group">
                                          <label for="title">Details :</label>
                                          <input type="text" class="form-control" id="details" name="details" required>
                                    </div>
                                    <div class="form-group">
                                          <label for="title">Copyright :</label>
                                          <input type="text" class="form-control" id="copyright" name="copyright" required>
                                    </div>
                                    <div class="form-group">
                                          <label for="title">Address :</label>
                                          <input type="text" class="form-control" id="address" name="address" required>
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