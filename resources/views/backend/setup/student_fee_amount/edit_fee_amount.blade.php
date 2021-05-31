@extends('backend.layouts.master')
https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js
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
              <h3>
                Edit Student Fee Amount
                <a href="{{ route('setups.student.amount.view') }}" class="btn btn-success float-right"> <i class="fa fa-list"></i>Student Fee Amount List</a>
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <form method="post" action="{{ route('setups.student.amount.update',$editData[0]->fee_category_id) }}" id="myForm" enctype="multipart/form-data">
                @csrf
                <div class="add_item">
                  <div class="form-row">
                    <div class="form-group col-md-5">
                      <label for="fee_category">Fee Category</label>
                      <select class="form-control" name="fee_category_id" required>
                        <option value="">Select Fee Category</option>
                        @foreach($student_fees as $fee_category)
                          <option value="{{ $fee_category->id }}" {{ ($editData[0]->fee_category_id == $fee_category->id) ? 'selected' : '' }}>{{ $fee_category->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <?php
                    $flag = 0;
                    ?>
                  @foreach($editData as $data)
                  <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                    <div class="form-row">
                      <div class="form-group col-md-5">
                        <label for="class">Student Class</label>
                        <select class="form-control" name="student_class_id[]" required>
                          <option value="">Select Student Class</option>
                          @foreach($student_classes as $class)
                            <option value="{{ $class->id }}" {{ ($data->student_class_id == $class->id) ? 'selected' : '' }}>{{ $class->name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group col-md-5">
                        <label for="amount">Amount</label>
                        <input type="text" name="amount[]" value="{{ $data->amount }}" class="form-control" required>
                      </div>
                      <div class="form-group col-md-2" style="padding-top:30px;">
                        <div class="form-row">
                          <span class="btn btn-success addeventmore"> <i class="fa fa-plus-circle"></i> </span>
                            @if($flag>0)
                            <span class="btn btn-danger removeeventmore"> <i class="fa fa-minus-circle"></i> </span>
                            @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php $flag++; ?>
                  @endforeach
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
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

<div style="visibility: hidden;">
  <div class="whole_extra_item_add" id="whole_extra_item_add">
    <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
      <div class="form-row">
        <div class="form-group col-md-5">
          <label for="class">Student Class</label>
          <select class="form-control" name="student_class_id[]" required>
            <option value="">Select Student Class</option>
            @foreach($student_classes as $class)
              <option value="{{ $class->id }}">{{ $class->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-5">
          <label for="amount">Amount</label>
          <input type="text" name="amount[]" class="form-control" required>
        </div>
        <div class="form-group col-md-1" style="padding-top:30px;">
          <div class="form-row">
            <span class="btn btn-success addeventmore"> <i class="fa fa-plus-circle"></i> </span>
            <span class="btn btn-danger removeeventmore"> <i class="fa fa-minus-circle"></i> </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function (){
    var counter = 0;
    $(document).on("click",".addeventmore", function(){
      var whole_extra_item_add = $("#whole_extra_item_add").html();
      $(this).closest(".add_item").append(whole_extra_item_add);
      counter++;
    });
    $(document).on("click",".removeeventmore", function(event){
      $(this).closest(".delete_whole_extra_item_add").remove();
      counter -= 1;
    });
  });
</script>

<!-- <script type="text/javascript">
/ Wait for the DOM to be ready
$(function() {
// Initialize form validation on the registration form.
// It has the name attribute "registration"
$("form[name='registration']").validate({
  // Specify validation rules
  rules: {
    // The key name on the left side is the name attribute
    // of an input field. Validation rules are defined
    // on the right side
    student_class_id[]: "required",
    amount[]: "required",
  },
  // Specify validation error messages
  messages: {
    student_class_id[]: "Please student class",
    amount[]: "Please enter amount"
  },
  // Make sure the form is submitted to the destination defined
  // in the "action" attribute of the form when valid
  submitHandler: function(form) {
    form.submit();
  }
});
});
</script> -->

@endsection
