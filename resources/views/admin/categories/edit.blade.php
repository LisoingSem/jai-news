<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog">
            <form id="formSubmit" class="modal-content" onsubmit="saveData(event)">
                  @csrf
                  <input type="hidden" name="id" id="eid">
                  <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group">
                              <label for="name">Category Name:</label>
                              <input type="text" name="name" id="ename" class="form-control" required>
                        </div>
                        <div class="form-group">
                              <label for="order">Order:</label>
                              <input type="text" name="order" id="eorder" class="form-control" required>
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
                        <button type="submit" id="btn_edit" class="btn btn-primary">Save change</button>
                  </div>
            </form>
      </div>
</div>

