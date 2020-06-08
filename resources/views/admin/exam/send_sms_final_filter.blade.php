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
            <td class="text-nowrap">{{ ++$loop->index }}</td> 
            <td class="text-nowrap">{{ $classTest->academicYear->name or ''}}</td>
            <td class="text-nowrap">{{ $classTest->classes->name or ''}}/{{ $classTest->sectionTypes->name or '' }}</td>
             
            <td class="text-nowrap">{{ $classTest->subjects->subjectTypes->name or '' }}</td>
            <td class="text-nowrap">{{ date('d-m-Y',strtotime($classTest->test_date)) }}</td>
            <td class="text-nowrap">{{ $classTest->max_marks }}</td> 
            <td class="text-nowrap">{{ $classTest->highest_marks }}</td> 
            <td class="text-nowrap">{{ $classTest->avg_marks }}</td> 
            <td class="text-nowrap">{{ $classTest->discription or ''}}</td> 
            <td class="text-nowrap">
             
        </tr>  	 
        @endforeach	 
    </tbody> 
</table>