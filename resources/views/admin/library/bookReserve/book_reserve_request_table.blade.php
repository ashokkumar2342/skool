 <table id="books_reserve_request_data_table" class="table table-bordered table-striped table-hover"> 
    <thead>
      <tr>
        <th>Member Ship Registration no</th>
        <th>Book Name</th>
        <th>Reserve Date</th>
       
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
     @foreach ($bookReserveRequests as $bookReserveRequest) 
      <tr>
        <td>{{ $bookReserveRequest->memberShipDetails->member_ship_registration_no or '' }}</td>
        <td>{{ $bookReserveRequest->booktype->name or '' }}</td>
        <td>{{  date('d-m-Y',strtotime($bookReserveRequest->created_at))}}</td> 
         
        
        <td>
          <button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.library.book.reserve.edit',Crypt::encrypt($bookReserveRequest->id)) }}')"><i class="fa fa-edit"></i></button>

             <a href="{{ route('admin.library.book.reserve.delete',Crypt::encrypt($bookReserveRequest->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>

        </td>
         
      </tr>
     @endforeach
    </tbody>
  </table> 
