@extends('admin.layouts.master')

@section('custom-css')
<style>
      tbody tr td:nth-child(2) {
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
                        <h3>Table Company</h3>
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
                                                <th class="col-md-1 col-sm-1" width="10px">ID</th>
                                                <th width="10px">Logo</th>
                                                <th>Name</th>
                                                <th>Details</th>
                                                <th>Copyright</th>
                                                <th>Address</th>
                                                <th width="10px">Status</th>
                                                <th width="30px">Options</th>
                                          </tr>
                                    </thead>

                                    <tfoot>
                                          <tr>
                                                <th>ID</th>
                                                <th>Logo</th>
                                                <th>Name</th>
                                                <th>Details</th>
                                                <th>Copyright</th>
                                                <th>Address</th>
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

<!-- image viewer -->
<div class="modal fade" id="imgViewerModal" tabindex="-1" aria-labelledby="imgViewerModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
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

@include('admin.company.modalCreate')
@include('admin.company.modalEdit')
@endsection

@section('custom-js')

<script>
      $(document).ready(function() {
            var table = $('#dataTable').DataTable({
                  processing: true,
                  "pagingType": "full_numbers",
                  ajax: "{{ route('company.index') }}",
                  columns: [{
                              data: 'DT_RowIndex',
                              name: 'DT_RowIndex',
                              searchable: true,
                              orderable: true
                        },
                        {
                              data: 'photo',
                              name: 'logo',
                              searchable: false,
                              orderable: false,
                        },
                        {
                              data: 'name',
                              name: 'name'
                        },

                        {
                              data: 'details',
                              name: 'details'
                        },
                        {
                              data: 'copyright',
                              name: 'copyright',
                        },
                        {
                              data: 'address',
                              name: 'address',
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
                  url: "{{ route('company.save') }}",
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
                              $('#name').val('');
                              $('#details').val('');
                              $('#copyright').val('');
                              $('#address').val('');
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
                  url: "{{ route('company.edit', '')}}/" + id,
                  success: function(response) {
                        if (response.status == 200) {
                              $('#eid').val(response.data.id);
                              $('#ename').val(response.data.name);
                              $('#edetails').val(response.data.details);
                              $('#ecopyright').val(response.data.copyright);
                              $('#eaddress').val(response.data.address);
                              $('.echangeImage').attr('src', response.data.logo);
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
                  url: "{{ route('company.update') }}",
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