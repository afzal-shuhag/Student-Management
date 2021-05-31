<?php

namespace App\Http\Controllers\Backend\Marks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AssignStudent;
use App\Model\ExamType;
use App\Model\StudentClass;
use App\Model\StudentGroup;
use App\Model\StudentShift;
use App\Model\StudentYear;
use App\Model\StudentMarks;
use App\User;
use DB;
use PDF;

class MarksController extends Controller
{
  public function add()
  {
    $data['years'] = StudentYear::orderBy('id','desc')->get();
    $data['classes'] = StudentClass::all();
    $data['exam_types'] = ExamType::all();
    return view('backend.marks.add_marks',$data);
  }

  public function store(Request $request)
  {
    $this->validate($request,[
      'year_id' => 'required',
      'class_id' => 'required',
    ]
    );

    $count = sizeof($request->student_id);
    if($request->student_id != null){
      for ($i=0; $i < $count; $i++) {
        $data = new StudentMarks();
        $data->year_id = $request->year_id;
        $data->class_id = $request->class_id;
        $data->assign_subject_id = $request->assign_subject_id;
        $data->exam_type_id = $request->exam_types_id;
        $data->student_id = $request->student_id[$i];
        $data->id_no = $request->id_no[$i];
        $data->marks = $request->marks[$i];
        $data->save();
      }
    }else{
      return redirect()->back()->with('error_message_top','Sorry! failed to identify student');
    }
    return redirect()->back()->with('success_message_top',"Marks entered successfully!");
  }

  public function edit()
  {
    $data['years'] = StudentYear::orderBy('id','desc')->get();
    $data['classes'] = StudentClass::all();
    $data['exam_types'] = ExamType::all();
    return view('backend.marks.edit_marks',$data);
  }

  public function update(Request $request)
  {
    $class_id = $request->class_id;
    $year_id = $request->year_id;
    $assign_subject_id = $request->assign_subject_id;
    $exam_type_id = $request->exam_types_id;

    StudentMarks::where('year_id',$year_id)->where('assign_subject_id',$assign_subject_id)->where('exam_type_id',$exam_type_id)->where('year_id',$year_id)->delete();

    $count = sizeof($request->student_id);
    if($request->student_id != null){
      for ($i=0; $i < $count; $i++) {
        $data = new StudentMarks();
        $data->year_id = $request->year_id;
        $data->class_id = $request->class_id;
        $data->assign_subject_id = $request->assign_subject_id;
        $data->exam_type_id = $request->exam_types_id;
        $data->student_id = $request->student_id[$i];
        $data->id_no = $request->id_no[$i];
        $data->marks = $request->marks[$i];
        $data->save();
      }
    }else{
      return redirect()->back()->with('error_message_top','Sorry! failed to identify student');
    }
    return redirect()->back()->with('success_message_top',"Marks Updated successfully!");
  }
}
