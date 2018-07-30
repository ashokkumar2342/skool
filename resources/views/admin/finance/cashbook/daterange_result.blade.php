 
 <div class="table-responsive">
  <table id="result_table_id" class="display  table-responsive dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="result_table_id" style="width: 100%;">
       <thead>
           <tr>
               <th> receipt no</th>
               <th>student name</th>
               <th>class</th>
               <th>roll no</th>
               <th>registration no</th>
               <th> father name</th>
               <th>receipt date</th>
               <th>receipt amount</th>
               <th>deposit amount</th>
               <th>balance amount</th>
               <th>payment mode</th>
               <th>payment mode date</th>
               <th>bank name</th>
               <th>on account</th>
               <th>Action</th>
              
           </tr>
       </thead>
       <tbody>
          @foreach ($cashbooks as $cashbook)
             <tr>
                 <td>{{ $cashbook->receipt_no }}</td>
                 <td>{{ $cashbook->student_name }}</td>
                 <td>{{ $cashbook->class }}</td>
                 <td>{{ $cashbook->roll_no }}</td>
                 <td>{{ $cashbook->registration_no }}</td>
                 <td>{{ $cashbook->father_name }}</td>
                 <td>{{ $cashbook->receipt_date }}</td>
                 <td>{{ $cashbook->receipt_amount }}</td>
                 <td>{{ $cashbook->deposit_amount }}</td>
                 <td>{{ $cashbook->balance_amount }}</td>
                 <td>{{ $cashbook->payment_mode }}</td>
                 <td>{{ $cashbook->payment_mode_date }}</td>
                 <td>{{ $cashbook->bank_name }}</td>
                 <td>{{ $cashbook->on_account }}</td> 
                 <td>
                  <a href="{{ route('admin.cashbook.print',$cashbook->id) }}" target="blank" class="btn btn-success btn-xs" title="print"><i class="fa fa-print "></i></a>
                  <a onclick="callAjaxUrl('{{ route('admin.cashbook.cancel',$cashbook->id) }}')" href="javascript:"   class="btn btn-danger btn-xs" title="Reciept Cancel"><i class="fa fa-window-close "></i></a>
                 </td>
             </tr>  
          @endforeach
           
       </tbody>
   </table>
 </div>
   