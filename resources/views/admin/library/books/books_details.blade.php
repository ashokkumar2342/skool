@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    <button type="button" class="btn btn-info pull-right" select2="true" onclick="callPopupLarge(this,'{{ route('admin.library.book.details.addform')}}')" style="margin:10px">Add Form</button>
    <h1>Books Details<small>List</small> </h1>
       
    </section>  
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          {{-- <div class="box"> 
            <div class="box-body"> 
              <form action="{{ route('admin.library.book.details.store') }}" method="post" class="add_form" button-click="btn_books_table_show" enctype="multipart/form-data">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-4">
                      <label>Book Code</label>
                      <input type="text" name="code" class="form-control" placeholder="" maxlength="4"> 
                    </div>
                    <div class="col-lg-4">
                      <label>Book Name</label>
                      <input type="text" name="name" class="form-control" placeholder="" maxlength="50"> 
                    </div>
                    <div class="col-lg-4">
                      <label>Edition</label>
                      <input type="text" name="edition" class="form-control" placeholder="" maxlength="50"> 
                    </div>
                    <div class="col-lg-4">
                      <label>Price</label>
                      <input type="text" name="price" class="form-control" placeholder="" maxlength="50"> 
                    </div>
                    <div class="col-lg-4">
                      <label>No Of Pages</label>
                      <input type="text" name="no_of_pages" class="form-control" placeholder="" maxlength="50"> 
                    </div>
                    <div class="col-lg-4">
                      <label>Subject</label>
                      <select name="subject_id" class="form-control" required="" >
                        <option selected="" disabled="" required="">Select Subject</option> 
                        @foreach ($subjects as $subject) 
                        <option required="" value="{{ $subject->id  }}">{{ $subject->name  }}</option>
                        @endforeach 
                      </select> 
                    </div> <div class="col-lg-4">
                      <label>Publisher</label>
                      <select name="publisher_id" class="form-control" required="">
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
                      <label>Book Feature</label>
                      <input type="text" name="feature" class="form-control" placeholder="" maxlength="200"> 
                    </div> 
                    <div class="col-lg-6">
                      <label>Book Image</label>
                      <input type="file" name="image" multiple="true"> 
                    </div> 
                   </div>
                   <div class="row">
                    <div class="col-lg-12 text-center" style="padding-top: 5px">
                      <input type="submit" class="btn btn-success">
                    </div>
                     
                   </div>
                 
                
              </form>
                
            </div>   
              
      <!-- /.row -->

          </div> --}}
          <button id="btn_books_table_show" hidden data-table="books_table " onclick="callAjax(this,'{{ route('admin.library.book.details.table.show') }}','books_table_show')">show </button>

           
          <div class="box">
           <div class="box-body" id="books_table_show"> 
           
           </div>
         </div>
        </div>
      </div>
    </section>
    <!-- /.content -->

@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
@push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
     $(document).ready(function(){
        $('#books_table').DataTable();
    });
  </script>
  <script type="text/javascript"> 
        $('#btn_books_table_show').click();
  

  </script>
  </script>
  @endpush
