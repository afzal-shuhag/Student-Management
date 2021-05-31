@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Student Year</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Year</li>
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
                Edit Student Year
                @else
                Add Student Year
                @endif
                <a href="{{ route('setups.student.year.view') }}" class="btn btn-success float-right"> <i class="fa fa-list"></i>Student Year List</a>
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <form method="post" action="{{ (@$editData) ? route('setups.student.year.update',$editData->id) : route('setups.student.year.store') }}" id="myForm" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="name">Year Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{@$editData->name}}">
                    <font style="color:red;">{{ ($errors->has('name')) ? ($errors->first('name')) : '' }}</font>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">{{ (@$editData)?'Update' : 'Submit' }}</button>
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
