@extends('admin.layouts.master')

@section('custom-css')
<style>
      tbody tr td:nth-child(4) {
            cursor: pointer;
      }

      #uploadImage {
            width: 100%;
            background-color: red;
            height: 100%;
      }
</style>
@endsection

@section('content')
<div class="main-content">
      <div class="container-fluid">
            <div class="card">
                  <div class="card-header d-flex justify-content-between ">
                        <h3>Table Socials</h3>
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
                                                <th class="col-md-2 col-sm-2" >ID</th>
                                                <th>Icon</th>
                                                <th>Link</th>
                                                <th>Order</th>
                                                <th width="10px">Status</th>
                                                <th width="30px">Options</th>
                                          </tr>
                                    </thead>

                                    <tfoot>
                                          <tr>
                                                <th>ID</th>
                                                <th>Icon</th>
                                                <th>Link</th>
                                                <th>Order</th>
                                                <th>Status</th>
                                                <th>Options</th>
                                          </tr>
                                    </tfoot>
                              </table>
                        </div>
                  </div>
            </div>
      </div>
</div>

@include('admin.socials.modalCreate')
@include('admin.socials.modalEdit')
@endsection

@section('custom-js')

<script>
      $(document).ready(function() {
            
            var table = $('#dataTable').DataTable({
                  processing: true,
                  "pagingType": "full_numbers",
                  ajax: "{{ route('social.index') }}",
                  columns: [{
                              data: 'DT_RowIndex',
                              name: 'DT_RowIndex',
                              searchable: true,
                              orderable: true
                        },
                        {
                              data: 'icon',
                              name: 'icon'
                        },
                        {
                              data: 'link',
                              name: 'link'
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

      function insertData(event) {
            event.preventDefault();
            let formId = $(event.target).attr('id');
            let formData = $('#' + formId)[0];
            var data = new FormData(formData);
            $.ajax({
                  type: "POST",
                  url: "{{ route('social.save') }}",
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
                              $('#icon').val('');
                              $('#link').val('');
                              $('#order').val('');
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
                  url: "{{ route('social.edit', '')}}/" + id,
                  success: function(response) {
                        if (response.status == 200) {
                              $('#eid').val(response.data.id);
                              $('#eicon').val(response.data.icon);
                              $('#elink').val(response.data.link);
                              $('#eorder').val(response.data.order);
                              $('#estatus').val(response.data.status);
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
                  url: "{{ route('social.update') }}",
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
                              // $('#ethumbnail').val('');
                              // $('#etitle').val('');
                              // $('#ecategory_id').val('');
                              // $('#edescription').summernote('code', '');
                              // $('.changeImage').attr('src', 'assets/defaults/uploadImage.jpg');
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
</script>
@include('admin.functions')
@endsection