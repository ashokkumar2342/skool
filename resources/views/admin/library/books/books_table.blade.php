<div class="col-lg-12 table-responsive">
 <table class="table table-hover table-striped table-bordered"  id="books_table"> 
              <thead>
                <tr>
                  <th>Code</th>
                  <th>Name</th>
                  <th>Edition</th>
                  <th>Price</th>
                  <th>NO of pages</th>
                  <th>Hall No</th>
                  <th>Shelf No</th>
                  <th>Box No</th>
                  <th>Subject</th>
                  <th>Publisher</th>
                  <th>Author</th>
                  <th>Book Feature</th>
                  <th>Book Image</th>
                  <th>Action</th>
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