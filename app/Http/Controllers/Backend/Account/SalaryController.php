<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AccountEmployeeSalary;
use App\Model\EmployeeAttendance;
use App\User;

class SalaryController extends Controller
{
  public function view()
  {
    $data['allData'] = AccountEmployeeSalary::all();
    return view('backend.account.employee.view_salary',$data);
  }

  public function add()
  {
    return view('backend.account.employee.add_salary');
  }

  public function getEmployee(Request $request)
  {
    $this->validate($request,[
      'date' => 'required',
    ]);

    $date = date('Y-m',strtotime($request->date));
    if($date != ''){
      $where[] = ['date','like',$date.'%'];
    }
    $data = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();

    return view('backend.account.employee.get_employee',compact('data','date','where'));
  }

    public function store(Request $request)
    {
      $date = date('Y-m', strtotime($request->date));
      AccountEmployeeSalary::where('date',$date)->delete();
      $checkdata = $request->checkmanage;

      if($checkdata != null){
        for ($i=0; $i < count($checkdata); $i++) {
          $data = new AccountEmployeeSalary();
          $data->date = $date;
          $index = $checkdata[$i];
          $data->employee_id = $request->employee_id[$index];
          $data->amount = $request->amount[$index];
          $data->save();
        }
      }
      if(!empty(@$data) || empty($checkdata)){
        return redirect()->route('account.salary.view')->with('success_message_top','Successfully Updated!');
      }else{
        return redirect()->back()->with('error_message_top','Data failed to save!!');
      }
    }
}
