 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<style type="text/css">
 		li{
 			padding-bottom: 3px;
 		}
 	</style>
 </head>
 <body>
<div class="panel panel-default">
  <div class="panel-heading"></div>
  <div class="panel-body">
  	 <div class="row">
  	 	<div class="col-lg-2">
  	 		<li>Name</li>
  	 		<li>Registration No.</li>
  	 		<li>Class</li>
  	 		<li>Section</li> 
  	 	</div>
  	 	<div class="col-lg-6">
	 		<span><b>{{ $StudentAttendancesBarcode->name or ''}}</b></span><br>
			<span><b>{{ $StudentAttendancesBarcode->registration_no or ''}}</b></span><br>
			<input type="hidden" name="student_id" value="{{ $StudentAttendancesBarcode->id }}">
			<span><b>{{ $StudentAttendancesBarcode->classes->name or ''}}</b></span><br> 
			<span><b>{{ $StudentAttendancesBarcode->sectionTypes->name or ''}}</b></span> 
  	 	</div>
  	 	<div class="col-lg-3" style="margin-right: 10">
             @php 
            $profile = route('admin.student.image',$StudentAttendancesBarcode->picture);
            @endphp  
            <img  src="{{ ($StudentAttendancesBarcode->picture)? $profile : asset('profile-img/user.png') }}" width="120px" height="120px" style="border:solid 2px Black"> 
           </div>
  	 	
  	 </div>
  </div>
</div>
	
<button type="submit" id="btn_save_attendance_barcode" class="btn btn-success hidden" value="Save" style="margin-top:5px"> Save</button>
 
 
 </body>
 </html>
