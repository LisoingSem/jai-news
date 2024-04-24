@extends('admin.layouts.master')


@section('content')
<div class="main-content">
      <div class="container-fluid">

            <div class="row clearfix">
                  <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="widget bg-primary">
                              <div class="widget-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                          <div class="state">
                                                <h6>Categories</h6>
                                                <h2>{{ $totalCategories }}</h2>
                                          </div>
                                          <div class="icon">
                                                <i class="ik ik-folder"></i>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="widget bg-success">
                              <div class="widget-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                          <div class="state">
                                                <h6>Articles</h6>
                                                <h2>{{ $totalArticles }}</h2>
                                          </div>
                                          <div class="icon">
                                                <i class="ik ik-file-text"></i>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
                  <!-- <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="widget bg-warning">
                              <div class="widget-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                          <div class="state">
                                                <h6>Views</h6>
                                                <h2>$43,567.53</h2>
                                          </div>
                                          <div class="icon">
                                                <i class="ik ik-inbox"></i>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="widget bg-danger">
                              <div class="widget-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                          <div class="state">
                                                <h6>New Users</h6>
                                                <h2>11</h2>
                                          </div>
                                          <div class="icon">
                                                <i class="ik ik-users"></i>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div> -->
            </div>



            <div class="row clearfix">
                  <div class="col-xl-4 col-md-12">
                        <div class="card comp-card">
                              <div class="card-body">
                                    <div class="row align-items-center">
                                          <div class="col">
                                                <h6 class="mb-25">Views</h6>
                                                <h3 class="fw-700 text-blue">{{ $totalViews }}</h3>
                                                <p class="mb-0"> {{ \Carbon\Carbon::parse($startDate)->locale('en')->isoFormat('MMMM D')   }} - {{ \Carbon\Carbon::parse($today)->locale('en')->isoFormat('MMMM D')   }} ({{ \Carbon\Carbon::parse($today)->locale('en')->isoFormat('YYYY')   }})</p>
                                          </div>
                                          <div class="col-auto">
                                                <i class="fas fa-eye bg-blue"></i>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
                  <!-- <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="widget">
                              <div class="widget-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                          <div class="state">
                                                <h6>Total Views</h6>
                                                <h2>{{ $totalViews }}</h2>
                                          </div>
                                          <div class="icon">
                                                <i class="ik ik-trending-up"></i>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div> -->
                  <!-- <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="widget">
                              <div class="widget-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                          <div class="state">
                                                <h6>Server</h6>
                                                <h2>62%</h2>
                                          </div>
                                          <div class="icon">
                                                <i class="ik ik-server"></i>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="widget">
                              <div class="widget-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                          <div class="state">
                                                <h6>Email</h6>
                                                <h2>32</h2>
                                          </div>
                                          <div class="icon">
                                                <i class="ik ik-mail"></i>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="widget">
                              <div class="widget-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                          <div class="state">
                                                <h6>Domians</h6>
                                                <h2>11</h2>
                                          </div>
                                          <div class="icon">
                                                <i class="ik ik-zap"></i>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div> -->
            </div>

            <div class="col-md-12">
                  <div class="card table-card">
                        <div class="card-header">
                              <h3>Summary this Month</h3>
                        </div>
                        <div class="card-block">
                              <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                          <thead>
                                                <tr>
                                                      <th>Category</th>
                                                      <th>Articles</th>
                                                      <th>Views</th>
                                                      <th>Start Date</th>
                                                      <th>End Date</th>
                                                </tr>
                                          </thead>
                                          <tbody>
                                                @foreach($infoCategories as $infoCategory)
                                                <tr>
                                                      <td>{{ $infoCategory->category_name }}</td>
                                                      <td>{{ $infoCategory->totalArticle }}</td>
                                                      <td>{{ $infoCategory->totalViews }}</td>
                                                      <td> {{ \Carbon\Carbon::parse($startDate)->format('d-m-Y')   }}</td>
                                                      <td> {{ \Carbon\Carbon::parse($today)->format('d-m-Y')   }}</td>
                                                </tr>
                                                @endforeach
                                          </tbody>
                                    </table>
                              </div>
                        </div>
                  </div>
            </div>

      </div>
</div>

@endsection

@section('cutom-js')
<script>
      $(document).ready(function() {
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
                                    if (row.status == "1") {
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
</script>

@endsection