<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Contact;
use DataTables;

class ContactController extends Controller
{
      public function __construct()
      {
            $this->middleware('auth');
      }

      public function index(Request $request)
      {
            if ($request->ajax()) {
                  $data = DB::table('contacts')->get();
                  return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('option', function ($row) {
                              $btn_edit = '<button onclick="editRow(' . $row->id . ', this)" class="btn" id="setting"><i class="fa-solid fa-gear fa-xl" style="color: #0190e9;"></i></button>';
                              return $btn_edit;
                        })
                        ->rawColumns(['option'])
                        ->make(true);
            }
            return view('admin.contact.index');
      }

      public function save(Request $request)
      {
            $contact = new Contact();
            $contact->contact = $request->contact;
            $contact->order = $request->order;

            if ($contact->save()) {
                  return response()->json([
                        'status' => 200,
                        'data' => $contact,
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
            $data = Contact::find($id);
            return response()->json([
                  'status' => 200,
                  'data' => $data,
                  'sms' => 'Success.'
            ]);
      }

      public function update(Request $request)
      {
            $contact = Contact::find($request->id);
            $contact->contact = $request->contact;
            $contact->order = $request->order;
            $contact->status = $request->status;
            if ($contact->save()) {
                  return response()->json([
                        'status' => 200,
                        'data' => $contact,
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
