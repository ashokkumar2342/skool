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
         <div class="panel-heading text-center">Income Slab Report</div>
      </div>	
 <table class="table table-striped table-responsive table-condensed table-bordered">
                         
<thead>
      <tr>
        <th>SR.No.</th>
         
        <th>Income Slab</th>
        <th>Income Code</th>
       
         </tr>
      </thead>
      <tbody>
        @php
           $arrayId=1;
        @endphp
      @foreach($incomeSlabs as $incomeSlab)
      <tr>
        <td>{{ $arrayId++ }}</td>
        
        <td>{{ $incomeSlab->range }} </td>
        <td>{{ $incomeSlab->code }} </td>
       
       
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
</html>