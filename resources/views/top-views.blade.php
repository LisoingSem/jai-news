<?php
$article = DB::table('articles')->where('articles.status', 1)->where('articles.is_publish', 1)
->join('categories', 'categories.id', 'articles.category_id')
->select('articles.*', 'categories.name as category_name')->orderBy('views', 'desc')->first();
?>

<a class="card bg-dark text-white biggest-features-news" href="{{route('article_detail', [$article->category_name, $article->id])}}">
      <img src="{{ asset($article->thumbnail) }}" class="card-img" alt="assets/image/camera_lense_0.jpeg">
      <div class="card-overlay">
            <h5 class="card-title">{{ $article->title }}</h5>
            <p class="card-text">
                  <span> {{ \Carbon\Carbon::parse($article->publish_date)->locale('km_KH')->isoFormat('MMMM D, YYYY')   }} </span>
            </p>
            <p class="card-text justify-content-between d-flex">
                  <span>អានអត្ថបទបន្ថែម</span>
                  <span><i class="fa-solid fa-circle-arrow-right"></i></span>
            </p>
      </div>
</a>
