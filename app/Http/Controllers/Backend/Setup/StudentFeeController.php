<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StudentFee;
use DB;

class StudentFeeController extends Controller
{
  public function view()
  {
    $data['allData'] = StudentFee::all();
    return view('backend.setup.student_fee.view_fee',$data);
  }

  public function add()
  {
    return view('backend.setup.student_fee.add_fee');
  }

  public function store(Request $request)
  {
    $this->validate($request,[
      'name' => 'required|unique:student_fees,name',
    ],
    [
      'name.required' => 'Please insert fee name',
    ]
  );

    $data = new StudentFee();
    $data->name = $request->name;
    $data->save();

    return redirect()->route('setups.student.fee.view')->with('success_message_top', 'Data inserted Successfully!!');

  }

  public function edit($id)
  {
    $editData = StudentFee::find($id);
    return view('backend.setup.student_fee.add_fee',compact('editData'));
  }

  public function update(Request $request,$id)
  {

    $this->validate($request,[
      'name' => 'required|unique:student_fees,name',
    ],
    [
      'name.required' => 'Please insert fee name',
    ]
  );

    $data = StudentFee::find($id);
    $data->name = $request->name;
    $data->save();

    // session()->flash('success', 'Data updated Successfully!!');
    return redirect()->route('setups.student.fee.view')->with('success_message_top', 'Data updated Successfully!!');


  }

  public function delete($id)
  {
    $class = StudentClass::find($id);

    $class->delete();

    return redirect()->route('setups.student.class.view')->with('success_message_top', 'Data deleted Successfully!!');
  }
}
