<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use DB;
use DataTables;

class AdController extends Controller
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

      public function index(Request $request)
      {
            if ($request->ajax()) {
                  $data = DB::table('ads')->orderBy('id', 'DESC');
                  return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('option', function ($row) {
                              $edit = '<button onclick="editRow(' . $row->id . ', this)" class="btn"><i class="fa-solid fa-gear fa-xl" style="color: #0190e9;"></i></button>';
                              // $edit = '<button onclick="editRow(' . $row->id . ', this)" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></button>';
                              return $edit;
                        })
                        ->addColumn('photo', function ($row) {
                              return '<img onclick="imgViewer(this, \'' . asset($row->thumbnail) . '\')" src="' . asset($row->thumbnail) . '" alt="photo" width="30px" height="30px">';
                        })
                        ->rawColumns(['option', 'photo'])
                        ->make(true);
            }
            return view('admin.ads.index');
      }

      public function create()
      {
            return view('admin.ad.index');
      }

      public function save(Request $request)
      {
            $ad = new Ad();
            $ad->link = $request->link;
            $ad->location = $request->location;
            $ad->status = $request->status;
            $ad->order = $request->order;
            if ($request->hasFile('thumbnail')) {
                  $ad->thumbnail = $request->thumbnail->store('assets/ab_images', 'custom');
            }

            if ($ad->save()) {
                  return response()->json([
                        'status' => 200,
                        'data' => $ad,
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

      public function edit(Request $request, $id)
      {
            $data = Ad::find($id);
            return response()->json([
                  'status' => 200,
                  'data' => $data,
                  'sms' => 'Success.'
            ]);
      }

      public function update(Request $request)
      {
            $ad = Ad::find($request->id);
            $ad->link = $request->link;
            $ad->location = $request->location;
            $ad->status = $request->status;
            $ad->order = $request->order;
            if ($request->hasFile('thumbnail')) {
                  $ad->thumbnail = $request->thumbnail->store('assets/ab_images', 'custom');
            }

            if ($ad->save()) {
                  return response()->json([
                        'status' => 200,
                        'data' => $ad,
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
}
