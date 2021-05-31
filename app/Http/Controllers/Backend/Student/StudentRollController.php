<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AssignStudent;
use App\Model\DiscountStudent;
use App\Model\StudentClass;
use App\Model\StudentGroup;
use App\Model\StudentShift;
use App\Model\StudentYear;
use App\User;
use DB;
use PDF;


class StudentRollController extends Controller
{
  public function view()
  {
    $data['years'] = StudentYear::orderBy('id','desc')->get();
    $data['classes'] = StudentClass::all();
    return view('backend.student.roll_generate.view_roll_generate', $data);
  }

  public function getStudent(Request $request)
  {
    $getStudent = AssignStudent::with(['student'])->where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();
    return response()->json($getStudent);
  }

  public function store(Request $request)
  {
    $this->validate($request,[
      'year_id' => 'required',
      'class_id' => 'required',
    ]
    );

    $year_id = $request->year_id;
    $class_id = $request->class_id;
    $count = sizeof($request->student_id);
    if($request->student_id != null){
      for ($i=0; $i < $count; $i++) {
        AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->where('student_id',$request->student_id[$i])->update(['roll' => $request->roll[$i]]);
        // $student = AssignStudent::where('class_id',$class_id)->where('year_id',$year_id)->where('student_id',$request->student_id[$i])->first();
        // $student->roll = $request->roll[$i];
        // $student->save();
      }
    }else{
      return redirect()->back()->with('error_message_top','Sorry! failed to identify student');
    }
    return redirect()->route('students.roll.view')->with('success_message_top',"Roll generated successfully!");
  }
}
