 {{ Form::label('sub_menu','Section Assign',['class'=>' control-label']) }} <br>
<select class="multiselect" multiple="multiple"  name="section[]" > 
  {{-- @foreach ($classes as $class) 
    <optgroup label="{{ $class->name }}">  --}}
      @foreach ($sections as $section)
      {{-- @if ($class->id==$section->class_id) --}}
          <option value="{{ $section->section_id }}" {{ in_array($section->section_id, $usersSections)?'selected':'' }}>{{ $section->sectionTypes->name or '' }}</option> 
      {{-- @endif --}}
       
       @endforeach 
   {{--  </optgroup>
  @endforeach   --}}
     
</select>

<input type="submit" value="Save" class="btn btn-success btn-sm" style="float: right;">
