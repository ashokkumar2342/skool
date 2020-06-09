<form action="{{ route('admin.mark.detail.send.sms.marks.test.filter.send') }}" method="post" class="add_form">
{{ csrf_field() }}
    
 <input type="hidden" name="condition_id" value="{{ $condition_id }}">    
 
<input type="submit" class="btn btn-info pull-right" value="Send SMS" style="width: 15%;margin: 10px" >
<table id="route_table" class="display table">                     
    <thead>
        <tr>
            <th>Sr.No.</th> 
            <th>Year</th> 
            <th>Class/Section</th>  
            <th>Subject</th>                                             
            <th>Date</th>                                          
            <th>M marks</th>                                            
            <th>H Marks</th>                      
            <th>A Marks</th>                                            
            <th>Description</th>                                          
                                                   
        </tr>
    </thead>
    <tbody>
        @foreach ($classTests as $classTest)
        <tr>
            <input type="hidden" name="class_test_id[]" value="{{ $classTest->id }}">
            <td class="text-nowrap">{{ ++$loop->index }}</td> 
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
    </tbody> 
</table>
</form>