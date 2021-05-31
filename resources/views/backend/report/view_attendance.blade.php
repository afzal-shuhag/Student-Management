@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Employee Attendance</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Attendance</li>
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
              <h3>Select Criteria
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <form class="" action="{{ route('reports.attendance.get') }}" method="GET" target="_blank">
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="">Employee</label>
                    <select class="form-control" name="employee_id" id="employee_id">
                      <option value="">Select Employee</option>
                      @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                      @endforeach
                    </select>
                    <font style="color:red;">{{ ($errors->has('employee_id')) ? ($errors->first('employee_id')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="">Date</label>
                    <input class="form-control" type="date" id="date" name="date"
                     min="1990-01-01" max="2040-12-31">
                      <font style="color:red;">{{ ($errors->has('date')) ? ($errors->first('date')) : '' }}</font>
                  </div>

                  <div class="form-group col-md-2">
                    <button type="submit" class="btn btn-block btn-primary" style="margin-top:30px;">Search</button>
                  </div>
                </div>
              </form>
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
