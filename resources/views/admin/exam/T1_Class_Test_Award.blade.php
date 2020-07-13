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
        .underlin2{ 
        border-bottom: 1px solid black;
        line-height: 25px;
        width: 150px;
      }
    </style>
    @include('admin.include.boostrap')
</head> 
<body > 
@include('schoolDetails.logo_header')
<div class="row" style="margin-top: -20px">
<div class="panel panel-default">
  <div class="panel-heading text-center" style="font-size: 16px">Academic Year <b> 2020-2021 </b>, Class <b> First </b>, Subject <b> Physics </b>, Marks <b> 1000 </b></div>
  
 <table class="table  table-bordered">
                         
      <thead>
          <tr>
              <th class="text-nowarp" style="width: 40px">Sr.No.</th>
              <th class="text-nowarp">Name</th>
              <th class="text-nowarp">Registration No.</th>
              <th class="text-nowarp">Marks</th>
              <th class="text-nowarp">Marks In Word</th>
              <th class="text-nowarp">Remarks</th>
              
          </tr>
      </thead>
      <tbody>
        @php
          $arrayId=1;
        @endphp
          @foreach ($students as $student) 
              <tr> 
                  <td>{{ $arrayId ++ }}</td>
                  <td>{{ $student->name }}</td>
                  <td>{{ $student->registration_no }}</td>
                  <td>{{ $student->marks }}</td>
                  <td>{{ $student->marksinwords }}</td> 
                  <td>{{ $student->remarks }}</td> 
              </tr>
           @endforeach
      </tbody>
  </table>
  </div>
  </div> 
     <div class="row text-right" style="margin-top: 40px">
     <span class="underlin2 text-center" style="float:right; "></span>  
        
          Signature
       
    </div>  
 </body> 
 </html>