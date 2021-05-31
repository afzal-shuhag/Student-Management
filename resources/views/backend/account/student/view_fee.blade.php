@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Student Fee</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Fee</li>
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
              <h3>Student Fee List
                <a href="{{ route('account.fee.add') }}" class="btn btn-success float-right"> <i class="fa fa-plus-circle"></i> Add/Edit Student Fee</a>
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th>ID No</th>
                      <th>Name</th>
                      <th>Year</th>
                      <th>Class</th>
                      <th>Fee Type</th>
                      <th>Amount</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($allData as $key => $value)
                    <tr class="{{$value->id}}">
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $value->student->id_no }}</td>
                      <td>{{ $value->student->name }}</td>
                      <td>{{ $value->year->name }}</td>
                      <td>{{ $value->class->name }}</td>
                      <td>{{ $value->fee_category->name }} - {{ $value->end_point }}</td>
                      <td>{{ $value->amount }}</td>
                      <td>{{ date('M Y',strtotime($value->date)) }}</td>
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
