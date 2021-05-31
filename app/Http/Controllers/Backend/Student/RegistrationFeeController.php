<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AssignStudent;
use App\Model\DiscountStudent;
use App\Model\StudentClass;
use App\Model\FeeAmount;
use App\Model\StudentGroup;
use App\Model\StudentShift;
use App\Model\StudentYear;
use App\User;
use DB;
use PDF;

class RegistrationFeeController extends Controller
{
  public function view(Request $request)
  {
    $data['years'] = StudentYear::orderBy('id','desc')->get();
    $data['classes'] = StudentClass::all();
    return view('backend.student.reg_fee.view_reg_fee', $data);
  }

  public function getStudent(Request $request)
  {
    $year_id = $request->year_id;
    $class_id = $request->class_id;
    if($year_id != ''){
      $where[] = ['year_id','like',$year_id.'%'];
    }
    if($class_id != ''){
      $where[] = ['class_id','like',$class_id.'%'];
    }
    $data['allStudent'] = AssignStudent::with(['discount'])->where('year_id',$year_id)->where('class_id',$class_id)->get();
    // $html['thsource'] = '<th>SL</th>';
    // $html['thsource'] = '<th>ID No</th>';
    // $html['thsource'] = '<th>Student Name</th>';
    // $html['thsource'] = '<th>Roll No</th>';
    // $html['thsource'] = '<th>Registration Fee</th>';
    // $html['thsource'] = '<th>Discount Amount</th>';
    // $html['thsource'] = '<th>Fee (This student)</th>';
    // $html['thsource'] = '<th>Action</th>';
    // foreach ($allStudent as $key => $value) {
      // $registrationFee = FeeAmount::where('fee_category_id','1')->where('student_class_id', $value->class_id)->first();
    //   $color = 'success';
    //
    //   $html[$key]['tdsource'] = '<td>'.($key+1).'</td>';
    //   $html[$key]['tdsource'] = '<td>'.$value['student']['id_no'].'</td>';
    //   $html[$key]['tdsource'] = '<td>'.$value['student']['name'].'</td>';
    //   $html[$key]['tdsource'] = '<td>'.$value->roll.'</td>';
    //   $html[$key]['tdsource'] = '<td>'.$registrationFee['amount'].'TK'.'</td>';
    //   $html[$key]['tdsource'] = '<td>'.$value['discount']['discount'].'</td>';
    //
    //   $originalfee = $registrationFee->amount;
    //   $discount = $value['discount']['discount'];
    //   $discountableFee = $originalfee*($discount/100);
    //   $finalfees = (int)$originalfee-(int)$discountableFee;
    //
    //   $html[$key]['tdsource'] = '<td>'.$finalfees.'TK'.'</td>';
    //   $html[$key]['tdsource'] = '<td>';
    //   $html[$key]['tdsource'] = ' <a class="btn btn-sm btn-'.$color.'" title="Payslip" target="_blank" href="'.route("student.reg.fee.payslip").'?class_id='.$value->class_id.'&student_id='.$value->student_id.'">Fee Slip</a>';
    //   $html[$key]['tdsource'] = '</td>';
    // }
    // return response()->json(@$html);
    return view('backend.student.reg_fee.view_reg_fee_list', $data);
  }

  public function payslip(Request $request)
  {
    $class_id = $request->class_id;
    $student_id = $request->student_id;

    $data['details'] = AssignStudent::where('student_id',$student_id)->where('class_id',$class_id)->first();
    $pdf = PDF::loadView('backend.student.reg_fee.reg_fee_slip', $data);
    $pdf->SetProtection(['copy', 'print'], '', 'pass');
    return $pdf->stream('document.pdf');
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
