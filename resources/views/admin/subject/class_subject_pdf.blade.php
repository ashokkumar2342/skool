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
<div class="row"> 
        <div class="col-lg-2 pull-left" style="margin-right: 30px">
          @php
            $path =storage_path('app/public/logo/Logo_vaish_Model1.jpg');
          @endphp
          <img  src="{{ $path }}" alt="" width="128%" style="margin: 30px ;"> 
        </div>
        <div class="col-lg-10" style="margin-left:110px ">
          <h2 style="color:#7f2809;"><b>VAISH MODEL SR.SEC.SCHOOL</b></h2><h6>(Affiliated to C.B.S.E, New Delhi)</h6><h6>Affiliation No 3456789 | School Code 47789</h6><h5><b>Loharu Road Bhiwani - 123456 (Hr.)</b></h5> 
        </div>
       </div>
 <div class="row">
 <div class="col-lg-8" style="margin-left: 80px">
  	
 <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th> id</th>                
                  <th>class Name</th>                   
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
                  <td>{{ $subjectId++ }}</td>
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