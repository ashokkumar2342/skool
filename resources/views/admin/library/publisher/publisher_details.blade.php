@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    <h1>Publisher Add<small>Details</small> </h1>
       
    </section>  
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box"> 
            <div class="box-body"> 
              <form action="{{ route('admin.library.publisher.details.store') }}" method="post" class="add_form" content-refresh="publisher_table">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-4">
                      <label>Publisher Code</label>
                      <input type="text" name="code" class="form-control" placeholder=""maxlength="4"> 
                    </div>
                    <div class="col-lg-4">
                      <label>Publisher Name</label>
                      <input type="text" name="name" class="form-control" placeholder="" maxlength="50"> 
                    </div>
                    <div class="col-lg-4">
                      <label>Mobile No</label>
                      <input type="text" name="mobile_no" class="form-control" placeholder="" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'> 
                    </div>
                    <div class="col-lg-4">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" placeholder=""> 
                    </div>
                    
                    <div class="col-lg-4">
                      <label>Address</label>
                      <textarea class="form-control" name="address" placeholder=""maxlength="200"></textarea>
                       
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
            <table class="table table-bordered table-striped table-hover" id="publisher_table"> 
               <thead>
                 <tr>
                   <th>Code</th>
                   <th>Name</th>
                   <th>Mobile No</th>
                   <th>Email</th>
                   
                   <th>Address</th>
                   <th>Action</th>
                 </tr>
               </thead>
               <tbody>
                @foreach ($publishers as $publisher) 
                     <tr>
                       <td>{{ $publisher->code  }}</td>
                       <td>{{ $publisher->name }}</td>
                       <td>{{ $publisher->mobile_no }}</td>
                       <td>{{ $publisher->email }}</td>
                       
                       <td>{{ $publisher->address }}</td>
                       <td> 
                        <button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.library.publisher.details.edit',Crypt::encrypt($publisher->id)) }}')"><i class="fa fa-edit"></i></button>

                        <a href="{{ route('admin.library.publisher.details.delete',Crypt::encrypt($publisher->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>

                         
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
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
@push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
     $(document).ready(function(){
        $('#publisher_table').DataTable();
    });
  </script>
  @endpush
