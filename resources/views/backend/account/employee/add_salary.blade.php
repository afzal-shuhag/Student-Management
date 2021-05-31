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
          <div class="card">
            <div class="card-header">
              <h3>
              Add/Edit Employee Salary
                <a href="{{ route('account.salary.view') }}" class="btn btn-success float-right"> <i class="fa fa-list"></i> Employee Salary List</a>
              </h3>

            </div><!-- /.card-header -->

            <div class="card-body">
              <form class="" action="{{ route('account.salary.getEmployee') }}" method="GET">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="date">Date</label>
                    <input class="form-control" type="date" id="date" name="date"
                     min="1990-01-01" max="2040-12-31">
                    <font style="color:red;">{{ ($errors->has('date')) ? ($errors->first('date')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-2"style="margin-top:30px;">
                    <button type="submit" class="btn btn-primary">Seacrh</button>
                  </div>
                </div>
              </form>
            </div>

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

<script type="text/javascript">
  $(document).on('click', '.present_all', function(){
    $('input[value=Present]').prop('checked',true);
  });
  $(document).on('click', '.leave_all', function(){
    $('input[value=Leave]').prop('checked',true);
  });
  $(document).on('click', '.absent_all', function(){
    $('input[value=Absent]').prop('checked',true);
  });
</script>

@endsection
