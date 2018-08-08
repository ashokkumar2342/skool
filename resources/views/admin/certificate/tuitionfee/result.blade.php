<div align="center">
   <h1>School Name</h1>
 </div>
 <div style="padding-top: 50px; padding-left: 100px;">
   <p>This is to certify that {{ $student->name }} Son of {{ $student->father_name }}    </p>
   <p>This is to certify that Ashok kumar Son of Test name dfdf dfdfdfdfdfdfdfdfdfdf dfdf   </p>
 </div>
 <div style="padding-left:100px;padding-top: 100px;">
 	Place:__________<br>
 	Date:____________
 </div>
 <div style="float: right;padding-right: 100px;">
 	Principal
 </div>
<span ><a target="blank" href="{{ route('admin.student.certificateIssu.tuition.print',$student->id) }}" class="btn btn-info btn-sm" >Print</a></span>
 