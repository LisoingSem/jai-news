<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use DB;
use DataTables;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

      public function index(Request $request)
      {
            if ($request->ajax()) {
                  $data = DB::table('categories')->orderBy('id', 'DESC');
                  return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('option', function ($row) {
                              $edit = '<button onclick="editRow(' . $row->id. ', this)" class="btn"><i class="fa-solid fa-gear fa-xl" style="color: #0190e9;"></i></button>';
                              // $edit = '<button onclick="editRow(' . $row->id . ', this)" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></button>';
                              return $edit;
                        })
                        ->rawColumns(['option'])
                        ->make(true);
            }
            return view('admin.categories.index');
      }

      public function create()
      {
            return view('admin.categories.create');
      }

      public function save(Request $request)
      {
            $category = new Category();
            $category->name = $request->name;
            $category->order = $request->order;

            if ($category->save()) {
                  return response()->json([
                        'status' => 200,
                        'data' => $category,
                        'sms' => 'Data saved successfull.'
                  ]);
            } else {
                  return response()->json([
                        'status' => 500,
                        'data' => null,
                        'sms' => 'Data not saved!'
                  ]);
            }
      }

      public function edit($id)
      {
            $data = Category::find($id);
            return response()->json([
                  'status' => 200,
                  'data' => $data,
                  'sms' => 'Success.'
            ]);
      }

      public function update(Request $request)
      {
            $category = Category::find($request->id);
            $category->name = $request->name;
            $category->order = $request->order;
            $category->status = $request->status;
            if ($category->save()) {
                  return response()->json([
                        'status' => 200,
                        'data' => $category,
                        'sms' => 'Data updated successfull.'
                  ]);
            } else {
                  return response()->json([
                        'status' => 500,
                        'data' => null,
                        'sms' => 'Data not saved!'
                  ]);
            }
      }
}
