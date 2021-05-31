<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\FeeAmount;
use App\Model\StudentClass;
use App\Model\StudentFee;
use App\Model\AssignSubject;
use App\Model\Subject;
use DB;

class AssignSubjectController extends Controller
{
  public function view()
  {
    $data['allData'] = AssignSubject::select('class_id')->groupBy('class_id')->get();
    return view('backend.setup.assign_subject.view_assign_subject',$data);
  }

  public function add()
  {
    $data['subjects'] = Subject::all();
    $data['student_classes'] = StudentClass::all();
    return view('backend.setup.assign_subject.add_assign_subject', $data);
  }

  public function store(Request $request)
  {
    $countSubject = count($request->subject_id);
    if($countSubject != NULL){
      for ($i=0; $i < $countSubject; $i++) {
        $assign_subject = new AssignSubject();
        $assign_subject->class_id = $request->class_id;
        $assign_subject->subject_id = $request->subject_id[$i];
        $assign_subject->full_mark = $request->full_mark[$i];
        $assign_subject->pass_mark = $request->pass_mark[$i];
        $assign_subject->subjective_mark = $request->subjective_mark[$i];
        $assign_subject->save();
      }
    }
    return redirect()->route('setups.student.assign.subject.view')->with('success_message_top', 'Data inserted Successfully!!');

  }

  public function edit($class_id)
  {
    //$data['editData'] = FeeAmount::find($fee_category_id);
    $data['editData'] = AssignSubject::where('class_id',$class_id)->get();
    $data['subjects'] = Subject::all();
    $data['student_classes'] = StudentClass::all();
    return view('backend.setup.assign_subject.edit_assign_subject',$data);
  }

  public function update(Request $request,$class_id)
  {
    if($request->subject_id == NULL){
      return redirect()->back()->with('error_message_top', 'You Have to Select Subject');
    }else{
      AssignSubject::whereNotIn('subject_id',$request->subject_id)->where('class_id',$request->class_id)->delete();
      foreach ($request->subject_id as $key => $value) {
        $assign_subject_exist = AssignSubject::where('subject_id',$request->subject_id[$key])->where('class_id',$request->class_id)->first();
        if($assign_subject_exist != null){
          $assign_subject = $assign_subject_exist;
        }else{
          $assign_subject =  new AssignSubject();
        }
        $assign_subject->class_id = $request->class_id;
        $assign_subject->subject_id = $request->subject_id[$key];
        $assign_subject->full_mark = $request->full_mark[$key];
        $assign_subject->pass_mark = $request->pass_mark[$key];
        $assign_subject->subjective_mark = $request->subjective_mark[$key];
        $assign_subject->save();
      }
    }
    return redirect()->route('setups.student.assign.subject.view')->with('success_message_top', 'Data updated Successfully!!');

  }

  public function delete($id)
  {
    $class = StudentClass::find($id);

    $class->delete();

    return redirect()->route('setups.student.class.view')->with('success_message_top', 'Data deleted Successfully!!');
  }

  public function details($class_id)
  {
    $data['details'] = AssignSubject::where('class_id',$class_id)->get();
    return view('backend.setup.assign_subject.details_assign_subject',$data);
  }
}
