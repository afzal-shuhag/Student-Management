@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Grade Point</h1>
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
                @if(isset($editData))
                Edit Grade Point
                @else
                Add Grade Point
                @endif
                <a href="{{ route('marks.grade.view') }}" class="btn btn-success float-right"> <i class="fa fa-list"></i> Grade Point List</a>
              </h3>

            </div><!-- /.card-header -->
            <form class="" action="{{ (@$editData) ? route('marks.grade.update',$editData->id) : route('marks.grade.store') }}" method="post" id="myForm">
              @csrf
              <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="">Grade Name</label>
                    <input type="text" name="grade_name" value="{{ @$editData->grade_name }}" class="form-control">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="">Grade Point</label>
                    <input type="text" name="grade_point" value="{{ @$editData->grade_point }}" class="form-control">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="">Start Mark</label>
                    <input type="text" name="start_marks" value="{{ @$editData->start_marks }}" class="form-control">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="">End Mark</label>
                    <input type="text" name="end_marks" value="{{ @$editData->end_marks }}" class="form-control">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="">Start point</label>
                    <input type="text" name="start_point" value="{{ @$editData->start_point }}" class="form-control">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="">End Point</label>
                    <input type="text" name="end_point" value="{{ @$editData->end_point }}" class="form-control">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="">Remarks</label>
                    <input type="text" name="remarks" value="{{ @$editData->remarks }}" class="form-control">
                  </div>
                  <div class="form-group col-md-4" style="margin-top:34px;">
                    <button type="submit" class="btn btn-sm btn-success">{{ (@$editData)?'Update':'Submit' }}</button>
                  </div>
                </div>
              </div>
            </form>
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
