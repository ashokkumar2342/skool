@foreach ($subjectTypes as $subjectType) 
	@php
	 
 
    $checked = \App\Model\Subject::where(['subjectType_id'=>$subjectType->id,'classType_id'=>$class])->count()?'checked':'';
  
    @endphp
    <tr>
    <td>{{ $subjectType->code }}</td>
    <td>  
    	<input type="checkbox" class="checkbox" {{ $checked }} onchange="if (this.checked) {
        $('#Optional{{ $subjectType->id }}').prop('checked', true)
        $('#Compulsory{{ $subjectType->id }}').prop('checked', true)
      }else{
        $('#Compulsory{{ $subjectType->id }}').prop('checked', false)
        $('#Optional{{ $subjectType->id }}').prop('checked', false)

      }" id="subject{{ $subjectType->id }}" name="subject_id[]" value="{{ $subjectType->id }}">
    </td>
    <td>{{ $subjectType->name }}</td>
     '; 

    @foreach(\App\Model\Isoptional::all() as $optional)
    @php
    	$checked = (\App\Model\Subject::where(['subjectType_id'=>$subjectType->id,'isoptional_id'=>$optional->id,'classType_id'=>$class])->count())?'checked':'';
    @endphp
        
              <td >
              <label class="radio-inline">
              	<input type="radio" {{ $checked }} id="{{ $optional->name }}{{ $subjectType->id }}" onclick="$('#subject{{ $subjectType->id }}').prop('checked', true)" name="value[{{ $subjectType->id }}]" class="{{ str_replace(' ', '_', strtolower($optional->name)) }}"   value="{{ $optional->id }}"> {{ $optional->name }} </label>
              </td>';
    @endforeach
     </tr> 
    
@endforeach 