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
         <div class="panel-heading text-center">Class Subject Report</div>
      </div>  
      <table id="dataTable" class="table table-bordered table-striped table-hover">
         <thead>
            <tr>

               <th>Sr.No.</th>                   
               <th>Class Name</th>                   
               <th>Subject Name</th>                   
               <th>Subject Code</th>                   
               <th>Compulsory/Elective</th>                   

            </tr>
         </thead>
         <tbody>
            @php

            $arrayId=1; 
            @endphp
            @foreach($manageSubjects as $key => $manage)
            @if ($conditionVal=='all')
            <tr>
               <td>{{ $arrayId++}}</td>                 
               <td>{{ $manage->classTypes->name or ''}}</td>                 
               <td>{{ $manage->subjectTypes->name or ''}}</td>                 
               <td>{{ $manage->subjectTypes->code or ''}}</td>                 
               <td>{{ $manage->isoptional->name or ''}}</td>
            </tr>
            @endif
            @if ($conditionVal=='class_wise')  
            @foreach ($manage as $manageSubject)
            <tr>
               <td>{{ $arrayId++}}</td>                 
               <td>{{ $manageSubject->classTypes->name or ''}}</td>                 
               <td>{{ $manageSubject->subjectTypes->name or ''}}</td>
               <td>{{ $manageSubject->subjectTypes->code or ''}}</td>                  
               <td>{{ $manageSubject->isoptional->name or ''}}</td>
            </tr>
            @endforeach

            <tr>
               <td colspan="5">
                  <div class="page_break"></div>
               </td>
            </tr>

            @endif
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