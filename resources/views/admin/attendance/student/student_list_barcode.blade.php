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
  	 		<li>Roll No.</li>
  	 		<li>Class</li>
  	 		<li>Section</li> 
  	 	</div>
        @foreach ($StudentAttendancesBarcode as $StudentAttendancesBarcod)
  	    	<div class="col-lg-6">
            
              <li><b>{{ $StudentAttendancesBarcod->stu_name or ''}}</b></li>
              <li><b>{{ $StudentAttendancesBarcod->stu_roll or ''}}</b></li>
              <li><b>{{ $StudentAttendancesBarcod->stu_class or ''}}</b></li>
              <li><b>{{ $StudentAttendancesBarcod->stu_section or ''}}</b></li>
           </div>   
            <div class="col-lg-4 pull-right">
              <span> 
                 @php 
                $profile = route('admin.student.image',$StudentAttendancesBarcod->stu_pic);
                @endphp  
                <img  src="{{ ($StudentAttendancesBarcod->stu_name)? $profile : asset('profile-img/user.png') }}" width="120px" height="120px" style="border:solid 2px Black"> 
              </span>
            </div>
          @endforeach  
 
  	 </div>
  </div>
</div>
	
 
 
 
 </body>
 </html>
