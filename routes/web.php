<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('auth.login');
// });
// Route::get('/register', function () {
//     return redirect('/login');
// });
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

  // Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){

    Route::prefix('users')->group(function(){
        Route::get('/view', 'Backend\UserController@view')->name('users.view');
        Route::get('/add', 'Backend\UserController@add')->name('users.add');
        Route::post('/store', 'Backend\UserController@store')->name('users.store');
        Route::get('/edit/{id}', 'Backend\UserController@edit')->name('users.edit');
        Route::post('/update/{id}', 'Backend\UserController@update')->name('users.update');
        Route::post('/delete/{id}', 'Backend\UserController@delete')->name('users.delete');
    });

    Route::prefix('profiles')->group(function(){
        Route::get('/view', 'Backend\ProfileController@view')->name('profiles.view');
        Route::get('/edit', 'Backend\ProfileController@edit')->name('profiles.edit');
        Route::post('/update/{id}', 'Backend\ProfileController@update')->name('profiles.update');
        Route::get('/password/view', 'Backend\ProfileController@passwordView')->name('profiles.password.view');
        Route::post('/password/update', 'Backend\ProfileController@passwordUpdate')->name('profiles.password.update');
    });

    Route::prefix('setups')->group(function(){
      //Student Class
        Route::get('/student/class/view', 'Backend\Setup\StudentClassController@view')->name('setups.student.class.view');
        Route::get('/student/class/add', 'Backend\Setup\StudentClassController@add')->name('setups.student.class.add');
        Route::post('/student/class/store', 'Backend\Setup\StudentClassController@store')->name('setups.student.class.store');
        Route::get('/student/class/edit/{id}', 'Backend\Setup\StudentClassController@edit')->name('setups.student.class.edit');
        Route::post('/student/class/update/{id}', 'Backend\Setup\StudentClassController@update')->name('setups.student.class.update');
        Route::post('/student/class/delete/{id}', 'Backend\Setup\StudentClassController@delete')->name('setups.student.class.delete');

        //Student Year
        Route::get('/student/year/view', 'Backend\Setup\StudentYearController@view')->name('setups.student.year.view');
        Route::get('/student/year/add', 'Backend\Setup\StudentYearController@add')->name('setups.student.year.add');
        Route::post('/student/year/store', 'Backend\Setup\StudentYearController@store')->name('setups.student.year.store');
        Route::get('/student/year/edit/{id}', 'Backend\Setup\StudentYearController@edit')->name('setups.student.year.edit');
        Route::post('/student/year/update/{id}', 'Backend\Setup\StudentYearController@update')->name('setups.student.year.update');
        Route::post('/student/year/delete/{id}', 'Backend\Setup\StudentYearController@delete')->name('setups.student.year.delete');

        //Student Group
        Route::get('/student/group/view', 'Backend\Setup\StudentGroupController@view')->name('setups.student.group.view');
        Route::get('/student/group/add', 'Backend\Setup\StudentGroupController@add')->name('setups.student.group.add');
        Route::post('/student/group/store', 'Backend\Setup\StudentGroupController@store')->name('setups.student.group.store');
        Route::get('/student/group/edit/{id}', 'Backend\Setup\StudentGroupController@edit')->name('setups.student.group.edit');
        Route::post('/student/group/update/{id}', 'Backend\Setup\StudentGroupController@update')->name('setups.student.group.update');
        Route::post('/student/group/delete/{id}', 'Backend\Setup\StudentGroupController@delete')->name('setups.student.group.delete');

        //Student shift
        Route::get('/student/shift/view', 'Backend\Setup\StudentShiftController@view')->name('setups.student.shift.view');
        Route::get('/student/shift/add', 'Backend\Setup\StudentShiftController@add')->name('setups.student.shift.add');
        Route::post('/student/shift/store', 'Backend\Setup\StudentShiftController@store')->name('setups.student.shift.store');
        Route::get('/student/shift/edit/{id}', 'Backend\Setup\StudentShiftController@edit')->name('setups.student.shift.edit');
        Route::post('/student/shift/update/{id}', 'Backend\Setup\StudentShiftController@update')->name('setups.student.shift.update');
        Route::post('/student/shift/delete/{id}', 'Backend\Setup\StudentShiftController@delete')->name('setups.student.shift.delete');

        //Student fee
        Route::get('/student/category/fee/view', 'Backend\Setup\StudentFeeController@view')->name('setups.student.fee.view');
        Route::get('/student/fee/category/add', 'Backend\Setup\StudentFeeController@add')->name('setups.student.fee.add');
        Route::post('/student/fee/category/store', 'Backend\Setup\StudentFeeController@store')->name('setups.student.fee.store');
        Route::get('/student/fee/category/edit/{id}', 'Backend\Setup\StudentFeeController@edit')->name('setups.student.fee.edit');
        Route::post('/student/fee/category/update/{id}', 'Backend\Setup\StudentFeeController@update')->name('setups.student.fee.update');
        Route::post('/student/fee/category/delete/{id}', 'Backend\Setup\StudentFeeController@delete')->name('setups.student.fee.delete');

        //Amount fee
        Route::get('/student/category/amount/view', 'Backend\Setup\FeeAmountController@view')->name('setups.student.amount.view');
        Route::get('/student/amount/category/add', 'Backend\Setup\FeeAmountController@add')->name('setups.student.amount.add');
        Route::post('/student/amount/category/store', 'Backend\Setup\FeeAmountController@store')->name('setups.student.amount.store');
        Route::get('/student/amount/category/edit/{fee_category_id}', 'Backend\Setup\FeeAmountController@edit')->name('setups.student.amount.edit');
        Route::get('/student/amount/category/details/{fee_category_id}', 'Backend\Setup\FeeAmountController@details')->name('setups.student.amount.details');
        Route::post('/student/amount/category/update/{fee_category_id}', 'Backend\Setup\FeeAmountController@update')->name('setups.student.amount.update');
        Route::post('/student/amount/category/delete/{fee_category_id}', 'Backend\Setup\FeeAmountController@delete')->name('setups.student.amount.delete');

        //Exam Type
        Route::get('/exam/type/view', 'Backend\Setup\ExamTypeController@view')->name('setups.student.exam.type.view');
        Route::get('/exam/type/add', 'Backend\Setup\ExamTypeController@add')->name('setups.student.exam.type.add');
        Route::post('/exam/type/store', 'Backend\Setup\ExamTypeController@store')->name('setups.student.exam.type.store');
        Route::get('/exam/type/edit/{id}', 'Backend\Setup\ExamTypeController@edit')->name('setups.student.exam.type.edit');
        Route::post('/exam/type/update/{id}', 'Backend\Setup\ExamTypeController@update')->name('setups.student.exam.type.update');
        // Route::post('/exam/type/delete/{id}', 'Backend\Setup\ExamTypeController@delete')->name('setups.student.exam.type.delete');

        //Subjects
        Route::get('/student/subject/view', 'Backend\Setup\SubjectController@view')->name('setups.student.subject.view');
        Route::get('/student/subject/add', 'Backend\Setup\SubjectController@add')->name('setups.student.subject.add');
        Route::post('/student/subject/store', 'Backend\Setup\SubjectController@store')->name('setups.student.subject.store');
        Route::get('/student/subject/edit/{id}', 'Backend\Setup\SubjectController@edit')->name('setups.student.subject.edit');
        Route::post('/student/subject/update/{id}', 'Backend\Setup\SubjectController@update')->name('setups.student.subject.update');
        Route::post('/student/subject/delete/{id}', 'Backend\Setup\SubjectController@delete')->name('setups.student.subject.delete');

        //Assign Subjects
        Route::get('/student/assign/subject/view', 'Backend\Setup\AssignSubjectController@view')->name('setups.student.assign.subject.view');
        Route::get('/student/assign/subject/add', 'Backend\Setup\AssignSubjectController@add')->name('setups.student.assign.subject.add');
        Route::post('/student/assign/subject/store', 'Backend\Setup\AssignSubjectController@store')->name('setups.student.assign.subject.store');
        Route::get('/student/assign/subject/edit/{class_id}', 'Backend\Setup\AssignSubjectController@edit')->name('setups.student.assign.subject.edit');
        Route::post('/student/assign/subject/update/{class_id}', 'Backend\Setup\AssignSubjectController@update')->name('setups.student.assign.subject.update');
        Route::post('/student/assign/subject/delete/{class_id}', 'Backend\Setup\AssignSubjectController@delete')->name('setups.student.assign.subject.delete');
        Route::get('/student/assign/subject/details/{class_id}', 'Backend\Setup\AssignSubjectController@details')->name('setups.student.assign.subject.details');

        //Designation
        Route::get('/student/designation/view', 'Backend\Setup\DesignationController@view')->name('setups.student.designation.view');
        Route::get('/student/designation/add', 'Backend\Setup\DesignationController@add')->name('setups.student.designation.add');
        Route::post('/student/designation/store', 'Backend\Setup\DesignationController@store')->name('setups.student.designation.store');
        Route::get('/student/designation/edit/{id}', 'Backend\Setup\DesignationController@edit')->name('setups.student.designation.edit');
        Route::post('/student/designation/update/{id}', 'Backend\Setup\DesignationController@update')->name('setups.student.designation.update');
        Route::post('/student/designation/delete/{id}', 'Backend\Setup\DesignationController@delete')->name('setups.student.designation.delete');
    });

    Route::prefix('students')->group(function(){
      //Registration
      Route::get('/reg/view', 'Backend\Student\StudentRegController@view')->name('students.registration.view');
      Route::get('/reg/add', 'Backend\Student\StudentRegController@add')->name('students.registration.add');
      Route::post('/reg/store', 'Backend\Student\StudentRegController@store')->name('students.registration.store');
      Route::get('/reg/edit/{student_id}', 'Backend\Student\StudentRegController@edit')->name('students.registration.edit');
      Route::post('/reg/update/{student_id}', 'Backend\Student\StudentRegController@update')->name('students.registration.update');
      Route::post('/reg/delete/{student_id}', 'Backend\Student\StudentRegController@delete')->name('students.registration.delete');
      Route::get('/student/list/search', 'Backend\Student\StudentRegController@studentSearch')->name('students.list.search');
      Route::get('/reg/promotion/{student_id}', 'Backend\Student\StudentRegController@promotion')->name('students.registration.promotion');
      Route::post('/reg/promotion/{student_id}', 'Backend\Student\StudentRegController@promotionStore')->name('students.registration.promotion.store');
      Route::get('/reg/details/{student_id}', 'Backend\Student\StudentRegController@details')->name('students.registration.details');

      //Roll Generate
      Route::get('/roll/view', 'Backend\Student\StudentRollController@view')->name('students.roll.view');
      Route::get('/roll/get-student', 'Backend\Student\StudentRollController@getStudent')->name('students.get');
      Route::post('/roll/store', 'Backend\Student\StudentRollController@store')->name('students.roll.store');

      //Student Registration Fee
      Route::get('/reg/fee/view', 'Backend\Student\RegistrationFeeController@view')->name('students.reg.fee.view');
      Route::get('/reg/get-student', 'Backend\Student\RegistrationFeeController@getStudent')->name('students.reg.fee.get-student');
      Route::get('/reg/payslip', 'Backend\Student\RegistrationFeeController@payslip')->name('student.reg.fee.payslip');

      //Student Monthly Fee
      Route::get('/monthly/fee/view', 'Backend\Student\MonthlyFeeController@view')->name('students.monthly.fee.view');
      Route::get('/monthly/get-student', 'Backend\Student\MonthlyFeeController@getStudent')->name('students.monthly.fee.get-student');
      Route::get('/monthly/payslip', 'Backend\Student\MonthlyFeeController@payslip')->name('student.monthly.fee.payslip');

      //Student Exam Fee
      Route::get('/exam/fee/view', 'Backend\Student\ExamFeeController@view')->name('students.exam.fee.view');
      Route::get('/exam/get-student', 'Backend\Student\ExamFeeController@getStudent')->name('students.exam.fee.get-student');
      Route::get('/exam/payslip', 'Backend\Student\ExamFeeController@payslip')->name('student.exam.fee.payslip');
    });

    Route::prefix('employee')->group(function(){
      //Registration
      Route::get('/reg/view', 'Backend\Employee\EmployeeRegController@view')->name('employee.registration.view');
      Route::get('/reg/add', 'Backend\Employee\EmployeeRegController@add')->name('employee.registration.add');
      Route::post('/reg/store', 'Backend\Employee\EmployeeRegController@store')->name('employee.registration.store');
      Route::get('/reg/edit/{id}', 'Backend\Employee\EmployeeRegController@edit')->name('employee.registration.edit');
      Route::post('/reg/update/{id}', 'Backend\Employee\EmployeeRegController@update')->name('employee.registration.update');
      Route::get('/reg/details/{id}', 'Backend\Employee\EmployeeRegController@details')->name('employee.registration.details');

      //Salary
      Route::get('/salary/view', 'Backend\Employee\EmployeeSalaryController@view')->name('employee.salary.view');
      Route::get('/salary/increment/{id}', 'Backend\Employee\EmployeeSalaryController@increment')->name('employee.salary.increment');
      Route::post('/salary/update/{id}', 'Backend\Employee\EmployeeSalaryController@update')->name('employee.salary.update');
      Route::get('/salary/details/{id}', 'Backend\Employee\EmployeeSalaryController@details')->name('employee.salary.details');

      //Employee Leave
      Route::get('/leave/view', 'Backend\Employee\EmployeeLeaveController@view')->name('employee.leave.view');
      Route::get('/leave/add', 'Backend\Employee\EmployeeLeaveController@add')->name('employee.leave.add');
      Route::post('/leave/store', 'Backend\Employee\EmployeeLeaveController@store')->name('employee.leave.store');
      Route::get('/leave/edit/{id}', 'Backend\Employee\EmployeeLeaveController@edit')->name('employee.leave.edit');
      Route::post('/leave/update/{id}', 'Backend\Employee\EmployeeLeaveController@update')->name('employee.leave.update');

      //Employee Attendance
      Route::get('/attendance/view', 'Backend\Employee\EmployeeAttendanceController@view')->name('employee.attendance.view');
      Route::get('/attendance/add', 'Backend\Employee\EmployeeAttendanceController@add')->name('employee.attendance.add');
      Route::post('/attendance/store', 'Backend\Employee\EmployeeAttendanceController@store')->name('employee.attendance.store');
      Route::get('/attendance/edit/{date}', 'Backend\Employee\EmployeeAttendanceController@edit')->name('employee.attendance.edit');
      Route::get('/attendance/details/{date}', 'Backend\Employee\EmployeeAttendanceController@details')->name('employee.attendance.details');

      //Employee Monthly Salary
      Route::get('/monthly/salary/view', 'Backend\Employee\MonthlySalaryController@view')->name('employee.monthly.salary.view');
      Route::get('/monthly/salary/get', 'Backend\Employee\MonthlySalaryController@getSalary')->name('employee.monthly.salary.get');
      Route::get('/monthly/salary/payslip/{employee_id}', 'Backend\Employee\MonthlySalaryController@payslip')->name('employee.monthly.salary.payslip');
    });

    Route::prefix('marks')->group(function(){
      Route::get('/add', 'Backend\Marks\MarksController@add')->name('marks.add');
      Route::post('/store', 'Backend\Marks\MarksController@store')->name('marks.store');
      Route::get('/edit', 'Backend\Marks\MarksController@edit')->name('marks.edit');
      Route::post('/update', 'Backend\Marks\MarksController@update')->name('marks.update');

      //Grade Point
      Route::get('/grade/view', 'Backend\Marks\GradeController@view')->name('marks.grade.view');
      Route::get('/grade/add', 'Backend\Marks\GradeController@add')->name('marks.grade.add');
      Route::post('/grade/store', 'Backend\Marks\GradeController@store')->name('marks.grade.store');
      Route::get('/grade/edit/{id}', 'Backend\Marks\GradeController@edit')->name('marks.grade.edit');
      Route::post('/grade/update/{id}', 'Backend\Marks\GradeController@update')->name('marks.grade.update');
    });

    Route::get('/get-student', 'Backend\DefaultController@get_students')->name('get-students');
    Route::get('/get-subjects', 'Backend\DefaultController@get_subjects')->name('get-subjects');
    Route::get('/get-marks', 'Backend\DefaultController@get_marks')->name('get-marks');

    Route::prefix('account')->group(function(){
      //Student Fee
      Route::get('/student/fee/view', 'Backend\Account\StudentFeeController@view')->name('account.fee.view');
      Route::get('/student/fee/add', 'Backend\Account\StudentFeeController@add')->name('account.fee.add');
      Route::post('/student/fee/store', 'Backend\Account\StudentFeeController@store')->name('account.fee.store');
      Route::get('/student/fee/getStudent', 'Backend\Account\StudentFeeController@getStudent')->name('account.fee.getStudent');

      //Student Fee
      Route::get('/employee/salary/view', 'Backend\Account\SalaryController@view')->name('account.salary.view');
      Route::get('/employee/salary/add', 'Backend\Account\SalaryController@add')->name('account.salary.add');
      Route::post('/employee/salary/store', 'Backend\Account\SalaryController@store')->name('account.salary.store');
      Route::get('/employee/salary/getEmployee', 'Backend\Account\SalaryController@getEmployee')->name('account.salary.getEmployee');

      //Others Cost
      Route::get('/cost/view', 'Backend\Account\OtherCostController@view')->name('account.cost.view');
      Route::get('/cost/add', 'Backend\Account\OtherCostController@add')->name('account.cost.add');
      Route::post('/cost/store', 'Backend\Account\OtherCostController@store')->name('account.cost.store');
      Route::get('/cost/edit/{id}', 'Backend\Account\OtherCostController@edit')->name('account.cost.edit');
      Route::post('/cost/update/{id}', 'Backend\Account\OtherCostController@update')->name('account.cost.update');
    });

    Route::prefix('reports')->group(function(){
      //Profit
      Route::get('/profit/view', 'Backend\Report\ProfitController@view')->name('reports.profit.view');
      Route::get('/profit/get', 'Backend\Report\ProfitController@profit')->name('reports.profit.datawise.get');
      Route::get('/profit/pdf', 'Backend\Report\ProfitController@pdf')->name('reports.profit.pdf');

      //Marksheet
      Route::get('/marksheet/view', 'Backend\Report\ProfitController@markSheetView')->name('reports.marksheet.view');
      Route::get('/marksheet/get', 'Backend\Report\ProfitController@markSheetGet')->name('reports.marksheet.get');

      //Attendance Report
      Route::get('/attendance/view', 'Backend\Report\ProfitController@attendanceView')->name('reports.attendance.view');
      Route::get('/attendance/get', 'Backend\Report\ProfitController@attendanceGet')->name('reports.attendance.get');

      //All Student Result
      Route::get('/result/view', 'Backend\Report\ProfitController@resultView')->name('reports.result.view');
      Route::get('/result/get', 'Backend\Report\ProfitController@resultGet')->name('reports.result.get');
    });

});
