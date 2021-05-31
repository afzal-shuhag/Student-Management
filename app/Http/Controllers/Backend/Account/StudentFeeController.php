<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AssignStudent;
use App\Model\DiscountStudent;
use App\Model\StudentClass;
use App\Model\FeeAmount;
use App\Model\StudentGroup;
use App\Model\StudentShift;
use App\Model\StudentYear;
use App\Model\AccountStudentFee;
use App\Model\StudentFee;
use App\User;
use DB;
use PDF;

class StudentFeeController extends Controller
{
    public function view()
    {
      $data['allData'] = AccountStudentFee::all();
      return view('backend.account.student.view_fee',$data);
    }

    public function add()
    {
      $data['classes'] = StudentClass::all();
      $data['fee_categories'] = StudentFee::all();
      $data['years'] = StudentYear::orderBy('id','DESC')->get();
      return view('backend.account.student.add_fee',$data);
    }

    public function getStudent(Request $request)
    {
      $this->validate($request,[
        'year_id' => 'required',
        'class_id' => 'required|unique:users,email',
        'fee_category_id' => 'required',
        'date' => 'required',
      ]);

      $year_id = $request->year_id;
      $class_id = $request->class_id;
      $fee_category_id = $request->fee_category_id;
      $date = date('Y-m',strtotime($request->date));
      $data = AssignStudent::with(['discount'])->where('year_id',$year_id)->where('class_id',$class_id)->get();



        return view('backend.account.student.get_student',compact('year_id','class_id','fee_category_id','date','data'));
      }

      public function store(Request $request)
      {
        $date = date('Y-m', strtotime($request->date));
        AccountStudentFee::where('class_id',$request->class_id)->where('year_id',$request->year_id)->where('fee_category_id',$request->fee_category_id)->where('date',$date)->delete();
        $checkdata = $request->checkmanage;

        if($checkdata != null){
          for ($i=0; $i < count($checkdata); $i++) {
            $data = new AccountStudentFee();
            $data->year_id = $request->year_id;
            $data->class_id = $request->class_id;
            $data->fee_category_id = $request->fee_category_id;
            $data->date = $date;
            $index = $checkdata[$i];
            $data->student_id = $request->student_id[$index];
            $data->amount = $request->amount[$index];
            $data->save();
          }
        }
        if(!empty(@$data) || empty($checkdata)){
          return redirect()->route('account.fee.view')->with('success_message_top','Successfully Updated!');
        }else{
          return redirect()->back()->with('error_message_top','Data failed to save!!');
        }
      }

}
