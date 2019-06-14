

 @php 

 if (!empty($combineClassSubjectGroup->class_id)) {
     $arrayClassId =explode(',', $combineClassSubjectGroup->class_id);
 }else{
    $arrayClassId=[];
 }
 if (!empty($combineClassSubjectGroup->room_id)) {
     $arrayRoomId =explode(',', $combineClassSubjectGroup->room_id);
 }else{
    $arrayRoomId=[];
 }
    
  
 @endphp
	
<select class='pre-selected-options' name="class_id[]" multiple='multiple'> 
  @foreach ($classTypes as $classType)
  <option value="{{ $classType->classType_id }}" {{ in_array($classType->classType_id,$arrayClassId)?'selected':'' }}>{{ $classType->classTypes->name or '' }}</option>
  @endforeach 
</select>

 <div class="col-lg-3">
 	<label>Room No</label>
 	<select name="room_no" class="form-control">
 		<option  selected disabled>Select Room No</option>
 		 @foreach ($roomTypes as $roomType)
 		 <option value="{{ $roomType->id }}"{{ in_array($roomType->id,$arrayRoomId)?'selected':'' }}>{{ $roomType->name }}</option> 
 		 	 
 		 @endforeach
 	</select>
 	
 </div>
<div class="col-lg-1 text-center" >

	<input type="submit" class="btn btn-success" style="margin-top: 24px">
	
  </div>
