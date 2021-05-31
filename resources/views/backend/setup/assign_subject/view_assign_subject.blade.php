@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Assign Subject</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Assign Subject</li>
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
              <h3>Student Assign Subject List
                <a href="{{ route('setups.student.assign.subject.add') }}" class="btn btn-success float-right"> <i class="fa fa-plus-circle"></i> Add Assign Subject</a>
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Class Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($allData as $assign_subject)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $assign_subject->class->name }}</td>
                      <td>
                          <a href="{{ route('setups.student.assign.subject.details',$assign_subject->class_id) }}" title="Details" class="btn btn-sm btn-success"> <i class="fa fa-eye"></i> </a>
                        <a href="{{ route('setups.student.assign.subject.edit',$assign_subject->class_id) }}" title="Edit" class="btn btn-sm btn-primary"> <i class="fa fa-edit"></i> </a>
                        <!-- <a href="#deleteModal{{ $assign_subject->class_id }}" data-toggle="modal" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>

                      <div class="modal fade" id="deleteModal{{ $assign_subject->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Are you sure to Delete</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{!! route('setups.student.amount.delete',$assign_subject->class_id) !!}" method="post">
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
