@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Marksheet</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Marksheet</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-md-12">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="card">
            <div class="card-header">
              <h3>Student Marksheet
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div style="border: 2px solid; padding:7px;">
                <div class="row">
                  <div class="col-md-2 text-center" style="float:right;">
                    <img src="{{ url('public/upload/logo.png') }}" alt="" style="width:120px; height:80px; float:right;">
                  </div>
                  <div class="col-md-2">

                  </div>
                  <div class="col-md-4 text-center" style="float:right;">
                    <h4><strong>Durgapur School</strong></h4>
                    <h6><strong>Sylhet, Bangladesh</strong></h6>
                    <h5><strong> <u>Acedemic Transcript</u> </strong></h5>
                    <h6> <strong>{{ $allMarks['0']->exam_type->name }}</strong> </h6>
                  </div>
                </div>
                <div class="col-md-12">
                  <hr>
                  <p style="text-align:right;"> <u> <i>Print Data : {{date("d M Y")}}</i> </u> </p>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <table border="1" width="100%" cellpadding="9" cellspacing="2">
                      @php
                        $assign_student = App\Model\AssignStudent::where('year_id',$allMarks['0']->year_id)->where('class_id',$allMarks['0']->class_id)->first();
                      @endphp

                      <tr>
                        <td width="50%">Student ID</td>
                        <td width="50%">{{ $allMarks['0']->id_no }}</td>
                      </tr>
                      <tr>
                        <td width="50%">Roll No</td>
                        <td width="50%">{{ $assign_student->roll }}</td>
                      </tr>
                      <tr>
                        <td width="50%">Name</td>
                        <td width="50%">{{ $allMarks['0']->student->name }}</td>
                      </tr>
                      <tr>
                        <td width="50%">Class</td>
                        <td width="50%">{{ $allMarks['0']->student_class->name }}</td>
                      </tr>
                      <tr>
                        <td width="50%">Session</td>
                        <td width="50%">{{ $allMarks['0']->year->name }}</td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-md-6">
                    <table border="1" width="100%" cellpadding="1" cellspacing="1" class="text-center">
                      <thead>
                        <tr>
                          <th>Grade</th>
                          <th>Marks Interval</th>
                          <th>Grade Point</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($allGrades as $mark)
                        <tr>
                          <td>{{ $mark->grade_name }}</td>
                          <td>{{ $mark->start_marks }} - {{ $mark->end_marks }}</td>
                          <td>{{ $mark->grade_point }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div> <br>
                <div class="col-md-12">
                  <table border="1" width="100%" cellpadding="1" cellspacing="1">
                    <thead>
                      <tr>
                        <th class="text-center">SL</th>
                        <th class="text-center">Subjects</th>
                        <th class="text-center">Full Marks</th>
                        <th class="text-center">Get Marks</th>
                        <th class="text-center">Grade</th>
                        <th class="text-center">Grade Point</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $total_marks = 0;
                        $total_point = 0;
                      @endphp

                      @foreach($allMarks as $key => $mark)

                        @php
                          $get_mark = (int)$mark->marks;
                          $total_marks = $total_marks+$get_mark;
                          $total_subject = App\Model\StudentMarks::where('year_id',$mark->year_id)->where('class_id',$mark->class_id)->where('exam_type_id',$mark->exam_type_id)->where('student_id',$mark->student_id)->get()->count();

                        @endphp
                        <tr>
                          <td class="text-center">{{ $key+1 }}</td>
                          <td class="text-center">{{ $mark->assign_subject->subject->name}}</td>
                          <td class="text-center">{{ $mark->assign_subject->full_mark}}</td>
                          <td class="text-center">{{ $get_mark}}</td>
                          @php
                            $grade_marks = App\Model\MarksGrade::where('start_marks','<=',$get_mark)->where('end_marks','>=',$get_mark)->first();
                            $grade_name = $grade_marks->grade_name;
                            $grade_point = $grade_marks->grade_point;
                            $total_point = $total_point+$grade_point;
                          @endphp
                          <td class="text-center">{{ $grade_name }}</td>
                          <td class="text-center">{{ $grade_point }}</td>
                        </tr>
                      @endforeach
                        <tr>
                          <td colspan="3"> <strong>Total Marks</strong> </td>
                          <td colspan="3"> <strong>{{ $total_marks }}</strong> </td>
                        </tr>
                    </tbody>
                  </table>
                </div><br>
                <div class="col-md-12">
                  <table border="1" width="100%" cellpadding="1" cellspacing="1">
                    <tbody>
                      @php
                        $total_grade = 0;
                        $point_for_grade = $total_point/$total_subject;
                        $total_grade = App\Model\MarksGrade::where('start_point','<=',$point_for_grade)->where('end_point','>=',$point_for_grade)->first();
                        $grade_point_average = $total_point/$total_subject;
                      @endphp
                      <tr>
                        <td width="50%">Grade Point Average</td>
                        <td width="50%">
                          @if($count_fail > 0)
                          0.00
                          @else
                          {{ $grade_point_average }}
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td width="50%">Total Marks</td>
                        <td width="50%">{{ $total_marks }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- DIRECT CHAT -->


        </section>
        <!-- /.Left col -->

        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
