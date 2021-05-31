<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StudentGroup;
use DB;

class StudentGroupController extends Controller
{
  public function view()
  {
    $data['allData'] = StudentGroup::all();
    return view('backend.setup.student_group.view_group',$data);
  }

  public function add()
  {
    return view('backend.setup.student_group.add_group');
  }

  public function store(Request $request)
  {
    $this->validate($request,[
      'name' => 'required|unique:student_groups,name',
    ],
    [
      'name.required' => 'Please insert group name',
    ]
  );

    $data = new StudentGroup();
    $data->name = $request->name;
    $data->save();

    return redirect()->route('setups.student.group.view')->with('success_message_top', 'Data inserted Successfully!!');

  }

  public function edit($id)
  {
    $editData = StudentGroup::find($id);
    return view('backend.setup.student_group.add_group',compact('editData'));
  }

  public function update(Request $request,$id)
  {

    $this->validate($request,[
      'name' => 'required|unique:student_groups,name',
    ],
    [
      'name.required' => 'Please insert group name',
    ]
  );

    $data = StudentGroup::find($id);
    $data->name = $request->name;
    $data->save();

    // session()->flash('success', 'Data updated Successfully!!');
    return redirect()->route('setups.student.group.view')->with('success_message_top', 'Data updated Successfully!!');


  }

  public function delete($id)
  {
    $class = StudentClass::find($id);

    $class->delete();

    return redirect()->route('setups.student.class.view')->with('success_message_top', 'Data deleted Successfully!!');
  }
}
