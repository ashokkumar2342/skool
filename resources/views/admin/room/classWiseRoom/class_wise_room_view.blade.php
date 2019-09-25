@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>Class Wise Room<small>Details</small> </h1> 
    </section>  
    <section class="content"> 
      <div class="box"> 
        <div class="box-body">             
             <form action="{{ route('admin.class.wise.room.store') }}" method="post" class="add_form"  content-refresh="class_wise_room_table">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-lg-4">
                  <label>Class</label>
                  <select name="class_id" class="form-control" onchange="callAjax(this,'{{ route('admin.teacher.class.wise.section.addForm') }}','section_id_div')">
                    <option selected disabled>Select Class</option>
                    @foreach($classTypes as $classType)
                    <option value="{{ $classType->id }}">{{ $classType->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-lg-4" id="section_id_div">
                  <label>Section</label>
                  <select  class="form-control">
                    <option selected disabled>Select Section</option> 
                  </select>
                </div>
                <div class="col-lg-4">
                  <label>Room No</label>
                  <select name="room_name" class="form-control" id="room_name">
                    <option selected disabled>Select Room Name</option>
                     @foreach ($roomTypes as $roomType)
                      @if (in_array($roomType->id,$classWiseRoomSaveId))
                     
                        @else
                           <option value="{{ $roomType->id }}">{{ $roomType->name }}</option>  
                      @endif 
                     
                     @endforeach
                  </select>
                  
                </div> 
              </div>
               <div class="col-lg-12 text-center">
                <input type="submit" class="btn btn-success" value="submit" style="margin: 24px"> 
            </div>
                
             </form>
             <table class="table" id="class_wise_room_table"> 
               <thead>
                 <tr>
                   <th>Class</th>
                   <th>Section </th>
                   <th>Room No</th>
                   <th>Action</th>
                 </tr>
               </thead>
               <tbody>
                @foreach ($classWiseRooms as $classWiseRoom)
                           <tr>
                             <td>{{ $classWiseRoom->classType->name or '' }}</td>
                             <td>{{ $classWiseRoom->sectionTypes->name or ''}}</td>
                             <td>{{ $classWiseRoom->roomType->name or ''}}</td>
                             <td> <button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.class.wise.room.details.edit',Crypt::encrypt($classWiseRoom->id)) }}')"><i class="fa fa-edit"></i></button>

                        <a href="{{ route('admin.class.wise.room.details.delete',Crypt::encrypt($classWiseRoom->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a></td>
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 
 <script type="text/javascript">
     $(document).ready(function(){
        $('#class_wise_room_table').DataTable();
    });
      $(document).ready(function(){
          $("#room_name").append($('<option>', {value:'0',text:'0'));
        });
 

     $('#btn_outhor_table_show').click();
  </script>
  @endpush
