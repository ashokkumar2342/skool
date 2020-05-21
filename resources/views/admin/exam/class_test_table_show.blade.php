 <table id="route_table" class="display table">                     
                        <thead>
                            <tr>
                                <th>Sn</th>
                               
                                <th>Academic Year</th> 
                                <th>Class</th> 
                                <th>Section</th> 
                                <th>Subject</th>                                             
                                <th>Test Date</th>                                          
                                <th>Max marks</th>                                            
                                <th>Highest Marks</th>                      
                                <th>Avg Marks</th>                                            
                                <th>Discription</th>                                                             
                                <th><span class="text-nowrap"  style="margin :70px">Action </span></th>                                                            
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($classTests as $classTest)
                        	<tr>
                        		<td>{{ ++$loop->index }}</td>
                        	 
                            <td>{{ $classTest->academicYear->name or ''}}</td>
                            <td>{{ $classTest->classes->name or ''}}</td>
                            <td>{{ $classTest->sectionTypes->name or '' }}</td>
                            <td>{{ $classTest->subjects->name or '' }}</td>
                            <td>{{ $classTest->test_date }}</td>
                            <td>{{ $classTest->max_marks }}</td> 
                            <td>{{ $classTest->highest_marks }}</td> 
                            <td>{{ $classTest->avg_marks }}</td> 
                            <td>{{ $classTest->discription or ''}}</td> 
                        		<td> 
                             
                        			<a href="{{ route('admin.exam.classtest.delete',Crypt::encrypt($classTest->id)) }}"  onclick="return confirm('Are you sure you want to delete this item?');" class="btn_delete btn btn-danger btn-xs"    ><i class="fa fa-trash"></i></a>
                              
                              @if ($classTest->sylabus==null)
                                <a   class="btn btn-success btn-xs " disabled><i class="fa fa-download"></i></a>
                                @else
                                <a href="{{ route('admin.exam.classtest.download.syllabus',$classTest->sylabus) }}" target="_blank"  class="btn btn-success btn-xs"    ><i class="fa fa-download"></i></a>  
                              @endif
                              <a href="{{ route('admin.exam.classtest.send.sms',[$classTest->class_id,$classTest->section_id,$classTest->id]) }}"  class="btn btn-primary btn-xs">SMS &nbsp;<i class="fa fa-send"></i></a>
                              <a href="{{ route('admin.exam.classtest.send.email',[$classTest->class_id,$classTest->section_id,$classTest->id]) }}"  class="btn btn-danger btn-xs">Email &nbsp;<i class="fa fa-envelope"></i></a>
                              <a href="{{ route('admin.exam.classtest.compile',$classTest->id) }}" title=""  class="btn btn-warning btn-xs" button-click="btn_class_test_details_show">Compile</a>
                               
                               
                        		</td>
                        	</tr>  	 
                        @endforeach	
                           
                        </tbody>
                             

                    </table>