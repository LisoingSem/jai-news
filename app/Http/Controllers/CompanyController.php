<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Company;
use DataTables;

class CompanyController extends Controller
{
      public function __construct()
      {
          $this->middleware('auth');
      }
  
      public function index(Request $request)
      {
            if ($request->ajax()) {
                  $data = DB::table('companies')
                        ->orderBy('id', 'DESC')
                        ->get();
                  return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('option', function ($row) {
                              $btn_edit = '<button onclick="editRow(' . $row->id . ', this)" class="btn" id="setting"><i class="fa-solid fa-gear fa-xl" style="color: #0190e9;"></i></button>';
                              return $btn_edit;
                        })
                        ->addColumn('photo', function ($row) {
                              return '<img onclick="imgViewer(this, \'' . asset($row->logo) . '\')" src="' . asset($row->logo) . '" alt="photo" width="30px" height="30px">';
                        })
                        ->rawColumns(['option', 'photo'])
                        ->make(true);
            }
            return view('admin.company.index');
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
            $company = new Company();
            $company->name = $request->name;
            $company->details = $request->details;
            $company->copyright = $request->copyright;
            $company->address = $request->address;
            if ($request->hasFile('logo')) {
                  $company->logo = $request->logo->store('assets/companies', 'custom');
            }

            if ($company->save()) {
                  return response()->json([
                        'status' => 200,
                        'data' => $company,
                        'sms' => 'CompanyInfo saved successfull.'
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
            $data = Company::find($id);
            return response()->json([
                  'status' => 200,
                  'data' => $data,
                  'sms' => 'Success.'
            ]);
      }

      public function update(Request $request)
      {
            $company = Company::find($request->id);
            $company->name = $request->name;
            $company->details = $request->details;
            $company->copyright = $request->copyright;
            $company->address = $request->address;
            $company->status = $request->status;
            if ($request->hasFile('logo')) {
                  $company->logo = $request->logo->store('assets/companies', 'custom');
                  // $article->thumbnail = "fghjkl.jpg";
            }
            if ($company->save()) {
                  return response()->json([
                        'status' => 200,
                        'data' => $company,
                        'sms' => 'CompanyInfo updated successfull.'
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
