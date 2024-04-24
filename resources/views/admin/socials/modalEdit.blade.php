<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
            <form id="formUpdate" class="modal-content" onsubmit="saveData(event)">
                  @csrf
                  <input type="hidden" name="id" id="eid">
                  <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Edit Social</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group">
                              <label for="title">Icon :</label>
                              <input type="text" class="form-control" id="eicon" name="icon" required>
                        </div>
                        <div class="form-group">
                              <label for="title">Link :</label>
                              <input type="text" class="form-control" id="elink" name="link" required>
                        </div>
                        <div class="form-group">
                              <label for="title">Order :</label>
                              <input type="text" class="form-control" id="eorder" name="order" required>
                        </div>
                        <div class="form-group">
                              <label for="status">Status:</label>
                              <select name="status" id="estatus" class="custom-select">
                                    <option value="1">Active</option>
                                    <option value="0">Delete</option>
                              </select>
                        </div>
                  </div>
                  <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="btn_edit" class="btn btn-primary">Save and Change</button>
                  </div>
            </form>
      </div>
</div>