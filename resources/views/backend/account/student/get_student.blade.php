@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Student Fee</h1>
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
            <a class="btn btn-info" href="{{ route('account.fee.view') }}">Go Back</a>
              <br>
          </div>

          <div class="card">
            <div class="card-header">
              <h3>Add Fees
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <form class="" action="{{ route('account.fee.store') }}" method="post">
                @csrf
                <table class="table-sm table-bordered table-striped" style="width:100%;">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>ID No</th>
                      <th>Student Name</th>
                      <th>Father Name</th>
                      <th>Original Fee</th>
                      <th>Discount Amount</th>
                      <th>Fee (This student)</th>
                      <th>Select</th>
                    </tr>
                  </thead>
                  @foreach($data as $key => $student)
                    @php
                      $registrationFee = App\Model\FeeAmount::where('fee_category_id',$fee_category_id)->where('student_class_id',$student->class_id)->first();

                      $accountstudentfees = App\Model\AccountStudentFee::where('student_id',$student->student_id)->where('year_id',$student->year_id)->where('class_id',$student->class_id)->where('fee_category_id',$fee_category_id)->where('date',$date)->first();
                    @endphp

                    @php
                      if($accountstudentfees != null){
                        $checked = 'checked';
                      }
                      else{
                        $checked = '';
                      }
                    @endphp

                    @php
                      $originalfee = $registrationFee->amount;
                      $discount = $student->discount->discount;
                      $discountableFee = $originalfee*($discount/100);
                      $finalfee = (int)$originalfee - (int)$discountableFee;
                    @endphp

                    <tbody>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $student->student->id_no }} <input type="hidden" name="fee_category_id" value="{{ $fee_category_id }}"> </td>
                      <td>{{ $student->student->name }} <input type="hidden" name="year_id" value="{{ $student->year_id }}"> </td>
                      <td>{{ $student->student->fname }} <input type="hidden" name="class_id" value="{{ $student->class_id }}"> </td>
                      <td>{{ $registrationFee->amount }} <input type="hidden" name="date" value="{{ $date }}"> </td>
                      <td>{{ $student->discount->discount }} %</td>
                      <td> <input type="text" name="amount[]" value="{{ $finalfee }}" class="form-control" readonly> </td>
                      <td> <input type="hidden" name="student_id[]" value="{{ $student->student_id }}"> <input type="checkbox" name="checkmanage[]" value="{{ $key }}" {{$checked}}> </td>
                    </tbody>
                    @endforeach
                </table>

                <button type="submit" class="btn btn-sm btn-success mt-3">Submit</button>
              </form>
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
