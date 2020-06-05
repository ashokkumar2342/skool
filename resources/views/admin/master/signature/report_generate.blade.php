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
  <div class="panel-heading text-center">Signature Stamps Report</div>
  </div> 
 <table id="religion_dataTable" class="table table-bordered table-striped">
<thead>
   <tr>
     <th style="width: 40px">Sr.No.</th> 
     <th>Certificate Type</th> 
     <th>Authority Type</th>
     @if ($report_type!=3) 
     <th>Employee Name</th>
     <th>Designation</th>
     <th>From Date</th>
     <th>To Date</th>
     @endif
   </tr>
 </thead>
 <tbody>
   @php
         
      $arrayId=1;
      @endphp
  @foreach ($signatureStamps as $signatureStamp) 
   <tr>
     <td>{{ $arrayId++ }}</td>  
     <td>{{ $signatureStamp->certificateName or '' }}</td>  
     <td>{{ $signatureStamp->issunigAuthority or '' }}</td> 
      @if ($report_type!=3)   
     <td>{{ $signatureStamp->empName or ''}}</td>
     <td>{{ $signatureStamp->Designation }}</td>  
     <td>{{ $signatureStamp->from_date or '' }}</td> 
     <td>{{ $signatureStamp->to_date or '' }}</td>
     @endif 
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