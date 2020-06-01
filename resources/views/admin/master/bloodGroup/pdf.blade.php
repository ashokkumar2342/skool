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
  <div class="panel-heading text-center">Blood Group Report</div>
  </div>  
 <table id="category_dataTable" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>SR.No.</th> 
                        <th>Blood Group</th>
                       
                        
                         </tr>
                      </thead>
                      <tbody>
                        @php
                           
                        $arrayId=1;
                        @endphp
                      @foreach($completions as $completions)
                      <tr>
                        <td>{{ $arrayId++ }}</td>
                        
                        <td>{{ $completions->name }} </td>
                         
                        
                       
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
 
</html>