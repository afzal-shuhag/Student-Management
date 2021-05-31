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
            <li class="breadcrumb-item active">Student</li>
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
                Promote Student
                @else
                Add Student
                @endif
                <a href="{{ route('students.registration.view') }}" class="btn btn-success float-right"> <i class="fa fa-list"></i>Student List</a>
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <form method="post" action="{{ (@$editData) ? route('students.registration.promotion.store',$editData->student_id) : route('students.registration.store') }}" id="myForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ @$editData->id }}">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="name">Student Name <font style="color:red;">*</font> </label>
                    <input type="text" class="form-control form-control-sm" id="name" name="name" value="{{@$editData->student->name}}">
                    <font style="color:red;">{{ ($errors->has('name')) ? ($errors->first('name')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="fname">Father Name <font style="color:red;">*</font></label>
                    <input type="text" class="form-control form-control-sm" id="fname" name="fname" value="{{@$editData->student->fname}}">
                    <font style="color:red;">{{ ($errors->has('fname')) ? ($errors->first('fname')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="mname">Mother Name <font style="color:red;">*</font></label>
                    <input type="text" class="form-control form-control-sm" id="mname" name="mname" value="{{@$editData->student->mname}}">
                    <font style="color:red;">{{ ($errors->has('mname')) ? ($errors->first('mname')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="mobile">Mobile Number <font style="color:red;">*</font></label>
                    <input type="text" class="form-control form-control-sm" id="mobile" name="mobile" value="{{@$editData->student->mobile}}">
                    <font style="color:red;">{{ ($errors->has('mobile')) ? ($errors->first('mobile')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="address">Address <font style="color:red;">*</font></label>
                    <input type="text" class="form-control form-control-sm" id="address" name="address" value="{{@$editData->student->address}}">
                    <font style="color:red;">{{ ($errors->has('address')) ? ($errors->first('address')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="gender">Gender <font style="color:red;">*</font></label>
                    <select class="form-control form-control-sm" name="gender">
                      <option value="">Select Gender</option>
                      <option value="Male" {{ (@$editData->student->gender == 'Male') ? 'selected' : '' }}>Male</option>
                      <option value="Female" {{ (@$editData->student->gender == 'Female') ? 'selected' : '' }}>Female</option>
                    </select>
                    <font style="color:red;">{{ ($errors->has('gender')) ? ($errors->first('gender')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="religion">Religion <font style="color:red;">*</font></label>
                    <select class="form-control form-control-sm" name="religion">
                      <option value="">Select Gender</option>
                      <option value="Islam" {{ (@$editData->student->religion == 'Islam') ? 'selected' : '' }}>Islam</option>
                      <option value="Hindu" {{ (@$editData->student->religion == 'Hindu') ? 'selected' : '' }}>Hindu</option>
                      <option value="Christian" {{ (@$editData->student->religion == 'Christian') ? 'selected' : '' }}>Christian</option>
                      <option value="Buddhist" {{ (@$editData->student->religion == 'Buddhist') ? 'selected' : '' }}>Buddhist</option>
                    </select>
                    <font style="color:red;">{{ ($errors->has('religion')) ? ($errors->first('religion')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="dob">Date of Birth <font style="color:red;">*</font></label>
                    <input class="form-control form-control-sm" type="date" id="date" name="dob"
                     value="{{@$editData->student->dob}}"
                     min="1990-01-01" max="2040-12-31">
                    <font style="color:red;">{{ ($errors->has('dob')) ? ($errors->first('dob')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="discount">Waiver</label>
                    <input type="text" class="form-control form-control-sm" id="discount" name="discount" value="{{@$editData->discount->discount}}">
                    <font style="color:red;">{{ ($errors->has('discount')) ? ($errors->first('discount')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="year_id">Year <font style="color:red;">*</font></label>
                    <select class="form-control form-control-sm" name="year_id">
                      <option value="">Select Year</option>
                      @foreach($years as $year)
                      <option value="{{$year->id}}" {{ (@$editData->year_id == $year->id) ? 'selected' : '' }} >{{ $year->name }}</option>
                      @endforeach
                    </select>
                    <font style="color:red;">{{ ($errors->has('year_id')) ? ($errors->first('year_id')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="class_id">Class <font style="color:red;">*</font></label>
                    <select class="form-control form-control-sm" name="class_id">
                      <option value="">Select Class</option>
                      @foreach($classes as $class)
                      <option value="{{$class->id}}" {{ (@$editData->class_id == $class->id) ? 'selected' : '' }}>{{ $class->name }}</option>
                      @endforeach
                    </select>
                    <font style="color:red;">{{ ($errors->has('class_id')) ? ($errors->first('class_id')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="group_id">Group</label>
                    <select class="form-control form-control-sm" name="group_id">
                      <option value="">Select Group</option>
                      @foreach($groups as $group)
                      <option value="{{$group->id}}" {{ (@$editData->group_id == $group->id) ? 'selected' : '' }}>{{ $group->name }}</option>
                      @endforeach
                    </select>
                    <font style="color:red;">{{ ($errors->has('group_id')) ? ($errors->first('group_id')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="shift_id">Shift</label>
                    <select class="form-control form-control-sm" name="shift_id">
                      <option value="">Select Shift</option>
                      @foreach($shifts as $shift)
                      <option value="{{$shift->id}}" {{ (@$editData->shift_id == $shift->id) ? 'selected' : '' }}>{{ $shift->name }}</option>
                      @endforeach
                    </select>
                    <font style="color:red;">{{ ($errors->has('shift_id')) ? ($errors->first('shift_id')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="image">Image <font style="color:red;">*</font></label>
                    <input type="file" class="form-control form-control-sm" id="image" name="image">
                    <font style="color:red;">{{ ($errors->has('mname')) ? ($errors->first('mname')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    @if(!empty(@$editData->student->image))
                    <img id="showImage" src="{{ asset('public/upload/student_images/'. @$editData->student->image) }}" style="width:100px; height:110px; border:1px solid #000;" alt="">
                    @else
                    <img id="showImage" src="{{ asset('public/upload/No_image.png') }}" style="width:100px; height:110px; border:1px solid #000;" alt="">
                    @endif

                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">{{ (@$editData)?'Promotion' : 'Submit' }}</button>
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
