<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student Results</title>
    <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <style type="text/css">
      table{
        border-collapse : collapse;
      }
      h2,h3{
        margin:0;
        padding:0;
      }
      .table{
        width:100%;
        margin-bottom: 1rem;
        background-color: transparent;
      }
      .table th,
      .table td{
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
      }
      .table thead th{
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
      }
      .table tbody + tbody{
        border-top: 2px solid #dee2e6;
      }
      .table .table{
        background-color: #fff;
      }
      .table bordered{
        border: 1px solid #dee2e6;
      }
      .table bordered th,
      .table bordered td{
        border-bottom-width: 2px;
      }
      .text-center{
        text-align: center;
      }
      .text-center{
        text-align: right;
      }
      table tr td{
        padding: 5px;
      }
      .table bordered thead th, .table bordered td, .table bordered th{
        border: 1px solid black !important;
      }
      .table bordered thead th{
        background-color: #cacaca;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <table width="100%">
            <tr>
              <td width="20%" class="text-center"> <img src="{{ url('public/upload/logo.png') }}" alt="" style="width:80px; height:70px;"> </td>
              <td class="text-center" width="20%">
                <h4><strong>Durgapur School</strong></h4>
                <h5><strong>Sylhet, Bangladesh</strong></h5>
                <h6><strong>www.afzalshuhag.com</strong></h6>
              </td>
            </tr>
          </table>
        </div>
        <div class="col-md-12 text-center">
          <h5 style="font-weight:bold; padding-top:-25px; text-align:center;">{{ $allData['0']->exam_type->name }} Examination</h5>
        </div>
        <div class="col-md-12">
          <table border="0" width="100%">
            <tbody>
              <tr>
                <td> <strong>Year/Session : </strong> {{ @$allData['0']->year->name }} </td>
                <td></td>
                <td></td>
                <td> <strong>Class : </strong> {{ @$allData['0']->student_class->name }} </td>
              </tr>
            </tbody>
          </table>
          <br>
        </div>
        <br>
        <div class="col-md-12">
          <table border="0" width="100%">
            <thead>
              <tr>
                <td>S/L</td>
                <td>Student Name</td>
                <td>ID No</td>
                <td>Grade</td>
                <td>Grade Point</td>
                <td>Remarks</td>
              </tr>
            </thead>
            <tbody>
              @foreach($allData as $key => $data)
                @php
                  $allMarks = App\Model\StudentMarks::where('year_id',$data->year_id)->where('class_id',$data->class_id)->where('exam_type_id',$data->exam_type_id)->where('student_id',$data->student_id)->get();
                  $total_marks = 0;
                  $total_point = 0;
                  foreach($allMarks as $value){
                    $count_fail = App\Model\StudentMarks::where('year_id',$value->year_id)->where('class_id',$value->class_id)->where('exam_type_id',$value->exam_type_id)->where('student_id',$value->student_id)->where('marks','<','33')->get()->count();
                    $get_mark = (int)$value->marks;
                    $grade_marks = App\Model\MarksGrade::where('start_marks','<=',$get_mark)->where('end_marks','>=',$get_mark)->first();
                    $grade_name = $grade_marks->grade_name;
                    $grade_point = $grade_marks->grade_point;
                    $total_point = $total_point+$grade_point;
                  }
                @endphp
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $data->student->name }}</td>
                <td>{{ $data->student->id_no }}</td>
                @php
                  $total_subject = App\Model\StudentMarks::where('year_id',$data->year_id)->where('class_id',$data->class_id)->where('exam_type_id',$data->exam_type_id)->where('student_id',$data->student_id)->get()->count();
                  $total_grade = 0;
                  $point_for_grade = $total_point/$total_subject;
                  $total_grade = App\Model\MarksGrade::where('start_point','<=',$point_for_grade)->where('end_point','>=',$point_for_grade)->first();
                  $grade_point_average = $total_point/$total_subject;
                @endphp
                <td>
                  @if($count_fail > 0)
                  F
                  @else
                  {{ $total_grade->grade_name }}
                  @endif
                </td>
                <td>
                  @if($count_fail > 0)
                  0.00
                  @else
                  {{ $grade_point_average }}
                  @endif
                </td>
                <td>
                  @if($count_fail > 0)
                  Fail
                  @else
                  {{ $total_grade->remarks }}
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="col-md-12">
          <table border="0" width="100%">
            <tbody>
              <tr>
                <td style="width:30%;"></td>
                <td style="width:30%;"></td>
                <td style="width:40%; text-align:center;">
                  <hr>
                  <p style="text-align:center;">Authority</p>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      </div>
    </div>
  </body>
</html>
