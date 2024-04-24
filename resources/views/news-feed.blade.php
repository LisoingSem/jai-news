<?php
      $articles = DB::table('articles')
      ->join('categories', 'categories.id', 'articles.category_id')
      ->where('articles.status', 1)
      ->where('is_publish', 1)
      ->orderBy('publish_date', 'DESC')
      ->select('categories.name as name', 'articles.*')
      ->paginate(4);
?>
<div class="justify-content-between d-flex header-options mb-1">
      <h3>ព័ត៍មានថ្មីៗ</h3>
</div>
<div class="row row-cols-1  row-cols-md-2 g-2">
      @foreach($articles as $article)
      <a class="col" href="{{route('article_detail', [$article->name, $article->id])}}">
            <div class="card">
                  <div class="row g-0 horizantal-card">
                        <div class="col-md-5">
                              <img src="{{ asset($article->thumbnail) }}" alt="Trendy Pants and Shoes" class="img-fluid rounded-start" />
                        </div>
                        <div class="col-md-7">
                              <div class="card-body">
                                    <div class="card-body">
                                          <h5 class="card-title">
                                                {{ $article->title }}
                                          </h5>
                                    </div>

                              </div>
                                    <div class="card-footer border-0">
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