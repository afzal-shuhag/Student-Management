@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Student</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Marks</li>
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
              Add/Edit Student Fee
                <a href="{{ route('account.fee.view') }}" class="btn btn-success float-right"> <i class="fa fa-list"></i> Student Fee List</a>
              </h3>

            </div><!-- /.card-header -->

            <div class="card-body">
              <form class="" action="{{ route('account.fee.getStudent') }}" method="GET">
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="">Year</label>
                    <select class="form-control" name="year_id" id="year_id">
                      <option value="">Select Year</option>
                      @foreach($years as $year)
                        <option value="{{ $year->id }}">{{ $year->name }}</option>
                      @endforeach
                    </select>
                    <font style="color:red;">{{ ($errors->has('year_id')) ? ($errors->first('year_id')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="">Class</label>
                    <select class="form-control" name="class_id" id="class_id">
                      <option value="">Select Class</option>
                      @foreach($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                      @endforeach
                    </select>
                    <font style="color:red;">{{ ($errors->has('class_id')) ? ($errors->first('class_id')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="">Fee Category</label>
                    <select class="form-control" name="fee_category_id" id="fee_category_id">
                      <option value="">Select Fee Type</option>
                      @foreach($fee_categories as $fee_category)
                        <option value="{{ $fee_category->id }}">{{ $fee_category->name }}</option>
                      @endforeach
                    </select>
                    <font style="color:red;">{{ ($errors->has('fee_category_id')) ? ($errors->first('fee_category_id')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="date">Date</label>
                    <input class="form-control" type="date" id="date" name="date"
                     min="1990-01-01" max="2040-12-31">
                    <font style="color:red;">{{ ($errors->has('date')) ? ($errors->first('date')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-3">
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
