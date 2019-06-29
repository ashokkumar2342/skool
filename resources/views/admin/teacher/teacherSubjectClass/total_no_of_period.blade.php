
<button type="button" class="btn btn-default hidden" id="btn_click" onclick="callAjax(this,'{{ route('admin.teacher.subject.wise.total.period.history') }}'+'?class_id='+$('#class_id').val()+'&section_id='+$('#section_id').val()+'&subject_id='+$('#subject_id').val(),'btn_click_teacher_history_table')"></button>

<div id="btn_click_teacher_history_table">
	
</div>

<script type="text/javascript">
     

     $('#btn_click').click();
  </script>