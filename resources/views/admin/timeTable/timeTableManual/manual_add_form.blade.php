<div class="row">
	
	<div class="col-lg-4">
		<label>SubJect</label>
		<select name="subject" class="form-control" onchange="callAjax(this,'{{ route('admin.time.table.manual.subject.wise.teacher') }}','teacher_show')">
			<option selected disabled>Select Subject</option>
			 @foreach ($subjects as $subject)
			  <option value="{{ $subject->subjectType_id }}">{{ $subject->subjectTypes->name }}</option>
			 @endforeach
		</select> 
	</div>
	<div  id="teacher_show"> 
		 
	</div>
	
	<div class="col-lg-6">
		<label>Room No</label>
		<select name="room" class="form-control" id="teacher_show">
			<option selected disabled>Select Room</option> 
			@foreach ($roomTypes as $roomType)
				 <option value="{{ $roomType->room_id }}">{{ $roomType->roomType->name }}</option> 
			@endforeach
			 
		</select> 
	</div>
	<div class="col-lg-12 text-center">
		
	<input type="submit" class="btn btn-success" value="Save" style="margin: 20px">
	</div>
	
