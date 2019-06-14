@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    
    <h1>Time Table Type<small>Details</small> </h1>
       
    </section>  
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box"> 
            <div class="box-body"> 
              <form action="{{ route('admin.time.table.type.store') }}" method="post" class="add_form" content-refresh="datatable">
                   {{ csrf_field() }}
                   <div class="row"> 
                    <div class="col-lg-5">
                      <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="" required="" maxlength=""> 
                    </div>
                    <div class="col-lg-7">
                      <label>Discription</label>
                        <textarea class="form-control" name="discription" placeholder="" required="" maxlength=""></textarea>
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
              <table class="table" id="datatable"> 
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Discription</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($timeTableTypes as $timeTableType) 
                      <tr>
                        <td>{{ $timeTableType->name }}</td>
                        <td>{{ $timeTableType->discription }}</td>
                        <td>
                          <button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.time.table.type.edit',Crypt::encrypt($timeTableType->id)) }}')"><i class="fa fa-edit"></i></button>

                             <a href="{{ route('admin.time.table.type.delete',Crypt::encrypt($timeTableType->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>

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
        $('#datatable').DataTable();
    });
  </script>
   <script type="text/javascript"> 
        $('#btn_book_accession_table_show').click();
  

  </script>
  @endpush
     
 
 