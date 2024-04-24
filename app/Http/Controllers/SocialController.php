<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Social;
use DataTables;

class SocialController extends Controller
{
      public function __construct()
      {
          $this->middleware('auth');
      }

      public function index(Request $request){
            if ($request->ajax()) {
                  $data = DB::table('socials')->get();
                  return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('option', function ($row) {
                              $btn_edit = '<button onclick="editRow(' . $row->id . ', this)" class="btn" id="setting"><i class="fa-solid fa-gear fa-xl" style="color: #0190e9;"></i></button>';
                              return $btn_edit;
                        })
                        ->rawColumns(['option'])
                        ->make(true);
            }
            return view('admin.socials.index');
      }

      public function save(Request $request)
      {
            $social = new Social();
            $social->icon = $request->icon;
            $social->link = $request->link;
            $social->order = $request->order;

            if ($social->save()) {
                  return response()->json([
                        'status' => 200,
                        'data' => $social,
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
            $data = Social::find($id);
            return response()->json([
                  'status' => 200,
                  'data' => $data,
                  'sms' => 'Success.'
            ]);
      }

      public function update(Request $request)
      {
            $social = Social::find($request->id);
            $social->icon = $request->icon;
            $social->link = $request->link;
            $social->order = $request->order;
            $social->status = $request->status;
            if ($social->save()) {
                  return response()->json([
                        'status' => 200,
                        'data' => $social,
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
