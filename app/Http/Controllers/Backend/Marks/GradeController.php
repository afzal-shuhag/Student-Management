<?php

namespace App\Http\Controllers\Backend\Marks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\MarksGrade;

class GradeController extends Controller
{
    public function view()
    {
      $data['allData'] = MarksGrade::all();
      return view('backend.marks.view_grade_marks',$data);
    }

    public function add()
    {
      return view('backend.marks.add_grade_marks');
    }

    public function store(Request $request)
    {
      $this->validate($request,[
        'grade_name' => 'required',
        'grade_point' => 'required',
        'start_marks' => 'required',
        'end_marks' => 'required',
        'start_point' => 'required',
        'end_point' => 'required',
        'remarks' => 'required',
      ]
      );

      $data = new MarksGrade();
      $data->grade_name = $request->grade_name;
      $data->grade_point = $request->grade_point;
      $data->start_marks = $request->start_marks;
      $data->end_marks = $request->end_marks;
      $data->start_point = $request->start_point;
      $data->end_point = $request->end_point;
      $data->remarks = $request->remarks;
      $data->save();

      return redirect()->route('marks.grade.view')->with('success_message_top',"Grade generated successfully!");
    }

    public function edit(Request $request,$id)
    {
      $data['editData'] = MarksGrade::find($id);
      return view('backend.marks.add_grade_marks',$data);
    }

    public function update(Request $request,$id)
    {
      $this->validate($request,[
        'grade_name' => 'required',
        'grade_point' => 'required',
        'start_marks' => 'required',
        'end_marks' => 'required',
        'start_point' => 'required',
        'end_point' => 'required',
        'remarks' => 'required',
      ]
      );

      $data = MarksGrade::find($id);;
      $data->grade_name = $request->grade_name;
      $data->grade_point = $request->grade_point;
      $data->start_marks = $request->start_marks;
      $data->end_marks = $request->end_marks;
      $data->start_point = $request->start_point;
      $data->end_point = $request->end_point;
      $data->remarks = $request->remarks;
      $data->save();

      return redirect()->route('marks.grade.view')->with('success_message_top',"Grade Updated successfully!");
    }
}
