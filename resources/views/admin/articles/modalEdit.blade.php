<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
            <form id="formUpdate" class="modal-content" onsubmit="saveData(event)" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" id="eid">
                  <div class="modal-header">
                        <h5 class="modal-title " id="editModalLabel">Edit Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
                  <div class="modal-body">
                        <div class="row">
                              <div class="col-md-2">
                                    <div class="form-group">
                                          <label for="category_id">Category</label>
                                          <select id="ecategory_id" name="category_id" class="form-control form-control-lg">
                                                <option selected disabled>Choose Category</option>
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                          </select>
                                    </div>
                                    <div class="form-group">
                                          <label for="status">Status:</label>
                                          <select name="status" id="estatus" class="custom-select">
                                                <option value="1">Active</option>
                                                <option value="0">Delete</option>
                                          </select>
                                    </div>
                                    <div class="form-group">
                                          <label for="eis_publish">Publish Status</label>
                                          <select name="is_publish" id="eis_publish" class="custom-select" required>
                                                <option selected disabled>Choose Option</option>
                                                <option value="1">Published</option>
                                                <option value="0">Un-published</option>
                                          </select>
                                    </div>
                                    <div class="form-group">
                                          <label>File upload</label>
                                          <input type="file" name="thumbnail" onchange="editAfterSelect(this)" class="file-upload-default">
                                          <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info d-none" name="thumbnail" id="ethumbnail" disabled placeholder="Upload Image">
                                                <span class="input-group-append">
                                                      <!-- <button class="file-upload-browse btn btn-primary" type="button">Upload</button> -->
                                                      <img src="assets/defaults/uploadImage.jpg" class="echangeImage w-100 file-upload-browse" alt="">
                                                </span>
                                          </div>
                                    </div>
                              </div>
                              <div class="col-md-10">
                                    <div class="form-group">
                                          <label for="title">Title :</label>
                                          <input type="text" class="form-control" id="etitle" name="title">
                                    </div>

                                    <div class="form-group">
                                          <label for="short">Short Description :</label>
                                          <input type="text" class="form-control" id="eshort" name="short">
                                    </div>

                                    <div class="form-group">
                                          <label for="description">Descriptions :</label>
                                          <textarea class="form-control html-editor" id="edescription" name="description" rows="10" required></textarea>
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