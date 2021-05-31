@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Registration Fee</h1>
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
            <a class="btn btn-info" href="{{ route('students.reg.fee.view') }}">Go Back</a>
              <br>
          </div>

          <div class="card">
            <div class="card-header">
              <h3>Registration Fee List
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
                    <th>Registration Fee</th>
                    <th>Discount Amount</th>
                    <th>Fee (This student)</th>
                    <th>Action</th>
                  </tr>
                </thead>
                @foreach($allStudent as $key => $value)
                @php
                $registrationFee = App\Model\FeeAmount::where('fee_category_id','1')->where('student_class_id', $value->class_id)->first();
                   $originalfee = $registrationFee->amount;
                   $discount = $value['discount']['discount'];
                   $discountableFee = $originalfee*($discount/100);
                   $finalfees = (int)$originalfee-(int)$discountableFee;
                @endphp
                <tbody>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $value->student->id_no }}</td>
                  <td>{{ $value->student->name }}</td>
                  <td>{{ $value->roll }}</td>
                  <td>{{ $registrationFee->amount }}</td>
                  <td>{{ $value->discount->discount }}</td>
                  <td>{{ $finalfees }}</td>
                  <td><a class="btn btn-sm btn-success" title="Payslip" target="_blank" href="{{ route("student.reg.fee.payslip") }}?class_id={{$value->class_id}}&student_id={{$value->student_id}}">Fee Slip</a>'</td>
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
