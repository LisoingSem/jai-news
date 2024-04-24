@extends('admin.layouts.master')

@section('custom-css')
<style>
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
            <div class="row">
                  <div class="col-md-12">
                        <div class="card">
                              <div class="card-header">
                                    <h3>Create new Article</h3>
                              </div>
                              <div class="card-body">
                                    <form class="forms-sample" id="formCreate" enctype="multipart/form-data" enctype="multipart/form-data" onsubmit="insertData(event)">
                                          @csrf
                                          <div class="row">
                                                <div class="col-md-2">
                                                      <div class="form-group">
                                                            <label for="category_id">Category</label>
                                                            <select id="category_id" name="category_id" class="form-control form-control-lg ">
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
                                                            <label>Upload File</label>
                                                            <input type="file" name="thumbnail" id="uploadImage" onchange="doAfterSelect(this)" class="file-upload-default">
                                                            <div class="input-group col-xs-12 ">
                                                                  <input type="text" class="form-control file-upload-info d-none" id="thumbnail" disabled placeholder="Upload Image">
                                                                  <span class="input-group-append border border-dark">
                                                                        <!-- <button class="file-upload-browse btn btn-primary" type="button">Upload</button> -->
                                                                        <img src="{{ asset('assets/defaults/uploadImage.jpg') }}" class="changeImage w-100 file-upload-browse" alt="">
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
                                                            <label for="short">Short Descriptions :</label>
                                                            <input type="text" class="form-control" id="short" name="short">
                                                      </div>

                                                      <div class="form-group">
                                                            <label for="description">Descriptions :</label>
                                                            <textarea class="form-control html-editor" id="description" name="description" rows="10" required></textarea>
                                                      </div>
                                                </div>
                                          </div>
                                          <button type="submit" class="btn btn-primary mr-2">Save</button>
                                    </form>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
@endsection

@section('custom-js')

<script>
      $(document).ready(function() {
            $('#description').summernote({
                  height: 450
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
                              $('.changeImage').attr('src', 'http://127.0.0.1:8000/assets/defaults/uploadImage.jpg');
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
