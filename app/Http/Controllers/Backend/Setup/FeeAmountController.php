<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\FeeAmount;
use App\Model\StudentClass;
use App\Model\StudentFee;
use DB;

class FeeAmountController extends Controller
{
  public function view()
  {
    $data['allData'] = FeeAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
    return view('backend.setup.student_fee_amount.view_fee_amount',$data);
  }

  public function add()
  {
    $data['student_fees'] = StudentFee::all();
    $data['student_classes'] = StudentClass::all();
    return view('backend.setup.student_fee_amount.add_fee_amount', $data);
  }

  public function store(Request $request)
  {
    $countClass = count($request->student_class_id);
    if($countClass != NULL){
      for ($i=0; $i < $countClass; $i++) {
        $amount = new FeeAmount();
        $amount->fee_category_id = $request->fee_category_id;
        $amount->student_class_id = $request->student_class_id[$i];
        $amount->amount = $request->amount[$i];
        $amount->save();
      }
    }
    return redirect()->route('setups.student.amount.view')->with('success_message_top', 'Data inserted Successfully!!');

  }

  public function edit($fee_category_id)
  {
    //$data['editData'] = FeeAmount::find($fee_category_id);
    $data['editData'] = FeeAmount::where('fee_category_id',$fee_category_id)->get();
    $data['student_fees'] = StudentFee::all();
    $data['student_classes'] = StudentClass::all();
    return view('backend.setup.student_fee_amount.edit_fee_amount',$data);
  }

  public function update(Request $request,$fee_category_id)
  {
    if($request->student_class_id == NULL){
      return redirect()->back()->with('error_message_top', 'You Have to Select Class');
    }else{
      FeeAmount::where('fee_category_id',$fee_category_id)->delete();
      $countClass = count($request->student_class_id);
      if($countClass != NULL){
        for ($i=0; $i < $countClass; $i++) {
          $amount = new FeeAmount();
          $amount->fee_category_id = $request->fee_category_id;
          $amount->student_class_id = $request->student_class_id[$i];
          $amount->amount = $request->amount[$i];
          $amount->save();
        }
      }
    }
    return redirect()->route('setups.student.amount.view')->with('success_message_top', 'Data updated Successfully!!');


  }

  public function delete($id)
  {
    $class = StudentClass::find($id);

    $class->delete();

    return redirect()->route('setups.student.class.view')->with('success_message_top', 'Data deleted Successfully!!');
  }

  public function details($fee_category_id)
  {
    $data['editData'] = FeeAmount::where('fee_category_id',$fee_category_id)->get();
    return view('backend.setup.student_fee_amount.details_fee_amount',$data);
  }
}
