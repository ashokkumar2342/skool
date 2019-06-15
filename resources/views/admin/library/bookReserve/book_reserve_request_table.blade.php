 <table id="books_reserve_request_data_table" class="table table-bordered table-striped table-hover"> 
    <thead>
      <tr>
        <th class="text-nowrap">Registration no</th>
        <th>Book Name</th>
        <th class="text-nowrap">Accession No</th>
        <th class="text-nowrap">Request Date</th>
        <th class="text-nowrap">Reserve Date</th>
        <th class="text-nowrap">Reserve Upto</th>
        <th>Status</th>
       
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
     @foreach ($bookReserveRequests as $bookReserveRequest) 
      <tr>
        <td>{{ $bookReserveRequest->memberShipDetails->member_ship_registration_no or '' }}</td>
        <td>{{ $bookReserveRequest->booktype->name or '' }}</td>
        <td>{{ $bookReserveRequest->bookAccession->accession_no or '' }}</td>
        <td>{{  date('d-m-Y',strtotime($bookReserveRequest->created_at))}}</td> 
         
        <td>{{  $bookReserveRequest->reserve_date==null? '' : date('d-m-Y',strtotime($bookReserveRequest->reserve_date))}}</td> 

        <td>{{  $bookReserveRequest->reserve_upto_date==null? '' : date('d-m-Y',strtotime($bookReserveRequest->reserve_upto_date))}}</td> 
        <td>
          
          <span class="{{ $bookReserveRequest->bookReserveStatus->admin_color or '' }}">{{ $bookReserveRequest->bookReserveStatus->name or '' }}</span>
        </td>
         
        
        <td>
      

             <a href="{{ route('admin.library.book.reserve.cancel',$bookReserveRequest->id) }}" class="btn btn-danger btn-sm" title="Cancel">Cancel</a>

        </td>
         
      </tr>
     @endforeach
    </tbody>
  </table> 
