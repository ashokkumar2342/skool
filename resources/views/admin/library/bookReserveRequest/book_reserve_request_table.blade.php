 <table id="books_reserve_request_data_table" class="table table-bordered table-striped table-hover"> 
    <thead>
      <tr>
        <th>Member Ship Type</th>
        <th>Book Name</th>
        <th>Upto Reserve Date</th>
        <th>Request Valid Upto</th> 
        <th>Issue Date</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
     @foreach ($bookReserveRequests as $bookReserveRequest) 
      <tr>
        <td>{{ $bookReserveRequest->librarymembertype->member_ship_type }}</td>
        <td>{{ $bookReserveRequest->booktype->name }}</td>
        <td>{{  date('d-m-Y', strtotime( $bookReserveRequest->book_reserve_request)) }}</td>
        <td>{{ date('d-m-Y', strtotime( $bookReserveRequest->due_date)) }}</td>
       
        <td>{{ date('d-m-Y', strtotime( $bookReserveRequest->issue_date)) }}</td>
         <td>{{ $bookReserveRequest->bookstatus->name or '' }}</td>
        
        <td>
          <button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.library.book.reserve.edit',Crypt::encrypt($bookReserveRequest->id)) }}')"><i class="fa fa-edit"></i></button>

             <a href="{{ route('admin.library.book.reserve.delete',Crypt::encrypt($bookReserveRequest->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>

        </td>
         
      </tr>
     @endforeach
    </tbody>
  </table> 
