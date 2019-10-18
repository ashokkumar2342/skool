<div class="col-lg-12 table-responsive">
 <table class="table table-hover   table-bordered"  id="books_table"> 
              <thead>
                <tr>
                  <th class="text-nowrap">Code</th>
                  <th class="text-nowrap">Name</th>
                  <th class="text-nowrap">Edition</th>
                  <th class="text-nowrap">Price</th>
                  <th class="text-nowrap">NO of pages</th>
                  <th class="text-nowrap">Hall No</th>
                  <th class="text-nowrap">Shelf No</th>
                  <th class="text-nowrap">Box No</th>
                  <th class="text-nowrap">Subject</th>
                  <th class="text-nowrap">Publisher</th>
                  <th class="text-nowrap">Author</th>
                  <th class="text-nowrap">Book Feature</th>
                  <th class="text-nowrap">Book Image</th>
                  <th class="text-nowrap">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($booktypes as $booktype) 
                          <tr>
                            <td>{{ $booktype->code or ''}}</td>
                            <td>{{ $booktype->name or ''}}</td>
                            <td>{{ $booktype->edition or ''}}</td>
                            <td>{{ $booktype->price or ''}}</td>
                            <td>{{ $booktype->no_of_pages or ''}}</td>
                            <td>{{ $booktype->hall_no or ''}}</td>
                            <td>{{ $booktype->shelf_no or ''}}</td>
                            <td>{{ $booktype->box_no or ''}}</td>
                            <td>{{ $booktype->subjectType->name or ''}}</td>
                            <td>{{ $booktype->publisher->name or ''}}</td>
                            <td>{{ $booktype->author->name or ''}}</td>
                            <td>{{ $booktype->feature or ''}}</td>
                            <td> 
                              <img src="{{ url('storage/student/bookimage/'.$booktype->image) }}"  title="" width="50" height="50" /> 
                            </td>

                            <td> 
                              <button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.library.book.details.edit',$booktype->id) }}')"><i class="fa fa-edit"></i></button>

                        <a href="{{ route('admin.library.book.details.delete',$booktype->id) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a></td>

                          </tr>
                @endforeach
              </tbody>
            </table>
          </div>