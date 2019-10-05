@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>Rooms<small>Details</small> </h1> 
    </section>  
    <section class="content"> 
      <div class="box"> 
        <div class="box-body">             
             <form action="{{ route('admin.room.details.store') }}" method="post" class="add_form" content-refresh="room_table">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-lg-4">
                  <label>Room No</label>
                  <input type="text" name="room_name" class="form-control" placeholder="Enter Room Name" maxlength="50"> 
                </div>
                <div class="col-lg-4">
                  <label>Room Location</label>
                  <input type="text" name="location" class="form-control" placeholder="Enter Location " maxlength="100" > 
                </div>
                <input type="submit" class="btn btn-success" value="submit" style="margin: 24px">
              </div>
                
            
                
             </form>
             <table class="table" id="room_table"> 
              <thead>
                <tr>
                  <th>Room No</th>
                  <th>Location</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($roomTypes as $roomType)
                    <tr>
                      <td>{{ $roomType->name }}</td>
                      <td>{{ $roomType->location }}</td>
                      <td><button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.room.details.edit',Crypt::encrypt($roomType->id)) }}')"><i class="fa fa-edit"></i></button>

                        <a href="{{ route('admin.room.details.delete',Crypt::encrypt($roomType->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a></td>
                    </tr>
                   
                @endforeach
              </tbody>
             </table>
              
                         
          
        </div>
      </div>
    </section> 
 @endsection
 @push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
@push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
    $(document).ready(function(){
        $('#room_table').DataTable();
    });
 </script>
  @endpush
