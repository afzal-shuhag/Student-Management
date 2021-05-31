@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Marksheet Generate</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Marksheet</li>
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
              <form class="" action="{{ route('reports.marksheet.get') }}" method="GET">
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
                    <label for="">Exam Name</label>
                    <select class="form-control" name="exam_type_id" id="exam_type_id">
                      <option value="">Select Exam</option>
                      @foreach($exam_types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                      @endforeach
                    </select>
                    <font style="color:red;">{{ ($errors->has('exam_type_id')) ? ($errors->first('exam_type_id')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="">ID No</label>
                      <input type="text" name="id_no" value="" class="form-control">
                      <font style="color:red;">{{ ($errors->has('id_no')) ? ($errors->first('id_no')) : '' }}</font>
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
