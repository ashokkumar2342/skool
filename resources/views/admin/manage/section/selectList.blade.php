 {{ Form::label('section','Section',['class'=>' control-label']) }} <br>
<select class="multiselect" multiple="multiple"  name="section_id[]" > 
  {{-- @foreach ($classes as $class) 
    <optgroup label="{{ $class->name }}">  --}}
      @foreach ($sectionTypes as $section)
      {{-- @if ($class->id==$section->class_id) --}}
          <option value="{{ $section->id }}" {{ in_array($section->id, $classSections)?'selected':'' }}>{{ $section->name  }}</option> 
      {{-- @endif --}}
       
       @endforeach 
   {{--  </optgroup>
  @endforeach   --}}
     
</select>
<input type="submit" value="Save" class="btn btn-success">