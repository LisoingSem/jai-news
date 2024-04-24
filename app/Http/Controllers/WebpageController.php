<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Article;
use Illuminate\Pagination\Paginator;

class WebpageController extends Controller
{
      public function index()
      {
            $data['categories'] = DB::table('categories')
                  ->where('status', '1')
                  ->get();
            return view('home', $data);
      }

      public function detail(Request $request, $name, $id)
      {
            $article = Article::find($id);

            if ($article) {
                  $article->views++;
                  $article->save();
            }
            $data['article'] = DB::table('articles')->find($id);
            $data['name'] = $name;
            $data['articles'] = DB::table('articles')
                  ->leftJoin('categories', 'categories.id', 'articles.category_id')
                  ->where('articles.status', 1)
                  ->where('categories.name', $name)
                  ->select('articles.*', 'categories.name as category_name')
                  ->where('categories.status', 1)
                  ->where('articles.is_publish', 1)
                  ->paginate(6);
            return view('blog-detail', $data);
      }

      public function articleByCategory(Request $request, $name)
      {
            $data['articles'] = Article::where('articles.status', 1)
                  ->where('articles.is_publish', 1)
                  ->join('categories', 'categories.id', 'articles.category_id')
                  ->where('categories.name', $name)
                  ->select('articles.*', 'categories.name as category_name')
                  ->orderBy('created_at', 'DESC')
                  ->get();

            $data['name'] = $name;
            return view('view-by-category', $data);
      }
}
