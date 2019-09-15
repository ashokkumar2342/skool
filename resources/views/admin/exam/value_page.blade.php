
                            
                             <option selected disabled>Select Exam Term</option>
                             @foreach ($examTerms as $examTerm)
                                <option value="{{ $examTerm->id }}">From Date:{{ date('d-m-Y',strtotime($examTerm->from_date)) }} &nbsp;To Date:{{ date('d-m-Y',strtotime($examTerm->to_date)) }}</option> 
                             @endforeach
                             
                           
                           
                               
                          
                              
                      