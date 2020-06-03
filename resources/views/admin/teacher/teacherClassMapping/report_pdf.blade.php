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
<div class="row" style="margin-top: -30px">
<div class="panel panel-default">
  <div class="panel-heading text-center">Class =>Class Teacher Report</div>
  </div> 
 <table id="category_dataTable" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th style="width: 40px">SR.No.</th>
        @if ($reportType==1)
        <th>Teacher Name</th>
        <th>Class/Section</th> 
         @endif 
         @if ($reportType==2)
         <th>Class/Section</th> 
         <th>Teacher Name</th>
         @endif 
         @if ($reportType==3)
         <th>Teacher Name</th>
         <th>Class/Section</th> 
         @endif  
         @if ($reportType==4)
         <th>Class/Section</th> 
         <th>Teacher Name</th>
         @endif 
         </tr>
      </thead>
      <tbody>
        @php
           
        $arrayId=1;
        @endphp
      @foreach($teacherClassMappings as $teacherClassMapping)
      <tr>
        <td>{{ $arrayId++ }}</td>
        @if ($reportType==1)
        <td>{{ $teacherClassMapping->empname or ''}} </td>
        <td>{{ $teacherClassMapping->classname or ''}} </td>
         @endif
         @if ($reportType==2)
        <td>{{ $teacherClassMapping->classname or ''}} </td>
        <td>{{ $teacherClassMapping->empname or ''}} </td>
         @endif 
         @if ($reportType==3)
        <td>{{ $teacherClassMapping->empname or ''}} </td>
        <td>{{ $teacherClassMapping->classname or ''}} </td>
         @endif
         @if ($reportType==4)
        <td>{{ $teacherClassMapping->classname or ''}} </td>
        <td>{{ $teacherClassMapping->empname or ''}} </td>
         @endif 
      </tr> 
      @endforeach
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