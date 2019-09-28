@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>Subject Wise Room<small>list</small> </h1> 
    </section>  
    <section class="content"> 
      <div class="box"> 
        <div class="box-body">             
             <form action="{{ route('admin.subject.wise.room.store') }}" method="post" class="add_form" content-refresh="room_table">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-lg-6">
                  <label>SubJect</label>
                  <select name="subject" class="form-control">
                    <option selected disabled>Select Subject</option>
                      @foreach($subjectTypes as $subjectType)
                        <option value="{{ $subjectType->id }}">{{ $subjectType->name }}</option>
                      @endforeach
                  </select>
                  
                </div>
                <div class="col-lg-6">
                  <label>Room No</label>
                  <select name="room" class="form-control">
                    <option selected disabled>Select Room No</option>
                      @foreach($roomTypes as $roomType)
                        <option value="{{ $roomType->id }}">{{ $roomType->name }}</option>
                      @endforeach
                  </select> 
                </div>
                 </div>
                 <div class="col-lg-12 text-center">
                <input type="submit" class="btn btn-success" value="submit" style="margin: 24px">
              </div> 
             </form>
             <table class="table" id="room_table"> 
              <thead>
                <tr>
                  <th>Subject</th>
                  <th>Room No</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($subjectWiseRooms as $subjectWiseRoom)
                    <tr>
                      <td>{{ $subjectWiseRoom->subjectType->name or ''}}</td>
                      <td>{{ $subjectWiseRoom->roomType->name or ''}}</td>
                      <td>{{-- <button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.room.details.edit',Crypt::encrypt($subjectWiseRoom->id)) }}')"><i class="fa fa-edit"></i></button> --}}

                        <a href="{{ route('admin.subject.wise.room.delete',Crypt::encrypt($subjectWiseRoom->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a></td>
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
