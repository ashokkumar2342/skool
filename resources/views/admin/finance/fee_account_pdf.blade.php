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
  <div class="panel-heading text-center">Fee Account Report</div>
  </div>  
     <table id="fine_scheme_table" class="display table table-bordered table-striped"> 
       <thead>
         <tr>
           <th class="text-nowrap" style="width: 61px">Sr.No.</th>
           <th class="text-nowrap" style="width: 80px">Code</th>
           <th class="text-nowrap">Name</th> 
           <th class="text-nowrap">Description</th> 
         </tr>
       </thead>
       <tbody>
         @php
         $arrayId=1;
         @endphp
         @foreach ($feeAccounts as $feeAccount)
         <tr>
           <td>{{ $arrayId++ }}</td>
           <td>{{ $feeAccount->code }}</td>
           <td>{{ $feeAccount->name }}</td> 
           <td>{{ $feeAccount->description }}</td> 
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