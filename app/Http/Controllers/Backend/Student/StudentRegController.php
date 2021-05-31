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

class StudentRegController extends Controller
{
    public function view()
    {
      $data['years'] = StudentYear::orderBy('id','desc')->get();
      $data['year_id'] = StudentYear::orderBy('id','desc')->first()->id;
      $data['class_id'] = StudentClass::orderBy('id','asc')->first()->id;
      $data['classes'] = StudentClass::all();
      $data['allData'] = AssignStudent::where('year_id',$data['year_id'])->where('class_id',$data['class_id'])->get();
      return view('backend.student.student_reg.view_student', $data);
    }

    public function studentSearch(Request $request)
    {
      $data['years'] = StudentYear::orderBy('id','desc')->get();
      $data['classes'] = StudentClass::all();
      $data['year_id'] = $request->year_id;
      $data['class_id'] = $request->class_id;
      $data['allData'] = AssignStudent::where('year_id',$data['year_id'])->where('class_id',$data['class_id'])->get();
      return view('backend.student.student_reg.view_student', $data);
    }

    public function add()
    {
      $data['years'] = StudentYear::all();
      $data['classes'] = StudentClass::all();
      $data['groups'] = StudentGroup::all();
      $data['shifts'] = StudentShift::all();
      return view('backend.student.student_reg.add_student', $data);
    }

    public function store(Request $request)
    {
      $this->validate($request,[
        'name' => 'required',
        'fname' => 'required',
        'mname' => 'required',
        'mobile' => 'required',
        'address' => 'required',
        'gender' => 'required',
        'religion' => 'required',
        'dob' => 'required',
        'year_id' => 'required',
        'class_id' => 'required',
        'image' => 'required|image',
      ]
      );
      DB::transaction(function() use($request){
        $checkYear = StudentYear::find($request->year_id)->name;
        $student = User::where('role','Student')->orderBy('id','desc')->first();
        if($student == null){
          $firstReg = 0;
          $student_id = $firstReg+1;
          if($student_id<10){
            $id_no = '000'.$student_id;
          }elseif($student_id<100){
            $id_no = '00'.$student_id;
          }elseif($student_id<1000){
            $id_no = '0'.$student_id;
          }
        }else{
          $student = User::where('role','Student')->orderBy('id','desc')->first()->id;
          $student_id = $student+1;
          if($student_id<10){
            $id_no = '000'.$student_id;
          }elseif($student_id<100){
            $id_no = '00'.$student_id;
          }elseif($student_id<1000){
            $id_no = '0'.$student_id;
          }
        }
        $final_id_no = $checkYear.$id_no;

        $user = new User();
        $code = rand(0000,9999);
        $user->code = $code;
        $user->password = bcrypt($code);
        $user->id_no = $final_id_no;
        $user->name = $request->name;
        $user->role = 'Student';
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->religion = $request->religion;
        $user->dob = date('Y-m-d', strtotime($request->dob));
        if($request->file('image')){
          $file = $request->file('image');
          // @unlink(public_path('upload/user_images/' . $data->image));
          $filename = date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/student_images'), $filename);
          $user['image'] = $filename;
        }
        $user->save();

        $assign_student = new AssignStudent();
        $assign_student->student_id = $user->id;
        $assign_student->year_id = $request->year_id;
        $assign_student->class_id = $request->class_id;
        $assign_student->group_id = $request->group_id;
        $assign_student->shift_id = $request->shift_id;
        $assign_student->save();

        $discount_student = new DiscountStudent();
        $discount_student->assign_student_id = $assign_student->id;
        $discount_student->discount = $request->discount;
        $discount_student->fee_category_id = '1';
        $discount_student->save();

      });
      return redirect()->route('students.registration.view')->with('success_message_top','Student Registration completedsuccessfully!');
    }

    public function edit($student_id)
    {
      $data['editData'] = AssignStudent::with('student','discount')->where('student_id',$student_id)->first();
      $data['years'] = StudentYear::all();
      $data['classes'] = StudentClass::all();
      $data['groups'] = StudentGroup::all();
      $data['shifts'] = StudentShift::all();
      return view('backend.student.student_reg.add_student', $data);
    }

    public function update(Request $request, $student_id)
    {
      DB::transaction(function() use($request,$student_id){
        $user = User::where('id',$student_id)->first();
        $user->name = $request->name;
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->religion = $request->religion;
        $user->dob = date('Y-m-d', strtotime($request->dob));
        if($request->file('image')){
          $file = $request->file('image');
          @unlink(public_path('upload/student_images/' . $user->image));
          $filename = date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/student_images'), $filename);
          $user['image'] = $filename;
        }
        $user->save();

        $assign_student = AssignStudent::where('id',$request->id)->where('student_id',$student_id)->first();
        $assign_student->year_id = $request->year_id;
        $assign_student->class_id = $request->class_id;
        $assign_student->group_id = $request->group_id;
        $assign_student->shift_id = $request->shift_id;
        $assign_student->save();

        $discount_student = DiscountStudent::where('assign_student_id',$request->id)->first();

        $discount_student->discount = $request->discount;
        $discount_student->save();

      });
      return redirect()->route('students.registration.view')->with('success_message_top','Student Information updated successfully!');
    }

    public function promotion($student_id)
    {
      $data['editData'] = AssignStudent::with('student','discount')->where('student_id',$student_id)->first();
      $data['years'] = StudentYear::all();
      $data['classes'] = StudentClass::all();
      $data['groups'] = StudentGroup::all();
      $data['shifts'] = StudentShift::all();
      return view('backend.student.student_reg.promotion_student', $data);

    }

    public function promotionStore(Request $request, $student_id)
    {
      DB::transaction(function() use($request,$student_id){
        $user = User::where('id',$student_id)->first();
        $user->name = $request->name;
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->religion = $request->religion;
        $user->dob = date('Y-m-d', strtotime($request->dob));
        if($request->file('image')){
          $file = $request->file('image');
          @unlink(public_path('upload/student_images/' . $user->image));
          $filename = date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/student_images'), $filename);
          $user['image'] = $filename;
        }
        $user->save();

        $assign_student = new AssignStudent();
        $assign_student->student_id = $student_id;
        $assign_student->year_id = $request->year_id;
        $assign_student->class_id = $request->class_id;
        $assign_student->group_id = $request->group_id;
        $assign_student->shift_id = $request->shift_id;
        $assign_student->save();

        $discount_student = new DiscountStudent();
        $discount_student->assign_student_id = $assign_student->id;
        $discount_student->discount = $request->discount;
        $discount_student->fee_category_id = '1';
        $discount_student->save();

      });
      return redirect()->route('students.registration.view')->with('success_message_top','Student Promoted successfully!');
    }

    public function details($student_id)
    {
      $data['details'] = AssignStudent::with('student','discount')->where('student_id',$student_id)->first();
    	$pdf = PDF::loadView('backend.student.student_reg.student_details_pdf', $data);
    	$pdf->SetProtection(['copy', 'print'], '', 'pass');
    	return $pdf->stream('document.pdf');
    }

   function generate_pdf() {

  }

}
