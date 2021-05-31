<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ExamType;

class ExamTypeController extends Controller
{
  public function view()
  {
    $data['allData'] = ExamType::all();
    return view('backend.setup.exam_type.view_exam_type',$data);
  }

  public function add()
  {
    return view('backend.setup.exam_type.add_exam_type');
  }

  public function store(Request $request)
  {
    $this->validate($request,[
      'name' => 'required|unique:exam_types,name',
    ],
    [
      'name.required' => 'Please insert year name',
    ]
  );

    $data = new ExamType();
    $data->name = $request->name;
    $data->save();

    return redirect()->route('setups.student.exam.type.view')->with('success_message_top', 'Data inserted Successfully!!');

  }

  public function edit($id)
  {
    $editData = ExamType::find($id);
    return view('backend.setup.exam_type.add_exam_type',compact('editData'));
  }

  public function update(Request $request,$id)
  {

    $this->validate($request,[
      'name' => 'required|unique:exam_types,name',
    ],
    [
      'name.required' => 'Please insert year name',
    ]
  );

    $data = ExamType::find($id);
    $data->name = $request->name;
    $data->save();

    // session()->flash('success', 'Data updated Successfully!!');
    return redirect()->route('setups.student.exam.type.view')->with('success_message_top', 'Data updated Successfully!!');


  }

  // public function delete($id)
  // {
  //   $class = StudentClass::find($id);
  //
  //   $class->delete();
  //
  //   return redirect()->route('setups.student.class.view')->with('success_message_top', 'Data deleted Successfully!!');
  // }
}
