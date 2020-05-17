@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">     
    <h1>Events<small>List</small> </h1>       
    </section>  
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box table-responsive">
            <table class="table" id="class_test_data_table"> 
              <thead>
               <tr>
                 <th>Event Name</th>
                 <th>Event Type</th>
                 <th>Start Date</th>
                 <th>End Date</th>
                 
               </tr>
             </thead>
             <tbody>
                 @foreach ($events as $event) 
               <tr>
                   <td>{{ $event->event_name or '' }}</td>
                   <td>{{ $event->eveneType->name or '' }}</td>
                   <td>{{ date('d-m-Y',strtotime($event->start_date))}}</td>
                   <td>{{ date('d-m-Y',strtotime($event->end_date))}}</td>
                   
               </tr>
                 @endforeach
                
              </tbody>
            </table>
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
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
    $(document).ready(function(){
        $('#class_test_data_table').DataTable();
    });
 </script>
  @endpush
     
 
 