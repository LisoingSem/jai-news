<div class="modal fade" id="createModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md">
            <form id="formCreate" class="modal-content" onsubmit="insertData(event)">
                  @csrf
                  <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Create new Contact</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group">
                              <label for="title">Contact :</label>
                              <input type="text" class="form-control" id="contact" name="contact" required>
                        </div>
                        <div class="form-group">
                              <label for="title">Order :</label>
                              <input type="text" class="form-control" id="order" name="order" required>
                        </div>
                  </div>
                  <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="btn_save" class="btn btn-primary">Save</button>
                  </div>
            </form>
      </div>
</div>