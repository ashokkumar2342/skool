@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    <h1>Author Add<small>Details</small> </h1>
       
    </section>  
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box"> 
            <div class="box-body"> 
              <form action="{{ route('admin.library.author.details.store') }}" method="post" class="add_form" content-refresh="author_table">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-3">
                      <label>Author Name</label>
                      <input type="text" name="name" class="form-control" placeholder="" required="" maxlength="50"> 
                    </div>
                    <div class="col-lg-3">
                      <label>Mobile No</label>
                      <input type="text" name="mobile_no" class="form-control" placeholder=""  maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'> 
                    </div>
                    <div class="col-lg-3">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" placeholder="" required=""> 
                    </div> 
                    <div class="col-lg-3">
                      <label>Address</label>
                      <textarea class="form-control" name="address" placeholder="" required="" maxlength="200"></textarea>
                        
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
            <table class="table" id="author_table"> 
               <thead>
                 <tr>
                   <th>Name</th>
                   <th>Mobile No</th>
                   <th>Email</th>
                   <th>Address</th>
                   <th>Action</th>
                 </tr>
               </thead>
               <tbody>
                @foreach ($authors as $author) 
                 <tr>
                   <td>{{ $author->name }}</td>
                   <td>{{ $author->mobile_no }}</td>
                   <td>{{ $author->email }}</td>
                   <td>{{ $author->address }}</td>
                   <td>
                     <button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.library.author.details.edit',$author->id) }}')"><i class="fa fa-edit"></i></button>

                        <a href="{{ route('admin.library.author.details.delete',$author->id) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>

                   </td>
                    
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

