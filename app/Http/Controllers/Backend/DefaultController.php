<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AssignStudent;
use App\Model\DiscountStudent;
use App\Model\StudentClass;
use App\Model\StudentGroup;
use App\Model\StudentShift;
use App\Model\StudentYear;
use App\Model\StudentMarks;
use App\Model\AssignSubject;
use App\User;
use DB;
use PDF;

class DefaultController extends Controller
{
    public function get_students(Request $request)
    {
      $class_id = $request->class_id;
      $year_id = $request->year_id;
      $allData = AssignStudent::with(['student'])->where('class_id',$class_id)->where('year_id',$year_id)->get();
      return response()->json($allData);
    }

    public function get_subjects(Request $request)
    {
      $class_id = $request->class_id;
      $allData = AssignSubject::with(['subject'])->where('class_id',$class_id)->get();
      return response()->json($allData);
    }

    public function get_marks(Request $request)
    {
      $class_id = $request->class_id;
      $year_id = $request->year_id;
      $assign_subject_id = $request->assign_subject_id;
      $exam_type_id = $request->exam_types_id;

      $get_student = StudentMarks::with(['student'])->where('year_id',$year_id)->where('assign_subject_id',$assign_subject_id)->where('exam_type_id',$exam_type_id)->where('year_id',$year_id)->get();
      return response()->json($get_student);
    }
}
