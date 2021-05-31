@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Marks Edit</h1>
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
              <form class="" id="myForm" action="{{ route('marks.update') }}" method="post">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="year_id">Year <font style="color:red;">*</font></label>
                    <select class="form-control form-control-sm" name="year_id" id="year_id">
                      <option value="">Select Year</option>
                      @foreach($years as $year)
                      <option value="{{$year->id}}">{{ $year->name }}</option>
                      @endforeach
                    </select>
                    <font style="color:red;">{{ ($errors->has('year_id')) ? ($errors->first('year_id')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="class_id">Class <font style="color:red;">*</font></label>
                    <select class="form-control form-control-sm" name="class_id" id="class_id">
                      <option value="">Select Class</option>
                      @foreach($classes as $class)
                      <option value="{{$class->id}}">{{ $class->name }}</option>
                      @endforeach
                    </select>
                    <font style="color:red;">{{ ($errors->has('class_id')) ? ($errors->first('class_id')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="">Subject<font style="color:red;">*</font></label>
                    <select class="form-control form-control-sm" name="assign_subject_id" id="assign_subject_id">
                      <option value="">Select Subject</option>
                    </select>
                    <font style="color:red;">{{ ($errors->has('assign_subject_id')) ? ($errors->first('assign_subject_id')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="">Exam Name<font style="color:red;">*</font></label>
                    <select class="form-control form-control-sm" name="exam_types_id" id="exam_types_id">
                      <option value="">Select Exam Type</option>
                      @foreach($exam_types as $exam_type)
                      <option value="{{$exam_type->id}}">{{ $exam_type->name }}</option>
                      @endforeach
                    </select>
                    <font style="color:red;">{{ ($errors->has('exam_types_id')) ? ($errors->first('exam_types_id')) : '' }}</font>
                  </div>
                  <div class="form-group col-md-2" style="">
                    <a id="search" class="btn btn-primary btn-sm" name="search">Search</a>
                  </div>
                </div>
                <br>
                <div class="row d-none" id="marks-entry">
                  <div class="col-md-12">
                    <table class="table table-bordered table-striped dt-responsive" style="width:100%">
                      <thead>
                        <tr>
                          <th>ID No</th>
                          <th>Student Name</th>
                          <th>Gender</th>
                          <th>Father Name</th>
                          <th>Marks</th>
                        </tr>
                      </thead>
                      <tbody id="marks-entry-tr">

                      </tbody>
                    </table>
                  </div>
                </div>
                <button type="submit" class="btn btn-success btn-sm">Update</button>
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
    var assign_subject_id = $('#assign_subject_id').val();
    var exam_types_id = $('#exam_types_id').val();
    // $('.notifyjs-corner').html('');
    if(year_id == ''){
      alert('Missing Year');
      return false;
    }
    if(class_id == ''){
      alert('Missing Class');
      return false;
    }
    if(assign_subject_id == ''){
      alert('Missing Subject');
      return false;
    }
    if(exam_types_id == ''){
      alert('Missing Exam Type');
      return false;
    }
    $.ajax({
      url: "{{ route('get-marks') }}",
      type: "GET",
      data: {'year_id':year_id,'class_id':class_id,'assign_subject_id':assign_subject_id,'exam_types_id':exam_types_id},
      success: function(data){
        $('#marks-entry').removeClass('d-none');
        var html = '';
        $.each(data, function(key, v){
          html +=
          '<tr>'+
          '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student.id+'"><input type="hidden" name="id_no[]" value="'+v.student.id_no+'"></td>'+
          '<td>'+v.student.name+'</td>'+
          '<td>'+v.student.gender+'</td>'+
          '<td>'+v.student.fname+'</td>'+
          '<td><input type="text" class="form-control form-control-sm" name="marks[]" value="'+v.marks+'"</td>'+
          '</tr>';

        });
        html = $('#marks-entry-tr').html(html);
      }
    });
  });
</script>

<script type="text/javascript">
  $(function(){
    $(document).on('change','#class_id',function(){
      var class_id = $(this).val();
      $.ajax({
        url:"{{ route('get-subjects') }}",
        type:"GET",
        data:{class_id:class_id},
        success:function(data){
          var html = '<option value="">Select Subject</option>';
          $.each(data,function(key,v){
            html += '<option value="'+v.id+'">'+v.subject.name+'</option>';
          });
          $('#assign_subject_id').html(html);
        }
      });
    })
  });
</script>

@endsection
