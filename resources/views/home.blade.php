@extends('layouts.master')

@section('content')
<div class="container mt-2 p-0">
      <div class="row  features ">
            <!-- left side  -->
            <div class="col-md-8 left-features">

                  <!-- ads  -->
                  <div class="row ads-block d-sm-block d-md-none mb-3">
                        <div class="col-12">
                              @include('ads-block-one')
                        </div>
                  </div>

                  <!-- biggest news box -->
                  @include('top-views')

                  <!-- new feed -->
                  <div class="row new-feed mt-4">
                        @include('news-feed')
                  </div>

                  <!-- ads -->
                  <div class="row ads-block d-sm-block d-md-none">
                        <div class="col-12">
                              @include('ads-block-two')
                        </div>
                  </div>

                  <!-- category -->
                  @include('category-by-block')



            </div>
            <!-- end left side  -->



            <!-- right side  -->
            <div class="col-md-4 right-block d-sm-none d-md-block  d-none">

                  <div class="row news-ads">
                        <div class="col-12">
                              <!-- ads  -->
                              <div class="row ads-block d-sm-none d-none d-md-block">
                                    <div class="col-12">
                                          @include('ads-block-one')
                                    </div>
                              </div>

                              <!-- Popular news  -->
                              <div class="row news-popular mt-3 p-0 m-0">
                                    @include('popular-news')
                              </div>

                              <!-- ads  -->
                              <div class="row ads-block d-sm-none d-none d-md-block mt-3 ">
                                    <div class="col-12">
                                          @include('ads-block-two')
                                    </div>
                              </div>

                        </div>
                  </div>

            </div>
            <!-- end right side  -->
      </div>
</div>
@endsection