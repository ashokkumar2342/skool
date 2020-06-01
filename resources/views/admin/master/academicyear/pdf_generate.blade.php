 <!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html/jpg/png; charset=utf-8"/>
<head>
    <style> 
        .pagenum:before {
            content: counter(page);
        }
        .page_break{
            page-break-before:always;  
        } 
    </style>
    @include('admin.include.boostrap')
</head> 
<body > 
@include('schoolDetails.logo_header')
<div class="row" style="margin-top: -20px">
<div class="panel panel-default">
  <div class="panel-heading text-center">Academic Year Report</div>
  </div>  
 <table class="table  table-bordered">
                         
      <thead>
          <tr>
              <th class="text-nowarp" style="width: 40px">Sr.No.</th>
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
              <tr style="{{ $academicYear->status==1?'background-color: #95e49b':'' }}"> 
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
     <div class="row">
       <div class="col-lg-4"> 
          Total Record :<b>{{ $arrayId ++ -1 }}</b> 
       </div>
       <div class="col-lg-4"> 
          Total Pages :
          <b class="pagenum"></b> 
       </div>
       <div class="col-lg-4"> 
          End of Report 
       </div>
    </div>  
 </body> 
 </html>