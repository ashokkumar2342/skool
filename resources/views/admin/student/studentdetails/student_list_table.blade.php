<div class="table-responsive">
   
<table  class="table table-bordered table-striped table-hover">
  <thead>
  <tr>   
  <th width="100px">Image</th>            
    <th>Details</th>  
  </tr>
  </thead>
  <tbody>
  @foreach($students as $student)
 {{--  @if ($student->relation_id==1 or $student->relation_id==null) --}}  
  <tr>
     <td >
      @php
       $profile = route('admin.student.image',$student->picture);
       @endphp
       <img  src="{{ ($student->picture)? $profile : asset('profile-img/user.png') }}" style="width: 113px;  border: 2px solid #d1f7ec" id="student_image_{{$student->id}}">
      <form action="{{ route('admin.student.image.upload.store',Crypt::encrypt($student->id)) }}" method="post" class="add_form" enctype="multipart/form-data" call-jquery-default="true" content-refresh="student_image_{{$student->id}}" button-click="student_details_show,btn_student_details_show,btn_search_box" select-triger="search_id">
        {{csrf_field() }}
        <input type="file" name="file" class="form-control" onchange="$('#btn_submit_{{$student->id}}').click()">
        <input type="submit" name="submit" id="btn_submit_{{$student->id}}" class="hidden">
        </form>
       
       
    </td>
    <td>
      <p>{{ $student->registration_no }}</p>
      <p>{{ $student->name }}</p>
      
    </td> 
   
  </tr>
  
  @endforeach
  </tbody>
   
</table>
 </div> 
@if (Route::currentRouteName() != 'admin.student.view.search')
   <script type="text/javascript">
    callJqueryDefault('body_id')
  </script>
@endif
  