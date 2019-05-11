 <table id="books_issue_data_table" class="table table-bordered table-striped table-hover"> 
    <thead>
      <tr>
         
        <th>Member Ship Type</th>
        <th>Aceession No</th>
        <th>No Of Ticket</th>
        <th>Issue Date</th>
        <th>Issue Upto Date</th>
        <th>Return Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
     @foreach ($bookIssueDetails as $bookIssueDetail) 
      <tr> 
        <td>{{ $bookIssueDetail->librarymembertype->member_ship_type }}</td>
        <td>{{ $bookIssueDetail->bookaccession->accession_no or '' }}</td>
        <td>{{ $bookIssueDetail->ticketdetails->name }}</td>
        <td>{{ date('d-m-Y', strtotime( $bookIssueDetail->issue_date)) }}</td>
        <td>{{ date('d-m-Y', strtotime( $bookIssueDetail->issue_up_to_date)) }}</td>
        <td>{{ date('d-m-Y', strtotime($bookIssueDetail->return_able)) }}</td>
        <td>
          <button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.library.book.issue.details.edit',Crypt::encrypt($bookIssueDetail->id)) }}')"><i class="fa fa-edit"></i></button>

             <a href="{{ route('admin.library.book.issue.details.delete',Crypt::encrypt($bookIssueDetail->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>

        </td>
         
      </tr>
     @endforeach
    </tbody>
  </table> 