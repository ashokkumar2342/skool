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
      <form action="{{ route('admin.student.image.upload.store',Crypt::encrypt($student->id)) }}" method="post" class="add_form" enctype="multipart/form-data"  content-refresh="student_image_{{$student->id}}" button-click="btn_studet_image_upload_list_{{$conditionId}}">
        {{csrf_field() }}
        <input type="file" name="file" class="form-control" onchange="$('#btn_submit_{{$student->id}}').click()">
        <input type="submit" name="submit" id="btn_submit_{{$student->id}}" class="hidden">
        </form>
       
       
    </td>
    <td>
      <p>{{ $student->registration_no }}</p>
      <p>{{ $student->name }}</p>
      <p>{{ $student->classes->name or '' }}</p>
      <p>{{ $student->sectionTypes->name or '' }}</p>
      <p>
         <input type="checkbox" name="verify_id" checked="checked" value="1" > <b>Verify</b> 
         <input type="checkbox" name="verify_id"  value="0"> <b>Not Verify</b>
      </p>
      
    </td> 
   
  </tr>
  
  @endforeach
  </tbody>
   
</table>
 </div> 
 
@if (Route::currentRouteName() == 'admin.student.list')
   <script type="text/javascript">
    callJqueryDefault('body_id')
  </script>
 @elseif(Route::currentRouteName() == 'admin.student.list'))
  <script type="text/javascript">
  // the selector will match all input controls of type :checkbox
  // and attach a click event handler 
  $("input:checkbox").on('click', function() {
    // in the handler, 'this' refers to the box clicked on
    var $box = $(this);
    if ($box.is(":checked")) {
      // the name of the box is retrieved using the .attr() method
      // as it is assumed and expected to be immutable
      var group = "input:checkbox[name='" + $box.attr("name") + "']";
      // the checked state of the group/box on the other hand will change
      // and the current value is retrieved using .prop() method
      $(group).prop("checked", false);
      $box.prop("checked", true);
    } else {
      $box.prop("checked", false);
    }
  });zzzzz
 </script>
@endif
  