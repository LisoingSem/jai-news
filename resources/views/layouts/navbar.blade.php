<?php
      $categories = DB::table('categories')->where('status', 1)->orderBy('order', 'ASC')->get();
?>

<div class="container-fluid bg-dark sticky-top p-0">
      <nav class="container navbar navbar-expand-xl navbar-dark p-1 ">

            <a class="navbar-brand {{request()->name == '' ? 'active' : ''}}" href="{{ route('homepage') }}"><i class="fa-solid fa-house-chimney"></i></a>

            <form class="d-flex d-none d-md-flex d-xl-none " role="search">
                  <input class="form-control me-1 col-8" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-light" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                  @foreach($categories as $menu)
                        <li class="nav-item">
                              <a class="nav-link px-3 {{request()->name == $menu->name ? 'active' : ''}}" href="{{ route('article_by_category', [$menu->name, $menu->id]) }}">{{ $menu->name }} </a>
                        </li>
                  @endforeach

                        <form class="d-md-none d-flex pb-4 " role="search">
                              <input class="form-control form-control-sm me-1 " type="search" placeholder="Search" aria-label="Search">
                              <button class="btn btn-outline-light" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                  </ul>
            </div>

            <!-- <form class="d-flex d-none d-xl-flex" role="search">
                  <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-light" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form> -->

      </nav>
</div>
