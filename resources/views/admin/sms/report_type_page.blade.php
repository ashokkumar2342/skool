 
@if ($reportType==3)
	<div class="col-lg-4">
	<div class="form-group">
		<label>User</label>
		<select name="user_id" class="form-control select2">
			<option value="0">All</option>
			@foreach ($admins as $admin)
			     <option value="{{ $admin->id }}">{{ $admin->email }} ({{ $admin->first_name }})</option>  
			@endforeach
		</select> 
	</div> 
</div> 
@endif 
@if ($reportType==1)
	<div class="col-lg-4">
	<div class="form-group">
		<label>Class</label>
		<select name="class_id" class="form-control select2">
			<option value="0">All</option>
			@foreach ($sections as $sections)
			     <option value="{{ $sections->id }}">{{ $sections->classes->name or ''}}/{{ $sections->sectionTypes->name or ''}}</option>  
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

 