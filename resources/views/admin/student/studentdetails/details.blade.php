<div class="col-lg-6">
	<span>Name : <b>{{ $student->name }}</b></span><br>
	<span>Admission No : <b>{{ $student->admission_no }}</b></span><br>
	<span>Father's Name : <b>{{ $student->parents[0]->parentInfo->name }}</b></span>
</div>
 