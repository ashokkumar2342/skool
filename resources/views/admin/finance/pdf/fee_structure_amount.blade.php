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
    <table id="fine_scheme_table" class="display table table-bordered"> 
        <thead>
            <tr>
                <th class="text-nowrap">Sr.No.</th>
                <th class="text-nowrap">Fee Structures</th>
                <th class="text-nowrap">Amount</th>
                 
            </tr>
        </thead> 
        <tbody>
            @php
            $arrayId=1;
            @endphp
            @foreach ($FeeStructureAmount as $FeeStructureAmoun)
            <tr>
                <td>{{ $arrayId++ }}</td>
                <td>{{ $FeeStructureAmoun->feeStructures->name or '' }}</td>
                <td>{{ $FeeStructureAmoun->amount }}</td>
                 
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