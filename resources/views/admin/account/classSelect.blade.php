 {{ Form::label('sub_menu','Class Assign',['class'=>' control-label']) }} <br>
<select class="multiselect" multiple="multiple"  name="section[]" > 
  @foreach ($classes as $class) 
    <optgroup label="{{ $class->name }}"> 
      @foreach ($sections as $section)
      @if ($class->id==$section->class_id)
          <option value="{{ $section->section_id }}">{{ $section->sectionTypes->name or '' }}</option> 
      @endif
       
       @endforeach 
    </optgroup>
  @endforeach  
     
</select>
