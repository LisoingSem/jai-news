@foreach($categories as $category)
<div class="row category mt-4 p-0">
      <div class="justify-content-between d-flex header-options">
            <h3>{{ $category->name }}</h3>
            <a href="{{ route('article_by_category',[$category->name, $category->id]) }}">
                  <p>មើលបន្ថែម <i class="fa-solid fa-circle-chevron-right"></i></p>
            </a>
      </div>
      <?php
      $articles = DB::table('articles')
            ->where('status', 1)
            ->where('category_id', $category->id)
            ->limit(4)
            ->get();
      ?>
      <div class="col-md-12">
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4  g-2 sub-features-news">
                  @foreach($articles as $article)
                  <div class="card-group">

                        <a class="col" href="{{route('article_detail', [$category->name, $article->id])}}">
                              <div class="card h-100">
                                    <img src="{{ asset($article->thumbnail) }}" class="card-img-top" alt="">
                                    <div class="card-body">
                                          <h5 class="card-title">
                                                {{ $article->title }}
                                          </h5>

                                          <!-- <p class="card-text">
                                          <span> {{ \Carbon\Carbon::parse($article->publish_date)->locale('km_KH')->isoFormat('MMMM D, YYYY')   }} </span>
                                    </p> -->
                                    </div>
                                    <div class="card-footer border-0 ">
                                          <p class="card-text justify-content-between d-flex">
                                                <span>អានអត្ថបទបន្ថែម</span>
                                                <span><i class="fa-solid fa-circle-arrow-right"></i></span>
                                          </p>
                                    </div>
                              </div>
                        </a>
                  </div>
                  @endforeach
            </div>
      </div>
</div>
@endforeach
