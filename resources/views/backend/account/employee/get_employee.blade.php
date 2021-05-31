@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Employee Salary</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Salary</li>
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
            <a class="btn btn-info" href="{{ route('account.salary.view') }}">Go Back</a>
              <br>
          </div>

          <div class="card">
            <div class="card-header">
              <h3>Add Salaries
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <form class="" action="{{ route('account.salary.store') }}" method="post">
                @csrf
                <table class="table-sm table-bordered table-striped" style="width:100%;">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>ID No</th>
                      <th>Student Name</th>
                      <th>Basic Salary</th>
                      <th>Salary (This Month)</th>
                      <th>Select</th>
                    </tr>
                  </thead>
                  @foreach($data as $key => $attend)
                    @php
                      $account_salary = App\Model\AccountEmployeeSalary::where('employee_id',$attend->employee_id)->where('date',$date)->first();
                    @endphp

                    @php
                      if($account_salary != null){
                        $checked = 'checked';
                      }
                      else{
                        $checked = '';
                      }
                    @endphp

                    @php
                      $totalattend = App\Model\EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$attend->employee_id)->get();
                      $absentcount = count($totalattend->where('attend_staus','Absent'));
                      $salary = $attend->user->salary;
                      $salary_per_day = $salary/30;
                      $total_salary_minus = $salary_per_day*$absentcount;
                      $total_salary = $salary-$total_salary_minus;
                    @endphp

                    <tbody>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $attend->user->id_no }} <input type="hidden" name="date" value="{{ $date }}"> </td>
                      <td>{{ $attend->user->name }}</td>
                      <td>{{ $attend->user->salary }}</td>
                      <td> {{ $total_salary }} TK <input type="hidden" name="amount[]" value="{{ $total_salary }}" class="form-control"> </td>
                      <td> <input type="hidden" name="employee_id[]" value="{{ $attend->employee_id }}"> <input type="checkbox" name="checkmanage[]" value="{{ $key }}" {{$checked}}> </td>
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
