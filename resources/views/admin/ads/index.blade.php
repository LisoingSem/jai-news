@extends('admin.layouts.master')

@section('custom-css')
<style>
      tbody tr td:nth-child(2) {
            cursor: pointer;
            width: 50px;
      }
</style>
@endsection

@section('content')
<div class="main-content">
      <div class="container-fluid">
            <div class="card">
                  <div class="card-header d-flex justify-content-between ">
                        <h3>Table Ad</h3>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                              Create
                        </button>
                  </div>
                  <div id="notification-container"></div>
                  <div class="card-body">
                        <div class="dt-responsive">
                              <table id="dataTable" class="table table-striped table-bordered nowrap" class="w-100">
                                    <thead>
                                          <tr>
                                                <th class="col-md-1 col-sm-1">ID</th>
                                                <th>Thumbnail</th>
                                                <th>Location</th>
                                                <th>Order</th>
                                                <th width="100px">Status</th>
                                                <th width="100px">Options</th>
                                          </tr>
                                    </thead>

                                    <tfoot>
                                          <tr>
                                                <th class="col-md-1 col-sm-1">ID</th>
                                                <th>Thumbnail</th>
                                                <th>Location</th>
                                                <th>Order</th>
                                                <th width="100px">Status</th>
                                                <th width="100px">Options</th>
                                          </tr>
                                    </tfoot>
                              </table>
                        </div>
                  </div>
            </div>
      </div>
</div>

<div class="modal fade" id="imgViewerModal" tabindex="-1" aria-labelledby="imgViewerModalLabel" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="imgViewerModalLabel">Product Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
                  <div class="modal-body">
                        <img id="img_viewer" src="" alt="Photo" class="img-fluid w-100 ">
                  </div>
                  <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
            </div>
      </div>
</div>

@include('admin.ads.modalEdit')
@include('admin.ads.modalCreate')
@include('admin.functions')
@endsection

@section('custom-js')

<script>
      $(document).ready(function() {
            // show data 
            var table = $('#dataTable').DataTable({
                  processing: true,
                  "pagingType": "full_numbers",
                  ajax: "{{ route('ad.index') }}",
                  columns: [{
                              data: 'DT_RowIndex',
                              name: 'DT_RowIndex',
                              searchable: true,
                              orderable: true
                        },
                        {
                              data: 'photo',
                              name: 'thumbnail'
                        },
                        {
                              data: 'location',
                              name: 'location'
                        },
                        {
                              data: 'order',
                              name: 'order'
                        },
                        {
                              data: 'status',
                              name: 'status',
                              render: function(data, type, row) {
                                    if (data == "1") {
                                          return ` <i class="fa-solid fa-circle-check fa-xl" style="color: #006af5;"></i> `;
                                    } else {
                                          return ` <i class="fa-solid fa-circle-xmark fa-xl" style="color: #f50000;"></i> `;
                                    }
                              },
                              orderable: true,
                              targets: 'status',
                              orderData: [0],
                              searchable: true,
                        },
                        {
                              data: 'option',
                              name: 'option',
                              orderable: false,
                              searchable: false
                        },

                  ]
            });

      })

      toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: 'toast-top-right',
            timeOut: 5000
      };

      function showNotifyMessage(type, message) {
            if (type === 'success') {
                  toastr.success(message);
            } else if (type === 'warning') {
                  toastr.warning(message);
            } else if (type === 'error') {
                  toastr.error(message);
            } else {
                  toastr.info(message);
            }
      }


      function insertData(event) {
            event.preventDefault();
            let formId = $(event.target).attr('id');
            let formData = $('#' + formId)[0];
            var data = new FormData(formData);
            $.ajax({
                  type: "POST",
                  url: "{{ route('ad.save') }}",
                  data: data,
                  dataType: 'json',
                  processData: false,
                  contentType: false,
                  beforeSend: function() {
                        $('#btn_save').html(' <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Loading... ');
                  },
                  success: function(response) {
                        if (response.status == 200) {
                              showNotifyMessage('success', response.sms);
                              $('#link').val('');
                              $('#location').val('');
                              $('#order').val('');
                              $('#status').val('');
                              $('.changeImage').attr('src', 'assets/defaults/uploadImage.jpg');
                              $('#createModal').modal('hide');
                              $('#btn_save').html("Save");
                              $('#dataTable').DataTable().ajax.reload();
                        } else if (response.status == 500) {
                              showNotifyMessage('warning', response.sms);
                        } else {
                              console.log(response)
                              showNotifyMessage('error', "Something went wrong!")
                        }
                  },
                  error: function(e) {
                        console.log(e);
                  }
            });
      }

      function editRow(id, event) {
            $.ajax({
                  type: "get",
                  url: "{{ route('ad.edit', '')}}/" + id,
                  success: function(response) {
                        if (response.status == 200) {
                              $('#eid').val(response.data.id);
                              $('#elink').val(response.data.link);
                              $('#elocation').val(response.data.location);
                              $('#eorder').val(response.data.order);
                              $('#estatus').val(response.data.status);
                              $('.echangeImage').attr('src', response.data.thumbnail);

                              $('#editModal').modal('show');
                        }
                  },
                  error: function(e) {
                        console.log(e);
                  }
            });
      }

      function saveData(event) {
            event.preventDefault();
            let formId = $(event.target).attr('id');
            let formData = $('#' + formId)[0];
            var data = new FormData(formData);
            $.ajax({
                  type: "POST",
                  url: "{{ route('ad.update') }}",
                  data: data,
                  dataType: 'json',
                  processData: false,
                  contentType: false,
                  beforeSend: function() {
                        $('#btn_edit').html(' <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Loading... ');
                  },
                  success: function(response) {
                        console.log(response);
                        if (response.status == 200) {
                              showNotifyMessage('success', response.sms);
                              $('#btn_edit').html('Save and Change');
                              $('#editModal').modal('hide');
                              $('#dataTable').DataTable().ajax.reload();
                        }
                  },
                  error: function(e) {
                        console.log(e);
                  }
            });
      }


      function imgViewer(evt, src) {
            $('#img_viewer').attr('src', src);
            $('#imgViewerModal').modal('show');
      }
</script>

@endsection