@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    <h1>BooKs Add<small>Details</small> </h1>
       
    </section>  
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box"> 
            <div class="box-body"> 
              <form action="{{ route('admin.library.book.details.store') }}" method="post" class="add_form" content-refresh="book_table" enctype="multipart/form-data">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-4">
                      <label>Book Code</label>
                      <input type="text" name="code" class="form-control" placeholder="" required="" maxlength="4"> 
                    </div>
                    <div class="col-lg-4">
                      <label>Book Name</label>
                      <input type="text" name="name" class="form-control" placeholder="" required="" maxlength="50"> 
                    </div>
                    <div class="col-lg-4">
                      <label>Subject Subject</label>
                      <select name="subject_id" class="form-control">
                        <option selected="" disabled="">Select Subject</option> 
                        @foreach ($subjects as $subject) 
                        <option value="{{ $subject->id  }}">{{ $subject->name  }}</option>
                        @endforeach 
                      </select> 
                    </div> <div class="col-lg-4">
                      <label>Publisher</label>
                      <select name="publisher_id" class="form-control">
                        <option>Select Publisher</option> 
                        @foreach ($publishers as $publisher) 
                        <option value="{{ $publisher->id  }}">{{ $publisher->name  }}</option>
                        @endforeach 
                      </select> 
                    </div> 
                    <div class="col-lg-4">
                      <label>Author</label>
                      <select name="author_id" class="form-control">
                        <option>Select Author</option> 
                        @foreach ($authors as $author) 
                        <option value="{{ $author->id  }}">{{ $author->name  }}</option>
                        @endforeach 
                      </select> 
                    </div> 
                    <div class="col-lg-4">
                      <label>Book feature</label>
                      <input type="text" name="feature" class="form-control" placeholder="" maxlength="200"> 
                    </div> 
                    <div class="col-lg-4">
                      <label>Book Image</label>
                      <input type="file" name="image[]" multiple="true"> 
                    </div> 
                   </div>
                   <div class="row">
                    <div class="col-lg-12 text-center" style="padding-top: 10px">
                      <input type="submit" class="btn btn-success">
                    </div>
                     
                   </div>
                 
                
              </form>
                
            </div>   
              
      <!-- /.row -->
          </div>
          <div class="box">
           <div class="box-body"> 
            <table class="table" id="book_table"> 
              <thead>
                <tr>
                  <th>Code</th>
                  <th>Name</th>
                  <th>Subject</th>
                  <th>Publisher</th>
                  <th>Author</th>
                  <th>Book feature</th>
                  <th>Book Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($booktypes as $booktype) 
                          <tr>
                            <td>{{ $booktype->code }}</td>
                            <td>{{ $booktype->name }}</td>
                            <td>{{ $booktype->subjectType->name }}</td>
                            <td>{{ $booktype->publisher->name }}</td>
                            <td>{{ $booktype->author->name or ''}}</td>
                            <td>{{ $booktype->feature }}</td>
                            <td style="width: 50px height: 50px" >

                              <img src="{{ url('storage/bookimage/'.$booktype->image) }}" alt="">
                              <img src="{{ url('storage/bookimage/'.$booktype->image) }}"  title="" height="150px" /> 
                            </td>

                            <td> 
                              <button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.library.book.details.edit',$booktype->id) }}')"><i class="fa fa-edit"></i></button>

                        <a href="{{ route('admin.library.book.details.delete',$booktype->id) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a></td>

                          </tr>
                @endforeach
              </tbody>
            </table>
           </div>
         </div>
        </div>
      </div>
    </section>
    <!-- /.content -->

@endsection

