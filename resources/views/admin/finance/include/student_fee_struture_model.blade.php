<div class="modal-dialog" style="width: 40%"> 
<div class="modal-content">
<div class="modal-header">
<button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
 <h4 class="modal-title">Student Fee Structures</h4>
</div>
<div class="modal-body">
<div class="row"> 
<div class="col-md-12"> 
<form class=" add_form" button-click="btn_close,btn_student_fee_assign_show"    action="{{ route('admin.studentFeeStructure.details.store',$student->id) }}" method="post"> 
{{ csrf_field() }}
<div class="row">
<div class="col-lg-12 form-group">
  <label>Fee Structures</label>
   <select name="fee_structure" id="fee_structure" class="form-control" onchange="callAjax(this,'{{ route('admin.studentFeeStructure.show.amount') }}','amount_input_box')">
    <option selected disabled>Select Fee Structures</option> 
      @foreach ($feeStructures as $feeStructure)
       <option value="{{ $feeStructure->id}}">{{ $feeStructure->name }}</option> 
      @endforeach 
   </select> 
</div>
<input type="hidden" name="academic_year_id" id="academic_year_id" value="{{ $academicYears->id }}">
<div id="amount_input_box"> 
</div>  
<div class="col-lg-12 form-group">
  <label>From Date</label>
  <input type="date" name="from_date" value="{{ $academicYears->start_date }}" class="form-control"> 
</div>
<div class="col-lg-12 form-group">
  <label>To Date</label>
  <input type="date" name="to_date" value="{{ $academicYears->end_date }}" class="form-control"> 
</div>
 <div class="col-lg-12 text-center"></br>                                             
 <button class="btn btn-success" type="submit" id="btn_fee_account_create">Submit</button> 
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
 

