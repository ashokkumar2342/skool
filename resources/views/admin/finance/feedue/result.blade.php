 
 <div class="table-responsive">
  <table id="result_table_id" class="display  table-responsive dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="result_table_id" style="width: 100%;">
       <thead>
           <tr>
                
               <th>student name</th>
               <th>class</th>
               <th>roll no</th>
               <th>registration no</th>
               <th> father name</th>
               
               <th>Fee Amount</th>
          
              
           </tr>
       </thead>
       <tbody>
          @foreach ($feeDues as $feeDue)
             <tr>
                 
                 <td>{{ $feeDue->students->name }}</td>
                 <td>{{ $feeDue->students->classes->name }}</td>
                 <td>{{ $feeDue->students->roll_no }}</td>
                 <td>{{ $feeDue->students->registration_no }}</td>
                 <td>{{ $feeDue->students->father_name }}</td> 
                 <td>{{ $feeDue->fee_amount }}</td>
                  
                
             </tr>  
          @endforeach
           
       </tbody>
   </table>
 </div>
   