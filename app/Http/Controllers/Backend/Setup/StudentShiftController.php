<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StudentShift;
use DB;

class StudentShiftController extends Controller
{
  public function view()
  {
    $data['allData'] = StudentShift::all();
    return view('backend.setup.student_shift.view_shift',$data);
  }

  public function add()
  {
    return view('backend.setup.student_shift.add_shift');
  }

  public function store(Request $request)
  {
    $this->validate($request,[
      'name' => 'required|unique:student_shifts,name',
    ],
    [
      'name.required' => 'Please insert shift name',
    ]
  );

    $data = new StudentShift();
    $data->name = $request->name;
    $data->save();

    return redirect()->route('setups.student.shift.view')->with('success_message_top', 'Data inserted Successfully!!');

  }

  public function edit($id)
  {
    $editData = StudentShift::find($id);
    return view('backend.setup.student_shift.add_shift',compact('editData'));
  }

  public function update(Request $request,$id)
  {

    $this->validate($request,[
      'name' => 'required|unique:student_shifts,name',
    ],
    [
      'name.required' => 'Please insert shift name',
    ]
  );

    $data = StudentShift::find($id);
    $data->name = $request->name;
    $data->save();

    // session()->flash('success', 'Data updated Successfully!!');
    return redirect()->route('setups.student.shift.view')->with('success_message_top', 'Data updated Successfully!!');


  }

  public function delete($id)
  {
    $class = StudentClass::find($id);

    $class->delete();

    return redirect()->route('setups.student.class.view')->with('success_message_top', 'Data deleted Successfully!!');
  }
}
