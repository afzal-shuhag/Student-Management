@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Student Fee Amount</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Fee Amount</li>
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
              <h3>Fee Amount Details
                <a href="{{ route('setups.student.amount.view') }}" class="btn btn-success float-right"> <i class="fa fa-list"></i> Student Fee Amount List</a>
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <h4><strong>Fee Category: </strong>{{ $editData[0]->fee_category->name }}</h4>
              <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Class</th>
                      <th>Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($editData as $data)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $data->student_class->name }}</td>
                      <td>{{ $data->amount }}</td>
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
