@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    
    <h1>Preod Timing<small>Details</small> </h1>
       
    </section>  
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box"> 
            <div class="box-body"> 
              <form action="{{ route('admin.preod.timing.store') }}" method="post" class="add_form" content-refresh="time_table_type_history">
                   {{ csrf_field() }}
                   <div class="row"> 
                    <div class="col-lg-4">
                      <label>Time Table Type</label>
                      <select name="time_table_type" class="form-control" onchange="callAjax(this,'{{ route('admin.preod.timing.table.show') }}','time_table_type_history')">
                        <option selected disabled>Select Type</option> 
                        @foreach ($timeTableTypes as $timeTableType) 
                        <option value="{{ $timeTableType->id }}">{{ $timeTableType->name }}</option>
                        @endforeach 
                      </select>
                         
                    </div>
                    <div class="col-lg-4">
                      <label>Period Time</label>
                        <input type="time" class="form-control" name="time" placeholder="" required="" maxlength="">
                    </div> 
                    <div class="col-lg-4">
                      <label>Period No</label>
                        <input type="number" class="form-control" name="period_no" placeholder="" required="" maxlength="">
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
              <div id="time_table_type_history">
                
              </div>
             {{--  <table class="table" id=" datatable"> 
                <thead>
                  <tr>
                    <th>Time Table Type</th>
                    <th>Time</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($periodTimings as $periodTiming) 
                      <tr>
                        <td>{{ $periodTiming->timeTableType->name or '' }}</td>
                        <td>{{ $periodTiming->from_time }}</td>
                        <td>
                          <button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.preod.timing.edit',Crypt::encrypt($periodTiming->id)) }}')"><i class="fa fa-edit"></i></button>

                             <a href="{{ route('admin.preod.timing.delete',Crypt::encrypt($periodTiming->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>

                        </td>
                         
                      </tr>
                  @endforeach
                </tbody>
              </table> --}}
           
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
     
 
 