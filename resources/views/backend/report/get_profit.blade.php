@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Monthly Profit</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Profit</li>
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
          <div class="card-body">
            <a class="btn btn-info" href="{{ route('reports.profit.view') }}">Go Back</a>
              <br>
          </div>

          <div class="card">
            <div class="card-header">
              @if(date('M Y',strtotime($sdate)) == date('M Y',strtotime($edate)))
                <h3 class="badge badge-primary">Profit in {{date('M Y',strtotime($sdate))}}
              @elseif(date('M Y',strtotime($sdate)) != date('M Y',strtotime($edate)))
              <h3 class="badge badge-primary">Profit from {{date('M Y',strtotime($sdate))}} - {{date('M Y',strtotime($edate))}}
              </h3>
              @endif
            </div><!-- /.card-header -->
            <div class="card-body">
                <table class="table-sm table-bordered table-striped" style="width:100%;">
                  <thead>
                    <tr>
                      <th>Student Fees</th>
                      <th>Employee Salaries</th>
                      <th>Other Cost</th>
                      <th>Total Cost</th>
                      <th>Profit</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                    <tbody>
                      <td>{{ $student_fee }} TK</td>
                      <td>{{ $emp_salary }} TK</td>
                      <td>{{ $other_cost }} TK</td>
                      <td>{{ $total_cost }} TK</td>
                      <td>{{ $profit }} TK</td>
                      <td> <a target="_blank" class="btn btn-sm btn-success" title="PDF" href="{{ route('reports.profit.pdf') }}?start_date={{$sdate}}&end_date={{$edate}}"> <i class="fa fa-file"></i> </a> </td>
                    </tbody>
                </table>
            </div>
            <!-- <div class="card-body">
              <div id="documentResults"></div>
              <script id="document-template" type="text/x-handlebars-template">
                <table class="table-sm table-bordered table-striped" style="width:100%">
                  <thead>
                    <tr>
                      @{{{thsource}}}
                    </tr>
                  </thead>
                  <tbody>
                    @{{#each this}}
                    <tr>
                      @{{{tdsource}}}
                    </tr>
                    @{{/each}}
                  </tbody>
                </table>
              </script>
            </div> -->

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
<!-- <script type="text/javascript">
  $(document).on('click','#search', function(){
    var year_id = $('#year_id').val();
    var class_id = $('#class_id').val();
    // $('.notifyjs-corner').html('');
    if(year_id == ''){
      alert('Missing Year');
      return false;
    }
    if(class_id == ''){
      alert('Missing Class');
      return false;
    }
    $.ajax({
      url: "{{ route('students.reg.fee.get-student') }}",
      type: "GET",
      data: {'year_id':year_id,'class_id':class_id},
      beforeSend: function() {
      },
      success: function(data){
        var source = $('#document-template').html();
        var template = Handlebars.compile(source);
        var html = template(data);
        $('#documentResults').html(html);
        $('[data-toggle="tooltip"]').tooltip();
      }
    });
  });
</script> -->

@endsection
