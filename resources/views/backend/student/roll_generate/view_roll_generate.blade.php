@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Roll Generate</h1>
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
              <h3>Search Criteria
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <form class="" id="myForm" action="{{ route('students.roll.store') }}" method="post">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="year_id">Year <font style="color:red;">*</font></label>
                    <select class="form-control form-control-sm" name="year_id" id="year_id">
                      <option value="">Select Year</option>
                      @foreach($years as $year)
                      <option value="{{$year->id}}">{{ $year->name }}</option>
                      @endforeach
                    </select>
                    <font style="color:red;">{{ ($errors->has('year_id')) ? ($errors->first('year_id')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="class_id">Class <font style="color:red;">*</font></label>
                    <select class="form-control form-control-sm" name="class_id" id="class_id">
                      <option value="">Select Class</option>
                      @foreach($classes as $class)
                      <option value="{{$class->id}}">{{ $class->name }}</option>
                      @endforeach
                    </select>
                    <font style="color:red;">{{ ($errors->has('class_id')) ? ($errors->first('class_id')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-4" style="padding-top:30px;">
                    <a id="search" class="btn btn-primary btn-sm" name="search">Search</a>
                  </div>
                </div>
                <br>
                <div class="row d-none" id="roll-generate">
                  <div class="col-md-12">
                    <table class="table table-bordered table-striped dt-responsive" style="width:100%">
                      <thead>
                        <tr>
                          <th>ID No</th>
                          <th>Student Name</th>
                          <th>Gender</th>
                          <th>Father Name</th>
                          <th>Roll No</th>
                        </tr>
                      </thead>
                      <tbody id="roll-generate-tr">

                      </tbody>
                    </table>
                  </div>
                </div>
                <button type="submit" class="btn btn-success btn-sm">Roll Generate</button>
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
      url: "{{ route('students.get') }}",
      type: "GET",
      data: {'year_id':year_id,'class_id':class_id},
      success: function(data){
        $('#roll-generate').removeClass('d-none');
        var html = '';
        $.each(data, function(key, v){
          html +=
          '<tr>'+
          '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student.id+'"></td>'+
          '<td>'+v.student.name+'</td>'+
          '<td>'+v.student.fname+'</td>'+
          '<td>'+v.student.gender+'</td>'+
          '<td><input type="text" class="form-control form-control-sm" name="roll[]" value="'+v.roll+'"</td>'+
          '</tr>';

        });
        html = $('#roll-generate-tr').html(html);
      }
    });
  });
</script>

@endsection
