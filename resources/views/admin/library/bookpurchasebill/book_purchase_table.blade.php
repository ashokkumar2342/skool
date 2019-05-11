 <table id="books_purchase_data_table" class="table table-bordered table-striped table-hover"> 
    <thead>
      <tr>
        <th>Purchase Date</th>
        <th>Vendor Name</th>
        <th>Mobile No</th>
        <th>Email</th>
        <th>Address</th>
        <th>Bill No</th>
        <th>Total Amount</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
     @foreach ($bookpurchases as $bookpurchase) 
      <tr>
        <td>{{ date('d-m-Y', strtotime( $bookpurchase->book_purchase_date)) }}</td>
        <td>{{ $bookpurchase->vendor_name }}</td>
        <td>{{ $bookpurchase->mobile }}</td>
        <td>{{ $bookpurchase->email }}</td>
        <td>{{ $bookpurchase->address }}</td>
        <td>{{ $bookpurchase->bill_no }}</td>
        <td>{{ $bookpurchase->total_amount }}</td>
        <td>
          <button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.library.purchase.details.edit',Crypt::encrypt($bookpurchase->id)) }}')"><i class="fa fa-edit"></i></button>

             <a href="{{ route('admin.library.purchase.details.delete',Crypt::encrypt($bookpurchase->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>

        </td>
         
      </tr>
     @endforeach
    </tbody>
  </table> 