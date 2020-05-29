<div class="panel panel-default"> 
<div class="panel-body"> 
<form action="" method="get" accept-charset="utf-8">
<div class="row">
<div class="col-lg-6 form-group">
  <label>Message Purpose</label>
  <select name="message_purpose" id="message_purpose_box"  class="form-control" data-table-without-pagination-disable-sorting="author_table" onchange="callAjax(this,'{{ route('admin.sms.template.onchange') }}','sms_history_table')">
    <option selected disabled>Select Message Purpose</option>
      @foreach ($messagePurposes as $messagePurpose)
        <option value="{{ $messagePurpose->id }}">{{ $messagePurpose->name }}</option> 
       @endforeach 
  </select> 
</div>
@if ($conditionId==1)
<div class=" form-group col-lg-6">
<label>Mobile</label>
<input type="text" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="mobile" placeholder="Enter Mobile No." required=""  maxlength="10" > 
</div>	
@endif
@if ($conditionId==2)
<div class="form-group col-lg-6">
  <label>Class</label><br>
  <select name="class_id" class="form-control multiselect" multiple="multiple"> 
    @foreach($classTypes as $classType)
    <option value="{{ $classType->id }}">{{ $classType->name }}</option>
    @endforeach
  </select>
</div> 
@endif
@if ($conditionId==3)
<div class="form-group col-lg-3">
  <label>Class</label>
  <select name="class_id" class="form-control" onchange="callAjax(this,'{{ route('admin.teacher.class.wise.section.addForm') }}','section_id_div')">
    <option selected disabled>Select Class</option>
    @foreach($classTypes as $classType)
    <option value="{{ $classType->id }}">{{ $classType->name }}</option>
    @endforeach
  </select>
</div>
<div class="form-group col-lg-3 " id="section_id_div">
  <label>Section</label><br>
  <select  class="form-control multiselect" multiple="multiple">
    <option selected disabled>Select Section</option> 
  </select>
</div> 	
@endif

<div class="form-group col-md-12">
  <label>Message:</label>
  <textarea class="form-control" name="message" id="textarea" placeholder="Enter message" required="" style="height: 100px"></textarea> 
 <span id="textarea_feedback">160 characters remaining</span>
</div>  
</div> 
</form>
</div>
</div>
