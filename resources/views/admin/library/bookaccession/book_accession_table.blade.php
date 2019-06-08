 <table id="books_accession_data_table" class="table table-bordered table-striped table-hover"> 
    <thead>
      <tr>
        <th>Accession No</th>
        <th>ISBN No</th>
        <th>Book Name</th>
        <th>Bill No</th> 
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
     @foreach ($bookaccessions as $bookaccession) 
      <tr>
        <td>{{ $bookaccession->accession_no }}</td>
        <td>{{ $bookaccession->isbn_no }}</td>
        <td>{{ $bookaccession->booktype->name or '' }}</td>
        <td>{{ $bookaccession->bookpurchasebill->bill_no or ''}}</td>
        <td>{{ $bookaccession->libraryStatus->name or '' }}</td>
        
        <td>
          <button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.library.book.accession.edit',Crypt::encrypt($bookaccession->id)) }}')"><i class="fa fa-edit"></i></button>

             <a href="{{ route('admin.library.book.accession.delete',Crypt::encrypt($bookaccession->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>

        </td>
         
      </tr>
     @endforeach
    </tbody>
  </table> 
