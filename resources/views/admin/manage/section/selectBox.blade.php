  <div class="form-group" >
  <label>Section</label>
 <select name="section" class="form-control">
 	@foreach ($sections as $section)
 		<option value="{{ $section->id }}">{{ $section->name }}</option> 
 	@endforeach 
 </select>
</div>