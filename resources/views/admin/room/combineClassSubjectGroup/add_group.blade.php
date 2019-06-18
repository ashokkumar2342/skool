

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
	
<select class='pre-selected-options' name="section[]" multiple='multiple'> 
  @foreach ($sections as $section)
  @if (in_array($section->section_id,$combineClassSubjectSaveId))
    
  @else
  <option value="{{ $section->section_id }}">{{ $section->sectionTypes->name or '' }}</option>
  @endif
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
  <table class="table"> 
    <thead>
      <tr>
        <th>Subject</th>
        <th>Class</th>
        <th>Section</th>
        <th>Room No</th>
        <th>Group</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($combineClassSubjectTables as $combineClassSubjectTable)
        
              <tr>
                <td>{{ $combineClassSubjectTable->subjectType->name or '' }}</td>
                <td>{{ $combineClassSubjectTable->classType->name or ''}}</td>
                <td>{{ $combineClassSubjectTable->sectionTypes->name or ''}}</td>
                <td>{{ $combineClassSubjectTable->roomType->name or ''}}</td>
                <td> Group{{ $combineClassSubjectTable->group_no or ''}}</td>

                <td><a href="{{ route('admin.combine.class.subject.details.delete',$combineClassSubjectTable->id) }}" title="Delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></td>
              </tr>
      @endforeach
    </tbody>
  </table>
