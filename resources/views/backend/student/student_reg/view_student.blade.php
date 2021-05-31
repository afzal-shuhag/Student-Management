@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Students</h1>
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
              <h3>Student List
                <a href="{{ route('students.registration.add') }}" class="btn btn-success float-right"> <i class="fa fa-plus-circle"></i> Add Student</a>
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <form class="" id="myForm" action="{{ route('students.list.search') }}" method="GET">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="year_id">Year <font style="color:red;">*</font></label>
                    <select class="form-control form-control-sm" name="year_id">
                      <option value="">Select Year</option>
                      @foreach($years as $year)
                      <option value="{{$year->id}}" {{ ($year_id == $year->id) ? 'selected' : '' }}>{{ $year->name }}</option>
                      @endforeach
                    </select>
                    <font style="color:red;">{{ ($errors->has('year_id')) ? ($errors->first('year_id')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="class_id">Class <font style="color:red;">*</font></label>
                    <select class="form-control form-control-sm" name="class_id">
                      <option value="">Select Class</option>
                      @foreach($classes as $class)
                      <option value="{{$class->id}}" {{ ($class_id == $class->id) ? 'selected' : '' }}>{{ $class->name }}</option>
                      @endforeach
                    </select>
                    <font style="color:red;">{{ ($errors->has('class_id')) ? ($errors->first('class_id')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4" style="padding-top:30px;">
                    <button type="submit" class="btn btn-primary btn-sm" name="search">Search</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Student Name</th>
                      <th>Student ID</th>
                      <th>Roll</th>
                      <th>Year</th>
                      <th>Class</th>
                      @if(Auth::user()->role_two == 'Admin')
                      <th>Code</th>
                      @endif
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($allData as $assign_student)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $assign_student->student->name }}</td>
                      <td>{{ $assign_student->student->id_no }}</td>
                      <td>{{ $assign_student->roll }}</td>
                      <td>{{ $assign_student->year->name }}</td>
                      <td>{{ $assign_student->class->name }}</td>
                      @if(Auth::user()->role_two == 'Admin')
                      <td>{{ $assign_student->student->code }}</td>
                      @endif
                      <td>
                        @if(!empty($assign_student->student->image))
                        <img src="{{ asset('public/upload/student_images/'. $assign_student->student->image) }}" alt="" style="width:50px; height:60px;">
                        @else
                        <img src="{{ asset('public/upload/No_image.png') }}" alt="" style="width:50px; height:60px;">
                        @endif
                      <td>
                        <a href="{{ route('students.registration.edit',$assign_student->student_id) }}" title="Edit" class="btn btn-sm btn-primary"> <i class="fa fa-edit"></i> </a>
                        <a href="{{ route('students.registration.promotion',$assign_student->student_id) }}" title="Promotion" class="btn btn-sm btn-success"> <i class="fa fa-check"></i> </a>
                        <a target="_blank" href="{{ route('students.registration.details',$assign_student->student_id) }}" title="Details" class="btn btn-sm btn-info"> <i class="fa fa-eye"></i> </a>
                        <!-- <a href="#deleteModal{{ $assign_student->id }}" data-toggle="modal" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>

                      <div class="modal fade" id="deleteModal{{ $assign_student->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Are you sure to Delete</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{!! route('setups.student.year.delete',$assign_student->id) !!}" method="post">
                                  {{ csrf_field() }}
                                  <button type="submit" class="btn btn-lg btn-danger">Yes</button>
                              </form>

                            </div>
                            <div class="modal-footer">

                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div> -->

                      </td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
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
