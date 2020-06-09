@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>Character Certificate Application</h1>
    </section>  
    <section class="content"> 
      <div class="box"> 
        <div class="box-body">
          <form action="{{ route('admin.student.showStudent') }}" method="post" class="add_form" success-content-id="studentshow">
            {{csrf_field()}}
            <div class="row">
              <div class="col-lg-3">
                <label>Registration No.</label>
                <input type="text" name="regsno" class="form-control" maxlength="{{$regmaxlength->reg_length}}" >
              </div>
               <div class="col-lg-3">
                <input type="submit" class="btn btn-success" style="margin-top: 24px" value="Show" >
              </div>
            </div>
          </form>
          <div id="studentshow">
            
          </div>
         {{--  <div class="table-responsive">
             <table class="table" id="room_table"> 
              <thead>
                <tr>
                  <th class="text-nowrap">Sr.No.</th>
                  <th class="text-nowrap">Room Name/No</th>
                  <th class="text-nowrap">Room Location</th>
                  <th class="text-nowrap">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($roomTypes as $roomType)
                    <tr>
                      <td>{{ ++$loop->index }}</td>
                      <td>{{ $roomType->name }}</td>
                      <td>{{ $roomType->location }}</td>
                      <td><button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.room.details.edit',Crypt::encrypt($roomType->id)) }}')"><i class="fa fa-edit"></i></button>

                        <a href="{{ route('admin.room.details.delete',Crypt::encrypt($roomType->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a></td>
                    </tr> 
                @endforeach
              </tbody>
             </table>
            </div>  --}}
        </div>
      </div>
    </section> 
 @endsection

 {{-- @push('links')
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
  @endpush --}}
