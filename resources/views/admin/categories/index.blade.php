@extends('admin.layouts.master')

@section('content')
<div class="main-content">
      <div class="container-fluid">
            <div class="card">
                  <div class="card-header d-flex justify-content-between ">
                        <h3>Table Category</h3>
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
                                                <th class="col-md-9">Name</th>
                                                <th class="col-md-2">Order</th>
                                                <th width="100px">Status</th>
                                                <th width="100px">Options</th>
                                          </tr>
                                    </thead>

                                    <tfoot>
                                          <tr>
                                                <th>ID</th>
                                                <th>Name</th>
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

@include('admin.categories.edit')
@include('admin.categories.modalCreate')
@endsection

@section('custom-js')

<script>
      $(document).ready(function() {
            // show data 
            var table = $('#dataTable').DataTable({
                  processing: true,
                  "pagingType": "full_numbers",
                  ajax: "{{ route('category.index') }}",
                  columns: [{
                              data: 'DT_RowIndex',
                              name: 'DT_RowIndex',
                              searchable: true,
                              orderable: true
                        },
                        {
                              data: 'name',
                              name: 'name'
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

            // insert data 
            $('#btn_save').click(function() {
                  var eThis = $(this);
                  let token = $('input[name=_token]').val();
                  let name = $('#category').val();
                  let order = $('#order').val();

                  $.ajax({
                        type: "POST",
                        url: "{{route('category.save')}}",
                        data: {
                              'name': name,
                              'order': order,
                              '_token': token
                        },
                        beforeSend: function() {
                              eThis.html(' <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Loading... ');
                        },
                        success: function(response) {
                              if (response.status == 200) {
                                    showNotifyMessage('success', response.sms);
                                    $('#category').val('');
                                    $('#order').val('');
                                    $('#createModal').modal('hide');
                                    eThis.html('Save');
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
            })
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
      // edit 
      function editRow(id, event) {
            $('#editModal').modal('show');
            $.ajax({
                  type: "get",
                  url: "{{ route('category.edit', '')}}/" + id,
                  success: function(response) {
                        if (response.status == 200) {
                              $('#eid').val(response.data.id);
                              $('#ename').val(response.data.name);
                              $('#eorder').val(response.data.order);
                              $('#estatus').val(response.data.status);

                              if (response.data.status == 1) {
                                    $('#estatus option[value="1"]').prop('selected', true);
                              } else {
                                    $('#estatus option[value="0"]').prop('selected', true);
                              }
                        }
                  },
                  error: function(e) {
                        console.log(e);
                  }
            });
      }

      // update data 
      function saveData(event) {
            event.preventDefault();

            let token = $('input[name=_token]').val();
            let name = $('#ename').val();
            let order = $('#eorder').val();
            let status = $('#estatus').val();
            let id = $('#eid').val();

            $.ajax({
                  type: "POST",
                  url: "{{ route('category.update') }}",
                  data: {
                        'id': id,
                        'name': name,
                        'order': order,
                        'status': status,
                        '_token': token
                  },
                  success: function(response) {
                        console.log(response);
                        if (response.status == 200) {
                              $('#category').val('');
                              $('#editModal').modal('hide');
                              $('#dataTable').DataTable().ajax.reload();
                        }
                  },
                  error: function(e) {
                        console.log(e);
                  }
            });
      }
</script>

@endsection