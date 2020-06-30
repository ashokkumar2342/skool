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
  <div class="panel-heading text-center" style="font-size: 16px">Academic Year <b> 2020-2021 </b>, Class <b> First </b>, Subject <b> Physics </b>, Marks <b> 1000 </b></div>
  </div>  
  <table class="table">
  <thead>
     <tr>
       <th>Sr.No</th>
       <th>Name</th>
       <th>Reg.No.</th>
       <th>Marks</th>
       <th>Remarks</th>
       <th class="text-center">--</th>
       <th>Sr.No</th>
        <th>Name</th>
        <th>Reg.No.</th>
        <th>Marks</th>
        <th>Remarks</th>
     </tr> 
   </thead> 
      <tbody>
        @php
          $id =1;
          $time =0;
        @endphp
        @foreach ($students as $student) 
        @if ($time==0)
        <tr>
        @endif 
          <td class="text-center">{{ $id++ }}</td>
          <td> {{ $student->name }}</td>
          <td>{{ $student->registration_no }}</td>
          <td>10000</td>
          <td>Good</td>
          <td></td>
        @if ($time ==2)
          </tr>
        @endif
          @php
            $time ++;
          @endphp
          @if ($time==2)
           @php
             $time=0;
           @endphp
          @endif
         @endforeach 
      </tbody>
    </table>
  </div>  
 </body> 
 </html>