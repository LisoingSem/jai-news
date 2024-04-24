<?php
$newFeeds = DB::table('articles')
      ->join('categories', 'categories.id', 'articles.category_id')
      ->where('articles.status', 1)
      ->where('is_publish', 1)
      ->orderBy('publish_date', 'DESC')
      ->select('categories.name as name', 'articles.*')
      ->take(5)
      ->get();
?>


<h2>អត្ថបទថ្មីៗ</h2>
<div class="col-12 mt-2 mb-3 ">
      <div class="row row-cols-1 row-cols-md-1 g-2">

            @foreach($newFeeds as $newFeed)
            <a class="col" href="{{route('article_detail', [$newFeed->name, $newFeed->id])}}">
                  <div class="card">
                        <div class="row g-0">
                              <div class="col-md-5">
                                    <img src="{{ asset($newFeed->thumbnail) }}" alt="Trendy Pants and Shoes" class="img-fluid rounded-start" />
                              </div>
                              <div class="col-md-7">
                                    <div class="card-body p-0 ">
                                          <div class="card-body">
                                                <h5 class="card-title">
                                                      {{ $newFeed->title }}
                                                </h5>
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
                  </div>
            </a>

            @endforeach

      </div>
</div>