<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html/jpg/png; charset=utf-8"/>
<head>
	<style>
		 @page { margin:0px; }
     .GFG{ 
         height: 120px; 
         width: 50%; 
         border: 5px solid black; 
         font-size:42px; 
         font-weight:bold; 
         color:green; 
         margin-left:50px; 
         margin-top:50px; 
         } 
	</style>
 @include('admin.include.boostrap')
</head>
    
 
  
<body style="background-color:#fff">
@include('schoolDetails.logo_header')
 <div class="row">
 <div class="col-lg-8" style="margin-left: 100px">
  	
 <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                      
                  <th>Sr.No.</th>                   
                  <th>Class Name</th>                   
                  <th>Subject Name</th>                   
                  <th>IsOptinal</th>                   
                   
                </tr>
                </thead>
                <tbody>
                  @php
                     
                  $subjectId=1;
                  @endphp
                @foreach($manageSubjects as $manageSubject)
                <tr>
                   
                  <td>{{ $subjectId++}}</td>                 
                  <td>{{ $manageSubject->classTypes->name or ''}}</td>                 
                  <td>{{ $manageSubject->subjectTypes->name or ''}}</td>                 
                  <td>{{ $manageSubject->isoptional->name or ''}}</td>                 
                               
                </tr>
                @endforeach
                </tbody>
                 
              </table>
  </div> 
 </div>
   
</body>
 
</html>