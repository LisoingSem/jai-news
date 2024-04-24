<?php
      $ads = DB::table('ads')->where('status', 1)->where('location', '1')->orderBy('order', 'ASC')->get();
?>

@foreach($ads as $ad)
      <a href="{{ $ad->link }}" target="_blank"><img src="{{ asset($ad->thumbnail) }}" alt=""></a>
@endforeach