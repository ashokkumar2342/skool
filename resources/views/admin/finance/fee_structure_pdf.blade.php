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
  <div class="panel-heading text-center">Fee Structure Report</div>
  </div>  
    <table id="fine_scheme_table" class="display table table-bordered"> 
        <thead>
<tr>
<th class="text-nowrap" style="width: 40px">SR.No.</th>
<th class="text-nowrap" style="width: 40px">Code</th>
<th class="text-nowrap" style="width: 150px">Name</th>
<th class="text-nowrap">Fee Account Name</th>
<th class="text-nowrap">Fine Scheme</th>
<th class="text-nowrap" style="width: 60px">Is Refundable</th>  
</tr>
</thead>
<tbody>
@php
$arrayId=1;
@endphp
@foreach ($feeStructures as $feeStructure)
<tr>
<td>{{ $arrayId++ }}</td>
<td>{{ $feeStructure->code }}</td>
<td>{{ $feeStructure->name }}</td>
<td>{{ $feeStructure->feeAccounts->name or '' }}</td>
<td>{{ $feeStructure->fineSchemes->name or '' }}</td>
<td>{{ $feeStructure->is_refundable == 1 ?'yes':'No' }}</td> 
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