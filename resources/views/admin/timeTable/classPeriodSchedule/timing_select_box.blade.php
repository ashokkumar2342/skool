<div class="col-lg-3">
<label>Time</label>
<select name="from_time" class="form-control">
	<option selected disabled>Select Timing</option> 
	@foreach ($periodTimings as $periodTiming) 
	<option value="{{ $periodTiming->id }}">{{ $periodTiming->from_time  }}</option>
	@endforeach
	 
</select>
</div>