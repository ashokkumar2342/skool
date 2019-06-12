
<div class="col-lg-3">
	<select name="group_no" class="form-control">
		<option value="1">Group 1</option>
		<option value="2">Group 2</option>
		<option value="3">Group 3</option>
		 
	</select>
	
</div>
<div class="col-lg-12" style="margin-top: 10px">
	
<select class='pre-selected-options' multiple='multiple'>
   
  @foreach ($subjects as $subject)
  <option value='{{ $subject->id }}'>{{ $subject->classTypes->name or '' }}</option>
  @endforeach 
</select>
</div>
<div class="col-lg-3 text-center" >

	<input type="submit" class="btn btn-success" style="margin-top: 10px">
	
</div>
 
