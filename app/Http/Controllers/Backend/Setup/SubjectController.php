<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Subject;

class SubjectController extends Controller
{
  public function view()
  {
    $data['allData'] = Subject::all();
    return view('backend.setup.student_subject.view_subject',$data);
  }

  public function add()
  {
    return view('backend.setup.student_subject.add_subject');
  }

  public function store(Request $request)
  {
    $this->validate($request,[
      'name' => 'required|unique:subjects,name',
    ],
    [
      'name.required' => 'Please insert subject name',
    ]
  );

    $data = new Subject();
    $data->name = $request->name;
    $data->save();

    return redirect()->route('setups.student.subject.view')->with('success_message_top', 'Data inserted Successfully!!');

  }

  public function edit($id)
  {
    $editData = Subject::find($id);
    return view('backend.setup.student_subject.add_subject',compact('editData'));
  }

  public function update(Request $request,$id)
  {

    $this->validate($request,[
      'name' => 'required|unique:subjects,name',
    ],
    [
      'name.required' => 'Please insert subject name',
    ]
  );

    $data = Subject::find($id);
    $data->name = $request->name;
    $data->save();

    // session()->flash('success', 'Data updated Successfully!!');
    return redirect()->route('setups.student.subject.view')->with('success_message_top', 'Data updated Successfully!!');


  }

  public function delete($id)
  {
    $class = StudentClass::find($id);

    $class->delete();

    return redirect()->route('setups.student.class.view')->with('success_message_top', 'Data deleted Successfully!!');
  }
}
