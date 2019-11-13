<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html/jpg/png; charset=utf-8"/>
<head>
	<style>
     @page { margin:0px; }
     
   .pagenum:before {
        content: counter(page);
    }

  </style>
 @include('admin.include.boostrap')
</head>
    
 
  
<body style="background-color:#fff">
@include('schoolDetails.logo_header')
 <div class="row">
 <div class="col-lg-10" style="margin-left: 60px">
  	
 <table class="table table-striped table-responsive table-condensed table-bordered">
  	<thead>
  		<tr>  
  			 <th>Sr.No.</th>
         <th>Class Name</th>
             <th>Class Code</th>
             <th>Sorting Order No</th>
  		</tr>
  	</thead>
  	<tbody>
      @php
          $arrayId=1;
        @endphp
  		 @foreach($classes as $class)
                <tr> 
                  <td>{{ $arrayId++ }}</td>
                  <td>{{ $class->name }}</td>
                  <td>{{ $class->alias }}</td>
                  <td>{{ $class->shorting_id }}</td>
  			 
  		       </tr>
  		  @endforeach     
  	</tbody>
  </table> 
  </div> 
 </div>
   <div class="col-lg-2" style="float: right;"><h4>
  Total Record :
   <span style="margin-top: 20px"><b>{{ $arrayId ++ -1 }}</b></span><br>
  Total Pages :
   <b><span class="pagenum" style="margin-top: 20px"></span></b><br> 
  
  End of Reports
   <span></span> 
   
 </h4></div>
</body>
 
</html>