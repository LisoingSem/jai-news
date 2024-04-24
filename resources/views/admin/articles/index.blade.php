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
                        <h3>Table Category</h3>
                        <!-- <a href="{{ route('article.create') }}"><button type="button" class="btn btn-primary">
                              Create
                        </button></a> -->
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
                                                <th>#</th>
                                                <th class="col-md-1 col-sm-1" width="10px">Title</th>
                                                <th>Description</th>
                                                <th>Thumbnail</th>
                                                <th width="10px">Category</th>
                                                <th width="130px">Public Date</th>
                                                <th width="10px">Status</th>
                                                <th width="30px">Options</th>
                                          </tr>
                                    </thead>

                                    <tfoot>
                                          <tr>
                                                <th>#</th>
                                                <th class="col-md-1 col-sm-1" width="10px">Name</th>
                                                <th>Phone Number</th>
                                                <th>Gmail</th>
                                                <th width="10px">Website</th>
                                                <th width="130px">Address</th>
                                                <th width="10px">Status</th>
                                                <th width="30px">Options</th>
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

<div class="modal fade popup" id="popup" tabindex="-1" aria-labelledby="popupLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                  <div class="modal-body">
                        <div class="d-flex justify-content-center">
                              <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>

<!-- insert data  -->
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
                              <div class="col-md-2">
                                    <div class="form-group">
                                          <label for="category_id">Category</label>
                                          <select id="category_id" name="category_id" class="form-control">
                                                <option selected disabled>Choose Category</option>
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                          </select>
                                    </div>
                                    <div class="form-group">
                                          <label for="is_publish">Publish Status</label>
                                          <select name="is_publish" id="is_publish" class="form-control" required>
                                                <option selected disabled>Choose Option</option>
                                                <option value="1">Published</option>
                                                <option value="0">Un-published</option>
                                          </select>
                                    </div>
                                    <div class="form-group">
                                          <label>File upload</label>
                                          <input type="file" name="thumbnail" id="uploadImage" onchange="doAfterSelect(this)" class="file-upload-default">
                                          <div  style="height: 300px;">
                                                <input type="text" class="form-control file-upload-info d-none" id="thumbnail" disabled placeholder="Upload Image">
                                                <span class="input-group-append border border-dark">
                                                      <!-- <button class="file-upload-browse btn btn-primary" type="button">Upload</button> -->
                                                      <img src="assets/defaults/uploadImage.jpg" class="changeImage w-100 file-upload-browse" alt="">
                                                </span>
                                          </div>
                                    </div>
                              </div>

                              <div class="col-md-10">
                                    <div class="form-group">
                                          <label for="title">Title :</label>
                                          <input type="text" class="form-control" id="title" name="title">
                                    </div>

                                    <div class="form-group">
                                          <label for="short">Short Description :</label>
                                          <input type="text" class="form-control" id="short" name="short">
                                    </div>

                                    <div class="form-group">
                                          <label for="description">Descriptions :</label>
                                          <textarea class="form-control html-editor" id="description" name="description" rows="10" required></textarea>
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

@include('admin.articles.modalEdit')
@endsection

@section('custom-js')

<script>
      $(document).ready(function() {
            $('.html-editor').summernote({
                  height: 400
            });
            var table = $('#dataTable').DataTable({
                  processing: true,
                  "pagingType": "full_numbers",
                  ajax: "{{ route('article.index') }}",
                  columns: [{
                              data: 'DT_RowIndex',
                              name: 'DT_RowIndex',
                              searchable: true,
                              orderable: true
                        },
                        {
                              data: 'title',
                              name: 'title',
                              render: function(data, type, row) {
                                    var maxChars = 50;
                                    if (window.innerWidth <= 1100) {
                                          maxChars = 10;
                                    }
                                    if (window.innerWidth <= 1300) {
                                          maxChars = 20;
                                    }
                                    if (window.innerWidth <= 1600) {
                                          maxChars = 25;
                                    }
                                    if (window.innerWidth <= 1800) {
                                          maxChars = 30;
                                    }

                                    return data.length > maxChars ?
                                          data.substr(0, maxChars) + '…' :
                                          data;
                              }
                        },
                        {
                              data: 'short_description',
                              name: 'short_description',
                              render: function(data, type, row) {
                                    var maxChars = 100;
                                    if (window.innerWidth <= 1100) {
                                          maxChars = 15;
                                    }
                                    if (window.innerWidth <= 1300) {
                                          maxChars = 20;
                                    }
                                    if (window.innerWidth <= 1600) {
                                          maxChars = 60;
                                    }
                                    if (window.innerWidth >= 1800) {
                                          maxChars = 80;
                                    }

                                    return data.length > maxChars ?
                                          data.substr(0, maxChars) + '…' :
                                          data;
                              }
                        },

                        {
                              data: 'photo',
                              name: 'thumbnail',
                              searchable: false,
                              orderable: false,
                              cursor: 'pointer',
                        },
                        {
                              data: 'category_name',
                              name: 'categories.name'
                        },
                        {
                              data: 'publish_date',
                              name: 'publish_date',
                              render: function(data, type, row) {
                                    if (data != null) {
                                          return data;
                                    } else {
                                          return ` Un-publish `;
                                    }
                              },
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
                  url: "{{ route('article.save') }}",
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
                              $('#thumbnail').val('');
                              $('#title').val('');
                              $('#short').val('');
                              $('#category_id').prop("selectedIndex", 0);
                              $('#is_publish').prop("selectedIndex", 0);
                              $('#description').summernote('code', '');
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
                  url: "{{ route('article.edit', '')}}/" + id,
                  success: function(response) {
                        if (response.status == 200) {
                              $('#eid').val(response.data.id);
                              $('#etitle').val(response.data.title);
                              $('#eshort').val(response.data.short_description);
                              $('#ethumbnail').val('');
                              $('.echangeImage').attr('src', response.data.thumbnail);
                              $('#edescription').summernote('code', response.data.description);
                              $('#ecategory_id').val(response.data.category_id);
                              $('#eis_publish').val(response.data.is_publish);
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
                  url: "{{ route('article.update') }}",
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
