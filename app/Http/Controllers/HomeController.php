<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class HomeController extends Controller
{
      /**
       * Create a new controller instance.
       *
       * @return void
       */
      public function __construct()
      {
            $this->middleware('auth');
      }

      /**
       * Show the application dashboard.
       *
       * @return \Illuminate\Contracts\Support\Renderable
       */
      public function index()
      {
            $today = now();
            $startDate = now()->startOfMonth();

            $data['today'] = $today;
            $data['startDate'] = $startDate;

            $data['totalCategories'] = DB::table('categories')
                  ->where('status', 1)
                  ->count();

            $data['totalArticles'] = DB::table('articles')
                  ->where('status', 1)
                  ->where('is_publish', 1)
                  ->count();

            $data['totalViews'] = DB::table('articles')
                  ->whereBetween('created_at', [$startDate, $today])
                  ->sum('views');

            $data['infoCategories'] = DB::table('categories')
                  ->leftJoin('articles', 'categories.id', '=', 'articles.category_id')
                  ->whereBetween('articles.created_at', [$startDate, $today])
                  ->selectRaw('categories.name as category_name, COUNT(articles.id) as totalArticle, SUM(articles.views) as totalViews')
                  ->groupBy('categories.id', 'categories.name')
                  ->orderBy('totalArticle', 'DESC')
                  ->get();



            return view('admin.home', $data);
      }
}
