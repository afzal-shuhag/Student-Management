<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student Registration Fee</title>
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
            @php
            $registrationFee = App\Model\FeeAmount::where('fee_category_id','1')->where('student_class_id', $details->class_id)->first();
               $originalfee = $registrationFee->amount;
               $discount = $details['discount']['discount'];
               $discountableFee = $originalfee*($discount/100);
               $finalfees = (int)$originalfee-(int)$discountableFee;
            @endphp
            <tr>
              <td width="20%" class="text-center"> <img src="{{ url('public/upload/logo.png') }}" alt="" style="width:80px; height:70px;"> </td>
              <td class="text-center" width="20%">
                <h4><strong>Durgapur School</strong></h4>
                <h5><strong>Sylhet, Bangladesh</strong></h5>
                <h6><strong>www.afzalshuhag.com</strong></h6>
              </td>
              <td width="25%" class="text-center"> <img src="{{ url('public/upload/student_images/'. $details->student->image) }}" alt="" style="width:80px; height:70px;"> </td>
            </tr>
          </table>
        </div>
        <div class="col-md-12 text-center">
          <h5 style="font-weight:bold; padding-top:-25px; text-align:center;">Student Registration Info</h5>
        </div>
        <div class="col-md-12">
          <table border="1" width="100%">
            <tbody>
              <tr>
                <td style="width:50%;">ID No.</td>
                <td>{{ $details->student->id_no }}</td>
              </tr>
              <tr>
                <td style="width:50%;">Roll</td>
                <td>{{ $details->roll }}</td>
              </tr>
              <tr>
                <td style="width:50%;">Student Name</td>
                <td>{{ $details->student->name }}</td>
              </tr>
              <tr>
                <td style="width:50%;">Father Name</td>
                <td>{{ $details->student->fname }}</td>
              </tr>
              <tr>
                <td style="width:50%;">Mother Name</td>
                <td>{{ $details->student->mname }}</td>
              </tr>
              <tr>
                <td style="width:50%;">Session</td>
                <td>{{ $details->year->name }}</td>
              </tr>
              <tr>
                <td style="width:50%;">Class</td>
                <td>{{ $details->class->name }}</td>
              </tr>
              <tr>
                <td style="width:50%;">Year</td>
                <td>{{ $details->year->name }}</td>
              </tr>
              <tr>
                <td style="width:50%;">Registration Fee</td>
                <td>{{ $originalfee }} TK</td>
              </tr>
              <tr>
                <td style="width:50%;">Discount</td>
                <td>{{ $discount }}%</td>
              </tr>
              <tr>
                <td style="width:50%;">Final Fees</td>
                <td>{{ $finalfees }} TK</td>
              </tr>
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
                  <p style="text-align:center;">Principle/Headmaster</p>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <hr style="border:dashed 1px; width:96%; color:#DDD; margin-bottom:10px;">
      <div class="row">
        <div class="col-md-12">
          <table width="100%">
            @php
            $registrationFee = App\Model\FeeAmount::where('fee_category_id','1')->where('student_class_id', $details->class_id)->first();
               $originalfee = $registrationFee->amount;
               $discount = $details['discount']['discount'];
               $discountableFee = $originalfee*($discount/100);
               $finalfees = (int)$originalfee-(int)$discountableFee;
            @endphp
            <tr>
              <td width="20%" class="text-center"> <img src="{{ url('public/upload/logo.png') }}" alt="" style="width:80px; height:70px;"> </td>
              <td class="text-center" width="20%">
                <h4><strong>Durgapur School</strong></h4>
                <h5><strong>Sylhet, Bangladesh</strong></h5>
                <h6><strong>www.afzalshuhag.com</strong></h6>
              </td>
              <td width="25%" class="text-center"> <img src="{{ url('public/upload/student_images/'. $details->student->image) }}" alt="" style="width:80px; height:70px;"> </td>
            </tr>
          </table>
        </div>
        <div class="col-md-12 text-center">
          <h5 style="font-weight:bold; padding-top:-25px; text-align:center;">Student Registration Info</h5>
        </div>
        <div class="col-md-12">
          <table border="1" width="100%">
            <tbody>
              <tr>
                <td style="width:50%;">ID No.</td>
                <td>{{ $details->student->id_no }}</td>
              </tr>
              <tr>
                <td style="width:50%;">Roll</td>
                <td>{{ $details->roll }}</td>
              </tr>
              <tr>
                <td style="width:50%;">Student Name</td>
                <td>{{ $details->student->name }}</td>
              </tr>
              <tr>
                <td style="width:50%;">Father Name</td>
                <td>{{ $details->student->fname }}</td>
              </tr>
              <tr>
                <td style="width:50%;">Mother Name</td>
                <td>{{ $details->student->mname }}</td>
              </tr>
              <tr>
                <td style="width:50%;">Session</td>
                <td>{{ $details->year->name }}</td>
              </tr>
              <tr>
                <td style="width:50%;">Class</td>
                <td>{{ $details->class->name }}</td>
              </tr>
              <tr>
                <td style="width:50%;">Year</td>
                <td>{{ $details->year->name }}</td>
              </tr>
              <tr>
                <td style="width:50%;">Registration Fee</td>
                <td>{{ $originalfee }} TK</td>
              </tr>
              <tr>
                <td style="width:50%;">Discount</td>
                <td>{{ $discount }}%</td>
              </tr>
              <tr>
                <td style="width:50%;">Final Fees</td>
                <td>{{ $finalfees }} TK</td>
              </tr>
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
                  <p style="text-align:center;">Principle/Headmaster</p>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
