<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AccountOtherCost;
use App\Model\AccountEmployeeSalary;
use App\Model\AccountStudentFee;
use App\Model\StudentMarks;
use App\Model\MarksGrade;
use App\Model\ExamType;
use App\Model\StudentClass;
use App\Model\StudentYear;
use App\Model\EmployeeAttendance;
use App\User;
use PDF;

class ProfitController extends Controller
{
    public function view()
    {
      return view('backend.report.view_profit');
    }

    public function profit(Request $request)
    {
      $this->validate($request,[
        'start_date' => 'required',
        'end_date' => 'required',
      ]);

      $start_date = date('Y-m',strtotime($request->start_date));
      $end_date = date('Y-m',strtotime($request->end_date));
      $sdate = date('Y-m-d',strtotime($request->start_date));
      $edate = date('Y-m-d',strtotime($request->end_date));
      $student_fee = AccountStudentFee::whereBetween('date',[$start_date,$end_date])->sum('amount');
      $emp_salary = AccountEmployeeSalary::whereBetween('date',[$start_date,$end_date])->sum('amount');
      $other_cost = AccountOtherCost::whereBetween('date',[$sdate,$edate])->sum('amount');

      $total_cost = $emp_salary + $other_cost;
      $profit = $student_fee-$emp_salary;

      return view('backend.report.get_profit',compact('sdate','edate','student_fee','emp_salary','other_cost','total_cost','profit'));

    }

    public function pdf(Request $request)
    {
      $data['start_date'] = date('Y-m',strtotime($request->start_date));
      $data['end_date'] = date('Y-m',strtotime($request->end_date));
      $data['sdate'] = date('Y-m-d',strtotime($request->start_date));
      $data['edate'] = date('Y-m-d',strtotime($request->end_date));
      $pdf = PDF::loadView('backend.report.profit_report', $data);
      $pdf->SetProtection(['copy', 'print'], '', 'pass');
      return $pdf->stream('document.pdf');
    }

    public function markSheetView()
    {
      $data['years'] = StudentYear::all();
      $data['classes'] = StudentClass::all();
      $data['exam_types'] = ExamType::all();
      return view('backend.report.view_marksheet',$data);
    }

    public function markSheetGet(Request $request)
    {
      $this->validate($request,[
        'year_id' => 'required',
        'class_id' => 'required',
        'exam_type_id' => 'required',
        'id_no' => 'required',
      ]);

      $year_id = $request->year_id;
      $class_id = $request->class_id;
      $exam_type_id = $request->exam_type_id;
      $id_no = $request->id_no;

      $count_fail = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->where('marks','<','33')->get()->count();

      $singleStudent = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->first();

      if($singleStudent == true){
        $allMarks = StudentMarks::with(['assign_subject','year'])->where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->get();
        $allGrades = MarksGrade::all();

        return view('backend.report.marksheet_details',compact('allMarks','allGrades','count_fail'));
      }else{
        return redirect()->back()->with('error_message_top','Sorry! This citeria does not macth');
      }
    }

    public function attendanceView()
    {
      $data['employees'] = User::where('role','Employee')->get();
      return view('backend.report.view_attendance',$data);
    }

    public function attendanceGet(Request $request)
    {
      $employee_id =$request->employee_id;
      if($employee_id != ''){
        $where[] = ['employee_id',$employee_id];
      }
      $date =date('Y-m',strtotime($request->date));
      if($date != ''){
        $where[] = ['date','like',$date.'%'];
      }
      $singleAttendance = EmployeeAttendance::with(['user'])->where($where)->first();
      if($singleAttendance == true){
        $data['allData'] = EmployeeAttendance::with(['user'])->where($where)->orderBy('date','asc')->get();
        $data['absents'] = EmployeeAttendance::with(['user'])->where($where)->where('attend_status','Absent')->get()->count();
        $data['leaves'] = EmployeeAttendance::with(['user'])->where($where)->where('attend_status','Leave')->get()->count();
        $data['month'] = date('M Y',strtotime($request->date));
        $pdf = PDF::loadView('backend.report.attendance_report', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
      }else{
        return redirect()->back()->with('error_message_top','Sorry , Criteria Does not Match');
      }
    }

    public function resultView()
    {
      $data['years'] = StudentYear::all();
      $data['classes'] = StudentClass::all();
      $data['exam_types'] = ExamType::all();
      return view('backend.report.view_results',$data);
    }

    public function resultGet(Request $request)
    {
      $this->validate($request,[
        'year_id' => 'required',
        'class_id' => 'required',
        'exam_type_id' => 'required',
      ]);

      $year_id = $request->year_id;
      $class_id = $request->class_id;
      $exam_type_id = $request->exam_type_id;

      $singleResult = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->first();
      if($singleResult == true){
        $data['allData'] = StudentMarks::select('year_id','class_id','exam_type_id','student_id')->where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->groupBy('year_id')->groupBy('class_id')->groupBy('exam_type_id')->groupBy('student_id')->get();
        $pdf = PDF::loadView('backend.report.results_report', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
      }else{
        return redirect()->back()->with('error_message_top','Sorry , Criteria Does not Match');
      }
    }
}
