 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
  </head>
 <body>
  @foreach ($StudentAttendancesBarcode as $StudentAttendancesBarcod)
  <div class="container-fluid">
    <div class="panel panel-success">
     <div class="panel-heading">Student's Details</div>
     <div class="panel-body">
      <div class="row">
      <div class="col-lg-6">
         <div class="row">
             <div class="col-lg-4 col-md-4 col-xs-4">
                 Name 
             </div>
             <div class="col-lg-8 col-md-8 col-xs-8">
                 <b>{{ $StudentAttendancesBarcod->stu_name }}</b>
             </div>
         </div>                              
         <div class="row">
             <div class="col-lg-4 col-md-4 col-xs-4">
                 Class  
             </div>
             <div class="col-lg-8 col-md-8 col-xs-8">
                 <b>{{ $StudentAttendancesBarcod->stu_class or '' }}</b>
             </div>
         </div>
         <div class="row">
             <div class="col-lg-4 col-md-4 col-xs-4">
                 Section  
             </div>
             <div class="col-lg-8 col-md-8 col-xs-8">
                 <b>{{ $StudentAttendancesBarcod->stu_section or '' }}</b>
             </div>
         </div>
         <div class="row">
             <div class="col-lg-4 col-md-4 col-xs-4">
                 Roll No.  
             </div>
             <div class="col-lg-8 col-md-8 col-xs-8">
                 <b>{{ $StudentAttendancesBarcod->stu_roll }}</b>
             </div>
         </div>
       </div>                               
       <div class="col-lg-6 text-center">
          @php 
                $profile = route('admin.student.image',$StudentAttendancesBarcod->stu_pic);
                @endphp  
                <img  src="{{ ($StudentAttendancesBarcod->stu_name)? $profile : asset('profile-img/user.png') }}" width="120px" height="120px" style="border:solid 2px Black"> 
       </div>
   </div>
     </div>
   </div>
 </div>
 @endforeach   
 </body>
 </html>
