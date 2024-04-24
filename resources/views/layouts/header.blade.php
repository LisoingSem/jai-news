<?php
      $companyInfo = DB::table('companies')->where('id', 2)->first();
?>

<header id="top" class="container-fluid bg-black">
      <div class="container p-0">
            <div class="row ">
                  <div class="col-12 header">
                        <img src="{{ asset('assets/defaults/logo-white.png') }}" alt="">
                        <h1 class="text-uppercase">{{ $companyInfo->name }}</h1>
                  </div>
            </div>
      </div>
</header>