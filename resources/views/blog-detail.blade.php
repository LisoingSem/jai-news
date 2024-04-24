@extends('layouts.master')


@section('content')
<div class="container mt-3 contain-blog">
      <div class="row">
            <div class="col-md-8 blog-deatail">
                  <h2 class="title">{{ $article->title }}</h2>

                  <div class="more-options">
                        <span> {{ \Carbon\Carbon::parse($article->publish_date)->locale('km_KH')->isoFormat('MMMM D, YYYY')   }} </span>
                        <div>
                              <!-- <span>comments </span>| -->
                              <span>{{ $article->views }}  views</span>
                        </div>
                  </div>
                  <hr>

                  <p class="description">
                        {!! $article->description !!}
                  </p>

                  <span class="author">អត្ថបទ ៖ </span>
                  <hr>

                  <div class="col-md-4 blog-right-side d-sm-block d-md-none">

                        <div class="row ads-block d-sm-block d-md-none">
                              @include('ads-block-one')
                        </div>


                        <div class="row mt-4 popular-contain m-0 p-0">
                              <h2>អត្ថបទពេញនិយម</h2>
                              <div class="col-12 mt-2 mb-3 p-0 ">
                                    <div class="row row-cols-1 row-cols-md-1 g-2">

                                          <a class="col" href="fake.html">
                                                <div class="card">
                                                      <div class="row g-0">
                                                            <div class="col-md-5">
                                                                  <img src="assets/image/camera_lense_0.jpeg" alt="Trendy Pants and Shoes" class="img-fluid rounded-start" />
                                                            </div>
                                                            <div class="col-md-7">
                                                                  <div class="card-body">
                                                                        <h5 class="card-title">ឧកញ៉ាបណ្ឌិត គីម
                                                                              ហ៊ាង
                                                                              នឹងឡើងបកស្រាយពី
                                                                              “ដំណោះស្រាយវិស័យអចលនទ្រព្យនៅកម្ពុជា”
                                                                              នៅព្រីមៀរសែនសុខ ដោយឥតគិតថ្លៃ
                                                                        </h5>
                                                                        <p class="card-text justify-content-between d-flex d-md-none ">
                                                                              <span>អានអត្ថបទបន្ថែម</span>
                                                                              <span><i class="fa-solid fa-circle-arrow-right"></i></span>
                                                                        </p>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                          </a>

                                          <a class="col" href="fake.html">
                                                <div class="card">
                                                      <div class="row g-0 horizantal-card">
                                                            <div class="col-md-5">
                                                                  <img src="assets/image/camera_lense_0.jpeg" alt="Trendy Pants and Shoes" class="img-fluid rounded-start" />
                                                            </div>
                                                            <div class="col-md-7">
                                                                  <div class="card-body">
                                                                        <h5 class="card-title">ឧកញ៉ាបណ្ឌិត គីម
                                                                              ហ៊ាង
                                                                              នឹងឡើងបកស្រាយពី
                                                                              “ដំណោះស្រាយវិស័យអចលនទ្រព្យនៅកម្ពុជា”
                                                                              នៅព្រីមៀរសែនសុខ ដោយឥតគិតថ្លៃ
                                                                        </h5>

                                                                        <p class="card-text">
                                                                              <span>August 29, 2023</span>
                                                                        </p>
                                                                        <p class="card-text justify-content-between d-flex d-md-none ">
                                                                              <span>អានអត្ថបទបន្ថែម</span>
                                                                              <span><i class="fa-solid fa-circle-arrow-right"></i></span>
                                                                        </p>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                          </a>

                                          <a class="col" href="fake.html">
                                                <div class="card">
                                                      <div class="row g-0 horizantal-card">
                                                            <div class="col-md-5">
                                                                  <img src="assets/image/camera_lense_0.jpeg" alt="Trendy Pants and Shoes" class="img-fluid rounded-start" />
                                                            </div>
                                                            <div class="col-md-7">
                                                                  <div class="card-body">
                                                                        <h5 class="card-title">ឧកញ៉ាបណ្ឌិត គីម
                                                                              ហ៊ាង
                                                                              នឹងឡើងបកស្រាយពី
                                                                              “ដំណោះស្រាយវិស័យអចលនទ្រព្យនៅកម្ពុជា”
                                                                              នៅព្រីមៀរសែនសុខ ដោយឥតគិតថ្លៃ
                                                                        </h5>

                                                                        <p class="card-text">
                                                                              <span>August 29, 2023</span>
                                                                        </p>
                                                                        <p class="card-text justify-content-between d-flex d-md-none ">
                                                                              <span>អានអត្ថបទបន្ថែម</span>
                                                                              <span><i class="fa-solid fa-circle-arrow-right"></i></span>
                                                                        </p>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                          </a>

                                          <a class="col" href="fake.html">
                                                <div class="card">
                                                      <div class="row g-0 horizantal-card">
                                                            <div class="col-md-5">
                                                                  <img src="assets/image/camera_lense_0.jpeg" alt="Trendy Pants and Shoes" class="img-fluid rounded-start" />
                                                            </div>
                                                            <div class="col-md-7">
                                                                  <div class="card-body">
                                                                        <h5 class="card-title">ឧកញ៉ាបណ្ឌិត គីម
                                                                              ហ៊ាង
                                                                              នឹងឡើងបកស្រាយពី
                                                                              “ដំណោះស្រាយវិស័យអចលនទ្រព្យនៅកម្ពុជា”
                                                                              នៅព្រីមៀរសែនសុខ ដោយឥតគិតថ្លៃ
                                                                        </h5>

                                                                        <p class="card-text">
                                                                              <span>August 29, 2023</span>
                                                                        </p>
                                                                        <p class="card-text justify-content-between d-flex d-md-none ">
                                                                              <span>អានអត្ថបទបន្ថែម</span>
                                                                              <span><i class="fa-solid fa-circle-arrow-right"></i></span>
                                                                        </p>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                          </a>

                                    </div>
                              </div>
                        </div>

                        <!-- ads block  -->
                        <div class="row ads-block d-sm-block d-md-none">
                              <div class="col-12">
                                    @include('ads-block-two')
                              </div>
                        </div>
                        <!-- end ads block  -->

                  </div>

                  <!-- contact paragraph  -->
                  <div class="row mt-5 mb-4 contain-relation">
                        <h2>អត្ថបទទាក់ទង</h2>
                        <div class="col-12">
                              <div class="row row-cols-1 row-cols-md-3   g-2 sub-features-news">
                                    @foreach($articles as $article)
                                    <a class="col" href="{{route('article_detail', [$article->category_name, $article->id])}}">
                                          <div class="card h-100">
                                                <img src="{{ asset($article->thumbnail) }}" class="card-img-top" alt="">
                                                <div class="card-body">
                                                      <h5 class="card-title">
                                                            {{ $article->title }}
                                                      </h5>

                                                      <p class="card-text">
                                                            <span> {{ \Carbon\Carbon::parse($article->publish_date)->locale('km_KH')->isoFormat('MMMM D, YYYY')   }} </span>
                                                      </p>
                                                      <p class="card-text justify-content-between d-flex">
                                                            <span>អានអត្ថបទបន្ថែម</span>
                                                            <span><i class="fa-solid fa-circle-arrow-right"></i></span>
                                                      </p>
                                                </div>
                                          </div>
                                    </a>

                                    @endforeach


                              </div>
                        </div>
                  </div>
            </div>

            <!-- right side  -->
            <div class="col-md-4 blog-right-side col-sm-none d-none d-md-block p-0 m-0 ">

                  <div class="row p-0 ms-1">
                        <div class="col-12 p-0 m-0 ">
                              <div class="row ads-block p-0 m-0 ">
                                    <div class="col-12">
                                          @include('ads-block-one')
                                    </div>
                              </div>


                              <div class="row mt-4 popular-contain m-0 ">
                                    @include('popular-news-in-details')
                              </div>

                              <div class="row ads-block">
                                    <div class="col-12">
                                          @include('ads-block-two')

                                    </div>
                              </div>

                              <div class="row mt-4 popular-contain m-0 ">
                                    @include('news-feed_in_details')
                              </div>
                        </div>
                  </div>
            </div>
      </div>

</div>
@endsection