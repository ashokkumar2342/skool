<div class="col-lg-4">
	<div class="col-lg-4"> 
	  <label>Total Load</label>
     <input type="text" class="form-control" disabled value="{{ $classSubjectSavePeriod->no_of_period or '' }}">
	</div>
	<div class="col-lg-4"> 
	  <label>Load</label>
     <input type="text" class="form-control" disabled value="{{ $teacherSubjectClassSaveperiod}}">
	</div>
	<div class="col-lg-4">  
	  <label>Balance</label>
	  <input type="hidden" class="form-control" name="load_balance"  value="{{ ($classSubjectSavePeriod->no_of_period )  - ($teacherSubjectClassSaveperiod)}}">
     <input type="text" class="form-control" disabled value="{{ ($classSubjectSavePeriod->no_of_period )  - ($teacherSubjectClassSaveperiod)}}">
	</div>
	
</div>

<button type="button" class="btn btn-default hidden" id="btn_table_show_history" onclick="callAjax(this,'{{ route('admin.teacher.subject.wise.period.history') }}'+'?class_id='+$('#class_id').val()+'&section_id='+$('#section_id').val()+'&subject_id='+$('#subject_id').val(),'all_teacher_history_table')"></button>



	<script type="text/javascript">
     

     $('#btn_table_show_history').click();
  </script>