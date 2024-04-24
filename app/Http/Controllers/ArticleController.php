<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Article;
use App\Models\Category;
use DataTables;
use Carbon\Carbon;

class ArticleController extends Controller
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


    public function index(Request $request)
    {
        if (!$request->ajax()) {
            $data['categories'] = Category::where('status', 1)->get();
            return view('admin.articles.index', $data);
        }

        if ($request->ajax()) {
            $data = DB::table('articles')
                ->join('categories', 'categories.id', 'articles.category_id')
                ->where('categories.status', '!=', '')
                ->select(
                    'articles.*',
                    'categories.name as category_name',
                )
                ->orderBy('id', 'DESC');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('option', function ($row) {
                    $btn_edit = '<button onclick="editRow(' . $row->id . ', this)" class="btn" id="setting"><i class="fa-solid fa-gear fa-xl" style="color: #0190e9;"></i></button>';
                    return $btn_edit;
                })
                ->addColumn('photo', function ($row) {
                    return '<img onclick="imgViewer(this, \'' . asset($row->thumbnail) . '\')" src="' . asset($row->thumbnail) . '" alt="photo" width="30px" height="30px">';
                })
                ->rawColumns(['option', 'photo'])
                ->make(true);
        }
    }


    public function create()
    {
        $data['categories'] = DB::table('categories')
            ->where('status', '1')
            ->get();
        return view('admin.articles.create', $data);
    }

    public function save(Request $request)
    {
        $article = new Article();
        $article->title = $request->title;
        $article->description = $request->description;
        $article->short_description = $request->short;
        $article->category_id = $request->category_id;
        $article->is_publish = $request->is_publish;
        if ($request->is_publish && $article->publish_date == NULL) {
            $article->publish_date = Carbon::now()->format('Y-m-d');
        }
        if ($request->hasFile('thumbnail')) {
            $article->thumbnail = $request->thumbnail->store('assets/article_images', 'custom');
        }

        if ($article->save()) {
            return response()->json([
                'status' => 200,
                'data' => $article,
                'sms' => 'Article saved successfull.'
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'data' => null,
                'sms' => 'Data not saved!'
            ]);
        }
    }

    public function edit(Request $request, $id)
    {
        $data = Article::find($id);
        return response()->json([
            'status' => 200,
            'data' => $data,
            'sms' => 'Success.'
        ]);
    }

    public function update(Request $request)
    {
        $article = Article::find($request->id);
        $article->title = $request->title;
        $article->title = $request->title;
        $article->short_description = $request->short;
        $article->description = $request->description;
        $article->category_id = $request->category_id;
        $article->status = $request->status;
        $article->is_publish = $request->is_publish;
        if ($request->is_publish && $article->publish_date == NULL) {
            $article->publish_date = Carbon::now()->format('Y-m-d');
        } elseif ($request->is_publish == '0') {
            $article->publish_date = NULL;
        }
        if ($request->hasFile('thumbnail')) {
            $article->thumbnail = $request->thumbnail->store('assets/article_images', 'custom');
            // $article->thumbnail = "fghjkl.jpg";
        }
        if ($article->save()) {
            return response()->json([
                'status' => 200,
                'data' => $article,
                'sms' => 'Article updated successfull.'
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'data' => null,
                'sms' => 'Data not saved!'
            ]);
        }
    }

    public function view($id)
    {
        $data = Article::find($id);
        return response()->json([
            'status' => 200,
            'data' => $data,
            'sms' => 'Success.'
        ]);
    }
}
