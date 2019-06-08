<table class="table"> 
  <thead>
    <tr>
      <th></th>
      <th>No of Days</th>
      <th>Ticket No</th>
    </tr>
  </thead>
  <tbody>
     @foreach ($memberTicketDetails as $memberTicketDetail) 
    <tr>
     
          <td></td>
          <td>{{ $memberTicketDetail->membershipfacility->no_of_days or '' }}</td>
          <td>{{ $memberTicketDetail->ticket_no or '' }}</td>
    </tr>
      @endforeach

  </tbody>
</table>