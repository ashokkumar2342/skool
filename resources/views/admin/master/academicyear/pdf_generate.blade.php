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
    
 
  
<body>
@include('schoolDetails.logo_header')
 <div class="row">
 <div class="col-lg-10" style="margin-left: 60px">
  	
 <table class="table  table-bordered">
                         
      <thead>
          <tr>
              <th class="text-nowarp">Sr.No.</th>
              <th class="text-nowarp">Academic Year</th>
              <th class="text-nowarp">Start Date</th>
              <th class="text-nowarp">End Date</th>
              <th class="text-nowarp">Description</th>
              
          </tr>
      </thead>
      <tbody>
        @php
          $arrayId=1;
        @endphp
          @foreach ($academicYears as $academicYear) 
              <tr> 
                  <td>{{ $arrayId ++ }}</td>
                  <td>{{ $academicYear->name }}</td>
                  <td>{{ date('d-m-Y',strtotime($academicYear->start_date)) }}</td>
                  <td>{{ date('d-m-Y',strtotime($academicYear->end_date))  }}</td>
                  <td>{{ $academicYear->description }}</td> 
              </tr>
           @endforeach
      </tbody>
  </table>
  </div> 
 </div>
 <div class="row" style="margin-left: 10px">
   <div class="col-lg-4"> 
  Total Record :
   <span style="margin-top: 20px"><b>{{ $arrayId ++ -1 }}</b></span>
 
 </div><div class="col-lg-4"> 
 Total Pages :
   <b><span class="pagenum" style="margin-top: 20px"></span></b>
 
 </div>
 <div class="col-lg-4"> 
  End of Report
 
 </div>
</div>
  
</body>
 
</html>