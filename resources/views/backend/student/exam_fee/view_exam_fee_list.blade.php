@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Exam Fee</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Fee</li>
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
          <div class="card-body">
            <a class="btn btn-info" href="{{ route('students.exam.fee.view') }}">Go Back</a>
              <br>
          </div>

          <div class="card">
            <div class="card-header">
              <h3>Search Criteria
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <table class="table-sm table-bordered table-striped" style="width:100%;">
                <thead>
                  <tr>
                    <th>SL</th>
                    <th>ID No</th>
                    <th>Student Name</th>
                    <th>Roll No</th>
                    <th>Exam Name</th>
                    <th>Exam Fee</th>
                    <th>Discount</th>
                    <th>Final Fee</th>
                    <th>Action</th>
                  </tr>
                </thead>
                @foreach($allStudent as $key => $value)
                @php
                $examFee = App\Model\FeeAmount::where('fee_category_id','3')->where('student_class_id', $value->class_id)->first();
                   $originalfee = $examFee->amount;
                   $discount = $value->discount->discount;
                   $discountableFee = $originalfee*($discount/100);
                   $finalfees = (int)$originalfee - (int)$discountableFee;

                   $examType = App\Model\ExamType::where('id',$examTypes_id)->first();
                @endphp
                <tbody>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $value->student->id_no }}</td>
                  <td>{{ $value->student->name }}</td>
                  <td>{{ $value->roll }}</td>
                  <td>{{ $examType->name }}</td>
                  <td>{{ $examFee->amount }} TK</td>
                  <td>{{ $discount }}%</td>
                  <td>{{ $finalfees }} TK</td>
                  <td><a class="btn btn-sm btn-success" title="Payslip" target="_blank" href="{{ route("student.exam.fee.payslip") }}?class_id={{$value->class_id}}&student_id={{$value->student_id}}&examTypes_id={{$examTypes_id}}">Fee Slip</a>'</td>
                </tbody>
                @endforeach
              </table>
            </div>
            <!-- <div class="card-body">
              <div id="documentResults"></div>
              <script id="document-template" type="text/x-handlebars-template">
                <table class="table-sm table-bordered table-striped" style="width:100%">
                  <thead>
                    <tr>
                      @{{{thsource}}}
                    </tr>
                  </thead>
                  <tbody>
                    @{{#each this}}
                    <tr>
                      @{{{tdsource}}}
                    </tr>
                    @{{/each}}
                  </tbody>
                </table>
              </script>
            </div> -->

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
<!-- <script type="text/javascript">
  $(document).on('click','#search', function(){
    var year_id = $('#year_id').val();
    var class_id = $('#class_id').val();
    // $('.notifyjs-corner').html('');
    if(year_id == ''){
      alert('Missing Year');
      return false;
    }
    if(class_id == ''){
      alert('Missing Class');
      return false;
    }
    $.ajax({
      url: "{{ route('students.reg.fee.get-student') }}",
      type: "GET",
      data: {'year_id':year_id,'class_id':class_id},
      beforeSend: function() {
      },
      success: function(data){
        var source = $('#document-template').html();
        var template = Handlebars.compile(source);
        var html = template(data);
        $('#documentResults').html(html);
        $('[data-toggle="tooltip"]').tooltip();
      }
    });
  });
</script> -->

@endsection
