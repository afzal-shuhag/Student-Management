<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Monthly/Yearly Profit</title>
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
              <td width="25%" class="text-center"></td>
            </tr>
          </table>
        </div>
        <div class="col-md-12 text-center">
          <h5 style="font-weight:bold; padding-top:-25px; text-align:center;">Monthly/Yearly Profit from {{date('M Y',strtotime($sdate))}} - {{date('M Y',strtotime($edate))}}</h5>
        </div>
        <div class="col-md-12">
          @php
          $student_fee = App\Model\AccountStudentFee::whereBetween('date',[$start_date,$end_date])->sum('amount');
          $emp_salary = App\Model\AccountEmployeeSalary::whereBetween('date',[$start_date,$end_date])->sum('amount');
          $other_cost = App\Model\AccountOtherCost::whereBetween('date',[$sdate,$edate])->sum('amount');

          $total_cost = $emp_salary + $other_cost;
          $profit = $student_fee-$emp_salary;
          @endphp
          <table border="1" width="100%">
            <tbody>
                <td style="width:50%;">Student Fees</td>
                <td>{{ $student_fee }} TK</td>
              </tr>
              <tr>
                <td style="width:50%;">Employee Salaries</td>
                <td>{{ $emp_salary }} TK</td>
              </tr>
              <tr>
                <td style="width:50%;">Other Cost</td>
                <td>{{ $other_cost }} TK</td>
              </tr>
              <tr>
                <td style="width:50%;">Total Cost</td>
                <td>{{ $total_cost }} TK</td>
              </tr>
              <tr>
                <td style="width:50%;">Profit</td>
                <td>{{ $profit }} TK</td>
            </tbody>
          </table>
        </div>
        <br>
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

      <hr style="border:dashed 1px; width:96%; color:#DDD; margin-bottom:10px;">


      </div>
    </div>
  </body>
</html>
