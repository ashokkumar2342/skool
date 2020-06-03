<div class="panel panel-default"> 
<div class="panel-body"> 

<div class="row">
<div class="col-lg-6 form-group">
  <label>Message Purpose</label>
  <select name="message_purpose" id="message_purpose_box" required=""  class="form-control" data-table-without-pagination-disable-sorting="author_table" onchange="callAjax(this,'{{ route('admin.sms.template.onchange') }}','sms_history_table')" >
    <option selected disabled>Select Message Purpose</option>
      @foreach ($messagePurposes as $messagePurpose)
        <option value="{{ $messagePurpose->id }}">{{ $messagePurpose->name }}</option> 
       @endforeach 
  </select> 
</div>
<input type="hidden" name="conditionId" id="conditionId" value="{{ $conditionId }}">
{{-- @if ($conditionId==0)
<div class=" form-group col-lg-6">
<label>Mobile</label>
<input type="text" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="mobile" placeholder="Enter Mobile No." required=""> 
</div>	
@endif --}}
@if ($conditionId==1)
<div class="form-group col-lg-6">
  <label>Class</label><br>
  <select name="class_id[]" class="form-control multiselect" multiple="multiple" required=""> 
    @foreach($classTypes as $classType)
    <option value="{{ $classType->id }}">{{ $classType->name }}</option>
    @endforeach
  </select>
</div> 
@endif
@if ($conditionId==2)
<div class="form-group col-lg-3">
  <label>Class</label>
  <select name="class_id" class="form-control" multiselect-form="true" onchange="callAjax(this,'{{ route('admin.sms.section.multiple') }}','section_id_div')" required="">
    <option selected disabled>Select Class</option>
    @foreach($classTypes as $classType)
    <option value="{{ $classType->id }}">{{ $classType->name }}</option>
    @endforeach
  </select>
</div>
<div class="form-group col-lg-3 " id="section_id_div">
  <label>Section</label><br>
  <select  class="form-control multiselect" name="section[]" multiple="multiple" required="">
    <option selected disabled>Select Section</option> 
  </select>
</div> 	
@endif
@if ($conditionId==3)
<div class="form-group col-lg-6">
  <label>Student</label></br>
  <select name="student[]" class="form-control multiselect" multiple="multiple"  required="">
     
    @foreach($students as $student)
    <option value="{{ $student->id }}">{{ $student->name }}--{{ $student->registration_no }}</option>
    @endforeach
  </select>
</div> 
@endif

<div class="form-group col-md-12">
  <label>Message: (Hints : #SN# Replace Student Name)</label>
  <textarea class="form-control" name="message" id="textarea" placeholder="Enter message" required="" style="height: 100px"></textarea> 
 <span id="textarea_feedback">160 characters remaining</span>
</div>  
</div>
@php
  $date = date('Y-m-d');
    $time = date('H:i:s');
    $date_time =$date.'T'.$time;
@endphp
<div class="col-lg-4 form-group ">
<label for="date_time">Send (date and time):</label>
  <input type="datetime-local" id="date_time" name="date_time" value="{{ $date_time }}" required=""> 
 </div> 
 <div class="col-lg-4 form-group">
<input type="submit" class="btn btn-primary form-control" value="Send" style="margin-top: 20px">   
 </div> 

</div>
</div>
<script>
  $(document).ready(function() {
      var text_max = 0;
      $('#textarea_feedback').html(text_max + ' characters ');

      $('#textarea').keyup(function() {
          var text_length = $('#textarea').val().length;
           

          $('#textarea_feedback').html(text_length + ' characters');
      });
    }); 
</script>