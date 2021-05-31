<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StudentClass;
use DB;

class StudentClassController extends Controller
{
  public function view()
  {
    $data['allData'] = StudentClass::all();
    return view('backend.setup.student_class.view_class',$data);
  }

  public function add()
  {
    return view('backend.setup.student_class.add_class');
  }

  public function store(Request $request)
  {
    $this->validate($request,[
      'name' => 'required|unique:student_classes,name',
    ],
    [
      'name.required' => 'Please insert class name',
    ]
  );

    $data = new StudentClass();
    $data->name = $request->name;
    $data->save();

    return redirect()->route('setups.student.class.view')->with('success_message_top', 'Data inserted Successfully!!');

  }

  public function edit($id)
  {
    $editData = StudentClass::find($id);
    return view('backend.setup.student_class.edit_class',compact('editData'));
  }

  public function update(Request $request,$id)
  {

    $this->validate($request,[
      'name' => 'required|unique:student_classes,name',
    ],
    [
      'name.required' => 'Please insert class name',
    ]
  );

    $data = StudentClass::find($id);
    $data->name = $request->name;
    $data->save();

    // session()->flash('success', 'Data updated Successfully!!');
    return redirect()->route('setups.student.class.view')->with('success_message_top', 'Data updated Successfully!!');


  }

  public function delete($id)
  {
    $class = StudentClass::find($id);

    $class->delete();

    return redirect()->route('setups.student.class.view')->with('success_message_top', 'Data deleted Successfully!!');
  }
}
