@if ($reportType=='message_purpose')
	<div class="col-lg-4">
	<div class="form-group">
		<label>Message Purpose</label>
		<select name="message_purpose_id" class="form-control">
			@foreach ($messagePurposes as $messagePurpose)
			     <option value="{{ $messagePurpose->id }}">{{ $messagePurpose->name }}</option>  
			@endforeach
		</select> 
	</div> 
</div> 
@endif
@if ($reportType=='user')
	<div class="col-lg-4">
	<div class="form-group">
		<label>User</label>
		<select name="user_id" class="form-control select2">
			@foreach ($admins as $admin)
			     <option value="{{ $admin->id }}">{{ $admin->email }} ({{ $admin->first_name }})</option>  
			@endforeach
		</select> 
	</div> 
</div> 
@endif
@if ($reportType=='student')
	<div class="col-lg-4">
	<div class="form-group">
		<label>User</label>
		<select name="student_id" class="form-control select2">
			@foreach ($students as $student)
			     <option value="{{ $student->id }}">{{ $student->registration_no }} ({{ $student->name }})</option>  
			@endforeach
		</select> 
	</div> 
</div> 
@endif
@if ($reportType=='class')
	<div class="col-lg-4">
	<div class="form-group">
		<label>Class</label>
		<select name="class_id" class="form-control">
			@foreach ($classes as $class)
			     <option value="{{ $class->id }}">{{ $class->name }}</option>  
			@endforeach
		</select> 
	</div> 
</div> 
@endif
@if ($reportType=='mobile')
	<div class="col-lg-4">
	<div class="form-group">
		<label>Mobile No.</label>
		<input type="number" name="mobile_no" class="form-control" placeholder="Enter Mobile No.">
		 
	</div> 
</div> 
@endif
@if ($reportType=='date')
	<div class="col-lg-4">
	<div class="form-group"> 
		<label>Date Range</label> 
	<input type="text" name="daterange" class="form-control ">
	</div> 
</div> 
@endif
@if ($reportType=='general')
	<div class="col-lg-4">
	<div class="form-group">
		<label>General</label>
		<input type="text" name="general" class="form-control" placeholder=""> 
	</div> 
</div> 
@endif
<div class="col-lg-4">
	<div class="form-group"> 
		<input type="submit" class="btn btn-success" value="Show" style="margin-top: 24px"> 
	</div> 
</div> 
 