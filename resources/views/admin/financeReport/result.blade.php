 
 
  <h4><b>Total : {{ $cashbooks->sum('deposit_amount') }}</b></h4>
 
<div class="table-responsive"> 
<table id="student_fee_history_show_table_id" class="display  table-responsive dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="result_table_id" style="width: 100%;"> 
  <thead>
    <tr>
      <th>Receipt No</th>
       <th>Student Name</th>
       <th>Class</th>
       <th>Roll No</th>
       <th>Registration No</th>
       <th>Father Name</th>
       <th>Payment Mode</th>
       <th>Receipt Date</th>
       <th>Receipt Amount</th>
       <th>Deposit Amount</th>
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
         <td>{{ $cashbook->payment_mode }}</td>
         <td>{{ $cashbook->receipt_date }}</td>
         <td>{{ $cashbook->receipt_amount }}</td>
         <td>{{ $cashbook->deposit_amount }}</td>
      </tr> 
    @endforeach
  </tbody>
</table>
</div>
   