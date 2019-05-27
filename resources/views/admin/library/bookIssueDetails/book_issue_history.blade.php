<div class="box"  id="history_book_issue"> 
  <div class="box-body"> 
      <div class="row"> 
          <div class="col-lg-12" >
          <h5>Book Issue History</h5>
          <table class="table">
          	<thead>
          		<tr>
          			 
          			<th>Accession No</th>
          			<th>Book Name</th>
          			<th>Ticket No</th>
          		</tr>
          	</thead>
          	<tbody>
          		@foreach($bookIssueDetailsHistorys as $bookIssueDetailsHistory)
          		<tr>
          			<td>{{ $bookIssueDetailsHistory->bookaccession->accession_no or '' }}</td>
          			<td>{{ $bookIssueDetailsHistory->bookaccession->booktype->name or ''  }}</td>
          			<td>{{ $bookIssueDetailsHistory->ticket_no or '' }}</td>
          		</tr>
          		@endforeach
          	</tbody>
          </table>
          </div>
      </div> 
  </div>
  

</div>
