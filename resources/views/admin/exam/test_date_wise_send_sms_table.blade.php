
@foreach ($classTests as $classTest)
<tr style="{{ $classTest->sms_test_status==1?'background-color: #95e49b':'' }}"> 
    <td class="text-nowrap"><input type="checkbox" class="checkbox" name="class_test_id[]" value="{{ $classTest->id }}"></td> 
    <td class="text-nowrap">{{ $classTest->academicYear->name or ''}}</td>
    <td class="text-nowrap">{{ $classTest->classes->name or ''}}/{{ $classTest->sectionTypes->name or '' }}</td> 
    <td class="text-nowrap">{{ $classTest->subjects->subjectTypes->name or '' }}</td>
    <td class="text-nowrap">{{ date('d-m-Y',strtotime($classTest->test_date)) }}</td>
    <td class="text-nowrap">{{ $classTest->max_marks }}</td> 
    <td class="text-nowrap">{{ $classTest->highest_marks }}</td> 
    <td class="text-nowrap">{{ $classTest->avg_marks }}</td> 
    <td class="text-nowrap">{{ $classTest->discription or ''}}</td>  
</tr>  	 
@endforeach	
 
     
