<div class="row">
	<div class="col-lg-3">
		<a onclick="callAjax(this,'{{ route('admin.student.admission.test.marks.filter',[$class_id,$academic_year_id,4]) }}','application_test_marks_list')" class="btn btn-warning">Pending</a> 
	</div>
	<div class="col-lg-3">
		<a onclick="callAjax(this,'{{ route('admin.student.admission.test.marks.filter',[$class_id,$academic_year_id,6]) }}','application_test_marks_list')" style="width: 80px" class="btn btn-success">Pass</a> 
	</div>
	<div class="col-lg-3">
		<a onclick="callAjax(this,'{{ route('admin.student.admission.test.marks.filter',[$class_id,$academic_year_id,7]) }}','application_test_marks_list')" style="width: 80px" class="btn btn-primary">Retest</a> 
	</div>
	<div class="col-lg-3">
		<a onclick="callAjax(this,'{{ route('admin.student.admission.test.marks.filter',[$class_id,$academic_year_id,8]) }}','application_test_marks_list')" style="width: 80px" class="btn btn-danger">Fail</a> 
	</div> 
</div>

 
