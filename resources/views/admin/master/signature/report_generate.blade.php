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
     <th>Employee</th>
     <th>Certificate Type</th> 
     <th>Designation</th>
     <th>Authority Type</th>
     
   </tr>
 </thead>
 <tbody>
   @php
         
      $arrayId=1;
      @endphp
  @foreach ($signatureStamps as $signatureStamp) 
   <tr style="{{ $signatureStamp->status==1?'background-color: #95e49b':'' }}">
     <td>{{ $arrayId++ }}</td>  
     <td>{{ $signatureStamp->employee->name or ''}}</td>  
     <td>{{ $signatureStamp->CertificateType->name or '' }}</td>  
     <td>{{ $signatureStamp->Designation }}</td>  
     <td>{{ $signatureStamp->IssueAthortiType->name or '' }}</td> 
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