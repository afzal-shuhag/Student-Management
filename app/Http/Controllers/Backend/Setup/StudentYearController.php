<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StudentYear;
use DB;

class StudentYearController extends Controller
{
  public function view()
  {
    $data['allData'] = StudentYear::all();
    return view('backend.setup.student_year.view_year',$data);
  }

  public function add()
  {
    return view('backend.setup.student_year.add_year');
  }

  public function store(Request $request)
  {
    $this->validate($request,[
      'name' => 'required|unique:student_years,name',
    ],
    [
      'name.required' => 'Please insert year name',
    ]
  );

    $data = new StudentYear();
    $data->name = $request->name;
    $data->save();

    return redirect()->route('setups.student.year.view')->with('success_message_top', 'Data inserted Successfully!!');

  }

  public function edit($id)
  {
    $editData = StudentYear::find($id);
    return view('backend.setup.student_year.add_year',compact('editData'));
  }

  public function update(Request $request,$id)
  {

    $this->validate($request,[
      'name' => 'required|unique:student_years,name',
    ],
    [
      'name.required' => 'Please insert year name',
    ]
  );

    $data = StudentYear::find($id);
    $data->name = $request->name;
    $data->save();

    // session()->flash('success', 'Data updated Successfully!!');
    return redirect()->route('setups.student.year.view')->with('success_message_top', 'Data updated Successfully!!');


  }

  public function delete($id)
  {
    $class = StudentClass::find($id);

    $class->delete();

    return redirect()->route('setups.student.class.view')->with('success_message_top', 'Data deleted Successfully!!');
  }
}
