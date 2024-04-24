<?php
$populars = DB::table('articles')
      ->join('categories', 'categories.id', 'articles.category_id')
      ->where('articles.status', 1)
      ->where('is_publish', 1)
      ->select('categories.name as name', 'articles.*')
      ->orderBy('views', 'desc')
      ->take(5)->get();
?>


<h2>អត្ថបទពេញនិយម</h2>
<div class="col-12 mt-2 ms-1 mb-3 pe-3 ">
      <div class="row row-cols-1 row-cols-md-1 g-2">

            @foreach($populars as $popular)
            <a class="col" href="{{route('article_detail', [$popular->name, $popular->id])}}">
                  <div class="card">
                        <div class="row g-0 horizantal-card in-category">
                              <div class="col-md-5">
                                    <img src="{{ asset($popular->thumbnail) }}" alt="Trendy Pants and Shoes" class="img-fluid rounded-start" />
                              </div>
                              <div class="col-md-7">
                                    <div class="card-body">
                                          <h5 class="card-title">{{ $popular->title }}</h5>
                                    </div>
                                          <div class="card-footer border-0 ">
                                          <p class="card-text justify-content-between d-flex">
                                                <span>អានអត្ថបទបន្ថែម</span>
                                                <span><i class="fa-solid fa-circle-arrow-right"></i></span>
                                          </p>              
                                          </div>
                              </div>
                        </div>
                  </div>
            </a>

            @endforeach


      </div>
</div>